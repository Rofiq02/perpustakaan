<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenerbitReq extends FormRequest
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
            'nama_penerbit' => 'required|min:4|max:20',
        ];
    }


    public function messages(){
        return[
            'required' => ':attribute wajib diisi!!',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];
    }
}
