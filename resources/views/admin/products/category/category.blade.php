@extends('layouts.admin')
    
@section('content')

    <div class="card p-3 m-2">
        <div class="col">
            <form action="/category" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('post')
                <label for="kategori">Nama Kategori</label>
                <input type="text" name="name" class="form-control" id="kategori" aria-describedby="kategori">
                <small id="kategori" class="form-text text-muted">Masukan Nama Kategori anda...</small>
                <button class="btn btn-outline-dark">Save</button>
            </form>
        </div>
    </div>

<div class="card p-3 m-2">
    <div class="d-flex justify-content-start mb-2">
        <strong>Product Kategori</strong>
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($category as $key => $kat)
            <tr>
                <th scope="row">1</th>
                <td>{{$kat->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection