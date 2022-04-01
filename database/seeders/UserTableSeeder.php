<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $role = Role::create(['name' => 'Super User']);
        Permission::insert([
            ['group' => 'User', 'guard_name' => 'web', 'name' => 'add user', 'created_at' => now()],
            ['group' => 'User', 'guard_name' => 'web', 'name' => 'edit user', 'created_at' => now()],
            ['group' => 'User', 'guard_name' => 'web', 'name' => 'delete user', 'created_at' => now()],
            ['group' => 'User', 'guard_name' => 'web', 'name' => 'view user', 'created_at' => now()],

            ['group' => 'Role', 'guard_name' => 'web', 'name' => 'add role', 'created_at' => now()],
            ['group' => 'Role', 'guard_name' => 'web', 'name' => 'edit role', 'created_at' => now()],
            ['group' => 'Role', 'guard_name' => 'web', 'name' => 'delete role', 'created_at' => now()],
            ['group' => 'Role', 'guard_name' => 'web', 'name' => 'view role', 'created_at' => now()],

            ['group' => 'Permission', 'guard_name' => 'web', 'name' => 'add permission', 'created_at' => now()],
            ['group' => 'Permission', 'guard_name' => 'web', 'name' => 'edit permission', 'created_at' => now()],
            ['group' => 'Permission', 'guard_name' => 'web', 'name' => 'delete permission', 'created_at' => now()],
            ['group' => 'Permission', 'guard_name' => 'web', 'name' => 'view permission', 'created_at' => now()],
        ]);
        $role->syncPermissions(Permission::all());

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_active' => true
        ]);
        $admin->syncRoles($role->name);
    }
}
