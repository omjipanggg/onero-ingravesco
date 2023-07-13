<header class="header flex-wrap" id="header">
  <button class="hamburger hamburger--squeeze p-0 btn-no-outline header_toggle" type="button" role="button" id="header-toggle" aria-label="Toggle navigation">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </button>

  {{-- <span id="clock">{{ date('d F Y H:i:s') }}</span> --}}
  <div class="group">
    <a href="{{ route('ngodeng.sales') }}" class="me-2 text-purple"><i class="bi bi-cart3 me-1"></i><span class="total-count"></span></a>
    <span class="text-purple fw-bold">{{ '@' . Str::lower(Str::of(Auth::user()->name)->explode(' ')->first()) }}</span>
  </div>
  {{-- <div class="header_img"><img src="{{ asset('img/ngodeng/firman.png') }}" alt="Logo"></div> --}}
</header>
<div class="left-navbar" id="nav-bar">
    <nav class="nav">
        <div class="nav-group">
            <a href="{{ route('home.ngodengIndex') }}" class="nav_logo nav_64"><i class='bi bi-regex nav_logo-icon'></i><span class="nav_logo-name">NDG</span></a>
            <div class="nav_list">
                <a href="{{ route('ngodeng.index') }}" data-title="NGODENG—Dashboard" class="nav_link active"><i class='bi bi-house nav_icon'></i><span class="nav_name">Dashboard</span></a>
                <a href="{{ route('ngodeng.products') }}" data-title="NGODENG—Products" class="nav_link"><i class='bi bi-tags nav_icon'></i><span class="nav_name">Products</span></a>
                <a href="{{ route('ngodeng.sales') }}" data-title="NGODENG—Sales" class="nav_link"><i class='bi bi-cart3 nav_icon'></i><span class="nav_name">Sales</span></a>
                <a href="{{ route('ngodeng.salesHistory') }}" data-title="NGODENG—Sales" class="nav_link"><i class='bi bi-journals nav_icon'></i><span class="nav_name">Historical</span></a>
                {{--
                <a href="#" class="nav_link"><i class='bi bi-bookmark nav_icon'></i><span class="nav_name">Bookmark</span></a>
                <a href="#" class="nav_link"><i class='bi bi-folder nav_icon'></i><span class="nav_name">Files</span></a>
                <a href="#" class="nav_link"><i class='bi bi-bar-chart nav_icon'></i><span class="nav_name">Stats</span></a>
                --}}
            </div>
        </div>
        <a href="{{ route('logout') }}" class="nav_lower nav_64" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class='bi bi-box-arrow-right nav_icon'></i><span class="nav_name">Logout</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>