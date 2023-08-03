<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DebiturRequest extends FormRequest
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
            'cabang_id' => 'required|not_in:0',
            'accountOfficer_id' => 'required|not_in:0',
            'perusahaan_id' => 'required|not_in:0',
            'name' => 'required',
            'tglPengajuan' => 'required',
            'noDebitur' => 'required',
            'noKtp' => ['required', Rule::unique('debiturs')->ignore($this->debitur)],
            'alamat' => 'required',
            'tlp' => 'required',
            'plafond' => 'required',
            'jwk' => 'required',
            'ibuKandung' => 'required',
            'tmptLahir' => 'required',
            'tglLahir' => 'required',
            'pendidikan' => 'required|not_in:0',
            'statusKawin' => 'required|not_in:0',
            'domisili' => 'required',
            'stsTinggal' => 'required|not_in:0',
            'jenisPekerjaan' => 'required|not_in:0',
            'lamaBekerja' => 'required',
            'gaji' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cabang_id' => 'Cabang tidak boleh kosong',
            'accountOfficer_id' => 'AO tidak boleh kosng',
            'perusahaan_id' => 'Nama perusahaan tidak boleh kosong',
            'name.required' => 'Nama debitur tidak boleh kosong',
            'tglPengajuan.required' => 'Tanggal Pegajuan tidak boleh kosong',
            'noDebitur.required' => 'No Debitur tidak boleh kosong',
            'noKtp.required' => 'No KTP tidak boleh kosong',
            'noKtp.unique' => 'No KTP sudah terdaftar',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'tlp.required' => 'Telepon tidak boleh kosong',
            'plafond.required' => 'Plafond tidak boleh kosong',
            'jwk.required' => 'Jangka Waktu tidak boleh kosong',
            'ibuKandung.required' => 'Ibu kandung tidak boleh kosong',
            'tmptLahir.required' => 'Tempat lahir tidak boleh kosong',
            'tglLahir.required' => 'Tanggal lahir tidak boleh kosong',
            'pendidikan' => 'Pendidikan tidak boleh kosong',
            'statusKawin' => 'Status kawin tidak boleh kosong',
            'domisili.required' => 'Domisili tidak boleh kosong',
            'stsTinggal' => 'Status Tempat tinggal tidak boleh kosong',
            'jenisPekerjaan' => 'jenis Pekerjaan tidak boleh kosong',
            'lamaBekerja.required' => 'Lama bekerja tidak boleh kosong',
            'gaji.required' => 'Gaji tidak boleh kosong',
        ];
    }
}
