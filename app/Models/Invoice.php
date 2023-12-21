<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;
  protected $fillable = ['invoice_id', 'shipment_line_id', 'invoice_date', 'due_date', 'total_amount', 'payer'];
  protected $dates = ['invoice_date'];

  protected $primaryKey = 'invoice_id';

  public function shippingLines()
  {
    return $this->belongsTo(shippingLines::class, 'shipment_line_id');
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
