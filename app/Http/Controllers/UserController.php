<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRoleRequest;
use App\Http\Requests\User\UpdateRoleRequest;
use App\Http\Resources\User\RoleResource;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,name,email']
        ]);

        $users = User::query()
            ->when(request('search'), function ($query) {
                $query->where('name', 'LIKE', '%'.request('search').'%')
                    ->OrWhere('email', 'LIKE', '%'.request('search').'%');
            })->when(request()->has(['field', 'direction']), function ($query) {
                $query->orderBy(request('field'), request('direction'));
            })->paginate()
            ->withQueryString();

        $filters = request()->all(['search', 'field', 'direction']);

        return Inertia::render('users/Index', compact('users', 'filters'));
    }

    public function create()
    {
        return Inertia::render('users/Create');
    }

    public function store(StoreRoleRequest $request)
    {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('message', __('User Created Successfully'));
    }

    public function edit(User $user)
    {
        $user = new RoleResource($user);

        return Inertia::render('users/Edit', compact('user'));
    }

    public function update(UpdateRoleRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()
            ->route('users.index')
            ->with('message', __('User Updated Successfully'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('message', __('User Deleted Successfully'));
    }
}
