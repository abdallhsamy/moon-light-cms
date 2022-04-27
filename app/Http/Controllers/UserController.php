<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
}
