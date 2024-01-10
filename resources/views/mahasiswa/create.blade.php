@extends('layout.template')
@section('konten')
<form action='{{url('Post')}}' method='post'>
@csrf    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id' id="id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' id="penulis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tahun_terbit' id="tahun_terbit">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ISBN" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='ISBN' id="ISBN">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ISBN" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
     
    </div>
</form>    
@endsection
