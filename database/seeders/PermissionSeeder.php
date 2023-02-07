<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        //Information About COVID-19
        Permission::create(['name' => 'create information']);

        //Information About COVID-19
        Permission::create(['name' => 'create advice']);

        //Consultant
        Permission::create(['name' => 'create consultant']);

        //Activity
        Permission::create(['name' => 'create activity']);

        //Music
        Permission::create(['name' => 'create music']);

        $user = \App\Models\User::factory()->create([
            'email' => 'azhan14@gmail.com',
            'first_name' => 'Azhan',
            'last_name' => 'Idris'
        ]);
        $user->givePermissionTo(
            'create users',
            'view users',
            'edit users',
            'delete users',
            'create information',
            'create activity',
            'create consultant',
            'create advice',
            'create music'
        );
    }
}
