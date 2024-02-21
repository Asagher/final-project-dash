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
      ' إدارة الأصناف',
      'إدارة الطرود',
      'إدارة الأدوار',
      'إدارة الصلاحيات',
      'طلبات الشحن',
      'إدارة بيانات للموظفين',
  'إدارة العملاء'];
      foreach($permissions as $permission){
          Permission::create( [ 'name'=>$permission] )->assignRole('المشرف');
      }
      $driverRole = Permission::where('name', 'طلبات الشحن')->first();
      $driverRole->assignRole('موظف إدارة الشحن');
      $service=Permission::whereIn('name', ['إدارة الأصناف','إدارة العملاء'])->first();
      $service->assignRole('موظف خدمات');
      $service2=Permission::where('name','إدارة الطرود')->first();
      $service2->assignRole('موظف خدمات');

    }
}
