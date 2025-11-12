<?php

namespace App\Http\Controllers;

use App\Http\Resources\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create([
            "title" => Str::random(16),
        ]);
        return $role;

    }

    /**
     * Display the specified resource.
     */
    public function show(Role  $role)
    {
        return $role;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role $role)
    {
        dump($role);
        $role->update([
            "title" => Str::random(16),
        ]);
        return $role;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response(['message' => 'Role deleted'], Response::HTTP_OK);
    }
}
