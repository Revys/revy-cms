<?php

namespace Revys\RevyAdmin\App\Http\Composers;

use Revys\RevyAdmin\App\AdminMenu;

class NavigationComposer
{
    protected $menu;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose($view)
    {
        $tmp = explode('.', $view->name());
        $method = end($tmp);

        $this->$method($view);
    }

    public function left($view)
    {
        $items = AdminMenu::tree(2);

        $view->with(compact('items'));
    }

    public function top($view)
    {
        $path = [];

        $controller = GlobalsComposer::getController();
        $action = GlobalsComposer::getAction();

        $admmenu = AdminMenu::where('controller', '=', $controller->GetController())->orderBy('parent_id', 'asc')->first();

        $path[] = $admmenu->title;

        switch ($action) {
            case 'edit':
                $path[] = __("Редактирование");
                break;
            case 'create':
                $path[] = __("Добавление");
                break;
        }

        $actions = $controller->actions;

        $view->with(compact('path', 'action', 'actions'));
    }
}