<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function formDaftar()
    {
        $data['objek'] = new \App\Mahasiswa();
        $data['action'] = 'MahasiswaController@simpanDaftar';
        $data['method'] = 'post';
        return view('daftar_form',$data);
    }
    public function simpanDaftar(Request $request)
    {
        $request->validate([
            'nama' =>'required',
            'jenis_kelamin' =>'required',
            'tanggal_lahir' =>'required',
            'email' =>'required|email|unique:mahasiswas,email',
            'password' =>'required',
            'asal_sekolah' =>'required',
            'foto' =>'required|mimes:png,jpg,jpeg,gif,bmp',
            'jurusan_id' =>'required'
            ]);
            $path = $request->file('foto')->store('foto-mahasiswa');
            $mahasiswa = new \App\Mahasiswa();
            $mahasiswa->nama = $request->nama;
            $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
            $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $mahasiswa->email = $request->email;
            $mahasiswa->password = bcrypt($request->password);
            $mahasiswa->asal_sekolah = $request->asal_sekolah;
            $mahasiswa->foto = $path;
            $mahasiswa->save();
            $registrasi = new \App\Registrasi();
            $registrasi->user_id = 0;
            $registrasi->mahasiswa_id = $mahasiswa->id;
            $registrasi->jurusan_id = $request->jurusan_id;
            $registrasi->status = 'Baru';
            $registrasi->save();
            \Auth::guard('mahasiswa')->login($mahasiswa);
            return redirect('mahasiswa/beranda');
    }
    public function beranda()
    {
        if (\Auth::guard('mahasiswa')->check()) {
            echo "sudah login : ".\Auth::guard('mahasiswa')->user()->nama;
        } else {
                echo "Belum Login";
                }
    }
    public function formLogin()
    {
        if (\Auth::guard('mahasiswa')->check()) {
            return redirect('mahasiswa/beranda');
        }
        $data['objek'] = new \App\Mahasiswa();
        $data['action'] = 'MahasiswaController@prosesLogin';
        $data['method'] = 'post';
        return view ('login_form',$data);
    }
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:25'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (\Auth::guard('mahasiswa')->attempt($credentials)) {
            return redirect('mahasiswa/beranda');
        } else {
            return back()->with('pesan','Login gagal');
        }
    }
    public function logout()
    {
        \Auth::guard('mahasiswa')->logout();
        return redirect('/');
    }

}
