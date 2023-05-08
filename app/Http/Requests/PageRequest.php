<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{

    public function rules(): array
    {
        $pageId=$this->route('page')?->id;
        return [
            'title' => 'required|string|min:2|max:255',
            'text' => 'required|min:2',
            'slug'=>['required',Rule::unique('pages','slug')->ignore($pageId),'min:2','max:200'],
            'image'=>[Rule::requiredIf($this->method() == 'POST'),'image','mimes:jpg,png,jpeg']
        ];

    }
}
