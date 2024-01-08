<style>
 
  .heroImge{
    margin-top: 100px;
    width: 100%;
    height: 80vh;
  }
  .heroDiv{
    width: 100%;
    height: 100%;
    position: relative;
  }
  .heroDiv h1{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    z-index: 9;
    font-size: 56px
  }
  .heroImge .heroDiv::before{
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    background: #696cff;
    opacity: 0.4;
    top: 0;
    z-index: 5;
  }
  .heroImge img{
    width: 100%;
    height: 100%;
  }
</style>


@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Landing - Front Pages')
{{-- @section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection --}}

{{-- @section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

@endsection --}}

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
@endsection

@section('vendor-script')
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('js/demo-ship.js')}}"></script>

@endsection

@section('content')
<section class="heroImge">
  <div class="heroDiv">
    <img src="{{asset('assets/img/front-pages/landing-page/truck1.jpg')}}" alt="">
    <h1>تكلفة الشحن</h1>
  </div>
</section>
<section id="hero-animation" class="landing-cta">
  <div id="landingHero" class="pt-5 position-relative">
    <div class="container">
      <div class="hero-text-box text-center">
        <h1 class="text-primary hero-title display-4 fw-bold">الاستعلام عن تكاليف الشحن حسب</h1>
        <br>
      </div>
      <div class="row justify-content-center">
        <div class="">
          <div class="card mb-4">
            <h5 class="card-header">مصاريف الشحن</h5>
            {{-- <div class="card-body">
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">محافظة إرسال الشحنة</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">مدينة إرسال الشحنة</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div><div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">محافظة الإستلام</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div><div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">مدينة الإستلام</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">وزن الشحنة</label>
                <input type="text">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">نوع الخدمة</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">نوع المنتج</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div> --}}
            <div class="m-3 d-flex justify-center items-center">
{{-- my form --}}
              <form onSubmit="return false" id="demoShip">
                <div id="address" class="content">
                  <div class="content-header justify-content-between mb-3 d-flex">
                    <div>
                      <h6 class="mb-0">الشحنة</h6>
                      <small>أدخل معلومات الشحنة.</small>
                    </div>
                    
      
                  </div>
                  <div class="row g-3">
                     
                    <div class="col-sm-4">
                      <label class="form-label" for="address">وجهة الشحن</label>
                      <select class="form-select   myAddress" name="address" >
                        <option label=" "></option>
                        {{-- @foreach ($addresses as $address )
                        <option value="{{$address->id}}" label=" ">{{ $address->location}}</option>
                        @endforeach --}}
                      </select>
                    </div>
                   <div class="row g-3 shipment-line" >
      
                    <div class="col-sm-4">
                      <label class="form-label" for="category">فئات الشحن</label>
                      <select class="form-select   myCategory" name="category[]" id="category_shipment">
                        <option value="">اختر الفئة</option>
      
                        @foreach ($categories as $category )
                        <option value="{{ $category->category_id}}" label=" ">{{ $category->category_name}}</option>
      
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label"  for="category-detail"> تفاصيل فئات الشحن </label>
                      <select class="form-select myCategorydetaile" id="category-detail" name="category_detail" >
      
                        <option >اختر تفاصيل الفئة</option>
      
      
      
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label" for="quantity">الكمية</label>
                      <input type="text" name="quantity[]" class="form-control calculate-cost quantity" id="quantity" placeholder="Borough bridge">
                    </div>
      
                    <div class="col-sm-4">
                      <label class="form-label" for="price_for_wight">السعر للفئة</label>
                      <input type="text" name="price_for_wight[]"   class="form-control price_for_wight calculate-cost" id="price_for_wight" placeholder="Birmingham">
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label" for="total_wight">اجمالي الوزن</label>
                      <input type="text" name="total_wight[]" class="form-control calculate-cost total_wight" id="total_wight" placeholder="658921">
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label" for="line_total_cost">التكلفة</label>
                      <input type="text" name="line_total_cost[]" class="form-control line_total_cost" id="line_total_cost" placeholder="Birmingham">
                    </div>
                    <div>
                      <label for="description" class="form-label">تفاصيل عن الشحنة</label>
                      <textarea class="form-control description" name="description" id="description" rows="3"></textarea>
                    </div>
                            {{-- <hr> --}}
                  </div>
                    <div class="col-12 d-flex justify-content-center">
                      <button type="submit" class="btn btn-label-primary w-25">
                        {{-- <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> --}}
                        <span class="align-middle d-sm-inline-block d-none">تأكيد</span>
                      </button>
                      {{-- <button class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">القادم</span>
                        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                      </button> --}}
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form controls -->
@endsection
