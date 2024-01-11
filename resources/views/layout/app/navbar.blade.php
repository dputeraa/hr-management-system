<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">DASHBOARD</li>
                <li>
                    <a href="{{ url('dashboard') }}"><i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li class="menu-title">DEPARTEMENTS</li>
                <li>
                    <a href="{{ url('departement') }}"> <i class="menu-icon fa fa-th-large"></i>Departement</a>
                </li>
                <li>
                    <a href="{{ url('position') }}"> <i class="menu-icon fa fa-th-large"></i>Position</a>
                </li>
                <li class="menu-title">USERS</li>
                <li>
                    <a href="{{ url('user') }}"> <i class="menu-icon fa fa-users"></i>Admin</a>
                </li>
                <li>
                    <a href="{{ url('employee') }}"> <i class="menu-icon fa fa-users"></i>Employee</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
