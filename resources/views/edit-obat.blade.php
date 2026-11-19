<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat - Katalog Farmasi</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <aside>
        <h2>Katalog Farmasi</h2>
        <a href="/data-obat">Data Obat</a>
        <a href="/kategori-obat">Kategori Obat</a>
    </aside>

    <main>
        <h1>Edit Obat</h1>
        <p>Ubah data obat pada katalog farmasi klinik</p>

        <section>
            <h2>Form Edit Obat</h2>
            <form action="/update-obat/{{ $obat->id }}" method="POST">
                @csrf

                <label>Kode Obat</label>
                <input type="text" name="kode_obat" value="{{ $obat->kode_obat }}" required>

                <label>Nama Obat</label>
                <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}" required>

                <label>Kategori Obat</label>
                <input type="text" name="kategori" value="{{ $obat->kategori }}" required>

                <label>Sediaan</label>
                <select name="sediaan">
                    <option value="Tablet" {{ $obat->sediaan == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Sirup" {{ $obat->sediaan == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                </select>

                <label>Pabrikan</label>
                <input type="text" name="pabrikan" value="{{ $obat->pabrikan }}" required>

                <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                    <button type="submit">Update Obat</button>
                    <a href="/data-obat" style="background-color: #6c757d; color: white; text-decoration: none; padding: 10px 18px; border-radius: 5px; display: inline-block;">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>