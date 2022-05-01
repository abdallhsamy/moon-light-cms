<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,name,email']
        ]);

        $roles = Role::query()
            ->when(request('search'), function ($query) {
                $query->where('name', 'LIKE', '%'.request('search').'%');
            })->when(request()->has(['field', 'direction']), function ($query) {
                $query->orderBy(request('field'), request('direction'));
            })->paginate()
            ->withQueryString();

        $filters = request()->all(['search', 'field', 'direction']);

        return Inertia::render('roles/Index', compact('roles', 'filters'));
    }

    public function create()
    {
        $groupedPermissions = Permission::orderBy('group')->get()->groupBy(function($data) {
            return $data->group;
        });

        return Inertia::render('roles/Create', compact('groupedPermissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->only('name'));

        if ($request->has('permissions') && !empty($request->get('permissions'))) {
            $role->syncPermissions($request->get('permissions'));
        }

        return redirect()
            ->route('roles.index')
            ->with('message', __('Role Created Successfully'));
    }

    public function edit(Role $role)
    {
        $role = new RoleResource($role);

        return Inertia::render('roles/Edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect()
            ->route('roles.index')
            ->with('message', __('Role Updated Successfully'));
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('message', __('Role Deleted Successfully'));
    }
}
