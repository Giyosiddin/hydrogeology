<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|min:9|max:14|starts_with:+,9,9,8',
            'phone2' => 'nullable',
            'uz.fullname' => 'required|string|min:5',
            'en.fullname' => 'required|string|min:5',
            'ru.fullname' => 'required|string|min:5',
            'uz.position' => 'required|string|min:3',
            'en.position' => 'required|string|min:3',
            'ru.position' => 'required|string|min:3',
            'uz.description' => 'nullable',
            'en.description' => 'nullable',
            'ru.description' => 'nullable',
            'image' => 'required',
        ];
    }
}
