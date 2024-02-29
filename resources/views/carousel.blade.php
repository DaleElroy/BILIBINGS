@extends('dashboard')
<div class="container mt-6" style="padding-top: 80px;" >
    <div class="row">
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner ml-3">
                        @foreach ($pictures as $index => $carousel)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="img-fluid rounded" src="{{ asset('carousel/' . $carousel->photo) }}"
                                    alt="Carousel Photo" alt="Carousel Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-5">

                <h1 class="font-weight-light">Bilibeads: Fashion Accessories</h1>
                <p>
                    Bilibeads: Fashion Accessories is an application for people who like bead accessories.
                    Bilibeads is designed to cater to the vibrant world of bead products. Bilibeads will be a
                    comprehensive platform where users can explore, purchase, create, and customize a wide range
                    of bead-based products and craft ideas.</p>
            </div>
        </div>
        <div class="border p-4">
            <div class="row">
                <div class="text-center">
                    <h4 class="text-center">Latest Product</h4>
                    <div class="row text-center">
                        @foreach ($latest_product as $latest => $index)
                            <div class="col-md-3 mb-4">
                                <img class="img-thumbnail"
                                    src="{{ asset('latest_product/' . $index->latest_product) }}">
                                <div class="card-title">
                                    <h4 class="card-title">{{ $index->name }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="border-p4" style="margin-top: 5%">
        @if (session('message'))
            <h4 class= "alert alert-success">{{ session('message') }}</h4>
        @endif
        @foreach ($products->chunk(6) as $chunkedProducts)
            @foreach ($chunkedProducts as $category => $categoryProducts)
                <div class="border-p4">
                    <div class="category-border">
                        <h1 class="text-center"><span class="category">{{ ucfirst($category) }}</span></h1>
                        <div class="row">
                            @foreach ($categoryProducts as $product)
                                <div class="card mb-4 g-col-6">
                                    <div class="text-center tumb">
                                        <img src="{{ asset('products/' . $product->gallery) }}" class="img-fluid"
                                            alt="{{ $product->title }}">
                                    </div>
                                    <div class="card-body details">
                                        <h4>{{ $product->title }}</h4>
                                        <p>{{ $product->description }}</p>
                                        <div class="position-relative bottom-details">
                                            <p class="card-text"><strong>Price: ${{ $product->price }} </strong></p>
                                            <div class="links">
                                                <form action="{{ url('addcart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <input type="number" value="1" min="1"
                                                        class="form-control" name="quantity">

                                                    <br>
                                                    <input type="hidden" name="product_id" value="Add Cart">
                                                    <button class="btn btn-primary">Add to Cart</button>


                                                    <input type="hidden" name="product_id" value="Add Cart">
                                                        <button class="btn btn-primary">Buy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    
</div>
<div class="bottom" style="margin-top:10%">
    {{View::make("frontend.footer")}}
    </div>
