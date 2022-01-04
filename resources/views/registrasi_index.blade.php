@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <h3>Data Registrasi Mahasiswa Baru</h3>
                        <table class="table table-dark table-bordered">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($registrasi as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->mahasiswa->nama }}</td>
                                    <td>{{ $a->mahasiswa->asal_sekolah }}</td>
                                    <td>{{ $a->jurusan->nama }}</td>
                                    <td>{{ $a->status }}</td>
                                    <td>
                                        <a href="{{ url('admin/registrasi/syarat/'.$a->id) }}" class="btn btn-danger btn-sm">Lihat Syarat</a>
                                        <a href="{{ url('admin/registrasi/hapus/'.$a->id) }}" class="btn btn-warning btn-sm" onclick="return confirm
('Apakah Data Ingin Dihapus?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection