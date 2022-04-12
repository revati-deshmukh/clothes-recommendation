<style>
    h1 {
      color: #f5c71a
    }
    .product-filter {
      display: flex;
    }

    .product-filter h1 {
      flex-grow: 1;
    }

    .sort {
      display: flex;
    }

    .collection-sort {
      display: flex;
      flex-direction: column;
    }

    .collection-sort label {
      font-size: large;
      color: #5e5151;
    }

    .products {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-top: 2rem;
    }

    .product-card {
      width: 22%;
      padding-bottom: 3%; /* Same as width, sets height */
      position: relative;
      /*padding: 2%;
      flex: 1 24%;

      /*display: flex; /*so child elements can use flexbox stuff too! */
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

    .product-image img {
      margin-top: auto;
      margin-bottom:auto;
      max-width: 100%;
    }

    .product-image img:hover {
      transform: scale(1.12);
    }

    .product-info {
        margin-top: auto;
        text-align:center;
    }
    
    .quantity-default{
      color: #3ba529;
    }

    .quantity-warning {
      color: #f5951b;
    }
</style>

@extends('layouts.app')

<!-- @section('filter')
<div class="container">
    <nav class="product-filter">
        <h1>Clothes</h1>
        <div class="sort">
            <div class="collection-sort">
                <label>Filter by:</label>
                <select>
                <option value="/">All Clothes</option>
                </select>
            </div>

            <div class="collection-sort">
                <label>Sort by:</label>
                <select>
                <option value="/">Featured</option>
                </select>
            </div>
        </div>
    </nav>
</div>
@endsection -->

@section('content')
<div class="container">
    <nav class="product-filter">
        <h1>Clothes</h1>
        <div class="sort">
            <div class="collection-sort">
                <label>Filter by:</label>
                <select>
                    <option value="/">All Clothes</option>
                    @foreach($products as $product)
                      <option value="{{$product->type}}">Palazzo Top</option>
                    @endforeach
                </select>
            </div>

            <div class="collection-sort">
                <label>Sort by:</label>
                <select>
                    <option value="/">Featured</option>
                    <option value="/">Price Low-High</option>
                    <option value="/">Price High-Low</option>
                </select>
            </div>
        </div>
    </nav>
  
  
    <section class="products">
      @foreach($products as $product)
        <div class="product-card">
            <div class="product-image">
                <img src="{{ asset('images/palazzo-top-set1.jpeg') }}" title="{{$product->name}}">
            </div>
            <div class="product-info">
                <h4 class="product-name">{{ $product->name }}</h4>
                <p class="product-description">{{ $product->description }}</p>
                <h6 class="product-amount"><strong>&#8377; {{ $product->selling_price }}</strong></h6>
                @if($product->quantity > 1)
                  <span class="quantity-default">In stock</span>
                @elseif($product->quantity == 1)
                  <span class="quantity-warning">Only 1 left... Hurry up!</span>
                @endif
            </div>
        </div>
      @endforeach
    </section>
</div>
@endsection