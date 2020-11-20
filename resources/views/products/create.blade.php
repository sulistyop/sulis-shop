@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Form Product') }}</div>
            </div> --}}
            <form action="/products" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inlineFormCustomSelect">Select Category</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Category...</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Three">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pName">Nama Product</label>
                    <input type="text" name="p_name" class="form-control" id="pName" aria-describedby="pName">
                    <small id="pName" class="form-text text-muted">Masukan Nama product anda...</small>
                </div>
                <div class="form-group">
                    <label for="pName">Harga</label>
                    <input type="text" name="price" class="form-control" id="tanpa-rupiah" aria-describedby="pName">
                </div>
                <div class="form-group">
                    <label for="pDesc">Deskripsi</label>
                    {{-- <textarea type="text" name="desc" class="form-control" id="pDesc"></textarea> --}}
                    <textarea class="form-control" name="desc" id="summernote"></textarea>
                </div>
                <div class="form-group">
                    <input id="image" type="file" name="image">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>


@endsection