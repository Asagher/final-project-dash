<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
  use HasFactory;
  protected $fillable = ['category_id', 'type', 'weight', 'price'];
  public function category()
  {
    return $this->belongsTo(ShipmentCategory::class, 'category_id');
  }
}
