@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Pendaftar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendaftars.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIK:</label>
            <input type="text" name="nik" class="form-control" value="{{ old('nik', $pendaftar->nik) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama (Huruf Kapital):</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $pendaftar->nama) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin:</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-check-input" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}> Perempuan
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Agama:</label>
            <select name="agama" class="form-select">
                @php
                    $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
                @endphp
                <option value="">Pilih Agama</option>
                @foreach ($agamaList as $agama)
                    <option value="{{ $agama }}" {{ old('agama', $pendaftar->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $pendaftar->alamat) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hobi:</label><br>
            @php
                $hobiArray = explode(', ', $pendaftar->hobi ?? '');
                $hobiList = ['Membaca', 'Menulis', 'Olahraga', 'Musik'];
            @endphp
            @foreach ($hobiList as $hobi)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobi[]" value="{{ $hobi }}" class="form-check-input" {{ in_array($hobi, $hobiArray) ? 'checked' : '' }}> {{ $hobi }}
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Foto:</label>
            <input type="file" name="foto" class="form-control">
            @if ($pendaftar->foto)
                <img src="{{ asset('storage/'.$pendaftar->foto) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
