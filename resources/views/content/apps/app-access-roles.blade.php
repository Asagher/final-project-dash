@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Roles - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/app-access-roles.js')}}"></script>
@endsection
@php
$roles = ['المشرف'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')
    <h4 class="py-3 mb-2">قائمة الأدوار :</h4>

    <!-- Role cards -->
    <div class="row g-4 " id="roles">
        @foreach ($counts as $role)
          <div class="col-xl-4 col-lg-6 col-md-6 ">
              <div class="card" >
                <div class="card-body">
                  
                  <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">

                        <h4 class="mb-1">{{$role['name'] }}</h4>

                      <a href="javascript:;"  data-bs-target="#editRoleModal"  class="role-edit-modal" data-id={{$role['id']}} data-bs-toggle="modal" ><small>تعديل الدور</small></a>
                    </div>
                    <a href="javascript:;" class="delete-record" data-id={{$role['id']}}  class="text-muted"><i class="bx bx-trash"></i></a>
                  </div>
                </div>
              </div>
          </div>
        @endforeach

        <div class="col-xl-4 col-lg-6 col-md-6"id="cardsContainer">
          <div class="card h-100">
            <div class="row h-100">
              <div class="col-sm-5">
                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                  <div class="col-sm-7">
                      <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-3 text-nowrap add-new-role">إضافة دور جديد</button>
                  </div>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="card-body text-sm-end text-center ps-sm-0">
                  <img src="{{asset('assets/img/illustrations/sitting-girl-with-laptop-'.$configData['style'].'.png')}}" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">

                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!--/ Role cards -->
    <!-- Add Role Modal -->
    @include('_partials/_modals/modal-add-role')
    @include('_partials._modals.modal-edit-role')

    <!-- / Add Role Modal -->
  @endsection
@else
  <p>ليس لديك صلاحية </p>
@endif
