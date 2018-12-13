<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9-_]{2,12}$/u',
            'password' => 'required|regex:/^\S{6,12}$/',
            'phone'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',
            'header'=>'required'
        ];
    }

     public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码格式不正确',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'header.required'=>'请上传图片'
        ];
    }
}
