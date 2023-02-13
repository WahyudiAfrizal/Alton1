@extends('layouts.app')
@section('halaman','Pencarian')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #4bbcf4" >
                    Data Kategori                                         
                </div>
                
                <div class="card-body">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th >Nama Kategori</th>
                                <th >Harga</th> 
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
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="/home" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection       