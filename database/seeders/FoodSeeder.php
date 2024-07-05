<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                "title" => "Parata",
                "price" => "100",
                "image" => "foodimage/parata.jpg",
                "description" => "parata"
            ],
            [
                "title" => "Pizza",
                "price" => "1200",
                "description" => "Delicious cheesy pizza with pepperoni.",
                "image" => "foodimage/Pizza.jpg"
            ]
        ];
        foreach ($foods as $food) {
            Food::updateOrCreate(
                ['title' => $food['title']], // Unique identifier to check
                $food // Data to insert or update
            );
        }
    }
}
