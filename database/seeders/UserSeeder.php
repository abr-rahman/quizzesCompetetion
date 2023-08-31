<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'password',
        //     'role' => 'admin',
        // ]);

        User::insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'role' => 'admin', 'password' => bcrypt('password')],
            ['name' => 'User', 'email' => 'user@gmail.com', 'role' => 'user', 'password' => bcrypt('password')],
        ]);
    }
}
