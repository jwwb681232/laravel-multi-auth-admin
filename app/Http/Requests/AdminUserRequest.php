<?php

namespace App\Http\Requests;


class AdminUserRequest extends Request
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
            'email'=>'required|email|unique:admins',
            'name'=>'required',
            //'password'=>'required|confirmed',
            'password'=>'confirmed',
            //'password_confirmation'=>'required',
            'role'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'请输入邮箱',
            'email.email'=>'请输入正确的邮箱',
            'email.unique'=>'邮箱已存在',
            'name.required' => '请输入姓名',
            //'password.required' => '请输密码',
            'role.required'=>'请选择角色'
        ];
    }
}
