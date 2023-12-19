<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'admin'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        $super_admin = User::find(1);
        $admin = User::find(2);

        $super_admin->roles()->attach(Role::find(1)->id);
        $admin->roles()->attach(Role::find(2)->id);
    }
}
