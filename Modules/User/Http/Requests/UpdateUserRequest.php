<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ];

        if ($this->request->has('password') && !in_array($this->request->get('password'), ['', null], true)) {
            $rules = [
                ...$rules,
                'password' => 'nullable|required|confirmed|min:6|max:100'
            ];
        }

        return $rules;
    }
}
