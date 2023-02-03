@if(!session()->has("status"))
<div class="sidebar">
@else
<div class="sidebar active">
@endif
    <div id="spaceTopMenu">
        <div class="logo-details">
            @if(!session()->has("status"))
            <img width="200" height="39" src="<?php echo asset('images/logoNeg.jpg'); ?>" alt="header-logo" id="logoImg" />
            @else
            <img width="200" height="39" src="<?php echo asset('images/fm_blanco.png'); ?>" alt="header-logo" id="logoImg" />
            @endif
        </div>
    </div>
    <ul class="nav-links">
        @if (!Auth::user()->isIncomplete() && Auth::user()->isRegisterComplete)
            <li>
                <a href="{{ route('dashboard.logged') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showAllActivitiesLogged') }}">
                    <i class='bx bxs-label'></i>
                    <span class="links_name">Actividades</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showMyEducation') }}">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Mis Estudios</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showUserDocument') }}">
                    <i class='bx bx-file'></i>
                    <span class="links_name">Mi documentación</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showMyProfile') }}">
                    <i class='bx bxs-user-account'></i>
                    <span class="links_name">Editar mi perfil</span>
                </a>
            </li>
            @if (App\Http\Controllers\NotifyController::notifyLoggedTrigger())
                <li class="adminMenu">
                    <a href="{{ route('dashboard.logged.showNotify') }}">
                        <i class='iconAlert bx bxs-bell-ring bx-tada '></i>
                        <span class="textAlert links_name ">Notificaciones</span>
                    </a>
                </li>
            @endif
        @endcan
        @can('isAdmin')
            <li class="adminMenu">
                <a href="{{ route('dashboard.admin') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="adminMenu">
                <a href="{{ route('dashboard.showAllUsers') }}">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuarios</span>
                </a>
            </li>
            <li class="adminMenu">
                <a href="{{ route('dashboard.showAllActivities') }}">
                    <i class='bx bxs-label'></i>
                    <span class="links_name">Actividades</span>
                </a>
            </li>
            @if (App\Http\Controllers\NotifyController::notifyTrigger())
                <li class="adminMenu">
                    <a href="{{ route('dashboard.admin.showNotify') }}">
                        <i class='iconAlert bx bxs-bell-ring bx-tada '></i>
                        <span class="textAlert links_name ">Notificaciones</span>
                    </a>
                </li>
            @endif

        @endcan
        <li class="log_out">
            <a href="{{ route('vol.logout') }}">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Cerrar sesión</span>
            </a>
        </li>
</ul>
</div>
