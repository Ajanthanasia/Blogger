<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Walker',
            'username' => 'Hippop',
            'email' => 'hip@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('pass1234#'),
            'remember_token' =>Str::random(10),
        ]);
    }
}
