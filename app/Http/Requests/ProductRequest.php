<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'quantity' => 'required|min:0|max:1000',
            'description' => 'required',
            'introduce' => 'required',
            'feature' => 'required',
            'configuration' => 'required',
            'category_id' => 'required',
            'origin_id' => 'required',
            'trade_id' => 'required',
            'warranty_id' => 'required',
            'price' => 'required|numeric|min:10000|max:99999999999999999',
            'promotional_price' => 'numeric|nullable|min:10000|max:' . $this->price
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'name' => 'required|min:2|max:255|' . Rule::unique('products'),
                'image' => 'required',
            ];
        }
        if ($this->getMethod() == 'PUT') {
            $rules += [
                'name' => 'required|min:2|max:255|' . Rule::unique('products')->ignore($this->route('product')),
            ];
        }

        return $rules;
    }
}
