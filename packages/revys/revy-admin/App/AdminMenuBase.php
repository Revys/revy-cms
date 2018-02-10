<?php

namespace Revys\RevyAdmin\App;

use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;
use Revys\Revy\App\Traits\Tree;

class AdminMenuBase extends Entity
{
    use Translatable, Tree;

    public static $translatedAttributes = ['title'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_menu';

    public static function rules()
    {
        return [
            'title'      => 'required',
            'controller' => 'required',
            'action'     => 'required',
        ];
    }
}
