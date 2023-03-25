<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCreateRequest extends FormRequest
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
            'shop_name' => 'required|max:30',
            'genre_id' => 'required',
            'area_id' => 'required',
            'image' => 'required',
            'about' => 'required|max:300'
        ];
    }
}
