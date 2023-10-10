@extends('layout.app')

@section('content')
     <style>
        span.reqfield {
    color: red;
}
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Update Profile') }}</div>


                    <div class="card-body">




                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="container">


                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="profile_pic" accept=".png, .jpg, .jpeg"
                                            value="" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            @if (auth()->user()->profile_pic) style="background-image: url('{{ env('AWS_PUBLIC_PATH') . 'profile/' . auth()->user()->profile_pic }}');"
                                        @else 
                                            style="background-image: url('/assets/img/avatars/8.jpg');" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span class="reqfield">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address <span class="reqfield">*</span> </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                            required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone <span class="reqfield">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                                            required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="alternative_phone" class="form-label">Alternative Phone</label>
                                        <input type="text" class="form-control @error('alternative_phone') is-invalid @enderror"
                                            id="alternative_phone" name="alternative_phone" value="{{ old('alternative_phone', auth()->user()->alternative_phone) }}"
                                            >
                                        @error('alternative_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror"
                                            id="company_name" name="company_name"
                                            value="{{ old('company_name', auth()->user()->company_name) }}" >
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_address" class="form-label">Company Address</label>
                                        <input type="text" class="form-control @error('company_address') is-invalid @enderror"
                                            id="name" name="company_address"
                                            value="{{ old('company_address', auth()->user()->company_address) }}" >
                                        @error('company_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                

                               
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City <span class="reqfield">*</span> </label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city"
                                            value="{{ old('city', auth()->user()->city) }}" >
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror"
                                            id="state" name="state"
                                            value="{{ old('state', auth()->user()->state) }}" >
                                        @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="suburb" class="form-label">suburb</label>
                                        <input type="text" class="form-control @error('suburb') is-invalid @enderror"
                                            id="suburb" name="suburb"
                                            value="{{ old('suburb', auth()->user()->suburb) }}" >
                                        @error('suburb')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_address" class="form-label">Post Code</label>
                                        <input type="text" class="form-control @error('post_code') is-invalid @enderror"
                                            id="post_code" name="post_code"
                                            value="{{ old('post_code', auth()->user()->post_code) }}" >
                                        @error('post_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>

                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="number_of_emp" class="form-label">Number of Employees</label>
                                        <input type="text" class="form-control @error('number_of_emp') is-invalid @enderror"
                                            id="number_of_emp" name="number_of_emp"
                                            value="{{ old('number_of_emp', auth()->user()->number_of_emp) }}" >
                                        @error('number_of_emp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="estimated_anunal_revenue" class="form-label">Estimated Annual Revenue </label>
                                        <input type="text" class="form-control @error('estimated_anunal_revenue') is-invalid @enderror"
                                            id="estimated_anunal_revenue" name="estimated_anunal_revenue"
                                            value="{{ old('estimated_anunal_revenue', auth()->user()->estimated_anunal_revenue) }}" >
                                        @error('estimated_anunal_revenue')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="date_of_est" class="form-label">Date of Establishment</label>
                                        <input type="text" class="form-control @error('date_of_est') is-invalid @enderror"
                                            id="date_of_est" name="date_of_est"
                                            value="{{ old('date_of_est', auth()->user()->date_of_est) }}" >
                                        @error('date_of_est')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bussiness_type" class="form-label">Bussiness Type </label>
                                        <input type="text" class="form-control @error('bussiness_type') is-invalid @enderror"
                                            id="bussiness_type" name="bussiness_type"
                                            value="{{ old('bussiness_type', auth()->user()->bussiness_type) }}" >
                                        @error('bussiness_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bussiness_category" class="form-label">Bussiness Category</label>
                                        <input type="text" class="form-control @error('bussiness_category') is-invalid @enderror"
                                            id="bussiness_category" name="bussiness_category"
                                            value="{{ old('bussiness_category', auth()->user()->bussiness_category) }}" >
                                        @error('bussiness_category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website_url" class="form-label">Website Url</label>
                                        <input type="text" class="form-control @error('website_url') is-invalid @enderror"
                                            id="website_url" name="website_url"
                                            value="{{ old('website_url', auth()->user()->website_url) }}" >
                                        @error('website_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="service_hour" class="form-label">Service Hours</label>
                                        <input type="text" class="form-control @error('service_hour') is-invalid @enderror"
                                            id="service_hour" name="service_hour"
                                            value="{{ old('service_hour', auth()->user()->service_hour) }}" >
                                        @error('service_hour')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_address" class="form-label">Australian Business Number                                         </label>
                                        <input type="text" class="form-control @error('australian_bussiness_number') is-invalid @enderror"
                                            id="australian_bussiness_number" name="australian_bussiness_number"
                                            value="{{ old('australian_bussiness_number', auth()->user()->australian_bussiness_number) }}" >
                                        @error('australian_bussiness_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website_url" class="form-label">Website Url</label>
                                        <input type="text" class="form-control @error('website_url') is-invalid @enderror"
                                            id="website_url" name="website_url"
                                            value="{{ old('website_url', auth()->user()->website_url) }}" required>
                                        @error('website_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            



                            <button type="submit" class="btn btn-primary">Update Profile</button>

                             
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);

                }
                // $('#imageUpload').val(input.files[0]);
                reader.readAsDataURL(input.files[0]);

            }
        }
        $("#imageUpload").change(function() {

            readURL(this);

        });

       
    </script>
@endsection
