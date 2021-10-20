<aside id="sidebar-wrapper">
    <div class="sidebar-brand mt-4">
        <a href="{{ url('/home') }}">
            <h3 class="text-dark">ARSS</h3>
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/home') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
