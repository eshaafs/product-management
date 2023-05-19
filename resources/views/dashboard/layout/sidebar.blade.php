<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : ''}}" aria-current="page" href="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/products', 'dashboard/products/*') ? 'active' : ''}}" href="/dashboard/products">
            <span data-feather="layers" class="align-text-bottom"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/transactions') ? 'active' : ''}}" href="/dashboard/transactions">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Transactions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/report') ? 'active' : ''}}" href="/dashboard/reports">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Report
          </a>
        </li>
      </ul>
    </div>
  </nav>