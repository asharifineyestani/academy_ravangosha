<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitationRequest extends FormRequest
{

    public function rules()
    {
        return [
            //
            'name' => ['required'],
            'mobile' => ['required'],
            'body' => ['required'],
        ];
    }
}
