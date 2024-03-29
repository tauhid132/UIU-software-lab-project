<header id="header" class="header fixed-top d-flex align-items-center">
    
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.jpeg') }}" alt="">
            <span class="">Health Tracker</span>
        </a>
        
    </div>
    
    
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 ">Home</a></li>
        <li><a href="#" class="nav-link px-2 ">Diet Planner</a></li>
    </ul>
    
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-ite pe-3">
                <a href="{{ route('login') }}"><button class="btn btn-success">Register/Login</button></a>
            </li>
        </ul>
    </nav>
</header>