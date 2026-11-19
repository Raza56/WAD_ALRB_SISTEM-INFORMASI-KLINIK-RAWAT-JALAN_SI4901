<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Katalog Farmasi</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <aside>
        <h2>Katalog Farmasi</h2>
        <a href="/data-obat">Data Obat</a>
        <a href="/kategori-obat">Kategori Obat</a>
    </aside>

    <main>
        <h1>Edit Kategori</h1>
        <p>Ubah data kategori obat pada katalog farmasi klinik</p>

        <section>
            <h2>Form Edit Kategori</h2>
            <form action="/update-kategori/{{ $kategori->id }}" method="POST">
                @csrf

                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>

                <label>Keterangan</label>
                <input type="text" name="keterangan" value="{{ $kategori->keterangan }}" required>

                <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                    <button type="submit">Update Kategori</button>
                    <a href="/kategori-obat" style="background-color: #6c757d; color: white; text-decoration: none; padding: 10px 18px; border-radius: 5px; display: inline-block;">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>