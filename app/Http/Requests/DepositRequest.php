<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class DepositRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:0.01',
        ];
    }
}