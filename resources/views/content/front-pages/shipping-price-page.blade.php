<style>
  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background-color: #5d10af67;
    color: white;
    text-align: center;
    border-radius: 10px 10px 0 0;
  }

  .form-label {
    font-weight: bold;
  }
</style>


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
        <h1 class="text-primary hero-title display-4 fw-bold">الاستعلام عن تكاليف الشحن حسب</h1>
        <br>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mb-4">
            <h5 class="card-header">Form Controls</h5>
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Read only</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
                <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="email@example.com" />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleDataList" class="form-label">Datalist example</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                  <option value="San Francisco"></option>
                  <option value="New York"></option>
                  <option value="Seattle"></option>
                  <option value="Los Angeles"></option>
                  <option value="Chicago"></option>
                </datalist>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
                <select multiple class="form-select" id="exampleFormControlSelect2" aria-label="Multiple select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form controls -->
@endsection
