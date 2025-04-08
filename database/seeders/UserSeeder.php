<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Contestant User',
            'email' => 'contestant@example.com',
            'password' => Hash::make('password'),
            'role' => 'contestant',
        ]);

        User::create([
            'name' => 'Voter User',
            'email' => 'voter@example.com',
            'password' => Hash::make('password'),
            'role' => 'voter',
        ]);

        // User::firstOrCreate(
        //     ['email' => 'admin@example.com'],
        //     [
        //         'name' => 'Admin User',
        //         'password' => Hash::make('password'),
        //         'role' => 'admin',
        //     ]
        // );

        // User::firstOrCreate(
        //     ['email' => 'contestant@example.com'],
        //     [
        //         'name' => 'Contestant User',
        //         'password' => Hash::make('password'),
        //         'role' => 'contestant',
        //     ]
        // );
        
        // User::firstOrCreate(
        //     ['email' => 'voter@example.com'],
        //     [
        //         'name' => 'Voter User',
        //         'password' => Hash::make('password'),
        //         'role' => 'voter',
        //     ]
        // );
        
        
    }
}
