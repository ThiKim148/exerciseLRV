<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|string',
            'age'=> 'numeric',
            'date' => 'string',
            'phone' => 'numeric',
            'web' => 'string',
            'address' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Vui long nhap ten dung',
            'age.numeric' => 'Vui long nhap tuoi dung',
            'date.string' => 'Vui long dien lai ngay thang',
            'phone.numeric' => 'Vui long kiem tra lai so dien thoai',
            'web.string' => 'Vui long kiem tra lai ki tu',
            'address.string' => 'Vui long nhap dia chi dung'
        ];
    }
}
