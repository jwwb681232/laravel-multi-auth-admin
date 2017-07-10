<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemManage = new Menu();
        $systemManage->name = '系统';
        $systemManage->url = 'admin/menus';
        $systemManage->slug = 'system.manage';
        $systemManage->icon = 'fa fa-cogs';
        $systemManage->parent_id = 0;
        $systemManage->save();

        $menusManage = new Menu();
        $menusManage->name = '后台目录管理';
        $menusManage->url = 'admin/menus';
        $menusManage->slug = 'menus.list';
        $menusManage->parent_id = $systemManage->id;
        $menusManage->save();

        $adminUserManage = new Menu();
        $adminUserManage->name = '后台用户管理';
        $adminUserManage->url = 'admin/adminuser';
        $adminUserManage->slug = 'adminuser.list';
        $adminUserManage->parent_id = $systemManage->id;
        $adminUserManage->save();

        $permissionManage = new Menu();
        $permissionManage->name = '权限管理';
        $permissionManage->url = 'admin/permission';
        $permissionManage->slug = 'permission.list';
        $permissionManage->parent_id = $systemManage->id;
        $permissionManage->save();

        $roleManage = new Menu();
        $roleManage->name = '角色管理';
        $roleManage->url = 'admin/role';
        $roleManage->slug = 'role.list';
        $roleManage->parent_id = $systemManage->id;
        $roleManage->save();
    }
}
