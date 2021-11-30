<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link  rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->


    <!-- Topbar Navbar -->
    <ul class='{{ str_replace('_', '-',  session()->get('lang')) === "ar" ? "navbar-nav mr-auto": "navbar-nav ml-auto"}}'>

      {{-- Home page --}}
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="{{route('home')}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="home"  role="button">
          <i class="fas fa-home fa-fw"></i>
        </a>
      </li>

      <!-- Nav Item - Alerts -->
      <li class="nav-item dropdown no-arrow mx-1">
       @include('backend.notification.show')
      </li>

      <!-- Nav Item - Messages -->
      <li class="nav-item dropdown no-arrow mx-1" id="messageT" data-url="{{route('messages.five')}}">
        @include('backend.message.message')
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->name}}</span>
          @if(Auth()->user()->photo)
            <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
          @else
            <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
          @endif
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{route('admin-profile')}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="{{route('change.password.form')}}">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a>
          <a class="dropdown-item" href="{{route('settings')}}">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>

    </ul>
             <!--begin:: Languages -->
             <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-icon">
                        @php $locale = session()->get('lang'); @endphp
                        @switch($locale)
                        @case('fr')
                        <img class="" src="{{asset('assets/media/flags/195-france.svg')}}" alt="" />
                        @break
                        @case('ar')
                        <img class="" src="{{asset('assets/media/flags/144-algeria.svg')}}" alt="" />
                        @break
                        @default
                        <img class="" src="{{asset('assets/media/flags/144-algeria.svg')}}" alt="" />
                        @endswitch
                    </span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                        <li class="kt-nav__item kt-nav__item--active">
                            <a href="{{route('setlang','fr')}}" class="kt-nav__link">
                                <span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/195-france.svg')}}" alt="" /></span>
                            <span class="kt-nav__link-text">{{__('global.french')}}</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                        <a href="{{route('setlang','ar')}}" class="kt-nav__link">
                                <span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/144-algeria.svg')}}" alt="" /></span>
                                <span class="kt-nav__link-text">{{__('global.arabic')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--end:: Languages -->

  </nav>
