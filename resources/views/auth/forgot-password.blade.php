@extends('master')
@section('title','Forgot Password')
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
                                    <h5 class="card-title text-center pb-0 fs-4">Forgot Your Password?</h5>
                                    <p class="text-center small">Don't Worry! Enter your email and we will send you password reset link.</p>
                                </div>
                                @if(Session::has('status'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                              
                                <form class="row g-3" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="col-12">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope"></i></span>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email" id="yourUsername" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Reset Password</button>
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