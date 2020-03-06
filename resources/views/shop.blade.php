<!-- landing-page.blade.php -->

@extends('master')
@extends('search')
@section('content')
    <div class="container">
        <table class="table table-striped">

            <tbody>
            <div>
                <div class="products-header">
                    <h1 class="stylish-heading">{{ $categoryName }}</h1>
                    <div>
                        <strong>Price: </strong>
                        <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">Low to High</a> |
                        <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">High to Low</a>

                    </div>
                </div>
            <div class="products text-center">
                @foreach($products as $product)
                    <div class="product">
                        <a href={{route('shop.show',$product->slug)}}><img src="{{asset("images/".$product->slug.'.jpg')}}" alt="product"></a>
                        <a href={{route('shop.show',$product->slug)}}><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->price }}</div>
                    </div>


                    <div style="text-align: left">No items found</div>
                @endforeach
                    <div class="products-section container">
                        <div class="sidebar">
                            <h3>By Category</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li class=""><a href={{route('shop.index',['category' => $category->slug])}}>{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- end sidebar -->
                        <div>
                    <div class="text-center button-container">
                        <a href={{route('shop.index')}}> view more products</a>
                    </div>
            </div> <!-- end products -->
            </tbody>
        </table>

    </div>
@endsection
