<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return "Nama : M. Shiva Matahari Yusda, NIM : 1941720005";
    }

    public function articles($id) {
        return "Ini adalah halaman artikel dengan ID " .$id;
    }
       
}
