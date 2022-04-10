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
        max-width: 100%;
    }

    .product-info {
        margin-top: auto;
    }
    
</style>
@section('clothes')
<section class="products">

  <!-- It's likely you'll need to link the card somewhere. You could add a button in the info, link the titles, or even wrap the entire card in an <a href="..."> -->
  
  <div class="product-card">
    <div class="product-image">
      <img src="{{ asset('images/palazzo-top-set1.jpeg') }}">
    </div>
    <div class="product-info">
      <h5>Palazzo Top Set</h5>
      <h6>$99.99</h6>
    </div>
  </div>

  <div class="product-card">
    <div class="product-image">
      <img src="{{ asset('images/palazzo-top-set2.jpeg') }}">
    </div>
    <div class="product-info">
      <h5>Palazzo Top Set</h5>
      <h6>$99.99</h6>
    </div>
  </div>

  <div class="product-card">
    <div class="product-image">
      <img src="{{ asset('images/palazzo-top-set3.jpeg') }}">
    </div>
    <div class="product-info">
      <h5>Palazzo Top Set</h5>
      <h6>$99.99</h6>
    </div>
  </div>

  <!-- more products -->

</section>
@endsection