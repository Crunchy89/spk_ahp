@php
    $data = \App\Models\AksesMenu::join('menu as m', 'akses_menu.menu_id', '=', 'm.id')
            ->where('akses_menu.role_id', Auth::user()->role_id)
            ->orderBy('m.urutan', 'ASC')
            ->get();
    $segment = Request::segment(2) ?? 'admin';
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user fa-2x text-light"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(Auth::user()->username) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if('admin'==$segment) active @endif ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @foreach ($data as $m)
                @php
                    $menu = \App\Models\Menu::whereId_parent($m->id)->orderBy('urutan', 'ASC')->get();
                    $link = join(',',array_column($menu->toArray(), 'link'));
                @endphp
                @if(count($menu) > 0)
                <li class="nav-item @if(preg_match("/$segment/", $link)) menu-open @endif">
                    <a href="#" class="nav-link @if(preg_match("/$segment/", $link)) active @endif ">
                      <i class="nav-icon {{ $m->icon }}"></i>
                      <p>
                        {{$m->title}}
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($menu as $s)
                        <li class="nav-item">
                          <a href="{{ route($s->link) }}" class="nav-link @if(preg_match("/$s->link/", $segment)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ $s->title }}</p>
                          </a>
                        </li>
                        @endforeach
                    </ul>
                  </li>

                @else
                <li class="nav-item">
                    <a href="{{ route($m->link) }}" class="nav-link">
                        <i class="nav-icon fas {{$m->icon}}"></i>
                        <p>
                            {{$m->title}}
                        </p>
                    </a>
                </li>
                @endif
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
