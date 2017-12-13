<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize ()
    {
        return Auth::guard( 'admin' )->check();
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules ()
    {
        return [
            'old_password'     => 'sometimes|required',
            'password'         => 'sometimes|required',
            'confirm_password' => 'sometimes|required',
        ];
    }
}
