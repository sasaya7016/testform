<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastname' => 'required|string|max:20|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んー一-龠]+$/u',
            'firstname' => 'required|string|max:20|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んー一-龠]+$/u',
            'email' => 'required|email|unique:posts|max:100',
            'text' => 'string|max:200',
        ];
    }
}
