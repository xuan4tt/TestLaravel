<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validate_AuthRegistration extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required',
            'password_confirmation' => 'required | same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng điền đúng định dạng email',
            'password.required' => 'Vui lòng điền mật khẩu',
            'password_confirmation.required' => ' Vui lòng điền nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu nhập lại chưa trùng khớp'
        ];
    }
}
