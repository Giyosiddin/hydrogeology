<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'uz.salary' => 'required|string',
            'en.salary' => 'required|string',
            'ru.salary' => 'required|string',
            'uz.position' => 'required|string|min:3',
            'en.position' => 'required|string|min:3',
            'ru.position' => 'required|string|min:3',
            'uz.description' => 'nullable',
            'en.description' => 'nullable',
            'ru.description' => 'nullable',
            'uz.body' => 'required',
            'en.body' => 'required',
            'ru.body' => 'required',
        ];
    }
}
