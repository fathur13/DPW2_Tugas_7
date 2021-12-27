<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ClienController extends Controller {
    function index(){
        $data['list_produk'] = Produk::all();
        return view('web.template.base', $data );

    }
}