<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bisnis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; // Mengimpor facade File untuk operasi file seperti menghapus file
use Illuminate\Support\Facades\Session; // Mengimpor facade Session untuk mengelola session data
use Illuminate\Http\Request;


class BisnisController extends Controller
{
    /**
     * Menampilkan daftar semua layanan bisnis.
     */
    public function index(){
        $business = bisnis::all(); // Mengambil semua data artikel
        $title = 'DAFTAR LAYANAN ANDA'; // Menetapkan judul halaman
        return view('admin.page.business.index', ['business' => $business, 'title' => $title]);
    }

    public function create()
    {
        $title = "Add New User"; // Menetapkan judul halaman sebagai "Add New User"
        return view('admin.page.business.add_edit_bisnis', compact('title')); // Mengembalikan view 'admin.add_edit_user' dengan variabel 'title'
    }
    /**
     * Menampilkan form edit layanan bisnis.
     */
    public function edit($id) {
        // Mencari layanan bisnis berdasarkan ID
        $business = bisnis::findOrFail($id);
        $title = 'EDIT LAYANAN ANDA'; // Menetapkan judul halaman edit
        // Mengembalikan view edit dengan data layanan bisnis dan title
        return view('admin.page.business.add_edit_bisnis', ['bisnis' => $business, 'title' => $title]);
    }

    /**
     * Menyimpan layanan bisnis baru.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $filePath = public_path('uploads'); // Menetapkan path untuk menyimpan file foto di direktori 'public/uploads'
            $file = $request->file('foto'); // Mengambil file foto yang diupload
            $file_name = time() . $file->getClientOriginalName(); // Menamai file foto dengan timestamp agar unik
            $file->move($filePath, $file_name); // Memindahkan file foto ke direktori 'uploads'
        }
        $validatedData['foto'] = $file_name;

        // Membuat layanan bisnis baru
        bisnis::create($validatedData);

        return redirect()->route('bisnis.index')->with('success', 'Layanan Bisnis berhasil ditambahkan.');
    }

    /**
     * Memperbarui layanan bisnis yang ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mencari data layanan bisnis berdasarkan ID
        $bisnis = bisnis::findOrFail($id);
        $bisnis->nama = $request->nama; // Mengisi atribut 'name' dengan data dari form
        $bisnis->content= $request->content; // Mengisi atribut 'email' dengan data dari form

        // Cek apakah ada file foto yang diupload
        if ($request->hasfile('foto')) {
            $filePath = public_path('uploads'); // Menetapkan path untuk menyimpan file foto di direktori 'public/uploads'
            $file = $request->file('foto'); // Mengambil file foto yang diupload
            $file_name = time() . $file->getClientOriginalName(); // Menamai file foto dengan timestamp agar unik
            $file->move($filePath, $file_name); // Memindahkan file foto ke direktori 'uploads'

            // Menghapus foto lama jika ada
            if (!is_null($bisnis->foto)) { // Cek apakah pengguna memiliki foto lama
                $oldImage = public_path('uploads/' . $bisnis->foto); // Menetapkan path foto lama
                if (File::exists($oldImage)) { // Cek apakah file foto lama ada di direktori
                     unlink($oldImage); // Menghapus file foto lama
                }
            }
            $bisnis->foto = $file_name; // Menyimpan nama file foto baru ke atribut 'photo' di database
        }

        $result = $bisnis->save(); // Menyimpan perubahan data pengguna ke database
        Session::flash('success', 'User updated successfully'); // Menyimpan pesan sukses ke session untuk ditampilkan setelah redirect
        return redirect()->route('bisnis.index'); // Mengarahkan kembali ke route 'user.index' (halaman daftar pengguna)
    }

    /**
     * Menghapus layanan bisnis.
     */
    public function destroy(Request $request)
    {
        $bisnis = bisnis::findOrFail($request->id);
        // Hapus foto jika ada
        if ($bisnis->foto) {
            Storage::disk('public')->delete($bisnis->foto);
        }
        $bisnis->delete();

        return redirect()->route('bisnis.index')->with('success', 'layanan bisnis berhasil dihapus.');
    }
}
