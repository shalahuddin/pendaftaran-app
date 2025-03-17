<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pendaftar</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Data Pendaftar</h3>

    <p><strong>NIK:</strong> {{ $pendaftar->nik }}</p>
    <p><strong>Nama:</strong> {{ $pendaftar->nama }}</p>
    <p><strong>Tempat, Tanggal Lahir:</strong> {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin }}</p>
    <p><strong>Agama:</strong> {{ $pendaftar->agama }}</p>
    <p><strong>Alamat:</strong> {{ $pendaftar->alamat }}</p>
    <p><strong>Hobi:</strong> {{ $pendaftar->hobi }}</p>
    <p><strong>Foto:</strong></p>

    @if($pendaftar->foto)
        <img src="{{ public_path('storage/' . $pendaftar->foto) }}" alt="foto" width="150">
    @else
        <p>-</p>
    @endif

</body>
</html>
