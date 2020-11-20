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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
            </ol>
        </nav>
        <div class="row no-gutters">
          <div class="col-lg-4">
            <img src="{{$product->url}}" class="img-fluid img-thumbnail">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h3>{{$product->p_name}}</h3>
                <p class="font-weight-bolder"></p>
                <p class="font-weight-bolder" style="color:red; font-size:30px;">Rp.{{number_format("$product->price",2) }}</p>
                <hr>
                <p class="font-weight-bolder">Fitur: </p>
                <p class="card-text"><small class="text-muted">Last updated {{$product->updated_at->diffForHumans()}}</small></p>
                <div class="cstm">
                    <nav aria-label="breadcrumb" class="d-flex bg-light justify-content-end cstm" >
                        <div class="form-inline" aria-expanded="false">
                            {{-- <button class="btn btn-dark my-2 my-sm-0 m-2" type="submit">Back</button> --}}
                            <form method="post" action="/product/cart/2" style="">
                                @csrf
                                <div class="input-group">
                                    @csrf
                                <input type="number" name="id_product" value="{{$product->id}}" style="display:none">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input  type="radio" id="customRadioInline1" value="merah" name="warna" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Red</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input  type="radio" id="customRadioInline2" value="biru" name="warna" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Blue</label>
                                    </div>
                                    <input type="number" min="1" value="1" class="form-control m-1" name="jumlah">
                                    <input type="number"  class="form-control m-1" value="{{$product->price}}" name="sum_price" style="display:none">
                                    <button class="btn btn-outline-dark m-1" ><i class=" fas fa-cart-plus"> Masukan Keranjang</i></button>              
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
          </div>
        </div>
  
    <div class="shadow p-3 mb-5 bg-white rounded mt-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">Description</a>
              <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ulasan</a>
              <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Coming soon</a>
            </div>
        </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                    <div class="container p-5">
                        <b><span style="color:red;">{{ $product->p_name}}</span></b>
                    
                        @php
                            echo stripslashes($product['desc']);
                        @endphp
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container p-5">
                        <ul class="list-unstyled">
                            <li class="media">
                              <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 80px">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">Komentar 1</h5>
                               contoh media list. pura-pura nya ini adalah kolom komentar pertama dari user. belajar bootstrap 4 di www.malasngoding.com
                              </div>
                            </li>
                            <li class="media my-4">
                              <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 80px">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">Komentar 2</h5>
                               contoh media list. pura-pura nya ini adalah kolom komentar kedua dari user. belajar bootstrap 4 di www.malasngoding.com
                              </div>
                            </li>
                            <li class="media">
                              <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 80px">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">Komentar 3</h5>
                               contoh media list. pura-pura nya ini adalah kolom komentar ketiga dari user. belajar bootstrap 4 di www.malasngoding.com
                              </div>
                            </li>
                            <li class="media my-4">
                              <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 80px">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">Komentar 4</h5>
                               contoh media list. pura-pura nya ini adalah kolom komentar keempat dari user. belajar bootstrap 4 di www.malasngoding.com
                              </div>
                            </li>
                          </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="container p-5">
                        <p>{{ $product->p_name}}</p>
                    </div>
                </div>
            </div>
    </div>




</div>






@endsection
