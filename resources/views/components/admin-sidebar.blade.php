<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" title="{{ $adminCompany->name ?? config('app.name', 'NewsPortal') }}">
            @if (!empty($adminCompany?->logo))
                <img alt="{{ $adminCompany->name }}" src="{{ asset($adminCompany->logo) }}" class="header-logo" />
            @else
                <img alt="News Portal" src="/assets/img/logo.png" class="header-logo" />
            @endif
            <span class="brand-text-wrap">
                <span class="logo-name">{{ $adminCompany->name ?? config('app.name', 'NewsPortal') }}</span>
                <small class="brand-subtitle">Admin Panel</small>
            </span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Navigation</li>
        <li class="dropdown {{Request::routeIs('dashboard') ? 'active' : ''}}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.company*') ? 'active' : '' }}">
            <a href="{{ route('admin.company.index') }}" class="nav-link"><i
                    data-feather="home"></i><span>Company</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.category*') ? 'active' : '' }}">
            <a href="{{route('admin.category.index')}}" class="nav-link"><i data-feather="tag"></i><span>Category</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.article*') ? 'active' : '' }}">
            <a href="{{route('admin.article.index')}}" class="nav-link"><i class="fas fa-newspaper"></i><span>Articles</span></a>
        </li>

        <li class="dropdown">
            <a href="{{ route('home') }}" target="_blank" class="nav-link"><i data-feather="external-link"></i><span>Visit Website</span></a>
        </li>
        {{-- <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Widgets</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
            </ul>
        </li> --}}
    </ul>
</aside>
