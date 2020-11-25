@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Form Product') }}</div>
            </div> --}}
            <form action="/products" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {{-- <label for="inlineFormCustomSelect">Select Category</label> --}}
                            <select name="category" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Category...</option>
                                @foreach ($category as $option)
                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pName">Nama Product</label>
                    <input type="text" name="p_name" class="form-control" id="pName" aria-describedby="pName">
                    <small id="pName" class="form-text text-muted">Masukan Nama product anda...</small>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="price" class="form-control" placeholder="Rp.">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control"  >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pDesc">Deskripsi</label>
                    <textarea class="form-control" name="desc" id="summernote"></textarea>
                </div>
                <div class="form-group">
                    <input id="image" type="file" name="image">
                </div>
                <button type="submit" class="btn btn-outline-dark">Save Product</button>
            </form>
        </div>
    </div>
</div>


@endsection