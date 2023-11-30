<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;
  protected $fillable = [
    'invoice_id',
    'request_id',
    'sender_customer_id',
    'receiver_customer_id',
    'invoice_date',
    'due_date',
    'total_amount',
    'payer',
    'invoice_date',
  ];
  protected $dates = ['invoice_date'];

  protected $primaryKey = 'invoice_id';

  public function shippingRequest()
  {
    return $this->belongsTo(ShippingRequest::class);
  }

  public function sender()
  {
    return $this->belongsTo(Customer::class, 'sender_customer_id');
  }

  public function receiver()
  {
    return $this->belongsTo(Customer::class, 'receiver_customer_id');
  }
}
