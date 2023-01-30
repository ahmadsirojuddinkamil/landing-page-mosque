@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Detail') }}</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">

                            <div class="">
                                <img src="{{ url('storage/' . $product->image) }}" alt="" width="200px">
                            </div>

                            <div class="px-4">
                                <h1>{{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3>Rp{{ $product->price }}</h3>
                                <hr>
                                <p>{{ $product->stock }} Stok</p>

                                @if (!Auth::user()->is_admin)
                                    <form action="{{ route('add_to_cart', $product) }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3" style="width: 12rem">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Add to
                                                    cart</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('edit_product', $product) }}" method="get">
                                        <button type="submit" class="btn btn-primary">Edit product</button>
                                    </form>
                                @endif

                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
