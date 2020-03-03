<!-- landing-page.blade.php -->

@extends('master')
@section('content')
    <div class="container">
        <table class="table table-striped">

            <tbody>
            <div class="products text-center">
                @foreach($mightAlsoLike as $might)
                    <div class="product">
                        <a href={{route('shop.show',$might->slug)}}><img src="{{asset("images/".$might->slug.'.jpg')}}" alt="product"></a>
                        <a href={{route('shop.show',$might->slug)}}><div class="product-name">{{ $might->name }}</div></a>
                        <div class="product-price">{{$might->price }}</div>
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
