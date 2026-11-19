<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Poliklinik</title>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>
<body>

    <h1>Data Ruang Poliklinik</h1>

    @if(session('pesan'))
        <p class="success">{{ session('pesan') }}</p>
    @endif

    <h2>{{ isset($ruangan_edit) && $ruangan_edit ? "Edit Ruangan" : "Tambah Ruangan" }}</h2>

    <form action="{{ isset($ruangan_edit) && $ruangan_edit ? url('/poliklinik/update/'.$ruangan_edit['id']) : url('/poliklinik/store') }}" method="POST">

        @csrf

        @if(isset($ruangan_edit) && $ruangan_edit)
            @method('PUT')
        @endif

        <label>Nama Poli</label>
        <select name="nama_poli" required>
            <option value="">-- Pilih --</option>

            <option value="Poli Umum"
                {{ (isset($ruangan_edit) && $ruangan_edit && $ruangan_edit['nama_poli'] == 'Poli Umum') ? 'selected' : '' }}>
                Poli Umum
            </option>

            <option value="Poli Gigi"
                {{ (isset($ruangan_edit) && $ruangan_edit && $ruangan_edit['nama_poli'] == 'Poli Gigi') ? 'selected' : '' }}>
                Poli Gigi
            </option>
        </select>

        <label>Lokasi Gedung</label>
        <input type="text"
               name="lokasi_gedung"
               placeholder="Contoh: Gedung A"
               value="{{ $ruangan_edit['lokasi_gedung'] ?? '' }}"
               required>

        <label>Nomor Ruangan</label>
        <input type="text"
               name="nomor_ruangan"
               placeholder="Contoh: A-101"
               value="{{ $ruangan_edit['nomor_ruangan'] ?? '' }}"
               required>

        <label>Inventaris Alat Medis</label>
        <textarea name="inventaris"
                  placeholder="Contoh: Stetoskop, Tensimeter">{{ $ruangan_edit['inventaris'] ?? '' }}</textarea>

        <button type="submit">
            {{ isset($ruangan_edit) && $ruangan_edit ? "Simpan Perubahan" : "Simpan Data" }}
        </button>

        @if(isset($ruangan_edit) && $ruangan_edit)
            <a href="{{ url('/poliklinik') }}">Batal Edit</a>
        @endif

    </form>

    <h2>Daftar Ruang Poliklinik</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Lokasi Gedung</th>
                <th>Nomor Ruangan</th>
                <th>Inventaris Alat Medis</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @if(count($data_ruangan) > 0)

                @foreach($data_ruangan as $index => $ruangan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ruangan['nama_poli'] }}</td>
                        <td>{{ $ruangan['lokasi_gedung'] }}</td>
                        <td>{{ $ruangan['nomor_ruangan'] }}</td>
                        <td>{{ $ruangan['inventaris'] ?? '' }}</td>

                        <td>
                            <a class="edit"
                               href="{{ url('/poliklinik/edit/'.$ruangan['id']) }}">
                                Edit
                            </a>

                            <form action="{{ url('/poliklinik/delete/'.$ruangan['id']) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?');">

                                @csrf
                                @method('DELETE')

                                <button class="hapus" type="submit">
                                    Hapus
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach

            @else
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Belum ada data ruangan.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

</body>
</html>