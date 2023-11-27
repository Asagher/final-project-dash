<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $primaryKey = 'status_id';

  protected $fillable = ['status_id', 'status_name'];
}
