<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mobile' => ['required','regex'=>'/^(0|86|17951)?(13[0-9]|15[012356789]|166|17[3678]|18[0-9]|14[57])[0-9]{8}$/'],
            'simCode' => 'required|numeric|max:6'
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => '手机号码不能为空',
            'mobile.regex' => '手机号码格式错误',
            'simCode.required'  => '短信验证码不能为空',
            'simCode.numeric' => '短信验证码必须6位数字',
            'simCode.max' => '短信验证码必须6位数字'
        ];
    }
}
