<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_user_id' => 'required|uuid|exists:users,id',
            'to_user_id'   => 'required|uuid|exists:users,id|different:from_user_id',
            'amount'       => 'required|numeric|min:0.01',
        ];
    }
}