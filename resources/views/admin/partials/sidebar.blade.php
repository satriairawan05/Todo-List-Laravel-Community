<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ request()->is('home') ? route('home') : route('welcome') }}">{{ env('APP_NAME') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class="{{ request()->is('task.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('task.index') }}"><i class="fas fa-book-reader"></i>
                    <span>Todo</span></a></li>
        </ul>
    </aside>
</div>
