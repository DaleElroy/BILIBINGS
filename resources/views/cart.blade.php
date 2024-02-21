@extends('dashboard')

<div class="container">
    <table id="cart" class="table table-bordered" style="margin-top: 20%">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            
                
            
                @foreach ($carts as $details)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('products/' . $details->product_photo) }}"
                                        class="card-img-top" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['product_title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['product_price'] }}</td>
                        <td data-th="Quantity">{{ $details['quantity'] }}</td>
                        <td data-th="Subtotal" class="text-center">{{ $details['product_price'] * $details['quantity'] }}</td>
                        <td class="actions"> <a class="btn btn-danger" href="{{url('delete',$details->id)}}">Delete</a>
                            
                        </td>
                    </tr>
                    @php
                        $total += $details['product_price'] * $details['quantity'];
                    @endphp
                @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right">Total: ${{ $total }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/product') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>
                    <a href="{{ url('/checkout') }}" class="btn btn-danger">Checkout</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="fixed-bottom">
    {{View::make("frontend.footer")}}
    </div>
