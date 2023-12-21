<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipmentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $categories=['الكترونيات','أدوية','مواد غذائية','ملابس'];
      $images=[
        'electronic.jpg',
        'medicine.jpg',
        'food.jpg',
        'clothing.jpg'];
        $price=[
          '50.000',
          '60.000',
          '50.000',
          '20.000'
        ];
        foreach ($categories as $k => $category) {
          ShipmentCategory::create( [
            'category_name' => $category,
            'photo' => $images[$k],
            'price_per_weight' => $price[$k],
        ] );        }

    }
}
