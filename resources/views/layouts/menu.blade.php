<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
</li>
<li class="side-menus {{ Request::is('usuarios','usuarios/*') ? 'active' : '' }}">
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-user"></i><span>Usuarios</span>
    </a>    
</li>
<li class="side-menus {{ Request::is('roles','roles/*') ? 'active' : '' }}">
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
</li>
<li class="side-menus {{ Request::is('servicios','servicios/*') ? 'active' : '' }}">
    <a class="nav-link" href="/servicios">
        <i class=" fas fa-truck"></i><span>Servicios</span>
    </a>
</li>
<li class="side-menus {{ Request::is('repuestos','repuestos/*') ? 'active' : '' }}">
    <a class="nav-link" href="/repuestos">
        <i class=" fas fa-wrench"></i><span>Repuestos</span>
    </a>
</li>