<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $permissions=[
      'الأصناف',
      'الأدوار',
      'الصلاحيات',
      'طلبات الشحن',
      'إنشاء حساب للموظفين'];
      foreach($permissions as $permission){
          Permission::create( [ 'name'=>$permission] )->assignRole('المشرف');
      }
      $driverRole = Permission::where('name', 'طلبات الشحن')->first();
      $driverRole->assignRole('إدارة طلبات الشحن');
    }
}
