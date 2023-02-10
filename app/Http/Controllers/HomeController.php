<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('kategori', ['kategori' => $kategori]);
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
        // dd($data->all());
        $kategori = $data->kategori;
        $addharga = $data->harga;
        Kategori::insert([
            'kategori' => $kategori,
            'harga' => $addharga
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
