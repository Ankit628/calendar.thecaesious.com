<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'Alpha']);
        Permission::create(['name' => 'Bravo']);
        Role::create(['name' => 'subscriber']);
        $role = Role::create(['name' => 'admin']);


        $user = factory(User::class)->create([
            'id' => 1,
            'name' => 'TheCaesious',
            'email' => 'info@thecaesious.com',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role);
    }
}
