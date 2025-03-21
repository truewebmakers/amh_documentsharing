<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button><a class="header-brand d-md-none" href="#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="/assets/brand/coreui.svg#full"></use>
                </svg></a>
           <!--  <ul class="header-nav d-none d-md-flex">
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
            </ul> -->
            <ul class="header-nav ms-auto">
                <li class="nav-item">
                    {{(Auth::check())  ? Auth()->user()->name : '' }} <br>
                    <span class="badge  badge-success">
                        {{ (Auth::check()) ? Auth()->user()->roles->first()->name: '' }}
                    </span>

                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="#">
                        <svg class="icon icon-lg">
                            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                        </svg></a></li>
                <li class="nav-item"><a class="nav-link" href="#">
                        <svg class="icon icon-lg">
                            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                        </svg></a></li>
                <li class="nav-item"><a class="nav-link" href="#">
                        <svg class="icon icon-lg">
                            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                        </svg></a></li> --}}
            </ul>
            <ul class="header-nav ms-3">
                <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">

                        <div class="avatar avatar-md">
                            @if (auth()->user()->profile_pic)
                                <img class="avatar-img"
                                    src="{{ env('AWS_PUBLIC_PATH') . 'profile/' . auth()->user()->profile_pic }}"
                                    alt="user@email.com">
                            @else
                                <img class="avatar-img" src="/assets/img/avatars/8.jpg" alt="user@email.com">
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        {{-- <div class="dropdown-header bg-light py-2">
                            <div class="fw-semibold">Account</div>
                        </div> --}}
                        {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a
                            class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                            </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a
                            class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                            </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a
                            class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                            </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a> --}}
                        <div class="dropdown-header bg-light py-2">
                            <div class="fw-semibold">Settings</div>
                        </div><a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg> Profile</a>
                            {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                            </svg> Settings</a> --}}
                            
                            {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                            </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span>
                            </a> --}}
                        {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                            </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a> --}}

                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                            </svg> Lock Account</a> --}}
                        <a class="dropdown-item"href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <svg class="icon me-2">
                                <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                            </svg> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- <div class="header-divider"></div> -->
        <!-- <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                         <span>Home</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Dashboard</span></li>
                </ol>
            </nav>
        </div> -->
    </header>
