@extends('layout.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="action-top float-end mb-3"> 
            <a class="btn btn-outline-primary" href="{{ route('roles.index') }}"> <i class="bi bi-skip-backward-circle me-1"></i> Back</a>
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
            <div class="card-header">Edit Role</div>
            <div class="card-body">
             
             
              {!! Form::model($role, ['method' => 'PATCH', 'class' =>'row g-3' ,'route' => ['roles.update', $role->id]]) !!}
              
            
                 <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">Name</span>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                 </div>
                  
                </div>
               

                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">Permission</span>
                    <ul >
                    @foreach($permission as $value)
                        <li>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }} </li>
                    @endforeach
                    </ul>
                   
                 </div>
                  
                </div>
              

               
                
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              {!! Form::close() !!}
              <!-- End Browser Default Validation -->

            </div>
          </div>
    </div>


@endsection 