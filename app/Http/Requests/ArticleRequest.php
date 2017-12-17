<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules ()
    {
        return [
            'title'       => 'required',
            'category_id' => 'required|integer',
        ];
    }

    public function messages ()
    {
        return [
            'title.required'       => '标题不能为空',
            'category_id.required' => '文章分类不能为空',
            'category_id.integer'  => '文章分类必须为整数',
        ];
    }
}
