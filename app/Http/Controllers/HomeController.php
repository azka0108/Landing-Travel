<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Review;
use App\Models\Artikel;
use App\Models\Bisnis;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $reviews = Review::all(); // Mengambil semua data review
        $services=Layanan::all();
        $artikels=Artikel::all();
        $business=bisnis::all();
        $title = 'Daftar Review'; // Menetapkan judul halaman
        return view('home',['reviews' => $reviews , 'services'=> $services ,'artikels'=> $artikels , 'business' => $business ,'title' => $title]);
    }
   

}
