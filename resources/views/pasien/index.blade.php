<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Data Pasien') }}
        </h2>
    </x-slot>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="py-12">
        <div class="container" style="max-width: 1000px; margin: 0 auto;">
            
            <div class="page-header">
                <div>
                    <h1>Data Pasien</h1>
                    <p>Kelola data rekam medis pasien</p>
                </div>
                <a href="{{ route('pasien.index') }}#form-pasien" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Pasien</a>
            </div>

            @if(session('sukses'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i> {!! session('sukses') !!}
                </div>
            @endif

            <div class="card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No. RM</th>
                                <th>Nama Pasien</th>
                                <th>Domisili</th>
                                <th>Kontak Darurat</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasiens as $pasien)
                                <tr>
                                    <td><span class="badge-rm">{{ $pasien->no_rm }}</span></td>
                                    <td class="fw-bold text-dark">
                                        <div class="pasien-info">
                                            <div class="avatar"><i class="fa-solid fa-user"></i></div>
                                            {{ $pasien->nama }}
                                        </div>
                                    </td>
                                    <td><i class="fa-solid fa-location-dot text-muted"></i> {{ $pasien->domisili }}</td>
                                    <td><i class="fa-solid fa-phone text-muted"></i> {{ $pasien->kontak }}</td>
                                    <td style="text-align: center; display:flex; justify-content:center; gap:5px;">
                                        <a href="{{ route('pasien.index', ['edit' => $pasien->id_pasien]) }}#form-pasien" class="btn-icon btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{ route('pasien.destroy', $pasien->id_pasien) }}" method="POST" onsubmit="return confirm('Yakin hapus pasien {{ $pasien->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-icon btn-delete" title="Hapus" style="border:none; cursor:pointer;"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan='5' style='text-align:center; padding: 30px; color:#888;'>Belum ada data pasien.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div id="form-pasien" class="modal">
        <div class="modal-box">
            <div class="modal-header">
                <h2>{!! $editData ? "<i class='fa-solid fa-pen-to-square'></i> Edit Data Pasien" : "<i class='fa-solid fa-user-plus'></i> Tambah Pasien Baru" !!}</h2>
                <a href="{{ route('pasien.index') }}" class="close-btn"><i class="fa-solid fa-xmark"></i></a>
            </div>
            
            <div class="modal-body">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pasien" value="{{ $editData ? $editData->id_pasien : '' }}">

                    <div class="form-group">
                        <label>No. Rekam Medis</label>
                        <input type="text" name="no_rm" value="{{ $editData ? $editData->no_rm : '' }}" placeholder="Cth: RM-001" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama" value="{{ $editData ? $editData->nama : '' }}" placeholder="Nama lengkap pasien" required>
                    </div>

                    <div class="form-group">
                        <label>Domisili</label>
                        <input type="text" name="domisili" value="{{ $editData ? $editData->domisili : '' }}" placeholder="Kota / Alamat" required>
                    </div>

                    <div class="form-group">
                        <label>Kontak Darurat</label>
                        <input type="text" name="kontak" value="{{ $editData ? $editData->kontak : '' }}" placeholder="Nomor Telepon/HP" required>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>