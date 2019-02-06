<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaReq extends FormRequest
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
            //
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email',
            'user_name' => 'required',
            'user_password' => 'required'
        ];
    }


    public function messages(){
        return[
            'required' => ':attribute wajib diisi!!',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus diisi angka yang benar',
            'email' => ':attribute Tidak tepat!'
        ];
    }
}
