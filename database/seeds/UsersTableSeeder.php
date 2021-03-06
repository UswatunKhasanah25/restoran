<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'customer'];

        foreach ($roles as $role) {
	        Role::create([
	        	'name' => $role
	        ]);
        }

        $admin = new User;
        $admin->name = 'Administrator';
        $admin->email = 'admin@assalamualaikum';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->attachRole('admin');
    }
}
