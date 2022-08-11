<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KursusController extends Controller
{
    public function data() {
        $data = DB::table('kursus')->get();
        return view('kursus.data', ['data' => $data]);
    }

    public function tambah() {
        return view('kursus.tambah');
    }

    public function ubah($id) {
        $edit = DB::table('kursus')->where('id', $id)->first();
        return view('kursus.edit', ['edit' => $edit]);
    }

    public function tambahProcess(Request $request) {
        $filename = $request->gambar->getClientOriginalName();
        $request->gambar->storeAs('images', $filename, 'public');

        DB::table('kursus')->insert([
            'nama_kursus' => $request->nama_kursus,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'gambar' => $filename,
        ]);

        return redirect()->route('data');
    }

    public function kursus() {
        $data = DB::table('kursus')->get();
        return view('kursus', ['data' => $data]);
    }
}
