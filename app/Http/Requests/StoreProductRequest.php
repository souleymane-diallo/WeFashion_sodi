<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail','required', 'between:5,100', 'string'],
            'description' => ['bail','required','string'],
            'price' => ['bail','required',],
            'sizes.*' => ['bail','integer'],
            'category_id' => ['bail','integer'],
            'title_image' => 'string|nullable',
            'state' => ['bail','in:sale,standard'],
            'visibility' => ['bail','in:published,unpublished'],
            'picture' => ['image', 'max:3000'],
            'reference' => ['bail','required', 'string', 'max:16']
        ];
    }
}
