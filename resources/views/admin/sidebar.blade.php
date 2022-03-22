<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{  request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Фойдаланувчилар</p>
                    </a>
                </li>

                <li class="nav-item {{  request()->routeIs('admin.microcontrollers.index') ? 'active' : '' }}">
                    <a href="{{route('admin.microcontrollers.index')}}">
                        <i class="fas fa-microchip"></i>
                        <p>Контроллерлар</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.sensors.index') ? 'active' : '' }}">
                    <a href="{{route('admin.sensors.index')}}">
                        <i class="fas fa-memory"></i>
                        <p>Сенсорлар</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.scheme.index') ? 'active' : '' }}">
                    <a href="{{route('admin.scheme.index')}}">
                        <i class="fas fa-database"></i>
                        <p>Схемалар</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


