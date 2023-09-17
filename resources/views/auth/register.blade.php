@extends('layout.guest')

@section('content')
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <div class="card-body p-4">
                        <h1>Register</h1>
                        <p class="text-medium-emphasis">Create your account</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf <!-- Include the CSRF token -->

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg>
                                </span>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text"
                                    name="name"
                                    placeholder="Username"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                >
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                    </svg>
                                </span>
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                    </svg>
                                </span>
                                <input
                                    class="form-control @error('password') is-invalid @enderror"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required
                                >
                            </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                    </svg>
                                </span>
                                <input
                                    class="form-control"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Repeat password"
                                    required
                                >
                            </div>

                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                            @if (Route::has('login'))
                            <a class="btn btn-link px" href="{{ route('login') }}">
                                {{ __('Already Registered? Login Now!') }}
                            </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
