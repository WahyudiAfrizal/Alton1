@extends('layouts.app')
@section('halaman','Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #4bbcf4" >
                    <b>Data Kategori</b>   
                    <a href="/kategori/tambah" class="float-right btn btn-sm btn-success">Tambah</a>

                    {{-- code searching --}}
                    <div class="my-3">
                      <form action="/show" method="get">
                        <div class="input-group mb-1 col-8 col-sm-8 col-md-8">
                          <input type="text" class="form-control" name="cari" placeholder="Searching">
                          <button class="input-group-text btn btn-success">Search</button>
                        </div>
                      </form>
                    </div>
                    
                </div>
                
                <div class="card-body">
                
                    {{-- pesan menggunakan alert --}}
                    @if(Session::has('sukses'))
                    <div class="alert alert-success">
                        {{ Session::get('sukses') }}
                    </div>
                    @endif
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th >Nama Kategori</th>
                                <th >Harga</th>
                                <th width="25%" class="text-center">Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                         {{-- foreach digunakan untuk menampilkan data dari tabel $kategori --}}
                        @foreach($kategori as $isitabel)
                        <tr>
                        {{-- loop adalah variabel yang digunakan untuk membuat nomer --}}
                        {{-- iteration digunakan untuk menampilkan nomer dari 1 --}}
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $isitabel->kategori }}</td>
                            <td>{{ $isitabel->harga }}</td>
                            <td class="text-center">
                            <a href="{{ url('/kategori/edit/'.$isitabel->id) }}" class="btn btn-sm btn-success">Edit</a>
                            
                            {{-- onclik digunakan untuk mengkonfirmasi --}}
                            <a href="{{ url('/kategori/hapus/'.$isitabel->id) }}" class="btn btn-sm btn-primary"
                                onclick="return confirm('apakah anda yakkin ?')">hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="/cetak" target="_blank" class="float-right btn btn-sm btn-primary">Cetak Laporan Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection       