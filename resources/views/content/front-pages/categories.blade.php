
@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Landing - Front Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>

@endsection

@section('page-script')
@endsection
@section('content')
<section id="hero-animation">
  <div id="landingHero" class="section-py landing-hero position-relative">
    <div class="container">
      <div class="hero-text-box text-center">
        <h1 class="text-primary hero-title display-4 fw-bold">الأصناف الموجودة</h1>
        <br>
      </div>
      {{-- show category --}}
      <div class="row g-4" id="categories">
        @foreach ($categories as $category)
        <div class="col-xl-4 col-lg-2 col-md-2">
          <a href="{{ Route('shipping-price') }}">
            <div class="card h-100 border">
              <div class="card-body d-flex flex-column justify-content-between">
                <img src="{{asset('assets/img/category/'.$category->photo)}}" class="img-fluid mx-auto my-4 rounded" style="width: 500px; height: 300px;" alt="...">
                <div class="role-heading text-center">
                  <h5 class="card-title">{{$category->category_name}}</h5>
                  <p class="card-text">{{$category->price_per_weight}}</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

  <!-- Add more category cards as needed -->

@endsection
