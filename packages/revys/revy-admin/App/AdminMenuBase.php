<?php

namespace Revys\RevyAdmin\App;

use Revys\Revy\App\Entity;

class AdminMenuBase extends Entity
{    
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

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();
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
