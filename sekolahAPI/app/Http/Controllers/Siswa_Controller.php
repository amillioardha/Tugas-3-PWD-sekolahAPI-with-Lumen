<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Validator;

class SiswaController extends Controller
{
    public function crate(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'nis' => 'required|max:10',
        'nama_lengkap' => 'required|string',
        'jenis_kelamin' =>'required|max:1',
        'alamat' => 'required|string',
    ]);

    if ($validation->fails()) {
        $errors = $validation->errors();
        return [
            'status' => 'error',
            'message' => $errors,
            'result' => null
        ];
    }
    $result = \App\Siswa::create($request->all());
    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Data Berhasil ditambahkan',
            'result' => $result
        ];
    }
    else {
        return [
            'status' => 'error',
            'message' => 'Data Gagal ditambahkan',
            'result' => null
        ];
    }
}
}

?>