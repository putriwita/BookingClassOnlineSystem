<x-web-layout title="Dashboard">
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                </div>
                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h4 class="card-title mb-0">Browse Class</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                @foreach($rooms as $item)
                                @if($item->status == 'Ready')
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div
                                        class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                        <div class="iq-card-body p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                                            src="{{asset('/assets/images/gd/'. $item->image)}}"
                                                            alt=""></a>
                                                    <div class="view-book">
                                                        <a href="{{route('booking.create', $item->id)}}"
                                                            class="btn btn-sm btn-white">Request</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <h6 class="mb-1">{{$item->name}}</h6>
                                                        <p class="font-size-13 line-height mb-1">Status : <div
                                                                class="badge badge-pill badge-success">Ready</div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
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