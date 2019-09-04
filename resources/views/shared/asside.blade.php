<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('meal') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('meal')}}">
            <i class="fas fa-fw fa-hamburger"></i>
            <span>Meal</span></a>
    </li>
    <li class="nav-item {{ Request::is('expense') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('expense')}}">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Expense</span></a>
    </li>

    <li class="nav-item {{ Request::is('deposit') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('deposit')}}">
            <i class="fas fa-fw fa-download"></i>
            <span>Deposite</span></a>
    </li>
    <li class="nav-item {{ Request::is('bill') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('bill')}}">
            <i class="fas fa-fw fa-comments-dollar"></i>
            <span>Bill</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>