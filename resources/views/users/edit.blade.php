@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="action-top float-end mb-3">
                            <a class="btn btn-outline-primary" href="{{ route('users.index') }}"> <i
                                    class="bi bi-skip-backward-circle me-1"></i> Back</a>
                        </div>

                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User </h5>

                            {!! Form::model($user, ['class' => 'row g-3', 'method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">Name</span>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">Email</span>
                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">Password</span>
                                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">C.Password</span>
                                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">Roles</span>
                                    <select class="form-control" name="roles[]">
                                        @foreach ($roles as $role)
                                            <option @if ($userRole == $role) selected @endif
                                                value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>




                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </div>




                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        @endsection



        @section('page-script')
        @endsection
