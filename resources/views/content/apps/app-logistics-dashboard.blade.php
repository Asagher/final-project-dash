@extends('layouts/layoutMaster')

@section('title', 'Logistics Dashboard - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />


@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-logistics-dashboard.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>


@endsection

@section('page-script')
<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
<script src="{{asset('assets/js/modal-add-car.js')}}"></script>

@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Logistics /</span> Dashboard
</h4>

<!-- Card Border Shadow -->
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
          </div>
          <h4 class="ms-1 mb-0">42</h4>
        </div>
        <p class="mb-1">سيارات في المسار</p>
        <p class="mb-0">
          <span class="fw-medium me-1">+18.2%</span>
          <small class="text-muted">الاسبوع الماضي</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-warning h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-error'></i></span>
          </div>
          <h4 class="ms-1 mb-0">8</h4>
        </div>
        <p class="mb-1">مركبات معطلة</p>
        <p class="mb-0">
          <span class="fw-medium me-1">-8.7%</span>
          <small class="text-muted">الاسبوع الماضي</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-danger h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-git-repo-forked'></i></span>
          </div>
          <h4 class="ms-1 mb-0">27</h4>
        </div>
        <p class="mb-1">انحرفت من المسار</p>
        <p class="mb-0">
          <span class="fw-medium me-1">+4.3%</span>
          <small class="text-muted">الاسبوع الماضي</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-info h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-info"><i class='bx bx-time-five'></i></span>
          </div>
          <h4 class="ms-1 mb-0">13</h4>
        </div>
        <p class="mb-1">مركبات متاخرة</p>
        <p class="mb-0">
          <span class="fw-medium me-1">-2.5%</span>
          <small class="text-muted">الاسبوع الماضي</small>
        </p>
      </div>
    </div>
  </div>
</div>
<!--/ Card Border Shadow -->
<div class="row">
  <!-- Vehicles overview -->
  <div class="col-xxl-6 mb-4 order-5 order-xxl-0">
    <div class="card h-100">
      <div class="card-header">
        <div class="card-title mb-0">
          <h5 class="m-0">نظرة على المركبات </h5>
        </div>
      </div>
      <div class="card-body">
        <div class="d-none d-lg-flex vehicles-progress-labels mb-3">
          <div class="vehicles-progress-label on-the-way-text" style="width: 39.7%;">في المسار</div>
          <div class="vehicles-progress-label unloading-text" style="width: 28.3%;">تفريغ </div>
          <div class="vehicles-progress-label loading-text" style="width: 17.4%;">تحميل</div>
          <div class="vehicles-progress-label waiting-text" style="width: 14.6%;">انتظار</div>
        </div>
        <div class="vehicles-overview-progress progress rounded-2 mb-3" style="height: 46px;">
          <div class="progress-bar fs-big fw-medium text-start bg-lighter text-body px-1 px-lg-3 rounded-start shadow-none" role="progressbar" style="width: 39.7%" aria-valuenow="39.7" aria-valuemin="0" aria-valuemax="100">39.7%</div>
          <div class="progress-bar fs-big fw-medium text-start bg-primary px-1 px-lg-3 shadow-none" role="progressbar" style="width: 28.3%" aria-valuenow="28.3" aria-valuemin="0" aria-valuemax="100">28.3%</div>
          <div class="progress-bar fs-big fw-medium text-start text-bg-info px-1 px-lg-3 shadow-none" role="progressbar" style="width: 17.4%" aria-valuenow="17.4" aria-valuemin="0" aria-valuemax="100">17.4%</div>
          <div class="progress-bar fs-big fw-medium text-start bg-gray-900 px-1 px-lg-3 rounded-end shadow-none" role="progressbar" style="width: 14.6%" aria-valuenow="14.6" aria-valuemin="0" aria-valuemax="100">14.6%</div>
        </div>
        <div class="table-responsive">
          <table class="table card-table">
            <tbody class="table-border-bottom-0">
              <tr>
                <td class="w-50 ps-0">
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-2">
                      <i class="bx bxs-truck"></i>
                    </div>
                    <h6 class="mb-0 fw-normal">في المسار</h6>
                  </div>
                </td>
                <td class="text-end pe-0 text-nowrap">
                  <h6 class="mb-0">2hr 10min</h6>
                </td>
                <td class="text-end pe-0">
                  <span class="fw-medium">39.7%</span>
                </td>
              </tr>
              <tr>
                <td class="w-50 ps-0">
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-2">
                      <i class='bx bx-down-arrow-circle'></i>
                    </div>
                    <h6 class="mb-0 fw-normal">تفريغ </h6>
                  </div>
                </td>
                <td class="text-end pe-0 text-nowrap">
                  <h6 class="mb-0">3hr 15min</h6>
                </td>
                <td class="text-end pe-0">
                  <span class="fw-medium">28.3%</span>
                </td>
              </tr>
              <tr>
                <td class="w-50 ps-0">
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-2">
                      <i class='bx bx-up-arrow-circle'></i>
                    </div>
                    <h6 class="mb-0 fw-normal">تحميل</h6>
                  </div>
                </td>
                <td class="text-end pe-0 text-nowrap">
                  <h6 class="mb-0">1hr 24min</h6>
                </td>
                <td class="text-end pe-0">
                  <span class="fw-medium">17.4%</span>
                </td>
              </tr>
              <tr>
                <td class="w-50 ps-0">
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-2">
                      <i class="bx bx-time-five"></i>
                    </div>
                    <h6 class="mb-0 fw-normal">انتظار</h6>
                  </div>
                </td>
                <td class="text-end pe-0 text-nowrap">
                  <h6 class="mb-0">5hr 19min</h6>
                </td>
                <td class="text-end pe-0">
                  <span class="fw-medium">14.6%</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--/ Vehicles overview -->
  <!-- Shipment statistics-->
  <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">احصائيا الشحن</h5>
          <small class="text-muted">العدد الكلي للتسليم 23.8k</small>
        </div>
        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div id="shipmentStatisticsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Shipment statistics -->
  <!-- Delivery Performance -->

  <!--/ Delivery Performance -->
  <!-- Reasons for delivery exceptions -->

  <!--/ Reasons for delivery exceptions -->
  <!-- Orders by Countries -->

  <!--/ Orders by Countries -->
  <!-- On route vehicles Table -->
  <div class="col-12 order-5">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">الشاحنات</h5>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserLogistec"> +اضافة شاحنة </button>

      </div>
      <div class="card-datatable table-responsive">
        <table class="dt-route-vehicles table">
          <thead class="border-top">
            <tr>
              <th></th>
              <th>id</th>
              <th>رقم اللوحة</th>
              <th>رقم الشاسيه  </th>
              <th>نوع السيارة </th>
              <th>اللون</th>
              <th> ارتفاع السيارة </th>
              <th>طول السيارة</th>
              <th>سنة الصنع </th>
              <th>حالة السيارة</th>
              <th>الاجرائات </th>


            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<!--/ On route vehicles Table -->
@include('_partials/_modals/modal-car-logistec')

@endsection
