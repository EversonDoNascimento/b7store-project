<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class profileRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email' , 'max:255',
            Rule::unique('users')->ignore(Auth::user()->id)],
            'state' => ['required', 'numeric'],
        ];
    }
}
