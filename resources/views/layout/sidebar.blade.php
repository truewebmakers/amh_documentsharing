<style>
.sidebar-brand.d-none.d-md-flex img {
    height: 70px;
    width: 160px;
    margin: 10px;
}


</style>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <img src="/assets/img/amh-logo.png">
     
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      
      <li class="nav-title"></li>
      @canany('user-management-access')
      <li 
      class="{{ ( 
         Route::currentRouteName() == 'permissions.index' 
      || Route::currentRouteName() == 'permissions.edit' 
      || Route::currentRouteName() == 'permissions.create' 
      || Route::currentRouteName() == 'roles.index' 
      || Route::currentRouteName() == 'roles.edit' 
      || Route::currentRouteName() == 'roles.create'
      || Route::currentRouteName() == 'roles.show'
      || Route::currentRouteName() == 'users.index' 
      || Route::currentRouteName() == 'users.edit' 
      || Route::currentRouteName() == 'users.create'
      || Route::currentRouteName() == 'users.show'

       
      
      ) ? 'nav-group show' : 'nav-group' }}"
       
      >
        
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg> User Management</a>
        <ul class="nav-group-items">
          
          <li class="nav-item">
            <a class="{{ ( Route::currentRouteName() == 'users.index' 
            || Route::currentRouteName() == 'users.edit' 
            || Route::currentRouteName() == 'users.create' 
            || Route::currentRouteName() == 'users.show' 

            ) ? 'nav-link active' : 'nav-link' }}"
             href="{{ route('users.index') }}">
              <span class="nav-icon"></span> Manage User</a>
          </li>
           
          <li class="nav-item">
            <a class="{{ ( Route::currentRouteName() == 'roles.index' 
            || Route::currentRouteName() == 'roles.edit' 
            || Route::currentRouteName() == 'roles.create'
            || Route::currentRouteName() == 'roles.show'

            ) ? 'nav-link active' : 'nav-link' }}"
             href="{{ route('roles.index') }}">
              <span class="nav-icon"></span> Manage Role</a>
          </li>

          {{-- <li class="nav-item">
            <a class="{{ ( Route::currentRouteName() == 'permissions.index' 
            || Route::currentRouteName() == 'permissions.edit' 
            || Route::currentRouteName() == 'permissions.create' ) 
            ? 'nav-link active' : 'nav-link' }}"
             href="{{ route('permissions.index') }}">
              <span class="nav-icon"></span> Manage Permission</a>
          </li> --}}
           
        </ul>
      </li>
      @endcanany


      {{-- Upload Documents --}}

      <li 
      class="{{ ( 
         Route::currentRouteName() == 'document.index' 
      || Route::currentRouteName() == 'document.edit' 
      || Route::currentRouteName() == 'document.create'  

       
      
      ) ? 'nav-group show' : 'nav-group' }}"
       
      >
        
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
          </svg> Documents </a>
        <ul class="nav-group-items">
          
          <li class="nav-item">
            <a class="{{ ( 
               
             Route::currentRouteName() == 'document.edit' 
            // || Route::currentRouteName() == 'document.create' 
            || Route::currentRouteName() == 'document.show' 

            ) ? 'nav-link active' : 'nav-link' }}"
             href="{{ route('document.create') }}">
              <span class="nav-icon"></span> Send</a>
          </li>

          <li class="nav-item">
            <a class="{{ (Route::currentRouteName() == 'document.index' ) ? 'nav-link active' : 'nav-link' }}"
             href="{{ route('document.index') }}">
              <span class="nav-icon"></span> Explore </a>
          </li>
           
           
        </ul>
      </li>

      <li class="nav-item"><a class="{{ (Route::currentRouteName() == 'profile.edit' ) ? 'nav-link active' : 'nav-link' }}" href="{{ route('profile.edit') }}">
        <svg class="nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
        </svg> Profile </a></li>


      
      
     
      
    </ul>
    {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
  </div>