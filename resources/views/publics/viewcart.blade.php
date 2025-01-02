@extends('layouts.app_public')

@section('content')
@php
$sum = 0;
if(!empty($cartProducts)) {
$sum = 0;
@endphp

<div class="row" style="margin:0">
    <div class="col-md-12" style="padding: 0 15px; box-sizing: border-box;">
        <h3 style="color: #b91111; font-weight: bold;">Your Cart</h3>
        <div style="overflow-x: auto; margin: 0 auto; max-width: 1200px;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Serial No.</th>
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Product</th>
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Price</th>
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Quantity</th>
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Total</th>
                        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sum = 0;
                        $serial = 1;
                    @endphp
                    @foreach($cartProducts as $cartProduct)
                    @php
                        $total = $cartProduct->num_added * (int)$cartProduct->price;
                        $sum += $total;
                    @endphp
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">{{ $serial++ }}</td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">
                            <div class="product-info" style="display: flex; align-items: center;">
                                <img src="{{ asset('storage/'.$cartProduct->image) }}" alt="{{ $cartProduct->name }}" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                                <span>{{ $cartProduct->name }}</span>
                            </div>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Rs. {{ $cartProduct->price }}</td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">{{ $cartProduct->num_added }}</td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">Rs. {{ $total }}</td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <button class="remove-btn" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; cursor: pointer;" onclick="removeProduct({{ $cartProduct->id }})">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: right; max-width: 1200px; margin: 0 auto;">
            <p>Total: Rs. {{ $sum }}</p>
            <a href="{{ lang_url('checkout') }}" class="checkout-btn" style="margin-bottom:1vw; background-color: #c82333; color: #fff; border: none; padding: 10px 20px; text-decoration: none; display: inline-block; margin-top: 20px;">Proceed to Checkout</a>
        </div>
    </div>
</div>


@php
}else{
@endphp
<div class="row" style="height:300px; padding:100px">
    <div class="col-sm-12 text-center" style="color: #b91111; ">      
        <h3><strong> Cart is Empty ! </strong> </h3>
        <h3><strong> Buy Some Products First. </strong> </h3>
    </div>
</div>

@php
}
@endphp
@endsection