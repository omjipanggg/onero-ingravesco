<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home.ngodengIndex') }}"><i class="bi bi-regex"></i>NDG</a>
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
          <a class="nav-link active" aria-current="page" href="{{ route('home.ngodengIndex') }}">Home</a>
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
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ '@' . strtolower(strtok(Auth::user()->name, " ")) }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a href="{{ route('ngodeng.index') }}" class="dropdown-item">Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>