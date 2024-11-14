<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; // Mengimpor facade File untuk operasi file seperti menghapus file
use Illuminate\Support\Facades\Session; // Mengimpor facade Session untuk mengelola session data


class ReviewController extends Controller
{
    /**
     * Menampilkan daftar semua review.
     */
    public function index(){
        $reviews = Review::all(); // Mengambil semua data review
        $title = 'Daftar Review'; // Menetapkan judul halaman
        return view('admin.page.review.index', ['reviews' => $reviews, 'title' => $title]);
    }

    public function create()
    {
        $title = "Add New User"; // Menetapkan judul halaman sebagai "Add New User"
        return view('admin.page.review.add_edit_user', compact('title')); // Mengembalikan view 'admin.add_edit_user' dengan variabel 'title'
    }
    /**
     * Menampilkan form edit review.
     */
    public function edit($id) {
        // Mencari review berdasarkan ID
        $review = Review::findOrFail($id);
        $title = 'Edit Review'; // Menetapkan judul halaman edit
        // Mengembalikan view edit dengan data review dan title
        return view('admin.page.review.add_edit_user', ['review' => $review, 'title' => $title]);
    }

    /**
     * Menyimpan review baru.
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

        // Membuat review baru
        Review::create($validatedData);

        return redirect()->route('review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    /**
     * Memperbarui review yang ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mencari review berdasarkan ID
        $review = Review::findOrFail($id);
        $review->nama = $request->nama; // Mengisi atribut 'name' dengan data dari form
        $review->content= $request->content; // Mengisi atribut 'email' dengan data dari form

        // Cek apakah ada file foto yang diupload
        if ($request->hasfile('foto')) {
            $filePath = public_path('uploads'); // Menetapkan path untuk menyimpan file foto di direktori 'public/uploads'
            $file = $request->file('foto'); // Mengambil file foto yang diupload
            $file_name = time() . $file->getClientOriginalName(); // Menamai file foto dengan timestamp agar unik
            $file->move($filePath, $file_name); // Memindahkan file foto ke direktori 'uploads'

            // Menghapus foto lama jika ada
            if (!is_null($review->foto)) { // Cek apakah pengguna memiliki foto lama
                $oldImage = public_path('uploads/' . $review->foto); // Menetapkan path foto lama
                if (File::exists($oldImage)) { // Cek apakah file foto lama ada di direktori
                     unlink($oldImage); // Menghapus file foto lama
                }
            }
            $review->foto = $file_name; // Menyimpan nama file foto baru ke atribut 'photo' di database
        }

        $result = $review->save(); // Menyimpan perubahan data pengguna ke database
        Session::flash('success', 'User updated successfully'); // Menyimpan pesan sukses ke session untuk ditampilkan setelah redirect
        return redirect()->route('review.index'); // Mengarahkan kembali ke route 'user.index' (halaman daftar pengguna)
    }

    /**
     * Menghapus review.
     */
    public function destroy(Request $request)
    {
        $review = Review::findOrFail($request->id);
        // Hapus foto jika ada
        if ($review->foto) {
            Storage::disk('public')->delete($review->foto);
        }
        $review->delete();

        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus.');
    }
}
