<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoryDetailSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {

    $this->call(PermissionSeeder::class);
    $this->call(RoleSeeder::class);

    $this->call(AdminSeeder::class);
    $this->call(ShippingOperationsManagementSeeder::class);
    $this->call(CategorySeeder::class);
    $this->call(CarPartSeeder::class);
    $this->call(HomePartSeeder::class);
    $this->call(DevicesSeeder::class);
    $this->call(AdressSeeder::class);

  }
}
