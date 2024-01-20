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
                    <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span
                            class="ripple rippleEffect"></span><i
                            class="las la-home iq-arrow-left"></i><span>Dashboard</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                        <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a
                                href="{{route('dashboard.index')}}"><i class="las la-house-damage"></i>Home Page</a>
                        </li>
                        <li class="{{request()->is('booking') ? 'active' : ''}}"><a href="{{route('booking.index')}}"><i
                                    class="bi bi-clock-history"></i>History</a></li>
                        <li class="{{request()->is('dataruangan') ? 'active' : ''}}"><a
                                href="{{route('dataruangan.index')}}"><i class="bi bi-card-list"></i>Data Ruangan</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
               <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
               <ul id="userinfo" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                   <li><a href="profile.html"><i class="las la-id-card-alt"></i>User Profile</a></li>
                   <li class="{{request()->is('user') ? 'active' : ''}}"><a href="{{route('user.index')}}"><i
                        class="las la-edit"></i>User Edit</a></li>
                <li><a href="add-user.html"><i class="las la-plus-circle"></i>User Add</a></li>
                <li><a href="user-list.html"><i class="las la-th-list"></i>User List</a></li>
            </ul>
            </li> --}}
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
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                    </ul>
                </nav>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
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
                            @if (\App\Models\Booking::count() == 'Approved' && 'Rejected')
                            <span class="bg-primary dots"></span>
                            @endif
                        </a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">All Notifications</h5>
                                    </div>
                                    @php
                                    $Bookings = \App\Models\Booking::where('user_id',
                                    Auth::guard('web')->user()->id)->get()
                                    @endphp
                                    @foreach($Bookings as $item)
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{asset('assets/images/user.jpg')}}"
                                                    alt="">
                                            </div>
                                            @if ($item->status == 'Approved')
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Ruangan telah di Approve BAAK</h6>
                                                <small class="float-right font-size-12">{{$item->updated_at}}</small>
                                            </div>
                                            @elseif($item->status == 'Rejected')
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Ruangan di Rejected BAAK</h6>
                                                <small class="float-right font-size-12">{{$item->updated_at}}</small>
                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                            @if(Auth::user()->picture)
                            <img src="{{asset('assets/images/'. Auth::user()->picture)}}"
                                class="img-fluid rounded-circle mr-3" alt="user">
                            @else
                            <img src="{{asset('assets/images/user.jpg')}}" class="img-fluid rounded-circle mr-3"
                                alt="user">
                            @endif
                            <div class="caption">
                                <h6 class="mb-1 line-height">{{Auth::guard('web')->user()->name}}</h6>
                            </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white line-height">Hello
                                            {{Auth::guard('web')->user()->name}}</h5>
                                        <span class="text-white font-size-12">{{Auth::user()->nim}} -
                                            {{Auth::user()->prodi}}</span>
                                    </div>
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">My Profile</h6>
                                                <p class="mb-0 font-size-12">View personal profile details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('user.index')}}" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                <p class="mb-0 font-size-12">Modify your personal details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-account-box-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Account settings</h6>
                                                <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-lock-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Privacy Settings</h6>
                                                <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a class="bg-primary iq-sign-btn" href="{{route('logout')}}" role="button">Sign
                                            out<i class="ri-login-box-line ml-2"></i></a>
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