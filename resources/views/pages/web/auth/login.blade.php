<x-auth-layout title="Login">
    <div class="container p-0">
        <div class="row no-gutters height-self-center">
          <div class="col-sm-12 align-self-center page-content rounded">
            <div class="row m-0">
              <div class="col-sm-12 sign-in-page-data">
                  <div class="sign-in-from bg-primary rounded">
                      <div>
                        <center><img src="{{asset('assets/images/login.png')}}" width="200px"></center>
                      </div>
                      <p class="text-center text-white">Enter your email address and password to access admin panel.</p>
                      <form class="mt-4 form-text" action="{{route('auth.login')}}" method="post">
                        @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" name="username" class="form-control mb-0" id="exampleInputEmail1" placeholder="Username">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <a href="#" class="float-right text-dark">Forgot password?</a>
                              <input type="password" name="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <div class="d-inline-block w-100">
                              <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Remember Me</label>
                              </div>
                          </div>
                          <div class="sign-info text-center">
                              <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign in</button>
                              <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="{{route('auth.register')}}" class="text-white">Sign up</a></span>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-auth-layout>