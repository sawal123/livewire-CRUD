<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=> 'admin',
            'guard_name'=> 'web'
        ]);
        Role::create([
            'name'=> 'user',
            'guard_name'=> 'web'
        ]);
    }
}
