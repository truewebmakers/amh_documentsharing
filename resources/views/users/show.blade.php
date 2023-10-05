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
            <div class="card-header">Show User</div>
            <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                


                <div class="row">
                    <div class="container mb-5">


                        <div class="avatar-upload">
                            
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    @if (auth()->user()->profile_pic) style="background-image: url('{{ env('AWS_PUBLIC_PATH') . 'profile/' . auth()->user()->profile_pic }}');"
                                @else 
                                    style="background-image: url('/assets/img/avatars/8.jpg');" @endif>
                                </div>
                            </div>
                        </div>
                    </div>
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


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $user->phone }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alternative Phone:</strong>
                            {{ $user->alternative_phone }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Name:</strong>
                            {{ $user->company_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Address:</strong>
                            {{ $user->company_address }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Street Address:</strong>
                            {{ $user->street_address }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Suburb:</strong>
                            {{ $user->suburb }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>State:</strong>
                            {{ $user->state }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>City:</strong>
                            {{ $user->city }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Post Code:</strong>
                            {{ $user->post_code }}
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Australian Business Number:</strong>
                            {{ $user->australian_bussiness_number }}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Number of Employees 
                                :</strong>
                            {{ $user->number_of_emp }}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Estimated Annual Revenue:</strong>
                            {{ $user->estimated_anunal_revenue }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Date of Establishment:</strong>
                            {{ $user->date_of_est }}
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Business Type :</strong>
                            {{ $user->bussiness_type }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Business Category:</strong>
                            {{ $user->bussiness_category }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>website url:</strong>
                            {{ $user->website_url }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Service hours:</strong>
                            {{ $user->service_hour }}
                        </div>
                    </div>

 
                </div>
            </div>
        </div>
            </div>
            @endsection
