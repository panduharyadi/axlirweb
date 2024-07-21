<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{ asset('backend/images/logos/dark-logo.svg') }}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.slider') ? 'active' : '' }}" href="{{ route('admin.slider') }}" aria-expanded="false">
              <span>
                <i class="ti ti-slideshow"></i>
              </span>
              <span class="hide-menu">Slider</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.product') ? 'active' : '' }}" href="{{ route('admin.product') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Product</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.transaction') ? 'active' : '' }}" href="{{ route('admin.transaction') }}" aria-expanded="false">
              <span>
                <i class="ti ti-credit-card-pay"></i>
              </span>
              <span class="hide-menu">Transaction</span>
            </a>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.confirm.transaction') ? 'active' : '' }}" href="{{ route('admin.confirm.transaction') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cash-register"></i>
              </span>
              <span class="hide-menu">Confirm Transaction</span>
            </a>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.user.list') ? 'active' : '' }}" href="{{ route('admin.user.list') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user-dollar"></i>
              </span>
              <span class="hide-menu">User Track</span>
            </a>
          </li>
          <li class="sidebar-item hidden">
            <a class="sidebar-link " href="*" aria-expanded="false">
              <span>
                <i class="ti ti-news"></i>
              </span>
              <span class="hide-menu">Create Blog</span>
            </a>
          </li>
        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
          <div class="d-flex">
            <div class="unlimited-access-title me-3">
              <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
              <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
              <img src="{{ asset('backend/images/backgrounds/rocket.png') }}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>