<?php
namespace App\Http\Controllers;

class HomeController extends Controller{

    function showBeranda(){
        return view('beranda');
    }
    function showProduk(){
        return view('produk');
    }
    function showKategori(){
        return view('kategori');
    }
    function showPromo(){
        return view('promo');
    }
    function showKonsultasi(){
        return view('konsultasi');
    }

    //manggil item contoh localhost:8000/item/dubai
    function item($produk, $hargaMAx = 1000000, $hargaMin = 10000){
        if($produk == 'dubai'){
            return view('web.item1');
        }elseif($produk == 'mysas'){
            return view('web.item2');
        }
        echo "<br>";
        echo "Harga Max adalah $hargaMax <br>";
        echo "Harga Min adalah $hargaMin <br>";
        
    }
}