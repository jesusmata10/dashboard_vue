<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Vocero']);
        $role3 = Role::create(['name' => 'Comuna']);
        $role4 = Role::create(['name' => 'Promotor']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'personas.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'personas.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'personas.store'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'personas.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'personas.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'personas.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.update'])->syncRoles([$role1]);

    }
}
