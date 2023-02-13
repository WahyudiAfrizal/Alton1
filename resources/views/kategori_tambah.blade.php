@extends('layouts.app')
@section('halaman','Tambah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #4bbcf4">
                    <b>Tambah Kategori</b> 
                </div>
                <div class="card-body">
                    <form method="post" action="/kategori/aksi">
                        
                        @csrf
                        <div class="form-group">
                        <label><b>Nama Kategori</b></label>
                        <input type="string" name="kategori" class="form-control">
                        
                        {{-- pesan --}}
                        @error('kategori')
                        <div class="error" style="color:#CD0404"><b>kategori sudah ada</b></div>
                        @enderror
                        <br>
                        <label><b>Harga</b></label>
                        <input type="integer" name="harga" class="form-control">  
                        
                        {{-- pesan --}}
                        @error('harga')
                        <div class="error" style="color:#CD0404"><b>Harga harus angka</b></div>
                            @enderror
                        </div>
                        <br>
                        <a href="/home" class="float-right btn btn-sm btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection   