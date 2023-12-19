<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->createMany([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@kafri.com'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@kafri.com'
            ]
        ]);

        $this->call([
            RoleSeeder::class,
        ]);
    }
}
