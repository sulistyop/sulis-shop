@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                <a href="/products" class="btn btn-danger">Products</a>
                </div>

    
            </div>
        </div>
    </div> --}}

<div class="row">
    <div class="col-md-4">
        <label for=""></label>
        <select name="" id="filter-1" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach($categori as $key => $kat)
                <option value="{{$kat->id}}">{{ $kat->name}}</option>
            @endforeach
        </select>
    </div>
</div>
      



    <div class="row row-cols-2 row-cols-md-5 m-1">
        @foreach($product as $key => $item)
            <div class="col-md-4 col-lg-4 col-xl-3 mb-4">
                <div class="card">
                    <img src="{{ $item->url}}" class="img-fluid" alt="Responsive Image" style=" height:170px;">
                    <div class="card-body">
                    <h6 class="card-title font-weight-semi-bold mb-3 w-xl-220p mx-auto">{{ $item->p_name}}</h6>
                    <p class="price">Rp.{{number_format("$item->price",2) }}</p>
                    <p class="card-text">{{ $item->updated_at->diffForHumans()}}</p>
                    <div class="d-flex justify-content-center">
                        <a href="/products/{{$item->id}}" class="btn btn-dark btn-lg w-100"><i class=" fas fa-search"></i></a>      
                    </div>              
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8885685.js"></script>
<!-- End of HubSpot Embed Code -->
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8885685.js"></script>
<!-- End of HubSpot Embed Code -->
@endsection
