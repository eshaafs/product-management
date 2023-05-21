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
          <a class="nav-link {{ Request::is('products*') ? 'active' : ''}}" href="/products">
            <span data-feather="layers" class="align-text-bottom"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('transactions*') ? 'active' : ''}}" href="/transactions">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Transactions
          </a>
        </li>

        @can('super.admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('reports') ? 'active' : ''}}" href="/reports?id=transactions">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Reports
          </a>
        </li>
        @endcan
        
      </ul>
    </div>
  </nav>