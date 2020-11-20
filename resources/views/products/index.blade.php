@extends('layouts.app')

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
<div class="container">
    <div class="row justify-content-center">
        <div class="">{{ __('Form Product') }}</div>    
    </div>
    <a class="btn btn-outline-dark m-3" href="/products/create">Input Products</a>
    <div class="table-responsive">
    <table class="table table-striped">
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
                <td class="d-inline-block text-truncate" style="max-width:100px;">{{$item->desc}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->upload_by}}</td>
                <td>
                    <a href="/products/delete/{{$item->id}}"class="btn btn-outline-danger m-1"><i class="fas fa-trash-alt"> Hapus</i></a>
                    <a href="/products/{{$item->id}}" class="btn btn-outline-dark m-1" ><i class="fas fa-search"> Lihat</i></a> 
                    <a href="/products/edit/{{$item->id}}" class="btn btn-outline-success m-1" ><i class="fas fa-search"> Edit</i></a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{$product->links()}}
</div>

@endsection
