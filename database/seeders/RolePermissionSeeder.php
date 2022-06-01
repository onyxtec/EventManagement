<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::Create(['guard_name' => 'admin', 'name' => 'admin']);
        $owner = Role::Create(['guard_name' => 'owner', 'name' => 'owner']);

        $showPermission = Permission::create(['guard_name' => 'owner','name' => 'halls.index']);
        $editPermission = Permission::create(['guard_name' => 'owner','name' => 'halls.edit']);
        $createPermission = Permission::create(['guard_name' => 'owner','name' => 'halls.create']);
        $deletePermissionOwner = Permission::create(['guard_name' => 'owner','name' => 'halls.delete']);

        $deletePermissionAdmin = Permission::create(['guard_name' => 'admin','name' => 'halls.delete']);
        $editPermissionAdmin = Permission::create(['guard_name' => 'admin','name' => 'halls.edit']);
        // $createPermissionAdmin = Permission::create(['guard_name' => 'admin','name' => 'halls.create']);
        $showPermissionAdmin = Permission::create(['guard_name' => 'admin','name' => 'halls.index']);
        $deletePermissionThemes = Permission::create(['guard_name' => 'owner','name' => 'themes.delete']);
        $editPermissionThemes = Permission::create(['guard_name' => 'owner','name' => 'themes.edit']);
        $createPermissionThemes = Permission::create(['guard_name' => 'owner','name' => 'themes.create']);
        $showPermissionThemes = Permission::create(['guard_name' => 'owner','name' => 'themes.index']);
        
        $owner->givePermissionTo($deletePermissionOwner);
        $owner->givePermissionTo($showPermission);
        $owner->givePermissionTo($createPermission);
        $owner->givePermissionTo($editPermission); 

        $admin->givePermissionTo($deletePermissionAdmin);
        $admin->givePermissionTo($editPermissionAdmin);
        // $admin->givePermissionTo($createPermissionAdmin);
        $admin->givePermissionTo($showPermissionAdmin);

        $owner->givePermissionTo($deletePermissionThemes);
        $owner->givePermissionTo($editPermissionThemes);
        $owner->givePermissionTo($createPermissionThemes);
        $owner->givePermissionTo($showPermissionThemes);  
       
    }
}       