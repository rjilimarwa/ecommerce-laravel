<!-- landing-page.blade.php -->

@extends('master')
@section('title',$product->name)
@section('content')
    <div class="container">
        <table class="table table-striped">

            <tbody>
            <div class="product-section container">
                <div>
                    <div class="product-section-image">
                        <img src="" alt="product" class="active" id="currentImage">
                    </div>
                    <div class="product-section-images">
                        <div class="product-section-thumbnail selected">
                            <img src="" alt="product">
                        </div>
                    </div>
                </div>
                <div class="product-section-information">
                    <h1 class="product-section-title">{{ $product->name }}</h1>
                    <div class="product-section-subtitle">{{ $product->details }}</div>
                    <div class="product-section-price">{{ $product->price }}</div>

                    <p>
                        {!! $product->description !!}
                    </p>

                    <p>&nbsp;</p>

                </div>


            </div>
              <form action="{{route('cart.store')}}" method="POST">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value={{$product->id}}>
                  <input type="hidden" name="name" value={{$product->name}}>
                  <input type="hidden" name="price" value={{$product->price}}>
                  <button type="submit" class="button button-plain">Add to cart</button>
              </form>
            <!-- end product-section -->
            </tbody>
        </table>
    </div>
@endsection
