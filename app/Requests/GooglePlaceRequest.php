<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GooglePlaceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }
}
