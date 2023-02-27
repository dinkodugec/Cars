<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Sports' => 'primary', // blue
            'Relaxation' => 'secondary', // grey
            'Fun' => 'warning', // yellow
            'Nature' => 'success', // green
            'Inspiration' => 'light', // white grey
            'Friends' => 'info', // turquoise
            'Love' => 'danger', // red
            'Interest' => 'dark' // black-white
        ];

        foreach ($categories as $key => $value) {
            $category = new Category(
                [
                    'name' => $key,
                    'style' => $value
                ]
            );
            $category->save();
        }
    }
}
