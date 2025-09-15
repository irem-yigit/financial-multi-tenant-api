<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Test tenant user
        User::create([
            'name' => 'Tenant User',
            'email' => 'tenant1@example.com',
            'password' => Hash::make('12345678'),
            'tenant_id' => 'tenant1',
        ]);

        // Test tenant user 2
        User::create([
            'name' => 'Tenant User 2',
            'email' => 'tenant2@example.com',
            'password' => Hash::make('12345678'),
            'tenant_id' => 'tenant2',
        ]);
    }
}
