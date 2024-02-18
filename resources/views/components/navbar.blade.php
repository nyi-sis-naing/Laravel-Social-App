    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
              Social App
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('createPost')}}">Create posts</a>
              </li>
              @can('admin')
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.home')}}">Admin control</a>
              </li>
              @endcan
              <li class="nav-item">
                <a class="nav-link" href="{{route('contactUs')}}">Contact us</a>
              </li>
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
      
          <!-- Right elements -->
            <!-- Avatar -->
            <div class="dropdown">
              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="{{asset('images/profiles/'.auth()->user()->image)}}"
                  class="rounded-circle"
                  height="30"
                  width="30"
                  alt="Black and White Portrait of a Man"
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
              <li>
                <a class="dropdown-item" href="{{route('userProfile')}}">{{auth()->user()->name}}</a>
              </li>
                <li>
                  <a class="dropdown-item" href="{{route('userProfile')}}">My profile</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->