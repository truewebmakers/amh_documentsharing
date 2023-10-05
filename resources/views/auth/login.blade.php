@extends('layout.guest')

@section('content')
<style>
    .toggle-password {
    float: right;
    cursor: pointer;
    margin-right: 10px;
    margin-top: -25px;
}
.tg {
    position: absolute;
    top: 35px;
    right: 0;
    z-index: 99999;
}
</style>

    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
				<div class="main-login">
				<div class="a text-center">
				    <img src="/assets/img/amh-logo.png" style="height:70px; width:100px;" >		
				</div>
				<div class="b">
				 <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
				</div>
				
				</div>
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf <!-- Include the CSRF token -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" placeholder="Email" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                                                </use>
                                            </svg>
                                        </span>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                                            name="password" placeholder="Password" required id="password">
 
                                            {{-- --}}
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="tg">
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end d-none">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link px" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5 d-none">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                        @if (Route::has('register'))
                                        <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">
                                            {{ __('Register Now!') }}
                                        </a>
                                    @endif
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
