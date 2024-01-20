<x-web-layout title="User Edit">
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
                    <h5 class="mb-0">User Profile</h5>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Edit</li>
                        </ul>
                    </nav>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
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
                                                    <img class="avatar-40 rounded"
                                                        src="{{asset('assets/images/user.jpg')}}" alt="">
                                                </div>
                                                @if ($item->status == 'Approved')
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Ruangan telah di Approve BAAK</h6>
                                                    <small
                                                        class="float-right font-size-12">{{$item->updated_at}}</small>
                                                </div>
                                                @elseif($item->status == 'Rejected')
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Ruangan di Rejected BAAK</h6>
                                                    <small
                                                        class="float-right font-size-12">{{$item->updated_at}}</small>
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
                                            <a class="bg-primary iq-sign-btn" href="{{route('logout')}}"
                                                role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
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
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-edit-list-data">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Personal Information</h4>
                                        </div>
                                    </div>
                                    <form action="{{url('user/update')}}" method="POST" enctype="multipart/form-data">
                                        @method("POST")
                                        @csrf
                                        <div class="iq-card-body">
                                            <div class="form-group row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="profile-img-edit">
                                                        <img class="profile-pic" src="" alt="profile-pic">
                                                        <div class="p-image">
                                                            <i class="ri-pencil-line upload-button"></i>
                                                            <input class="file-upload" type="file" accept="image/*"
                                                                name="picture" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="iq-card-body">
                                                <div class="form-group">
                                                    <label for="cpass">Name:</label>
                                                    <input type="text" class="form-control" id="cpass" name="name"
                                                        value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="npass">Username:</label>
                                                    <input type="text" class="form-control" id="npass" name="username"
                                                        value="">
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="vpass">Verify Password:</label>
                                                    <input type="Password" class="form-control" id="vpass"
                                                        name="verif_password" value="">
                                                </div> --}}
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2022 <a href="#">Booksto</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</x-web-layout>