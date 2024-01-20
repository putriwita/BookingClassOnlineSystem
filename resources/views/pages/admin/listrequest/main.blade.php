<x-admin-layout title="Request List">
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
                    <h5 class="mb-0">Request List</h5>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Request List</li>
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
                                            <h5 class="mb-0 text-white">All Notifications<small
                                                    class="badge  badge-light float-right pt-1">{{ \App\Models\Booking::count()}}</small>
                                            </h5>
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
                                            {{-- <span class="text-white font-size-12">{{Auth::user()->nim}} -
                                            {{Auth::user()->prodi}}</span> --}}
                                        </div>
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
                                <h4 class="card-title">Request</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="data-tables table table-striped table-bordered" style="width:100%">
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
                                            <th width="">Description</th>
                                            <th width="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listrequest as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->user->prodi}}</td>
                                            <td>{{$item->user->nim}}</td>
                                            <td>{{\App\Models\Room::where('id', $item->room_id)->first()->name}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->start}}</td>
                                            <td>{{$item->end}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>
                                                <form action="{{ route('admin.listrequest.approved',$item->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Approved">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.listrequest.rejected',$item->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Rejected">Rejected</button>
                                                </form>
                                                <form action="{{ route('admin.listrequest.destroy',$item->id)}}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Rejected">Edit</button>
                                                </form>
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
                    Copyright 2020 <a href="#">Buchungsklasse</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</x-admin-layout>