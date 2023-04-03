<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeRequest extends FormRequest
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
            'client_id'=> 'required|string|exists:clients,id',
            'user_id'=> 'required|string|exists:users,id',
            'quantity'=> 'required|string|',
            'color'=> 'required|string|max:14',
            'status'=>'required|string|',
            'price'=>'required|integer',
        ];
    }
}
