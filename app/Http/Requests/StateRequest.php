<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'state' => ['required', 'string', 'max:255'],
        ];
    }
}
