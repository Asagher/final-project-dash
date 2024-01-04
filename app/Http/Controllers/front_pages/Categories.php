<?php

namespace App\Http\Controllers\front_pages;

use Illuminate\Http\Request;
use App\Models\ShipmentCategory;
use App\Http\Controllers\Controller;

class Categories extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::all();
    $pageConfigs = ['myLayout' => 'front'];
    return view('content.front-pages.categories', ['pageConfigs' => $pageConfigs,
  'categories'=>$categories]);
  }
}
