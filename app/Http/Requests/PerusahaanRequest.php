<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerusahaanRequest extends FormRequest
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
        'mitraPekerja'=>'required',
        'kopkar'=>'required',
        'noPks'=>'required',
        'tglPks'=>'required',
        'lamaPks'=>'required',
        'namaPerusahaan'=>'required',
        'metodeAngsuran'=>'required',
        'namaPic'=>'required',
        'jabatanPic'=>'required',
        'contactPic'=>'required',
        'cabang_id'=>'required',
        ];
    }

        public function messages()
    {
        return [
            'mitraPekerja.required' => 'Mitra Kerja tidak boleh kosong',
            'kopkar.required' => 'Kopkar tidak boleh kosong',
            'noPks.required' => 'Nomor PKS tidak boleh kosong',
            'tglPks.required' => 'Tanggal PKS tidak boleh kosong',
            'lamaPks.required' => 'Lama Perjanjian tidak boleh kosong',
            'namaPerusahaan.required' => 'Nama Perusahaan tidak boleh kosong',
            'metodeAngsuran.required' => 'Metode angsuran tidak boleh kosong',
            'namaPic.required' => 'Nama PIC tidak boleh kosong',
            'jabatanPic.required' => 'Jabatan PIC tidak boleh kosong',
            'contactPic.required' => 'Contact PIC tidak boleh kosong',
            'cabang_id.required' => 'Cabang PIC tidak boleh kosong',
        ];
    }
}
