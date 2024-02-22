@extends('layouts/layoutMaster')

@section('title', 'User Management - Crud App')

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
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/laravel-user-management.js')}}"></script>
@endsection

@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2" id="userCount">{{$totalUser}}</h3>
            </div>
            <small>العدد الكلي للموظفين</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="bx bx-user bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2" id="userVerifiedCount">{{$verified}}</h3>
            </div>
            <small>العدد الكلي للموظفين المتحقق منهم </small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="bx bx-user-check bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">قائمة المستخدمين :</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table border-top" id="table">
      <thead>
        <tr>
          <th></th>
          <th>التسلسل</th>
          <th>اسم المستخدم</th>
          <th>الإيميل</th>
          <th>التحقق</th>
          <th>الدور</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
    </table>
  </div>

  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">إضافة موظف</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="addNewUserForm">
        <input type="hidden" name="id" id="user_id">
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">الاسم الكامل</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="الاسم و الكنية" name="name" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">الإيميل</label>
          <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-contact">رقم الهاتف المحمول</label>
          <input type="text" id="contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="contact" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">كلمة السر</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-label="jdoe1" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="password-confirm">تأكيد كلمة السر</label>
          <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
        </div>

        <div class="mb-3">
          <div class="d-flex flex-wrap row gx-4 row gap-2">
            @foreach ($roles as $role)
            <div class="form-check me-3 me-lg-5 item col">
                <input class="form-check-input " type="checkbox"id="addCheckbox"  name="types[]" value="{{$role->name}}"/>
                <label class="form-check-label" for="userManagementRead">
                    {{$role->name}}
                </label>
            </div>
            @endforeach
          </div>
        </div>

        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">إرسال</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إلفاء</button>
      </form>
    </div>
  </div>

<!-- Offcanvas to edit new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEditUserLabel" class="offcanvas-title">تعديل بيانات الموظف</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="editNewUserForm">
        <input type="text" hidden name="id" id="edit_id">
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">الاسم الكامل</label>
          <input type="text" class="form-control" id="edit-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">الايميل</label>
          <input type="text" id="edit-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-contact">الرقم</label>
          <input type="text" id="edit-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="contact" />
        </div>
        <div class="mb-3">
          <div class="d-flex flex-wrap row gx-4 row gap-2">
            @foreach ($roles as $role)
            <div class="form-check me-3 me-lg-5 item col">
                <input class="form-check-input " type="checkbox"id="editCheckbox"  name="types[]" value="{{$role->name}}"/>
                <label class="form-check-label" for="userManagementRead">
                    {{$role->name}}
                </label>
            </div>
            @endforeach
          </div>
        </div>

        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">تأكيد</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إلغاء</button>
      </form>
    </div>
  </div>
</div>
@endsection
