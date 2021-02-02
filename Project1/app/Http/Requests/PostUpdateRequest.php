<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=> 'required|string|min:3|max:255',
            'body'=> 'required|string|min:3|max:255',
            'image'=> 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
