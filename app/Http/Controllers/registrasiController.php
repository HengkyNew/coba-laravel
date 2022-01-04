<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index(request $request)
    {
        $data['registrasi'] = \App\registrasi::latest()->paginate(20);
        return view ('registrasi_index',$data);
    }
    public function hapus($id)
    {
        $registrasi = \App\registrasi::findOrFail($id);
        if($registrasi->status == 'Baru')
        {
            \DB::beginTransaction();
            $mahasiswa = \App\mahasiswa::findOrFail($registrasi->mahasiswa_id);
            $files = $registrasi->syarat()->pluck('file')->toArray();
            $registrasi->delete();
            $registrasi->syarat()->delete();
            $mahasiswa->delete();
            \Storage::delete($files);
            \DB::commit();
            return back()->with('pesan','Data Berhasil Dihapus');
        }
        else
        {
            return back()->with('pesan','Data yang bisa dihapus hanya berstatus BARU');
        }
    }
    public function syarat($id)
    {
        $registrasi = \App\registrasi::findOrFail($id);
        return view ('syarat_index',compact('registrasi'));
    }
    public function SyaratForm($id)
    {
        $data['syarat'] = \App\registrasiSyarat::findOrFail($id);
        $data['action'] = 'RegistrasiController@syaratSimpan';
        $data['method'] = 'post';
        return view ('syarat_form',$data);
    }
    public function SyaratSimpan(request $request)
    {
        $syarat = \App\registrasiSyarat::findOrFail($request->syarat_id);
        $syarat->keterangan = strip_tags($request->keterangan);
        $syarat->status = $request->status;
        $syarat->save();
        return back()->with('pesan','data sudah terUpdate');
    }
    
}
