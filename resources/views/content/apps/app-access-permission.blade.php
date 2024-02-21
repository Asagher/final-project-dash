@extends('layouts/layoutMaster')

@section('title', 'Permission - Apps')

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
<script src="{{asset('assets/js/app-access-permission.js')}}"></script>
@endsection
@php
$roles = ['المشرف'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')
    <h4 class="py-3 mb-2">قائمة الصلاحيات :</h4>

    <!-- Permission Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-permissions table border-top">
          <thead>
            <tr>
              <th></th>
              <th>اسم الصلاحية</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!--/ Permission Table -->

    <!-- Modal -->
    @include('_partials/_modals/modal-add-permission')
    @include('_partials/_modals/modal-edit-permission')
    <!-- /Modal -->
  @endsection
@else
  <p>ليس لديك صلاحية </p>
@endif
