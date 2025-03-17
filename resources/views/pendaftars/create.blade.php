@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Form Pendaftaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pendaftars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIK:</label>
            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama (Huruf Kapital):</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin:</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-check-input"> Laki-laki
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input"> Perempuan
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Agama:</label>
            <select name="agama" class="form-select">
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hobi:</label><br>
            @foreach (['Membaca', 'Menulis', 'Olahraga', 'Musik'] as $hobi)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="hobi[]" value="{{ $hobi }}" class="form-check-input"> {{ $hobi }}
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Foto:</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
