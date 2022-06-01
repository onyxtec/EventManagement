<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class adminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin =Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
            'confirm_password' =>  Hash::make('admin'),

        ]);
        $admin->assignRole('admin');
        $permissions = Permission::pluck('id','id')->all();
   
        $admin->syncPermissions($permissions);
     
        $admin->assignRole($admin);
    }
}
