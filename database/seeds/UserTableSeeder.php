<?php

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin Istrator',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        User::create([
            'name' => 'End User',
            'email' => 'user@user.com',
            'password' => 'password',
        ]);
    }
}
