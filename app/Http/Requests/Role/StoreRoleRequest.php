<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name|string|min:3|max:100',
            'permissions' => 'array|nullable',
            'permission.*' => 'numeric'
        ];
    }
}
