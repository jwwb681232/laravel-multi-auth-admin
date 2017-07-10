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
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ]);

        Admin::create([
            'name' => 'Editor',
            'email' => 'editor@editor.com',
            'password' => 'editor',
        ]);

        User::create([
            'name' => 'UserName',
            'email' => 'username@username.com',
            'password' => 'username',
        ]);
    }
}
