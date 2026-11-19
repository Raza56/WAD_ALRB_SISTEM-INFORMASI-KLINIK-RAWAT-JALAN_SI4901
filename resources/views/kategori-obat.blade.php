<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Obat - Katalog Farmasi</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <aside>
        <h2>Katalog Farmasi</h2>
        <a href="/data-obat">Data Obat</a>
        <a href="/kategori-obat">Kategori Obat</a>
    </aside>

    <main>
        <h1>Kategori Obat</h1>
        <p>Data kategori obat pada katalog farmasi klinik</p>

        <section>
            <h2>Daftar Kategori Obat</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($kategori as $k)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>{{ $k->keterangan }}</td>
                        <td>
                            <a href="/edit-kategori/{{ $k->id }}" class="btn-edit">Edit</a>
                            <a href="/hapus-kategori/{{ $k->id }}" class="btn-hapus" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section>
            <h2>Tambah Kategori</h2>
            <form action="/tambah-kategori" method="POST">
                @csrf

                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori" required>

                <label>Keterangan</label>
                <input type="text" name="keterangan" placeholder="Masukkan keterangan" required>

                <button type="submit">Simpan</button>
            </form>
        </section>
    </main>
</body>
</html>