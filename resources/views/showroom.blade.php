@extends('layouts.master')

@section('title', 'jETSTREAM-oNE')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Product Details -->
                    <h2 class="card-title">Product Name</h2>
                    <p class="card-text">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="card-text">Price: $99.99</p>
                    <p class="card-text">Category: Electronics</p>
                    <p class="card-text">In Stock: 10</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Product Images -->
                    <div class="carousel-item active">
                        <img src="img/spaceone.jpg" class="d-block w-100" alt="Product Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/spacetwo.jpg" class="d-block w-100" alt="Product Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/spacethree.jpg" class="d-block w-100" alt="Product Image 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection