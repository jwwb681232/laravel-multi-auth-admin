<?php

use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole();
        $this->attachPermissionToRole();
        $this->attachRoleToAdminUser();
    }

    public function createRole()
    {
        $superAdmin = new Role();
        $superAdmin->name         = 'SuperAdmin';
        $superAdmin->display_name = '超级管理员';
        $superAdmin->description  = '管理后台的角色';
        $superAdmin->save();

        $editor = new Role();
        $editor->name         = 'editor';
        $editor->display_name = '编辑';
        $editor->description  = '编辑';
        $editor->save();
    }

    public function attachPermissionToRole()
    {
        $superAdmin  = Role::where('name','=','SuperAdmin')->first();
        $superAdminPermissions = Permission::all()->toArray();
        $superAdminPermissionsIds = [];
        foreach ($superAdminPermissions as $superAdminPermission) {
            $superAdminPermissionsIds[] = $superAdminPermission['id'];
        }
        $superAdmin->perms()->sync($superAdminPermissionsIds);

        $editor = Role::where('name','=','editor')->first();
        $editorPermission = Permission::whereIn('name',['system','menus'])->get()->toArray();
        $editorPermissionIds = [];
        foreach ($editorPermission as $item) {
            $editorPermissionIds[] = $item['id'];
        }
        $editor->perms()->sync($editorPermissionIds);
    }

    public function attachRoleToAdminUser()
    {
        $superAdmin = Admin::where('name','=','Administrator')->first();
        $superAdminRole = Role::where('name','=','SuperAdmin')->first()->toArray();
        $superAdmin->attachRole($superAdminRole['id']);
        $editor = Admin::where('name','=','Editor')->first();
        $editorRole = Role::where('name','=','editor')->first()->toArray();
        $editor->attachRole($editorRole['id']);
    }
}
