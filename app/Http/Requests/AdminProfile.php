<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminProfile extends FormRequest
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
            'birthday' => 'regex:/^\d{4}\-\d{2}\-\d{2}$/',
            'email'    => 'email|required',
            'mobile'   => 'regex:/^1[34578][0-9]{9}$/',
        ];
    }

    /**
     * 中文提示
     * @return array
     */
    public function messages ()
    {
        return [
            'email.required' => '邮箱地址不能为空',
            'email.email'    => '邮箱地址不正确',
            'mobile.regex'   => '联系方式格式不正确',
            'birthday.regex' => '生日格式不正确',
        ];
    }
}
