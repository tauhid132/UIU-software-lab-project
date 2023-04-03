@extends('master')
@section('title','Register')
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
                                    <h5 class="card-title text-center pb-0 fs-4">Create New Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
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
                              
                                <form class="row g-3" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="yourName" placeholder="Enter Name" required>
                                      </div>
                  
                                      <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="yourEmail" placeholder="Enter Email" required>
                                      </div>
                  
                                      <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter Password" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                      </div>
                  
                                      <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password" id="yourPassword" required>
                                        
                                      </div>
                  
                                      <div class="col-12">
                                        <div class="form-check">
                                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                         
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                      </div>
                                      <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
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