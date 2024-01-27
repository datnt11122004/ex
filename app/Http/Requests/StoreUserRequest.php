<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|string|email|unique:users|max:191',
            'fullname' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
            'phone' => 'unique:users'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn phải nhập đúng định dạng email. Ví dụ: abc@gmail.com',
            'email.max' => 'Độ dài email không quá 191 ký tự',
            'email.string' => 'Email phải là chuỗi',
            'password.required' => 'Bạn chưa nhập vào mật khẩu',
            'fullname.required' => 'Bạn chưa nhập tên người dùng',
            'user_catelogue_id.required' => 'Bạn phải chọn vai trò cho người dùng',
            'user_catelogue_id.gt:0' => 'Chưa chọn vai trò của người dùng',
            'email.unique' => 'Email đã được tồn tại ',
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự',
            're_password.same' => 'Mật khẩu xác thực phải giống mật khẩu vừa nhập',
            're_password.required' => 'Vui lòng nhập lại mật khẩu',
            'phone.unique' => 'Số điện thoại đã được tồn tại'
        ];
    }

}
