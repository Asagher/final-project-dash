@php
  $configData = Helper::appClasses();
@endphp
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
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.3.min.js">

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-category-list.js')}}"></script>
@endsection
@php
$roles = ['المشرف', 'موظف خدمات'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">التجارة الإلكترونية/المنتجات و الأصناف /</span>  قائمة الأصناف
    </h4>

    <div class="col-xl-4 col-lg-6 col-md-6"id="cardsContainer">
      <div class="card h-100">
        <div class="row h-100">
          <div class="col-sm-5">
            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
              <div class="col-sm-7">
                  <button data-bs-target="#addModal" data-bs-toggle="modal" class="btn btn-primary mb-3 text-nowrap add-new-role">إضافة صنف جديد</button>
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
    <br>
    {{-- show category --}}
    <div class="row g-4 " id="categories">
      @foreach ($categories as $category)
        <div class="col-xl-4 col-lg-6 col-md-6 ">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/img/category/'.$category->photo)}}" class="img-fluid mx-auto my-4 rounded" style="width: 500px; height: 300px;" alt="...">
              <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                  <h5 class="card-title text-center">{{$category->category_name}}</h5>

                  <a href="javascript:;"  data-bs-target="#editModal"  class="category-edit-modal" data-id={{$category->category_id}} data-bs-toggle="modal" ><small>تعديل الصنف</small></a>
                </div>
                <a href="javascript:void(0);" data-id={{$category->category_id}} class="delete-record"><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <br>


      <!-- Add Category Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" >
      <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="role-title">إضافة صنف جديد :</h3>
            </div>
            <!-- Add role form -->
            <form id="addForm" class="row g-3" >
              <!-- Title -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">اسم الصنف</label>
                <input type="hidden" id="modalRoleId" name="modalRoleId">
                <input type="text" id="ecommerce-category-title" name="categoryTitle" class="form-control" placeholder="أدخل اسم الصنف" tabindex="-1" />
              </div>
              <!-- Image -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">صورة الصنف</label>
                <input type="file" id="ecommerce-category-image" name="img" class="form-control" placeholder="" tabindex="-1" />
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" >إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
            <!--/ Add role form -->
          </div>
        </div>
      </div>
    </div>

    <!-- edit Category Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" >
      <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="role-title">تعديل الصنف</h3>
            </div>
            <form id="editForm" class="row g-3" >
              <!-- Title -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">اسم الصنف</label>
                <input type="hidden" id="editId" name="editId">
                <input type="text" id="Etitle" name="categoryTitle" class="form-control" placeholder="Enter a category name" tabindex="-1" />
              </div>
              <!-- Image -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">صورة الصنف</label>
                <input type="file" id="Eimage" name="img" class="form-control" placeholder="Enter category image" tabindex="-1" />
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" >إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
            <!--/ Add role form -->
          </div>
        </div>
      </div>
    </div>

  @endsection
@else
  @section('content')
    <p>ليس لديك صلاحية </p>
  @endsection
@endif
