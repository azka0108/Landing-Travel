<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <img src="https://www.fastpay.co.id/blog/wp-content/uploads/2018/12/PNG-logo-fastpay-png.png" class="sidebar-brand-full" width="200" height="60" alt="CoreUI Logo">
      </img>
       
     
      </div>
      <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
          </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
      <li class="nav-title">Theme</li>
      <li class="nav-item"><a class="nav-link" href="colors.html">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
          </svg> Colors</a></li>
      <li class="nav-item"><a class="nav-link" href="typography.html">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
          </svg> Typography</a></li>
      <li class="nav-title">Components</li>

       <!--REVIEW FASTPAY-->
      <li class="nav-item"><a class="nav-link" href="{{ route('review.index') }}">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
          </svg>REVIEW FASTPAY <span class="badge badge-sm bg-info ms-auto">NEW</span> </a></li>

           <!--LAYANAN BISNIS DIGITAL-->
          <li class="nav-item"><a class="nav-link" href="{{ route('bisnis.index') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
            </svg> LAYANAN BISNIS DIGITAL <span class="badge badge-sm bg-info ms-auto">NEW</span> </a></li>

             <!--ARTIKEL FASTPAY-->
            <li class="nav-item"><a class="nav-link" href="{{ route('artikel.index') }}">
              <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
              </svg> ARTIKEL FASTPAY  <span class="badge badge-sm bg-info ms-auto">NEW</span> </a></li>

              <!--LAYANAN TRANSPORTASI-->
              <li class="nav-item"><a class="nav-link" href="{{ route('layanan.index') }}">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
                </svg> LAYANAN TRANSPORTASI <span class="badge badge-sm bg-info ms-auto">NEW</span> </a></li>

                <!--PENAMBAHAN USER-->
               <!-- Cek jika role user yang login adalah "super admin" -->
                @if (Auth::check() && Auth::user()->role === 'super admin')
                 <!-- PENAMBAHAN USER -->
                 <li class="nav-item">
                 <a class="nav-link" href="{{ route('users.index') }}">
                 <svg class="nav-icon">
                 <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
              </svg>
              TAMBAHKAN USER<span class="badge badge-sm bg-info ms-auto">NEW</span>
            </a>
            </li>
              @endif

          
            
    
      <li class="nav-divider"></li>
      <li class="nav-title">Extras</li>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
          </svg> Pages</a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
              <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
              </svg> Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
              <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
              </svg> Register</a></li>
          <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
              <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
              </svg> Error 404</a></li>
          <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
              <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
              </svg> Error 500</a></li>
        </ul>
      </li>
      <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
          </svg> Docs</a></li>
      <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
          <svg class="nav-icon text-primary">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
          </svg> Try CoreUI PRO</a></li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
  </div>