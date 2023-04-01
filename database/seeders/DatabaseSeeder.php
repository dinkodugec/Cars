<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
      
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            CarTableSeeder::class,
            AdminSeeder::class
        ]);

    }
}
