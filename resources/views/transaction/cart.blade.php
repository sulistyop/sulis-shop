@extends('layouts.app')

@section('content')
<style>
  .cstm{
      background:floralwhite;
  }

  @media screen and (max-width:800px) {
   .cstm{
      display:block;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
  }

 }
}
</style>
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
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
    </ol>
  </nav>
</div>
<div class="table-responsive">
  <style>
    img{
      height:50px;//panjang
      width:80px;//lebar
    }
  </style>
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Nama </th>
            <th scope="col">Nama Product</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Warna</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=1;
          @endphp
          @foreach($keranjang as $key => $keranjangs)    
          <tr>
          <th scope="row">{{$i++}}</th>
            <td ><img src="{{$keranjangs->url}}" ></td>
            <td>{{$keranjangs->name}}</td>
            <td>{{$keranjangs->p_name}}</td>
            <td>{{$keranjangs->jumlah}}</td>
            <td>{{$keranjangs->warna}}</td>
          
            <td>Rp. {{ number_format("$keranjangs->sum_price",2)}}</td>
            <td>
            <form action="/cart/{{$keranjangs->id}}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"> Hapus</i></button>
            </form>
            <a href="/products/{{$keranjangs->product_id}}" class="btn btn-outline-dark m-1" ><i class="fas fa-search"> Lihat</i></a>              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="cstm">
        <nav aria-label="breadcrumb" class="d-flex bg-light justify-content-end cstm" >
            <div class="form-inline" aria-expanded="false">
                {{-- <button class="btn btn-dark my-2 my-sm-0 m-2" type="submit">Back</button> --}}
                <form method="post" action="/checkout" style="">
                    @csrf
                    <div class="input-group">
                        
                        <button class="btn btn-outline-dark m-1" ><i class="fas fa-money-bill"> Pembayaran</i></button>              
                    </div>
                </form>
            </div>
        </nav>
      </div>
</div>
</div>

@endsection
