<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email'=>['required', Rule::unique('users')->ignore($this->user),'string','email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

        public function messages()
    {
        return [
            'name.required' => 'Nama User tidak boleh kosong',
            'name.string' => 'Nama User tidak boleh simbol',
            'name.max' => 'Nama User lebihi batas maximum',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Nama email sudah ada dalam database',
            'email.string' => 'Email tidak boleh simbol',
            'email.email' => 'Harus format email',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'password tidah sama',
        ];
    }
}
