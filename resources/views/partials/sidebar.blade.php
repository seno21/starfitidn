<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#data-master" aria-expanded="false"
                aria-controls="data-master">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="data-master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('list-admin') }}">List Admin</a></li>
                </ul>
            </div>
            <div class="collapse" id="data-master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('list-akun') }}">List Akun</a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('list-admin') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">List Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('list-akun') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">List Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('event.eom.index') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Event Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gallery.img.create') }}" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-image menu-icon"></i>
                <span class="menu-title">Gallery</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('profit.index') }}" aria-expanded="false" aria-controls="form-elements">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Compliment</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('profit.index') }}" aria-expanded="false" aria-controls="form-elements">
                <i class="mdi mdi-cash-multiple menu-icon"></i>
                <span class="menu-title">Profit</span>
            </a>
        </li> --}}

        {{--
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Charts</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                        table</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">
                        Register </a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Error pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                    </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                    </a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Documentation</span>
        </a>
    </li> --}}
    </ul>
</nav>
