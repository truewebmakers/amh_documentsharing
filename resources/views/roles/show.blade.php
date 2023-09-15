@extends('layout.app')


@section('content')

    <div class="container">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                     
                    <div class="float-end mb-2">
                        <a class="btn btn-outline-primary" href="{{ route('roles.index') }}"> Back</a>
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
                                        {{ $role->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permissions:</strong>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <label class="label label-success">{{ $v->name }},</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @endsection
