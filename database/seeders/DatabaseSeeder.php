<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name'=> 'admins',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('123456789'),
            'isAdmin'=>true,
        ]);
    }
}
