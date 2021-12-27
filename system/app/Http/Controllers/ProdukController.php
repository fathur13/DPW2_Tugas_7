<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Faker;

class ProdukController extends Controller {
    function index(){
        $user = request()->user();
        $data['list_produk'] = $user->produk;
        return view('produk.index', $data );
    }
    function create(){
        return view('produk.create');
    }
    function store(){
        $produk = new Produk; 
        $produk->id_user = request()->user()->id;
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->stok = request('stok');
        $produk->deskripsi = request('deskripsi');
        $produk->save();
        
        return redirect('admin/produk')->with('success', 'Yey Berhasil');
    }
    function show(Produk $produk){
        $data['produk'] = $produk;
        return view('produk.show', $data);
    }
    function edit(Produk $produk){
        $data['produk'] = $produk;
        return view('produk.edit', $data);
    }
    function update(Produk $produk){
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->stok = request('stok');
        $produk->deskripsi = request('deskripsi');
        $produk->save();
        
        return redirect('admin/produk')->with('success', 'Rubah Terus Awkakwak');
    }
    function destroy(Produk $produk){
        $produk->delete();

        return redirect('admin/produk')->with('danger', 'Hilang Sudah');
    }

    function filter(){
        $nama = request('nama');
        $stok = explode(",", request('stok'));
        $data['harga_min'] = $harga_min = request('harga_min');
        $data['harga_max'] = $harga_max = request('harga_max');

        
        //cara memfilter melalui nama
        //$data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
        //cara mefilter lebih dari 1 nama
        //$data['list_produk'] = Produk::whereIn('stok',$stok)->get();
        //cara memfilter harga terendah dan tertinggi 
        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
        //untuk menghilangkan data lebih dari 1
        //$data['list_produk'] = Produk::whereNotIn('stok',$stok)->get();
        //untung neghilangkan item 
        //data['list_produk'] = Produk::where('stok','<>', $nama)->get();
        //untuk menghilangkan harga yang tidak mau di cari
        //$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
        //untuk menampilkan data yang null
        //$data['list_produk'] = Produk::whereNull('stok')->get();
        //untuk menampilkan data yang not null
        //$data['list_produk'] = Produk::whereNotNull('stok')->get();
        //untuk menampilkan produk yang dibuat sesuai tanggal yang ditentukan
        //$data['list_produk'] = Produk::whereDate('created_at', '2021-11--09')->get();
        //untuk menampilkan data yang sesuai tahunnya
        //$data['list_produk'] = Produk::whereYear('created_at', '2021')->get();
        //untuk menampilkan dat sesuai bulan 
        //$data['list_produk'] = Produk::whereMouth('created_at', '11')->whereYear('created_at', '2021')->get();
        //untuk menampilkan dat sesuai jam 
        //$data['list_produk'] = Produk::whereTime('created_at', '14:02:00')->get();
        //gabungan 
        $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotNull('stok', [2])->get();

        $data['nama'] = $nama; 
        $data['stok'] = request('stok'); 
        return view('produk.index', $data);
        
    }
}