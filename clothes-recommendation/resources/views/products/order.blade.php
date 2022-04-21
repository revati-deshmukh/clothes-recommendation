@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Order Confirmation</strong></div>

                <div class="card-body">
                    <p><strong>Thank you for shopping with us.</strong></p> 
                    <p>Your order number is {{ $orderNo }}. You can track your order once the order is shipped.</p>
                    <p>We are looking forward to celebrate all your important events with our products.</p>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('products')}}">Want to newly launched products?</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
