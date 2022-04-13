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

    #filter {
      display: none;
    }

    #toggleFilterBtn {
      background-color: #89af4c; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }

    input[type=number], select {
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    #minamount, #maxamount {
      padding: 12px 2px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    #applyFilter {
      background-color: #89af4c; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
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
            <button id="toggleFilterBtn" onclick=toggleFilters()>Apply Filters?</button>
            <div id="filter" class="collection-sort">
                <label>Filter by:</label>
                <form action="{{route('filterproducts')}}" method="POST">
                  @csrf
                  <select id="typeFilter" name="type">
                      <option value="all">All Clothes</option>
                      @foreach($filters as $filter)
                        <option value="{{$filter->type}}">{{$filter->name}}</option>
                      @endforeach
                  </select>
                  <input id="minamount" type="number" value="" name="startprice" placeholder="Min amount" />
                  -
                  <input id="maxamount" type="number" value="" name="endprice" placeholder="Max amount" />
                  <select name="size">
                      <option value="all">All Sizes</option>
                      @foreach($sizes as $size)
                        <option value="{{$size->size}}">{{$size->size}}</option>
                      @endforeach
                  </select>
                  <select name="color">
                      <option value="all">All Colors</option>
                      @foreach($colors as $color)
                        <option value="{{$color->color}}">{{$color->color}}</option>
                      @endforeach
                  </select>
                  <button id="applyFilter" type="submit">Filter</button>
                </form>
            </div>

            <!-- <div class="collection-sort">
                <label>Sort by:</label>
                <select>
                    <option value="/">Featured</option>
                    <option value="/">Price Low-High</option>
                    <option value="/">Price High-Low</option>
                </select>
            </div> -->
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

    <script type="application/javascript">
      function toggleFilters(){
        let toggle = document.getElementById("filter");
        
        if(toggle.style.display === "block"){
          toggle.style.display = "none";
          //document.getElementById("toggleFilterBtn").innerHTML = "Apply Filters";
        } else {
          toggle.style.display = "contents";
          document.getElementById("toggleFilterBtn").style.display = "none";
          //document.getElementById("toggleFilterBtn").innerHTML = "Remove Filters";
        }
      }
    </script>
</div>
@endsection