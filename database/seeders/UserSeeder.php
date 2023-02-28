<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()->count(10)->create()->each(function ($car){
            $categories_ids = range(1,3);
            shuffle($categories_ids);
            $assignments = array_slice($categories_ids, 0, rand(0,3)); // eg 5,2,8
            foreach($assignments as $categories_id){
                DB::table('car_categories')
                    ->insert(
                        [
                            'car_id' => $car->id,
                            'categories_id' => $categories_id,
                            'created_at' => Now(),
                            'updated_at' => Now()
                        ]
                    );
            }
        });
    }
}
