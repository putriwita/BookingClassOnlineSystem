<x-admin-layout title="Dashboard">
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
                        <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span
                                class="ripple rippleEffect"></span><i class="ri-admin-line"></i><span>Admin</span><i
                                class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                            <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a
                                    href="{{route('admin.dashboard.index')}}"><i
                                        class="ri-dashboard-line"></i>Dashboard</a></li>
                            <li><a href="{{route('admin.listrequest.index')}}"><i class="ri-list-check-2"></i>Request
                                    Lists</a></li>
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
                                @if (\App\Models\Booking::count() !== 0)
                                <span class="bg-primary dots"></span>
                                @endif
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white">All Notifications</h5>
                                        </div>
                                        @foreach(\App\Models\Booking::all() as $item)
                                        <a href="{{route('admin.listrequest.index')}}" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    @if(Auth::user()->picture)
                                                    <img src="{{asset('assets/images/'. Auth::user()->picture)}}"
                                                        class="avatar-40 rounded" alt="user">
                                                    @else
                                                    <img src="{{asset('assets/images/user.jpg')}}"
                                                        class="avatar-40 rounded" alt="user">
                                                    @endif
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">{{$item->user->name}}</h6>
                                                    <small
                                                        class="float-right font-size-12">{{$item->created_at}}</small>

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
                                <img src="{{asset('assets/images/user.jpg')}}" class="img-fluid rounded-circle mr-3"
                                    alt="user">
                                <div class="caption">
                                    <h6 class="mb-1 line-height">{{Auth::guard('admin')->user()->name}}</h6>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello
                                                {{Auth::guard('admin')->user()->name}}</h5>
                                            <span class="text-white font-size-12">Available</span>
                                        </div>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="bg-primary iq-sign-btn" href="{{route('admin.logout')}}"
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
    <!-- TOP Nav Bar END -->
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                                <div class="text-left ml-3">
                                    <h2 class="mb-0"><span class="counter">{{$TotalUser}}</span></h2>
                                    <h5 class="">Users</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                                <div class="text-left ml-3">
                                    <h2 class="mb-0"><span class="counter">{{$AllBooking}}</span></h2>
                                    <h5 class="">Request Room</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Generate</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <div class="row justify-content-between">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="user_list_datatable_info" class="dataTables_filter">
                                            <form class="mr-3 position-relative">
                                                <div class="form-group mb-0">
                                                    <form action="" method="GET">
                                                        <input type="search" name="search" onkeyup="load_list(1);"
                                                            class="form-control" id="search" placeholder="Search"
                                                            aria-controls="user-list-table">
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th width="">No</th>
                                                <th width="">Nama</th>
                                                <th width="">Prodi</th>
                                                <th width="">NIM</th>
                                                <th width="">Ruangan</th>
                                                <th width="">Tanggal</th>
                                                <th width="">Jam Mulai</th>
                                                <th width="">Jam Selesai</th>
                                                <th width="">Status</th>
                                                <th width="">Description</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        {{-- @foreach($listrequest as $index=> $item)
                                        <tr>
                                            <td>{{$index + $listrequest->firstItem()}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->user->prodi}}</td>
                                            <td>{{$item->user->nim}}</td>
                                            <td>{{\App\Models\Room::where('id', $item->room_id)->first()->name}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->date)->translatedFormat('d/M/Y')}}</td>
                                            <td>{{$item->start}}</td>
                                            <td>{{$item->end}}</td>
                                            @if($item->status == 'Pending')
                                            <td>
                                                <div class="badge badge-pill badge-success">{{$item->status}}</div>
                                            </td>
                                            @elseif($item->status == 'Approved')
                                            <td>
                                                <div class="badge iq-bg-primary">{{$item->status}}</div>
                                            </td>
                                            @elseif($item->status == 'Rejected')
                                            <td>
                                                <div class="badge iq-bg-danger">{{$item->status}}</div>
                                            </td>
                                            @endif
                                            <td>{{$item->description}}</td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- {{$listrequest->links()}} --}}
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
                    Copyright 2020 <a href="#">Buchungsklasse</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    @section('custom_js')
    <script>
        $(document).ready( function () {
            $('#user-list-table').DataTable({      
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.dashboard.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user_name', name: 'user_name' },
                    { data: 'user_prodi', name: 'user_prodi' },
                    { data: 'user_nim', name: 'user_nim' },
                    { data: 'room_name', name: 'room_name' },
                    { data: 'date', name: 'date' },
                    { data: 'start', name: 'start' },
                    { data: 'end', name: 'end' },
                    { data: 'status', name: 'status' },
                    { data: 'description', name: 'description' },
                ]
            });
        } )
    </script>
    @endsection

</x-admin-layout>