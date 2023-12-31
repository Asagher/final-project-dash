<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentCategory extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $primaryKey = 'category_id';

  protected $fillable = ['category_id', 'category_name', 'photo', 'price_per_weight'];

  public function categoryDetail()
  {
    return $this->hasMany(CategoryDetail::class, 'category_id');
  }
}
