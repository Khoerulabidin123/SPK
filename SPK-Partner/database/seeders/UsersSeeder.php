<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use app\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Khoerul Abidin',
            'username' => 'abidin',
            'email' => 'abidin@gmail.com',
            'email_verifed_at' => now(),
            'remember_token' => Str::random(10),
            'password' => bcrypt('12345')
        ]);
        $admin->assignRole('superadmin');

        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@user.com',
            'email_verifed_at' => now(),
            'remember_token' => Str::random(10),
            'password' => bcrypt('12345')
        ]);
        $user->assignRole('user');
    }
}
