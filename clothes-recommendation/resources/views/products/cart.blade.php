<style>
    .shopping {
        float: right;
        background: #1f8d22 !important;
    }
    .table-responsive {
        max-height:300px;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Item Summary</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td><strong>Item </strong></td>
                <td><strong>Product name </strong></td>
                <td><strong>Price </strong></td>
                <td><strong>Quantity </strong></td>
                <td><strong>Total </strong></td>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @for ($i = 0; $i < count($products); $i++)
            <tr>
                @foreach($products[$i] as $product)
                <td><img src="{!! $product['thumbnail'] !!}" alt="{{ $product['name'] }}"/></td>
                <td> {{ $product['name'] }} </td>
                <td>&#8377; {{ $product['selling_price'] }} </td>
                <td> 1 </td>
                <td>&#8377; {{ $product['selling_price'] }}</td>
                <?php $total = $total + $product['selling_price'] ?>
                @endforeach
            </tr>
            @endfor
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total</strong></td>
                <td><strong>&#8377; {{ $total }}</strong></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a class="btn btn-success btn-lg shopping" href="{{ route('products') }}">Continue Shopping</a>
    </div>
</div>
@endsection