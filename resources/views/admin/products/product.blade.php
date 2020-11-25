@extends('layouts.admin')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
</div>
<div class="card p-3 m-2">
    <div class="d-flex justify-content-lg-end mb-3">
        <a class="btn btn-outline-dark" href="/products/create">Tambah Produk</a>
    </div>
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Product</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Dibuat Oleh</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
          
            @foreach($product as $key => $item)
            <tr>
            <th scope="row">{{ $i++}}</th>
                <td>{{$item->p_name}}</td>
                <td class="text-truncate" style="max-width:100px;">{{$item->desc}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->upload_by}}</td>
                <td>
                    <form action="/products/{{$item->id}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"> Hapus</i></button>
                    </form>
                    <a href="/products/{{$item->id}}" class="btn btn-outline-dark" ><i class="fas fa-search"> Lihat</i></a> 
                    <a href="/products/{{$item->id}}/edit" class="btn btn-outline-success" ><i class="fas fa-search"> Edit</i></a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{$product->links()}}
</div>

@endsection
