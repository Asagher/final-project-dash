<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryDetail;
use App\Models\ShipmentCategory;
use Illuminate\Http\Request;

class EcommerceProductCategory extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::all();
    return view('content.apps.app-ecommerce-category-list', \compact('categories'));
  }

  public function getCategoryDetails($categoryId)
  {
    $details = CategoryDetail::where('category_id', $categoryId)->get();
    return response()->json($details);
  }
}
