@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product Category - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-ecommerce.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-category-list.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce /</span> Category List
</h4>

<div class="app-ecommerce-category">
  <!-- Category List Table -->
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>Categories</th>
            <th class="text-nowrap text-sm-end">Total Products &nbsp;</th>
            <th class="text-nowrap text-sm-end">Total Earning</th>
            <th class="text-lg-center">Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- Offcanvas to add new customer -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList" aria-labelledby="offcanvasEcommerceCategoryListLabel">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header py-4" id="offcanvasEcommerceCategoryListLabel">
      <h5  class="offcanvas-title">Add Category</h5>
      <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- Offcanvas Body -->
    <div class="offcanvas-body border-top">
      <form class="pt-0" id="eCommerceCategoryListForm">
        <!-- Title -->
        <div class="mb-3">
          <label class="form-label" for="ecommerce-category-title">Title</label>
          <input type="text" class="form-control" id="ecommerce-category-title" placeholder="Enter category title" name="categoryTitle" aria-label="category title">
        </div>

        <!-- Image -->
        {{-- <div class="mb-3">
          <label class="form-label" for="ecommerce-category-image">Attachment</label>
          <input class="form-control" type="file" id="ecommerce-category-image" name="img">
        </div> --}}
        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <div class="form-control p-0 pt-1">
            <div class="comment-editor border-0" id="ecommerce-category-description">
            </div>
            <div class="comment-toolbar border-0 rounded">
              <div class="d-flex justify-content-end">
                <span class="ql-formats me-0">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                </span>
              </div>
            </div>
          </div>

        </div>
        <!-- price -->
        <div class="mb-3">
          <label class="form-label" for="ecommerce-category-title">Price per weight</label>
          <input type="text" class="form-control" id="ecommerce-category-title" placeholder="Enter category title" name="price_per_weight" aria-label="category title">
        </div>

        <!-- Submit and reset -->
        <div class="mb-3">
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
          <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Discard</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
