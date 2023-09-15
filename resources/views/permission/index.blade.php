@extends('layout.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="action-top float-end mb-3">
                            <a class="btn btn-outline-primary" href="{{ route('permissions.create') }}"> <i
                                    class="bi bi-plus me-1"></i> New Permission</a>
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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Permission Management</h5>

                        <table class="datatable table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <!-- <a class="btn btn-info" href="{{ route('permissions.show', $permission->id) }}">Show</a> -->

                                            <a class="btn btn-primary"
                                                href="{{ route('permissions.edit', $permission->id) }}">Edit</a>

                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['permissions.destroy', $permission->id],
                                                'style' => 'display:inline',
                                            ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>

@endsection
