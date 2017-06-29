<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    public function index()
    {

        die(1);
        $superAdmin = new Role();
        $superAdmin->name         = 'SuperAdmin';
        $superAdmin->display_name = '超级管理员'; // optional
        $superAdmin->description  = '管理整个系统'; // optional
        $superAdmin->save();

        $admin = new Role();
        $admin->name         = 'Admin';
        $admin->display_name = '管理员'; // optional
        $admin->description  = '管理后台'; // optional
        $admin->save();

        $adminUser = Admin::where('email','admin@admin.com')->first();
        $adminUser->attachRole($superAdmin);





    }

}
