@php
  $currentRouteName = Route::currentRouteName();
  $activeRoutes = ['front-pages-pricing', 'front-pages-payment', 'front-pages-checkout', 'front-pages-help-center'];
  $activeClass = in_array($currentRouteName, $activeRoutes) ? 'active' : '';
@endphp
<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
      <!-- Menu logo wrapper: Start -->
      <div class="navbar-brand app-brand demo d-flex py-0 me-4">
        <!-- Mobile menu toggle: Start-->
        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
        </button>

      </div>
      <!-- Menu logo wrapper: End -->
      <!-- Menu wrapper: Start -->
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-x bx-sm"></i>
        </button>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium" aria-current="page" href="{{url('front-pages/landing')}}#landingHero">الصفحة الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{url('front-pages/landing')}}#landingFeatures">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{url('front-pages/landing')}}#landingTeam">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{url('front-pages/landing')}}#landingFAQ">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{url('front-pages/landing')}}#landingContact">Contact us</a>
          </li>
          <li class="nav-item mega-dropdown {{ $activeClass }}">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown mega-dropdown fw-medium" aria-expanded="false" data-bs-toggle="mega-dropdown" data-trigger="hover">
              <span>Pages</span>
            </a>
            <div class="dropdown-menu p-4">
              <div class="row gy-4">
                <div class="col-12 col-lg">
                  <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                    <div class="avatar avatar-sm flex-shrink-0 me-2">
                      <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-grid-alt'></i></span>
                    </div>
                    <span class="ps-1">Other</span>
                  </div>
                  <!-- add page slug in $activeRoutes array, defined Beginning of the page to add active class to the nav item -->
                  <ul class="nav flex-column">
                    <li class="nav-item {{ $currentRouteName === 'front-pages-pricing' ? 'active' : '' }}">
                      <a class="nav-link mega-dropdown-link" href="{{ url('front-pages/pricing') }}">
                        <i class='bx bx-radio-circle me-2'></i>
                        <span>Pricing</span>
                      </a>
                    </li>
                    <li class="nav-item {{ $currentRouteName === 'front-pages-payment' ? 'active' : '' }}">
                      <a class="nav-link mega-dropdown-link" href="{{ url('front-pages/payment') }}">
                        <i class='bx bx-radio-circle me-2'></i>
                        <span>Payment</span>
                      </a>
                    </li>
                    <li class="nav-item {{ $currentRouteName === 'front-pages-checkout' ? 'active' : '' }}">
                      <a class="nav-link mega-dropdown-link" href="{{ url('front-pages/checkout') }}">
                        <i class='bx bx-radio-circle me-2'></i>
                        <span>Checkout</span>
                      </a>
                    </li>
                    <li class="nav-item {{ $currentRouteName === 'front-pages-help-center' ? 'active' : '' }}">
                      <a class="nav-link mega-dropdown-link" href="{{ url('front-pages/help-center') }}">
                        <i class='bx bx-radio-circle me-2'></i>
                        <span>Help Center</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-lg">
                  <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                    <div class="avatar avatar-sm flex-shrink-0 me-2">
                      <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-lock-open'></i></span>
                    </div>
                    <span class="ps-1">Auth Demo</span>
                  </div>
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/login-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Login (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/login-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Login (Cover)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/register-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Register (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/register-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Register (Cover)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/register-multisteps')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Register (Multi-steps)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/forgot-password-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Forgot Password (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/forgot-password-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Forgot Password (Cover)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/reset-password-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Reset Password (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/reset-password-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Reset Password (Cover)
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-lg">
                  <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                    <div class="avatar avatar-sm flex-shrink-0 me-2">
                      <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-image-alt'></i></span>
                    </div>
                    <span class="ps-1">Other</span>
                  </div>
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/pages/misc-error')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Error
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/pages/misc-under-maintenance')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Under Maintenance
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/pages/misc-comingsoon')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Coming Soon
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/pages/misc-not-authorized')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Not Authorized
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/verify-email-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Verify Email (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/verify-email-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Verify Email (Cover)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/two-steps-basic')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Two Steps (Basic)
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mega-dropdown-link" href="{{url('/auth/two-steps-cover')}}" target="_blank">
                        <i class='bx bx-radio-circle me-2'></i>
                        Two Steps (Cover)
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                  <div class="bg-body nav-img-col p-2">
                    <img src="{{asset('assets/img/front-pages/misc/nav-item-col-img.png')}}" alt="nav item col image" class="w-100">
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            @php
                $roles = ['المشرف', 'إدارة طلبات الشحن'];
            @endphp
            @if (Auth::check())
              @if (Auth::user()->hasRole($roles))
              <a class="nav-link fw-medium" href="{{url('/dashboard/analytics')}}" target="_blank">إدارة الأعمال</a>
              @endif
            @endif
          </li>
          @if($configData['hasCustomizer'] == true)
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class='bx bx-sm'></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                    <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                    <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                    <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/Profile-PNG-Images.png') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              @if (Auth::check())
                <li>
                  <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/Profile-PNG-Images.png') }}" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-medium d-block">

                          {{ Auth::user()->name }}<br>
                          <small class="text-muted">{{ Auth::user()->getRoleNames()->first() }}</small>
                        </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                  </a>
                </li>
              @endif

                @if (Auth::check())
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-power-off me-2'></i>
                    <span class="align-middle">Logout</span>
                  </a>
                </li>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                  @csrf
                </form>
                @else
                <li>
                  <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : url('auth/login-basic') }}">
                    <i class='bx bx-log-in me-2'></i>
                    <span class="align-middle">Login</span>
                  </a>
                </li>
                @endif
              </ul>
          </li>
        <!-- Style Switcher -->
        </ul>
      </div>
      <div class="landing-menu-overlay d-lg-none"></div>
      <!-- Menu wrapper: End -->
      <!-- Toolbar: Start -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">

        <li>
          <!-- Mobile menu toggle: End-->
          <a href="{{url('front-pages/landing')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">SwiftShip
            </span>
            <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
          </a>
        </li>
      </ul>
      <!-- Toolbar: End -->
    </div>
  </div>
</nav>
<!-- Navbar: End -->
