<!-- landing-page.blade.php -->

@extends('master')
@section('content')
    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count()> 0)

                <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>

                <div class="cart-table">
                    @foreach (Cart::content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href=""><img src="" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('images/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                                    <div class="cart-item-details">
                                        <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                        <div class="cart-table-price">{{ $item->model->price }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                    <div class="cart-table-actions">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="cart-options">Remove</button>
                                        </form>
                                        </div>
                                <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="cart-options">Save For Later</button>
                                </form>
                                        </div>
                                <div class="cart-table-actions">
                                <p>Subtotal:{{Cart::subtotal()/100}}</p>
                                 <p>Tax(13%):{{Cart::tax()}}</p>
                                <p>Total:{{Cart::total()}}</p>
                            </div>
                        </div> <!-- end cart-table-row -->
    @endforeach
                </div>
                        </div>

                    @if (Cart::instance('saveForLater')->count() > 0)

                        <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

                        <div class="saved-for-later cart-table">
                            @foreach (Cart::instance('saveForLater')->content() as $item)
                                <div class="cart-table-row">
                                    <div class="cart-table-row-left">
                                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                                        <div class="cart-item-details">
                                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                            <div class="cart-table-description">{{ $item->model->details }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <p>Subtotal:{{$item->subtotal()/100}}</p>
                                    </div>
                                    <div class="cart-table-row-right">
                                        <div class="cart-table-actions">
                                            <form action="{{ route('SaveForLater.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="cart-options">Remove</button>
                                            </form>

                                            <form action="{{ route('SaveForLater.switchToCart', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="cart-options">Move to Cart</button>
                                            </form>
                                        </div>
                                    @endforeach
                                    @endif
    </div>
        @else

            <h3>You have no items Saved for Later.</h3>
            <div class="spacer"></div>
            <a href={{route('checkout.index')}}>Proceed to Checkout</a>
            <a href="{{route('shop.index')}}">Continue Shopping</a>
            <div class="spacer"></div>

        @endif

    </div>
    </div>
    </div>
    </div>
@endsection
@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                            .then(function (response) {
                                // console.log(response);
                                window.location.href = '{{ route('cart.index') }}'
                            })
                            .catch(function (error) {
                                // console.log(error);
                                window.location.href = '{{ route('cart.index') }}'
                            });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection