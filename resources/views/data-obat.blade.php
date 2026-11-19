<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat - Katalog Farmasi</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <aside>
        <h2>Katalog Farmasi</h2>
        <a href="/data-obat">Data Obat</a>
        <a href="/kategori-obat">Kategori Obat</a>
    </aside>

    <main>
        <h1>Data Obat</h1>
        <p>Data obat pada katalog farmasi klinik</p>

        <section>
            <h2>Daftar Obat</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Sediaan</th>
                        <th>Pabrikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($data as $d){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($d->kode_obat); ?></td>
                        <td><?php echo htmlspecialchars($d->nama_obat); ?></td>
                        <td><?php echo htmlspecialchars($d->kategori); ?></td>
                        <td><?php echo htmlspecialchars($d->sediaan); ?></td>
                        <td><?php echo htmlspecialchars($d->pabrikan); ?></td>
                        <td>
                            <a href="/edit-obat/{{ $d->id }}" class="btn-edit">Edit</a>
                            <a href="/hapus-obat/{{ $d->id }}" class="btn-hapus" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Tambah Obat</h2>
            <form action="/tambah-obat" method="POST">
                @csrf
                
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" placeholder="Contoh: OB004" required>

                <label>Nama Obat</label>
                <input type="text" name="nama_obat" placeholder="Masukkan nama obat" required>

                <label>Kategori Obat</label>
                <input type="text" name="kategori" placeholder="Masukkan kategori obat" required>

                <label>Sediaan</label>
                <select name="sediaan">
                    <option value="Tablet">Tablet</option>
                    <option value="Sirup">Sirup</option>
                </select>

                <label>Pabrikan</label>
                <input type="text" name="pabrikan" placeholder="Masukkan nama pabrikan" required>

                <button type="submit">Simpan Obat</button>
            </form>
        </section>
    </main>
</body>
</html>