
@extends('admin.layout.apv')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="m-0">ARTIKEL FASTPAY</span> 
        <a href="{{ route('artikel.create') }}" class="btn btn-success btn-sm">
            + Tambah
        </a>
    </div>

    @if (session('success')) {{-- Memeriksa apakah ada pesan sukses dalam sesi --}}
<div class="alert alert-success"> {{-- Menampilkan alert sukses jika ada pesan sukses --}}
{{ session('success') }} {{-- Menampilkan pesan sukses --}}
</div>
@endif
@if (session('error')) {{-- Memeriksa apakah ada pesan error dalam sesi --}}
<div class="alert alert-danger"> {{-- Menampilkan alert error jika ada pesan error --}}
{{ session('error') }} {{-- Menampilkan pesan error --}}
</div>
@endif

    <div class="card-body p-4"> <!-- Tambahkan padding pada isi card -->

        <table class="table table-bordered">
            <thead>
                <tr class="text-center"> <!-- Tambahkan kelas text-center untuk memusatkan teks di header -->
                    <th>CONTENT</th>
                    <th>GAMBAR</th>
                    <th>AKSI</th> <!-- Tambahkan kolom Aksi -->
                </tr>
            </thead>
            <tbody>

                @foreach ($artikels as $artikel )
                <tr>

                    <td class="px-3 py-2">{{ $artikel->nama }}</td> <!-- Padding dan text-center untuk kolom Nama -->
                    <td class="px-3 py-2 text-center"><img src="{{ asset('uploads/'.$artikel->foto) }}" alt="" width="100"
                        ></td> <!-- Padding dan text-center untuk kolom Foto -->

                        <td class="text-center" style="width: 100px; white-space: nowrap;">
    <!-- Tombol Edit -->
    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm mx-1">Edit</a>

    <!-- Tombol Hapus -->
    <button class="btn btn-danger btn-sm mx-1" onclick="deleteFunction('{{ $artikel->id }}')">Hapus</button>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.page.artikels.modal_delete') {{-- Menyertakan view modal delete dari resources/views/admin/modal_delete.blade.php --}}
@endsection {{-- Mengakhiri bagian 'main-content' --}}

@push('js') 
<script>
   function deleteFunction(id) { {{-- Fungsi JavaScript untuk mengatur ID pengguna yang akan dihapus dan menampilkan modal --}}
    document.getElementById('delete_id').value = id; {{-- Mengatur nilai input tersembunyi 'delete_id' dengan ID pengguna --}}
    $("#modalDelete").modal('show'); {{-- Menampilkan modal delete menggunakan jQuery --}}
}
</script>
@endpush {{-- Mengakhiri push ke stack 'js' --}}

