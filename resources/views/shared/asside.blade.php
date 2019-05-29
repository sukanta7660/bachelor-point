<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('expense') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('expense')}}">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Expense</span></a>
    </li>
    <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('user')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>