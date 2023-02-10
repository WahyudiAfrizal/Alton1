@extends('layouts.app')
@section('halaman','Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Data Kategori
                    <a href="/kategori/tambah" class="float-right btn btn-sm btn-primary">Tambah</a>
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
                            <a href="{{ url('/kategori/edit/'.$isitabel->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            {{-- onclik digunakan untuk mengkonfirmasi --}}
                            <a href="{{ url('/kategori/hapus/'.$isitabel->id) }}" class="btn btn-sm btn-danger"
                                onclick="return confirm('apakah anda yakkin ?')">hapus</a>
                                
                                {{-- <!-- Button yang digunakan untuk menampilkan modal-->
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#inihapus">hapus</button>
                                    <!-- Modal -->
                                    @include('layouts.hapus') --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection       