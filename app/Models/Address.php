<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = ['id', 'address_id'];
  public function addressShippingRequests()
  {
    return $this->hasMany(ShippingRequest::class, 'address_id');
  }
}
