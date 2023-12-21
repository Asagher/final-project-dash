<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLine extends Model
{
  use HasFactory;
  protected $primaryKey = 'shipment_line_id';
  public $timestamps = false;
  protected $fillable = [
    'shipment_line_id',
    'request_id',
    'category_id',
    'quantity',
    'total_weight',
    'line_total_cost',
  ];
  public function shippingRequest()
  {
    return $this->belongsTo(ShippingRequest::class, 'request_id');
  }

  public function category()
  {
    return $this->belongsTo(ShipmentCategory::class, 'category_id');
  }
  public function invoice()
  {
    return $this->hasOne(Invoice::class, 'shipment_line_id');
  }
}
