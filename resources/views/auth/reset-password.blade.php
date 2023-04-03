@extends('master')
@section('title','Reset Password')
@section('main-body')
<main>
    <div class="container">
        
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        
                        
                        <div class="card mb-3">
                            
                            <div class="card-body">
                                
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Reset Your Password</h5>
                                    <p class="text-center small">Enter Your new password</p>
                                </div>
                                @if(Session::has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ Session::get('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endforeach
                              
                                <form class="row g-3" method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="col-12">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope"></i></span>
                                            <input type="text" name="email" class="form-control"  value="{{old('email', $request->email)  }}" placeholder="Enter Email" id="yourUsername" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password" id="yourPassword" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password" id="yourPassword" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="float-end">
                                            <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                       
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </section>
        
    </div>
</main>
@endsection