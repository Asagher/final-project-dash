@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Not Authorized - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Not Authorized -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">إنك غير مخول للوصول !</h2>
    <p class="mb-4 mx-2">ليس لديك إذن لعرض هذه الصفحة باستخدام بيانات الاعتماد التي قدمتها أثناء تسجيل الدخول <br> يرجى الاتصال بمسؤول الموقع</p>
    <a href="{{url('/')}}" class="btn btn-primary">Back to home</a>
    <div class="mt-5">
      <img src="{{asset('assets/img/illustrations/girl-with-laptop-'.$configData['style'].'.png')}}" alt="page-misc-not-authorized-light" width="450" class="img-fluid" data-app-light-img="illustrations/girl-with-laptop-light.png" data-app-dark-img="illustrations/girl-with-laptop-dark.png">
    </div>
  </div>
</div>
<!-- /Not Authorized -->
@endsection
