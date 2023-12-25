<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRequest extends Model
{
  use HasFactory;
  protected $fillable = [
    'request_id',
    'sender_customer_id',
    'receiver_customer_id',
    'shipping_delivery',
    'created_at',
    'status_id',
    'address_id',
  ];
  protected $primaryKey = 'request_id';
  protected $dates = ['created_at'];

  public function addresses()
  {
    return $this->belongsTo(Address::class, 'address_id');
  }
  public function sender()
  {
    return $this->belongsTo(Customer::class, 'sender_customer_id');
  }

  public function receiver()
  {
    return $this->belongsTo(Customer::class, 'receiver_customer_id');
  }

  public function shipmentLines()
  {
    return $this->hasMany(ShipmentLine::class, 'request_id');
  }

  public function status()
  {
    return $this->belongsTo(RequestStatus::class, 'status_id');
  }
  public function invoice()
  {
    return $this->hasOne(Invoice::class, 'request_id');
  }
}
