<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'title' => 'required',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subject' => 'required',
            'ISBN' => 'required',
            'number_of_coypies' => 'required',
            'price' => 'required',
            'Supplier_id' => 'required',
            'Publisher_id' => 'required',
            'Staff_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ISBN.required' => 'ISBN Number is Required Please enter ISBN Number'
        ];

    }

    public function attributes()
    {
        return [
            'category_id' => 'Category Name'
        ];
    }
    public function response(array $errors)
    {
        return new JsonResponse(['error' => $errors], 400);
    }

}
