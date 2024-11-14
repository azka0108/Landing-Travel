<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteTitle" aria-hidden="true">
    {{-- Membuat modal Bootstrap dengan ID 'modalDelete' yang tersembunyi secara default --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{-- Membuat dialog modal yang terpusat --}}
        <div class="modal-content">
            {{-- Menyusun konten modal --}}
            <form action="{{ route('users.delete') }}" method="post">
                {{-- Menggunakan route 'user.delete' dengan metode POST --}}
                @csrf
                {{-- Menambahkan token CSRF untuk keamanan form --}}
                <input type="hidden" name="id" id="delete_id">
                {{-- Input tersembunyi untuk menyimpan ID user yang akan dihapus --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteTitle">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                        <h4 class="mt-3">Hapus User?</h4>
                        <p>User akan dihapus secara permanen dan tidak dapat dikembalikan.</p>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
