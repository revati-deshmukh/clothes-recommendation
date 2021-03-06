<style>
    .products {
        display: flex;
        flex-direction: row;
    }

    .products img {
        max-width: 100%;
        height: 85%;
        width: 100%;
    }

    .product-image {
        display: flex;
        flex-direction: row;
    }

    .product-image img:hover {
      transform: scale(1.5);
    }

    .product-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .product-name {
      color: #d38814;
    }

    .product-description {
      color: #6a5f5f;
    }

    .product-amount {
      font-size: large;
    }

    .quantity-default{
      color: #3ba529;
    }

    .addtobag {
        color: #fff !important;
        background: #4a782e !important;
        margin: 1rem;
        padding: 1rem;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <section class="products">
        <div class="product-image">
            <img src="{{ $products[0]->image_url }}" title="{{$products[0]->name}}">
        </div>
        <div class="product-info">
            <h1 class="product-name">{{ $products[0]->name }}</h1>
            <p class="product-description">{!! $products[0]->product_details !!}</p>
            <h6 class="product-amount"><strong>&#8377; {{ $products[0]->selling_price }}</strong></h6>
            @if($products[0]->quantity > 1)
                <span class="quantity-default">In stock</span>
            @elseif($products[0]->quantity == 1)
                <span class="quantity-warning">Only 1 left... Hurry up!</span>
            @endif

            <div class="quantity">
                <a class="btn btn-block addtobag" href="{{ route('addtobag', $products[0]->id) }}">Add To Bag</a>
                <!-- <button><i class="fa fa-minus" aria-hidden="true"></i></button>
                <label>1</label>
                <button><i class="fa fa-plus" aria-hidden="true"></i></button> -->
            </div>
        </div>
    </section>
</div>
@endsection