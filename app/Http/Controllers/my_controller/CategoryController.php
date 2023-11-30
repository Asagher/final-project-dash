<?php
namespace App\Http\Controllers\my_controller;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
//trait for saveImage
use App\Traits\SaveImageTrait;
class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $category = Category::create([
      'title' => $request->categoryTitle,
      'price_per_weight' => $request->price_per_weight,
    ]);
    if ($category) {
      // user updated
      return response()->json(['message' => 'created'], 200);
    } else {
      return response()->json(['message' => 'error'], 401);
    }
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
