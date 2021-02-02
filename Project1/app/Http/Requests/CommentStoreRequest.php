<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'description' => 'required|string|min:3|max:255',

        ];
    }
}
