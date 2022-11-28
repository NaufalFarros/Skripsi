 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href=" {{ url('/admin') }} " class="brand-link">
         <img src="{{asset('image/udangfix.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Udang Pazi Jaya</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                
               
                <img class="profile-user-img img-fluid img-circle"
                src="{{ '/storage/avatars/'.Auth::user()->profile_image }}" alt="">
                
                 
                     
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{Auth::user()->name}}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href=" {{ url('/admin') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 {{-- @if (Auth::user()->role == 'admin')                     --}}
                 <li class="nav-item">

                     <a href="{{url('admin/datasensor')}}" class="nav-link">

                        <i class="fas fa-list"></i>                         <p>
                             Data Sensor
                         </p>
                     </a>
                 </li>
                 {{-- @endif --}}
                 <li class="nav-item">

                    <a href="{{url('admin/tabelsensor')}}" class="nav-link">

                        <i class="fas fa-calendar-alt"></i>
                        <p>
                            Tabel Data Sensor
                        </p>
                    </a>
                </li>


                 {{-- <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="fas fa-money-bill-alt"></i>
                         <p>
                             Transaksi Donasi
                         </p>
                     </a>
                 </li> --}}

               





                   <li class="nav-item">
                     <a href="{{url('admin/profile')}}" class="nav-link">
                         <i class="fas fa-user-cog"></i>
                         <p>
                             Profile Setting
                         </p>
                     </a>
                 </li>



                 <li class="nav-item">
                         <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             <i class="fas fa-sign-out-alt"></i>
                             {{ __('Logout') }}

                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                 </li>




         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
