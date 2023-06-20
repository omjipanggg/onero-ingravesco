@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Dashboard')

@section('content')
  <body id="body-pd">
    <header class="header" id="header">
      <button class="hamburger hamburger--squeeze p-0 btn-no-outline header_toggle" type="button" role="button" id="header-toggle" aria-label="Toggle navigation">
        <div class="hamburger-box">
          <div class="hamburger-inner"></div>
        </div>
      </button>
        {{-- <div class="header_toggle"><i class='bi bi-chevron-bar-right' id="header-toggle"></i></div> --}}
        {{-- <div class="header_img"><img src="{{ asset('img/ngodeng/firman.png') }}" alt="Logo"></div> --}}
        <span class="text-purple fw-bold">{{ Auth::user()->name }}</span>
    </header>
    <div class="left-navbar" id="nav-bar">
        <nav class="nav">
            <div class="nav-group">
                <a href="{{ route('home.ngodengIndex') }}" class="nav_logo nav_64"><i class='bi bi-regex nav_logo-icon'></i><span class="nav_logo-name">NDG</span></a>
                <div class="nav_list">
                    <a href="{{ route('ngodeng.alternate') }}" data-title="Dashboard" class="nav_link active"><i class='bi bi-house nav_icon'></i><span class="nav_name">Dashboard</span></a>
                    <a href="{{ route('ngodeng.products') }}" data-title="Products" class="nav_link"><i class='bi bi-tags nav_icon'></i><span class="nav_name">Products</span></a>
                    <a href="{{ route('ngodeng.sales') }}" data-title="Sales" class="nav_link"><i class='bi bi-cart3 nav_icon'></i><span class="nav_name">Sales</span></a>
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
    <div class="bg-light" id="content-placeholder">
        <div class="data">
        <h4>Main Components</h4>
        <p class="text-justify m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eius sed dolorem fugiat dignissimos necessitatibus maxime hic, doloribus expedita quia quod assumenda amet tempora perspiciatis repellendus voluptatum suscipit neque rem similique, obcaecati ducimus culpa illo modi dolorum! Nisi reiciendis, blanditiis sed natus laudantium officia repudiandae voluptatem dicta possimus quo maiores illo sunt! Eligendi maiores odit ex voluptatem eius recusandae, amet ea non. Distinctio blanditiis perspiciatis sed eos totam perferendis labore quam recusandae magni excepturi amet tenetur fugit rem corporis consequatur, veritatis impedit id delectus, placeat quis dolor eius? Provident odio possimus blanditiis ratione mollitia quod eaque, facere, unde reprehenderit quo aut adipisci itaque aspernatur, illo repellat accusantium harum maxime ipsum qui, odit voluptate totam. Aliquid, ipsum laudantium aut id illum. Amet alias id vero, consequuntur? Vero quidem recusandae vel unde, ratione sit, inventore debitis sequi, molestiae voluptatibus, voluptatem suscipit tenetur tempora quas ea reiciendis ullam atque! Fuga libero cupiditate itaque, deleniti, aut repellendus est? Aliquid veritatis sit repudiandae, quisquam dicta, aliquam quia voluptatum omnis corporis, soluta deleniti hic nisi natus eius! Aut, distinctio quibusdam commodi consequuntur nulla vitae tempora labore ducimus reprehenderit, dolore dolor earum, ipsum. Id, suscipit, obcaecati corrupti doloremque culpa natus distinctio consequatur eaque sed et a fugiat.</p>
        </div>
    </div>
@endsection
