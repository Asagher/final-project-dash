<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLine extends Model
{
  use HasFactory;
  protected $primaryKey = 'shipment_line_id';
  public $timestamps = false;
  protected $fillable = ['shipment_line_id', 'request_id', 'category_id', 'quantity', 'weight', 'description'];
  public function shippingRequest()
  {
    return $this->belongsTo(ShippingRequest::class, 'request_id');
  }

  public function category()
  {
    return $this->belongsTo(ShipmentCategory::class, 'category_id');
  }
}
