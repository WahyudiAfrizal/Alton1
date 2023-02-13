<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kategori()
    {
        $kategori = Kategori::where('user_id', Auth::user()->id)->get();
        return view('kategori', ['kategori' => $kategori]);
    }
    
    public function show(Request $request)
    {
        //paginate = memberi batasan input ke tiap2 user 
        //code ini digunakan untuk pencarian
        //LIKE berfungsi sesuai apa yang diinputkan
        $cari=$request->cari;
        $kategori = Kategori::where('kategori','LIKE','%'.$cari.'%')
                            ->where('user_id', Auth::user()->id)
                            ->paginate();
        return view('layouts.show', ['kategori' => $kategori]);
    }

    public function kategori_tambah()
    {
        return view('kategori_tambah'); 
    }

    public function kategori_aksi(Request $data)
    {   
        // required = harus diisi | unique = tidak boleh sama
        // validate = penentuan
        $data->validate([
            'kategori' => 'required|unique:kategori,kategori',
            'harga'=> 'required|integer'
        ]); 

        $kategori = $data->kategori;
        $addharga = $data->harga;
        Kategori::insert([
            'kategori' => $kategori,
            'harga' => $addharga,
            'user_id' => auth()->id()
        ]);

        //redirect = dialihkan
        return redirect('home')->with("sukses", "berhasil ditambah");
    }

    public function kategori_edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori_edit', [
            'kategori' => $kategori,
            'harga' => $kategori
        ]);
    }

    public function kategori_update($id, Request $data)
    {
        // form validasi
        $data->validate([
            'kategori' => 'required|unique:kategori,kategori,'.$id,
            'harga'=> 'required|integer'
    ]);
        $nama_kategori = $data->kategori;
        $nama_harga = $data->harga;
        // update kategori
        $kategori = Kategori::find($id);
        $kategori->kategori = $nama_kategori;
        $kategori->harga = $nama_harga;
        $kategori->save();
        // alihkan halaman ke halaman kategori
        return redirect('home')->with("sukses", "berhasil diubah");
    }

    public function kategori_hapus($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('home')->with("sukses", "berhasil dihapus");
        
    }

}
