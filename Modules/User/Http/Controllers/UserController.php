<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Transformers\UserResource;

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

        return Inertia::render('User::Index', compact('users', 'filters'));

    }

    public function create()
    {
        return Inertia::render('User::Create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('message', __('User Created Successfully'));
    }

    public function edit(User $user)
    {
        $user = new UserResource($user);

        return Inertia::render('User::Edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
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
