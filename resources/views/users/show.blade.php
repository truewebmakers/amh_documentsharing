@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                
                <div class="float-end mb-2">
                    <a class="btn btn-outline-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Show Permission</div>
            <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge bg-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
            </div>
            @endsection
