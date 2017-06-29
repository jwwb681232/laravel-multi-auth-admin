<?php

namespace App\Http\Requests;


class RoleRequest extends Request
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
            'display_name'=>'required',
            'name'=>'required',
            'description'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'display_name.required'=>'请输入角色名称(中文)',
            'name.required' => '请输入请输入角色名称',
            'description.required' => '请输入角色描述'
        ];
    }
}
