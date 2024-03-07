@extends('cartdashboard')


    <section class=" h-200" style="background-color: #eee;">
        <div class="container h-100 py-5 " style="background-color: #eee;">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    @php
                        $totalPrice = 0;
                    @endphp

                    @foreach ($carts as $details)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('products/' . $details->product_photo) }}"
                                            class="img-fluid rounded-3" alt="{{ $details['product_title'] }}">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $details['product_title'] }}</p>

                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2">
                                            
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <input id="form1" min="0" name="quantity"
                                            value="{{ $details['quantity'] }}" type="number"
                                            class="form-control form-control-sm" />

                                        <button class="btn btn-link px-2">
                                           
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">${{(float)$details['product_price'] * (int)$details['quantity']}}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="{{ url('delete', $details->id) }}" class="text-danger">Delete<i
                                                class="fas bi bi-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $totalPrice += (float)$details['product_price'] * (int)$details['quantity'];
                        @endphp
                    @endforeach

                    <div class="card">
                        <div class="card-body">
                            <h1 class="btn btn-primary btn-block btn-lg">Total Price: ${{ $totalPrice }}</h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/checkouts">
                            <button type="submit" class="btn btn-primary btn-block btn-lg" id="checkout-live-button">Proceed to Pay</button>
                            </a>
                            {{-- <form action="{{url('checkout')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block btn-lg" id="checkout-live-button">Proceed to Pay</button>
                            </form> --}}
                           
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
       
        <div class="footer" style="margin-top:10%;">
            {{ View::make('frontend.footer') }}
        </div>
        
    </section>
    
    
</div>

