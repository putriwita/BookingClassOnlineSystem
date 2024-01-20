<x-web-layout title="Booking">
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
                    <h5 class="mb-0">History</h5>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Request Class</li>
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
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"><i class="bi bi-clock-history"></i> History</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('booking.request')}}" class="btn btn-primary">Add New Request Room</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="data-tables table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ruangan</th>
                                            <th>Tanggal</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($AllBooking as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\App\Models\Room::where('id', $item->room_id)->first()->name}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->start}}</td>
                                            <td>{{$item->end}}</td>
                                            <td>{{$item->description}}</td>
                                            @if($item->status == 'Pending')
                                            <td>
                                                <div class="badge badge-pill badge-success">{{$item->status}}</div>
                                            </td>
                                            @elseif($item->status == 'Approved')
                                            <td>
                                                <div class="badge badge-pill badge-success">{{$item->status}}</div>
                                            </td>
                                            @elseif($item->status == 'Rejected')
                                            <td>
                                                <div class="badge badge-pill badge-danger">{{$item->status}}</div>
                                            </td>
                                            @endif
                                            <td>
                                                @if($item->status == 'Pending')
                                                {{-- @if($item) --}}
                                                <form action="{{route('booking.edit', $item->id)}}" method="PATCH">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"><i
                                                            class="ri-pencil-line"></i></button>
                                                </form>
                                                <form action="{{route('booking.destroy', $item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="ri-delete-bin-line"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    Copyright 2022 <a href="#">Buchungsklasse</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</x-web-layout>