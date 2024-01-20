<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html" class="header-logo">
          <img src="{{asset('assets/images/fav.jpeg')}}" class="img-fluid rounded-normal" alt="">
          <div class="logo-title">
            <span class="text-primary text-uppercase" style="font-size: 15px;">Buchungsklasse</span>
          </div>
       </a>
       <div class="iq-menu-bt-sidebar">
          <div class="iq-menu-bt align-self-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="active active-menu">
                <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="ri-admin-line"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                   <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a href="{{route('admin.dashboard.index')}}"><i class="ri-dashboard-line"></i>Dashboard</a></li>
                   <li><a href="{{route('admin.listrequest.index')}}"><i class="ri-list-check-2"></i>Request Lists</a></li>
                </ul>
             </li>
          </ul>
       </nav>
    </div>
 </div>
 <!-- TOP Nav Bar -->
 <div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-menu-bt d-flex align-items-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
             <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="index.html" class="header-logo">
                   <img src="{{asset('assets/images/fav.jpeg')}}" class="img-fluid rounded-normal" alt="">
                   <div class="logo-title">
                      <span class="text-primary text-uppercase">Buchungsklasse</span>
                   </div>
                </a>
             </div>
          </div>
          <div class="navbar-breadcrumb">
             <h5 class="mb-0">Dashboard</h5>
             <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                </ul>
             </nav>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
          <i class="ri-menu-3-line"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto navbar-list">
                <li class="nav-item nav-icon search-content">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                      <i class="ri-search-line"></i>
                   </a>
                   <form action="#" class="search-box p-0">
                      <input type="text" class="text search-input" placeholder="Type here to search...">
                      <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                   </form>
                </li>
                <li class="nav-item nav-icon">
                   <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                   <i class="ri-notification-2-line"></i>
                   @if (\App\Models\Booking::count() !== 0)
                   <span class="bg-primary dots"></span>
                   @endif
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">{{ \App\Models\Booking::count()}}</small></h5>
                            </div>
                            @foreach(\App\Models\Booking::all() as $item)
                            <a href="{{route('admin.listrequest.index')}}" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{asset('assets/images/user.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">{{$item->user->name}}</h6>
                                     <small class="float-right font-size-12">{{$item->created_at}}</small>
                                  </div>
                               </div>
                            </a>
                            @endforeach
                         </div>
                      </div>
                   </div>
                </li>
                <li class="line-height pt-3">
                   <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                      <img src="{{asset('assets/images/user.jpg')}}" class="img-fluid rounded-circle mr-3" alt="user">
                      <div class="caption">
                         <h6 class="mb-1 line-height">{{Auth::guard('admin')->user()->name}}</h6>
                      </div>
                   </a>
                   <div class="iq-sub-dropdown iq-user-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white line-height">Hello {{Auth::guard('admin')->user()->name}}</h5>
                               <span class="text-white font-size-12">Available</span>
                            </div>
                            <div class="d-inline-block w-100 text-center p-3">
                               <a class="bg-primary iq-sign-btn" href="{{route('admin.logout')}}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
             </ul>
          </div>
       </nav>
    </div>
 </div>
 <!-- TOP Nav Bar END -->