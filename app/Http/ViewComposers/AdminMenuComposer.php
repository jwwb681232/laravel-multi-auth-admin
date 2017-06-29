<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2017/6/3
 * Time: 20:07
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\Eloquent\MenuRepositoryEloquent as MenuRepository;

class AdminMenuComposer{
    protected $menu;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menu = $menuRepository;
    }

    public function compose(View $view)
    {
        $view->with('adminMenus',$this->menu->getMenuComposerData());
    }
}