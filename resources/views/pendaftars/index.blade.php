@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aplikasi Pendaftaran</h1>
    <h3>Daftar Pendaftar</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pendaftars.create') }}" class="btn btn-primary mb-3">Tambah Pendaftar</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Hobi</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $pendaftar)
                <tr>
                    <td>{{ $pendaftar->nik }}</td>
                    <td>{{ $pendaftar->nama }}</td>
                    <td>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $pendaftar->jenis_kelamin }}</td>
                    <td>{{ $pendaftar->agama }}</td>
                    <td>{{ $pendaftar->alamat }}</td>
                    <td>{{ $pendaftar->hobi }}</td>
                    <td>
                        @if($pendaftar->foto)
                            <img src="{{ asset('storage/' . $pendaftar->foto) }}" alt="foto" width="60">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pendaftars.edit', $pendaftar->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                        <form action="{{ route('pendaftars.destroy', $pendaftar->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                        </form>

                        <a href="{{ route('pendaftars.export', $pendaftar->id) }}" class="btn btn-success btn-sm">Export PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
