<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLI KLINIK - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4 text-center">FORM POLIKLINIK</h2>

        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h4>Tambah Data Ruangan</h4>
                    <form action="{{ url('/simpan-ruangan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Ruangan</label>
                            <input type="number" name="Nomor" class="form-control" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ruangan</label>
                            <input type="text" name="Nama_Ruangan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Jenis Poli</label>
                        <select name="Jenis_Poli" class="form-select" required>
                        <option value="" selected disabled>-- Pilih Jenis Poli --</option>
                        <option value="Poli Umum">Poli Umum</option>
                        <option value="Poli Gigi">Poli Gigi</option>
                        </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Gedung</label>
                            <input type="text" name="Lokasi_Gedung" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Ruangan</button>
                    </form>
                </div>
            </div>

            
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h4>Tambah Data Alat Medis</h4>
                    <form action="{{ url('/simpan-alat') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Alat</label>
                            <input type="number" name="nomor" class="form-control" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Alat Medis</label>
                            <input type="text" name="nama_alat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <input type="text" name="kondisi" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan Alat Medis</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ url('/read') }}" class="btn btn-secondary">Lihat Data</a>
        </div>
    </div>
</body>
</html>