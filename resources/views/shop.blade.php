<!-- landing-page.blade.php -->

@extends('master')
@section('content')
    <div class="container">
        <table class="table table-striped">

            <tbody>
            <div class="products text-center">
                @foreach($products as $product)
                    <div class="product">
                        <a href={{route('shop.show',$product->slug)}}><img src="{{asset("images/".$product->slug.'.jpg')}}" alt="product"></a>
                        <a href={{route('shop.show',$product->slug)}}><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->price }}</div>
                    </div>


                    <div style="text-align: left">No items found</div>
                @endforeach
                    <div class="text-center button-container">
                        <a href={{route('shop.index')}}> view more products</a>
                    </div>
            </div> <!-- end products -->
            </tbody>
        </table>
    </div>
@endsection
