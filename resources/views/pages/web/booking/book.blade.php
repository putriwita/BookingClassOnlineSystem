<x-web-layout title="Request">
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid checkout-content">
           <div class="row">
              <div class="col-sm-12">
                  @if ($data->id)
                  <form action="{{route('booking.update', $data->id)}}" method="POST">
                    @method("PATCH")
                    @else
                <form action="{{route('booking.store')}}" method="POST">
                    @endif
                    @csrf
                 <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                       <div class="iq-header-title">
                            <h4 class="card-title">Request Class</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <fieldset>
                                    <input name="tanggal" type="date" class="form-control" id="date" required="" value="{{$data->tanggal}}">
                                </fieldset>
                            </div>
                            <div class="col-sm-3">
                                <fieldset>
                                    <input name="jam_mulai" type="time" class="form-control" id="time" required="" value="{{$data->jam_mulai}}">
                                </fieldset>
                            </div>
                            <p>To</p>
                            <div class="col-sm-3">
                                <fieldset>
                                    <input name="jam_selesai" type="time" class="form-control" id="time" required="" value="{{$data->jam_selesai}}">
                                </fieldset>
                            </div>
                            <div class="col-sm-12" value="{{$data->gd}}">
                               <label for="exampleFormControlSelect1"></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="gd" required>
                                  <option>Pilih Ruangan</option>
                                  <option>GD 923</option>
                                  <option>GD 925</option>
                                  <option>GD 928</option>
                                  <option>GD 513</option>
                                  <option>GD 516</option>
                                  <option>GD 525</option>
                                  <option>GD 527</option>
                                  <option>GD 711</option>
                                  <option>GD 712</option>
                                  <option>GD 714</option>
                                  <option>GD 721</option>
                                  <option>GD 723</option>
                                  <option>GD 726</option>
                                </select>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                            <div class="col-sm-12" value="{{$data->keterangan}}">
                                <fieldset>
                                    <textarea name="keterangan" rows="5" class="form-control" id="message" placeholder="Notes" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-sm-12">
                                <fieldset>
                                    <center><button type="submit" class="btn btn-primary">Request</button></center>
                                </fieldset>
                            </div>
                          </div>
                       </div>
                    </div>
                 </div>
                </form>
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
              Copyright 2020 <a href="#">Booksto</a> All Rights Reserved.
           </div>
        </div>
     </div>
  </footer>
</x-web-layout>