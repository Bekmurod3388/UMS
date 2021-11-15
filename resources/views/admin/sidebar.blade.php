<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{  request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Пользователь</p>
                    </a>
                </li>

                <li class="nav-item {{  request()->routeIs('admin.bus.index') ? 'active' : '' }}">
                    <a href="{{route('admin.bus.index')}}">
                        <i class="fas fa-bus"></i>
                        <p>Автобусы</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.driver.index') ? 'active' : '' }}">
                    <a href="{{route('admin.driver.index')}}">
                        <i class="fas fa-users"></i>
                        <p>Водители</p>
                    </a>
                </li>


            </ul>


        </div>
    </div>
</div>


