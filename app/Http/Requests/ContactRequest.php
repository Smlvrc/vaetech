<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'message' => 'required|min:3',
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'subject' => 'required|min:3'

        ];
    }
}
