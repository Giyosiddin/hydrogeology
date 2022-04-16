<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecisionRequest extends FormRequest
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
            'uz.title' => 'required|min:3|max:255',
            'en.title' => 'required|min:3|max:255',
            'ru.title' => 'required|min:3|max:255',
            'uz.body' => 'required',
            'en.body' => 'required',
            'ru.body' => 'required',
            'uz.description' => 'nullable',
            'en.description' => 'nullable',
            'ru.description' => 'nullable',
            'number_decision' => 'nullable'
        ];
    }
}
