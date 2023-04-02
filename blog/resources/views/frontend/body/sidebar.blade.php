<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">Bahadır Önal</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item active"><a href="{{ url('/') }}" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a></li>
                </ul>
            </nav>

            @auth
            <div class="row">
                <div class="text-right">
                    <a href="{{ route('user.logout') }}" class="tm-btn tm-btn-primary tm-btn-small">Logout</a>                        
                </div>
            </div>
            @else
            <div class="row">
                <div class="text-right">
                    <a href="{{ url('/login') }}" class="tm-btn tm-btn-primary tm-btn-small">Login</a>                        
                </div>  
                <div class="text-right">
                    <a href="{{ url('/register') }}" class="tm-btn tm-btn-primary tm-btn-small">Register</a>                        
                </div> 
            </div>
            @endauth
        </div>
    </header>