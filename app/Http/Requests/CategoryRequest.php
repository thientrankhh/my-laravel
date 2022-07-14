<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules = [
            'description' => 'max:255'
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'name' => 'required|min:3|max:200|' . Rule::unique('categories'),
            ];
        }
        if ($this->getMethod() == 'PUT') {
            $rules += [
                'name' => 'required|min:3|max:200|' . Rule::unique('categories')->ignore($this->route('category')),
            ];
        }

        return $rules;
    }
}
