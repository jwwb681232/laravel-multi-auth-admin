<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->systemManage();
        $this->menus();
        $this->adminUser();
        $this->permission();
        $this->role();
    }

    /**
     * create system permission
     */
    public function systemManage()
    {
        $systemManage = New Permission();
        $systemManage->name = 'system.manage';
        $systemManage->display_name = '系统管理';
        $systemManage->description = '系统管理';
        $systemManage->save();
    }

    /**
     * create menus permission
     */
    public function menus()
    {
        $menusList = New Permission();
        $menusList->name = 'menus.list';
        $menusList->display_name = '目录列表';
        $menusList->description = '目录列表';
        $menusList->save();

        $menusAdd = New Permission();
        $menusAdd->name = 'menus.add';
        $menusAdd->display_name = '添加目录';
        $menusAdd->description = '添加目录';
        $menusAdd->save();

        $menusEdit = New Permission();
        $menusEdit->name = 'menus.edit';
        $menusEdit->display_name = '修改目录';
        $menusEdit->description = '修改目录';
        $menusEdit->save();

        $menusDelete = New Permission();
        $menusDelete->name = 'menus.delete';
        $menusDelete->display_name = '删除目录';
        $menusDelete->description = '删除目录';
        $menusDelete->save();
    }

    /**
     * create admin user permission
     */
    public function adminUser()
    {
        $adminUserList = New Permission();
        $adminUserList->name = 'adminuser.list';
        $adminUserList->display_name = '后台用户列表';
        $adminUserList->description = '后台用户列表';
        $adminUserList->save();

        $adminUserAdd = New Permission();
        $adminUserAdd->name = 'adminuser.add';
        $adminUserAdd->display_name = '添加后台用户';
        $adminUserAdd->description = '添加后台用户';
        $adminUserAdd->save();

        $adminUserEdit = New Permission();
        $adminUserEdit->name = 'adminuser.edit';
        $adminUserEdit->display_name = '修改后台用户';
        $adminUserEdit->description = '修改后台用户';
        $adminUserEdit->save();

        $adminUserDelete = New Permission();
        $adminUserDelete->name = 'adminuser.delete';
        $adminUserDelete->display_name = '删除后台用户';
        $adminUserDelete->description = '删除后台用户';
        $adminUserDelete->save();
    }

    /**
     * create permission permission
     */
    public function permission()
    {
        $permissionList = New Permission();
        $permissionList->name = 'permission.list';
        $permissionList->display_name = '权限列表';
        $permissionList->description = '权限列表';
        $permissionList->save();

        $permissionAdd = New Permission();
        $permissionAdd->name = 'permission.add';
        $permissionAdd->display_name = '添加权限';
        $permissionAdd->description = '添加权限';
        $permissionAdd->save();

        $permissionEdit = New Permission();
        $permissionEdit->name = 'permission.edit';
        $permissionEdit->display_name = '修改权限';
        $permissionEdit->description = '修改权限';
        $permissionEdit->save();

        $permissionDelete = New Permission();
        $permissionDelete->name = 'permission.delete';
        $permissionDelete->display_name = '删除权限';
        $permissionDelete->description = '删除权限';
        $permissionDelete->save();
    }

    /**
     * create role permission
     */
    public function role()
    {
        $roleList = New Permission();
        $roleList->name = 'role.list';
        $roleList->display_name = '角色列表';
        $roleList->description = '角色列表';
        $roleList->save();

        $roleAdd = New Permission();
        $roleAdd->name = 'role.add';
        $roleAdd->display_name = '添加角色';
        $roleAdd->description = '添加角色';
        $roleAdd->save();

        $roleEdit = New Permission();
        $roleEdit->name = 'role.edit';
        $roleEdit->display_name = '修改角色';
        $roleEdit->description = '修改角色';
        $roleEdit->save();

        $roleDelete = New Permission();
        $roleDelete->name = 'role.delete';
        $roleDelete->display_name = '删除角色';
        $roleDelete->description = '删除角色';
        $roleDelete->save();
    }
}
