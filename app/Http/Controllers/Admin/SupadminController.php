<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk autentikasi
use Illuminate\Http\Request;

class SupadminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
        }
 
        $users = User::all();
        $title = 'Daftar user';
        return view('admin.page.supadmin.index', ['users' => $users, 'title' => $title]);
    }

    public function create()
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
        }

        $title = "Add New User";
        return view('admin.page.supadmin.add_edit_supadmin', compact('title'));
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
        }

        $usern = User::findOrFail($id);
        $title = 'Edit user';
        return view('admin.page.supadmin.add_edit_supadmin', ['usern' => $usern, 'title' => $title]);
    } 

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:8|max:1000',
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = 'admin';

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'USER berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:500',
        ]);

        $usern = User::findOrFail($id);
        $usern->name = $request->name;
        $usern->email = $request->email;

        if ($request->filled('password')) {
            $usern->password = bcrypt($request->password);
        }

        $usern->save();

        Session::flash('success', 'User updated successfully');
        return redirect()->route('users.index');
    }

    public function destroy(Request $request)
    {
        if (Auth::user()->role !== 'super admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
        }

        $usern = User::findOrFail($request->id);
        $usern->delete();

        return redirect()->route('users.index')->with('success', 'USER berhasil dihapus.');
    }
}
