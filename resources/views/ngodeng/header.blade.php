<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home.index') }}"><i class="bi bi-fuel-pump"></i>NG</a>
    {{-- <button class="btn-no-outline navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation"> --}}
      <button class="hamburger hamburger--squeeze p-0 btn-no-outline navbar-toggler" type="button" role="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <div class="hamburger-box">
          <div class="hamburger-inner"></div>
        </div>
      </button>
    {{-- </button> --}}

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
        </li>
        {{--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        --}}
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Auth<i class="bi bi-box-arrow-in-right ms-2"></i></a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('ngodeng.dashboard') }}" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->email }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>