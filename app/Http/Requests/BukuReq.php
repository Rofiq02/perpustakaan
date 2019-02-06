<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuReq extends FormRequest
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
            'judul' => 'required|min:3|max:15',
            'tempat_terbit' => 'required',
            'tahun_terbit' => 'required',
            'halaman' => 'required',
            'edisi' => 'required',
        ];
    }


    public function messages(){
        return[
            'required' => ':attribute kepanjangan GOBLOKKK!!',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute kepanjangan GOBLOKKK!! maksimal :max karakter'
        ];
    }
}
