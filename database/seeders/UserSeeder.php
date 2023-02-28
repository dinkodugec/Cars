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
            $tag_ids = range(1,3);
            shuffle($tag_ids);
            $assignments = array_slice($tag_ids, 0, rand(0,3)); // eg 5,2,8
            foreach($assignments as $tag_id){
                DB::table('car_tag')
                    ->insert(
                        [
                            'car_id' => $car->id,
                            'tag_id' => $tag_id,
                            'created_at' => Now(),
                            'updated_at' => Now()
                        ]
                    );
            }
        });
    }
}
