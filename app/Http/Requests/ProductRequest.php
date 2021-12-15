<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $method = $this->method();
        switch($method){
            case 'POST':
                return [
                    'name' => 'required',
                    'code' => 'required',
                    'brand' => 'required',
                    'quantity' => 'required',
                    'alert_quantity' => 'required',
                    'category_id' => 'required',
                    'unit_id' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                ];

            default:
                return[];

        }
    }
}
