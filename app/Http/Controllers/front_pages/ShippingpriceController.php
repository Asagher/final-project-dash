<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ShipmentCategory;

class ShippingpriceController extends Controller
{

  public function index()
  {

    $pageConfigs = ['myLayout' => 'front'];
    $categories = ShipmentCategory::all();

    return view('content.front-pages.shipping-price-page', ['pageConfigs' => $pageConfigs,'categories'=> $categories]);
  }
}
