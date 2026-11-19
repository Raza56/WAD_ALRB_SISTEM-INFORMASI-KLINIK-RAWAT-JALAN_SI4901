<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Poliklinik - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container my-5">
        <h2>DATA RUANGAN POLIKLINIK</h2>
        <table class="table table-bordered my-3">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Ruangan</th>
                    <th>Jenis Poli</th>
                    <th>Lokasi Gedung</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ruangan as $r)
                <tr>
                    <td>{{ $r->Nomor }}</td>
                    <td>{{ $r->Nama_Ruangan }}</td>
                    <td>{{ $r->Jenis_Poli }}</td>
                    <td>{{ $r->Lokasi_Gedung }}</td>
                    <td>
                        <a href="{{ url('/edit-ruangan/' . $r->Nomor) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/hapus-ruangan/' . $r->Nomor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data ruangan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h2 class="mt-5">DATA ALAT MEDIS POLIKLINIK</h2>
        <table class="table table-bordered my-3">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alat_medis as $a)
                <tr>
                    <td>{{ $a->nomor }}</td>
                    <td>{{ $a->nama_alat }}</td>
                    <td>{{ $a->jumlah }}</td>
                    <td>{{ $a->kondisi }}</td>
                    <td>
                        <a href="{{ url('/edit-alat/' . $a->nomor) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/hapus-alat/' . $a->nomor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data alat medis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>