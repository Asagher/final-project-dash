@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

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
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
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
<script src="{{asset('assets/js/app-ecommerce-product-list.js')}}"></script>
@endsection

@php
$roles = ['المشرف', 'موظف خدمات'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">eCommerce /</span> Product List
    </h4>

    <!-- Product List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-products table border-top">
          <thead>
            <tr>
              <th></th>
              <th>التسلسل</th>
              <th>الصنف</th>
              <th>نوع الطرد</th>
              <th>الوزن</th>
              <th>السعر</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <!-- Add product Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3> إضافة نوع طرد جديد</h3>
            </div>
            <form id="addForm" class="row">
              {{-- category --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name"> الصنف</label>
                <select id="category-org" class="form-select" data-placeholder="اختر صنف" name="category_id">
                  <option value="">اختر نوع الصنف</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- name --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name">اسم الطرد</label>
                <input type="text" class="form-control" id="ecommerce-product-name" placeholder="نوع الطرد" name="type" aria-label="Product title">
              </div>

              {{-- weight --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-sku">الوزن</label>
                <input type="text" class="form-control" id="ecommerce-product-sku" placeholder="ادخل الوزن" name="weight" aria-label="Product SKU">
              </div>

              {{-- price --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-barcode">السعر</label>
                <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="ادخل السعر" name="price" aria-label="Product barcode">
              </div>
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Add product Modal -->


    <!-- Edit product Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3> إضافة نوع طرد جديد</h3>
            </div>
            <input type="text" id="editId" name="editId" hidden/>
            <form id="editForm" class="row">
              {{-- category --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name"> الصنف</label>
                <select id="category" class="form-select" data-placeholder="اختر صنف" name="category_id">
                  <option value="" >اختر نوع الصنف</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- name --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name">اسم الطرد</label>
                <input type="text" class="form-control" id="product-name" placeholder="نوع الطرد" name="type" aria-label="Product title">
              </div>

              {{-- weight --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-sku">الوزن</label>
                <input type="text" class="form-control" id="weight" placeholder="ادخل الوزن" name="weight" aria-label="Product SKU">
              </div>

              {{-- price --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-barcode">السعر</label>
                <input type="text" class="form-control" id="price" placeholder="ادخل السعر" name="price" aria-label="Product barcode">
              </div>
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Edit product Modal -->
  @endsection
@else
  @section('content')
  <h4 class="py-3 mb-4">
      ليس لديك صلاحية </h4>

  @endsection
@endif
