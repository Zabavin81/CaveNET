<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\StoreRoleRequest;
use App\Http\Requests\Api\Role\UpdateRoleRequest;
use App\Http\Resources\Models\Role;
use App\Services\RoleService;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();
        Role::create($data);
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return $role;
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        RoleService::update($role, $data);
        return response(['message' => 'Role updated successfully.'],
            Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
    }
}
