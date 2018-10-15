<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPost extends FormRequest
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
            'password' => 'required|alpha_num|between:6,10',
            'repeatPassword' => 'required|confirmed:password',
            'smsCode' => 'required|numeric|size:6'
        ];
    }

    /**
     *
     */

    public function messages()
    {
        return [
            'mobile.required' => '手机号码不能为空',
            'mobile.regex' => '手机号码格式错误',
            'password.required' => '密码不能为空',
            'password.alpha_num' => '密码必须为字母或者数字',
            'password.between' => '密码为6-10位字符,字母或者数字',
            'repeatPassword.required' => '重复密码不能为空',
            'repeatPassword.confirmed' => '两次密码不一致,请重新输入',
            'smsCode.required' => '短信验证码不能为空',
            'smsCode.numeric' => '短信验证码为6位数字',
            'smsCode.size' => '短信验证码为6位数字'
        ];
    }

}
