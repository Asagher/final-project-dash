<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AccessRoles extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return view('content.apps.app-access-roles', compact('roles'));
  }

  public function store(Request $request)
  {
    $roleID = $request->id;

    if ($roleID) {
      // update the value
      $roles = Role::updateOrCreate(['id' => $roleID], ['name' => $request->name, 'guard_name' => 'web']);

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
}
