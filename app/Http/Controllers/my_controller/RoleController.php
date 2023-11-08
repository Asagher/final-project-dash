<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
    $roleID = $request->id;

    if ($roleID) {
      // update the value
      $roles = Role::updateOrCreate(['id' => $roleID], ['name' => $request->modalRoleName, 'guard_name' => 'web']);

      // user updated
      return response()->json('Updated');
    } else {
      // create new one if email is unique
      $roleName = Role::where('name', $request->name)->first();

      if (empty($roleName)) {
        $roles = Role::updateOrCreate(['id' => $roleID], ['name' => $request->name, 'guard_name' => 'web']);

        // user created
        return response()->json('Created');
      } else {
        // user already exist
        return response()->json(['message' => 'already exits'], 422);
      }
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
