<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesSeeder::class);
        // $this->call(CriteriaSeeder::class);
        
        $this->call(KriteriaSeeder::class);
        $this->call(AlternatifSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(SubkriteriaSeeder::class);
    }
}
