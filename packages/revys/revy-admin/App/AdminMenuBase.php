<?php

namespace Revys\RevyAdmin\App;

use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;
use Revys\Revy\App\Traits\Tree;

class AdminMenuBase extends Entity
{    
    use Translatable;

    public $translatedAttributes = ['title'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_menu';

    public function parent()
    {
        return $this->hasOne('Revys\RevyAdmin\App\AdminMenu', 'id', 'parent_id');
    }
    
    public function children()
    {
        return $this->hasMany('Revys\RevyAdmin\App\AdminMenu', 'parent_id', 'id');
    }
    
    public static function tree($level = 4, $published = false)
    {
        $with = array();

        if ($published) {
            for ($i = 1; $i < $level; $i++) { 
                $with[implode('.', array_fill(0, $i, 'children'))] = function ($q) {
                    $q->published();
                };
            }
        } else {
            $with[] = implode('.', array_fill(0, $level, 'children'));
        }

        $result = static::with($with)->where('parent_id', '=', NULL);

        if ($published)
            $result->published();

        return $result;
    }
    
    public static function treePublished($level = 4)
    {
        return static::tree($level, true);
    }
    
    public static function rules()
    {
        return [
            'title' => 'required',
            'controller' => 'required',
            'action' => 'required',
        ];
    }
}
