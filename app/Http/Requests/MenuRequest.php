<?php

namespace App\Http\Requests;


class MenuRequest extends Request
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
            'name'=>'required',
            'url'=>'required',
            'slug'=>'required',
            'parent_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'请输入菜单名称',
            'url.required' => '请输入菜单链接',
            'slug.required' => '请输入权限名称',
            'parent_id.required'=>'请选择上级菜单'
        ];
    }
}
