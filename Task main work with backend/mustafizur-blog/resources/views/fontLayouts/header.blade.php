  <!-- Header Section Start -->
  <!-- Navigation Header Top Section Start  -->
  <section class="nav-header">
      <div class="container nav-header-inner">
          <div class="nav-header-top-logo">
              <a href="{{route('page.home')}}"> <img src="{{asset('assets/img/logo/inf-logo.png')}}" alt="" /></a>
          </div>
          <div class="nav-header-top-right">
              <ul>
                  <li>
                      <a href=""><i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li>
                      <a href=""><i class="fa-brands fa-linkedin"></i></a>
                  </li>
                  <li>
                      <a href=""><i class="fa-brands fa-youtube"></i></a>
                  </li>
                  <li>
                      <a href=""><i class="fa-brands fa-instagram"></i></a>
                  </li>
              </ul>



              <div class="auth-button">

                  @if (Route::has('login'))
                  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                      @auth
                      <a href="{{ url('/dashboard') }}" id="auth-link-dashboard-btn" class="auth-link-button">Dashboard</a>
                      @else
                      <a href="{{ route('login') }}" class="auth-link-button">Log in</a>

                      @if (Route::has('register'))
                      <a href="{{ route('register') }}" id="auth-link-singup-btn" class="auth-link-button">Register</a>
                      @endif
                      @endauth
                  </div>
                  @endif


              </div>
          </div>
      </div>
  </section>
  <!-- Navigation Header Top Section End -->

  <!-- Navigation Main Section start -->
  <section class="navbar-main-section">
      <div class="container">
          <nav class="navbar navbar-expand-lg bg-body-tertiary main-navbar">
              <div class="container-fluid">
                  <a class="navbar-brand" href="{{route('page.home')}}"><strong style="
                    background-color: black;
                    padding: 5px 10px 5px 10px;
                    color: white;
                    border-radius: 4px;
                  ">
                          <span style="color: #ffc32d">MUSTAFIZUR'S</span> BLOG</strong></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="{{route('page.home')}}">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('page.bloglistByCategory', ['category' => 'tech']) }}">Tech</a>


                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('page.bloglistByCategory', ['category' => 'education']) }}">Education</a>

                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('page.bloglistByCategory', ['category' => 'business']) }}">Business</a>
                          </li>
                      </ul>
                      <form class="d-flex" role="search" method="GET" accept="{{route('page.bloglist')}}">
                          @csrf
                          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                          <button class="btn btn-outline-success search-button" type="submit">
                              Search
                          </button>
                      </form>
                  </div>
              </div>
          </nav>
      </div>
  </section>
  <!-- Navigation Main Section start -->

  <!-- Header Section End -->