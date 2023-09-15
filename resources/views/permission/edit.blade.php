@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="action-top float-end mb-3">
                            <a class="btn btn-outline-primary" href="{{ route('permissions.index') }}"> <i
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
                        <div class="card-header">Create Permission</div>
                        <div class="card-body">



                            {!! Form::model($permission, [
                                'method' => 'PATCH',
                                'class' => 'row g-3',
                                'route' => ['permissions.update', $permission->id],
                            ]) !!}
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary mt-5 ">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endsection
