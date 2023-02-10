@extends('layouts.app')
@section('halaman','Edit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Edit Kategori
                <a href="/home" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/kategori/update/'.$kategori->id) }}">
                    
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="kategori" class="form-control" value="{{ $kategori->kategori }}">
                            {{-- pesan --}}
                            @error('kategori')
                                <div class="error" style="color: #CD0404"><b>kategori sudah ada</b></div>
                            @enderror
                            
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $kategori->harga }}">
                            {{-- pesan --}}
                            @error('harga')
                            <div class="error" style="color:#CD0404"><b>Harga harus angka</b></div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection