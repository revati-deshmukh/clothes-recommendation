<!-- Life is available only in the present moment. - Thich Nhat Hanh -->

<style>
    .products {
        display: flex;
        flex-wrap: wrap;
    }

    .product-card {
        padding: 2%;
        flex-grow: 1;
        flex-basis: 16%;

        /*display: flex;  so child elements can use flexbox stuff too! */
    }

    .product-image img {
      margin-top: auto;
      margin-bottom:auto;
      max-width: 100%;
    }

    .product-info {
        margin-top: auto;
    }
    
</style>
@extends('layouts.app')


@section('content')
<div>
  <section class="products">
    @foreach($products as $product)
      
      <div class="product-card">
      <div class="product-image">
        <img src="{{ asset('images/palazzo-top-set1.jpeg') }}">
      </div>
      <div class="product-info">
        <h5>{{ $product->name }}</h5>
        <h6>{{ $product->selling_price }}</h6>
      </div>
    </div>
    @endforeach
  </section>
</div>
@endsection
