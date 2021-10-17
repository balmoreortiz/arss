<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-user"></i><span>Usuario</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <!--Por el momento se dejará / en esta vistas-->
    <a class="nav-link" href="/">
        <i class=" fas fa-truck"></i><span>Servicio</span>
    </a>
    <a class="nav-link" href="/">
        <i class=" fas fa-wrench"></i><span>Repuesto</span>
    </a>
</li>
