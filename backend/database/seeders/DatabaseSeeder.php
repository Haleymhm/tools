<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Admin System',
             'email' => 'admin@tool.test',
             'password' => Hash::make('Admin1234')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admintest@tool.test',
            'password' => Hash::make('Admin1234')
       ]);

       \App\Models\Company::factory()->create([
        'company_name' => 'Empresa Test 01',
        'company_email' => 'admintest@tool.test',
   ]);

    }
}
