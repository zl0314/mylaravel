<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendLinkRequest extends FormRequest
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
            'name' => 'required',
            'url' => 'required|url',
            'listorder' => 'integer'
        ];
    }


    public function messages ()
    {
        return [
            'name.required' => '名称不能为空',
            'url.required' => 'URL不能为空',
            'listorder.required' => '排序不能为空',
        ];
    }
}
