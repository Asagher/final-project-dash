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
    $data = Role::all();

    if ($data) {
      return response()->json($data);
    } else {
      return response()->json('null');
    }
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
    // Controller

    if ($request->modalRoleId) {
      // تعديل
      $role = Role::find($request->modalRoleId);
      $role->name = $request->modalRoleName;
      $role->update();

      return response()->json(['message' => 'updated', 'data' => $role]);
    } else {
      // إضافة جديد

      $roleName = Role::where('name', $request->modalRoleName)->first();

      if (empty($roleName)) {
        // update the value
        $roles = Role::Create(['name' => $request->modalRoleName, 'guard_name' => 'web']);

        // user updated
        return response()->json(['message' => 'Created', 'data' => $roles]);
      } else {
        return response()->json(['message' => 'already exits'], 422);
      }
      return response()->json(['message' => 'Not Updated'], 422);
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
    $roles = Role::where('id', $id)->first();

    return response()->json($roles);
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
