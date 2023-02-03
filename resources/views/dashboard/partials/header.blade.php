@inject('ImageService', 'App\Services\ImageService')

<div class="sidebar-button">
    <i class='bx bx-menu sidebarBtn'></i>
    <span class="dashboard" id="title">Dashboard</span>
</div>
@if (Auth::user()->isAdminVol)
    <div class="profile-details">
        <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="{{ Auth::user()->nameVol }}">
        <span class="admin_name">{{ Auth::user()->nameVol }}</span>
    </div>
@elseif (Auth::user()->isIncomplete() || Auth::user()->isRegisterComplete == 0)
    <div class="profile-details">
        <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="{{ Auth::user()->nameVol }}">
        <span class="admin_name">{{ Auth::user()->nameVol }}</span>
    </div>
@else
    <div class="profile-details">
        <a href="{{ route('dashboard.changeAvatar') }}">
            @if (Auth::user()->imageVol == 0 || Auth::user()->imageVol == null)
                <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="{{ Auth::user()->nameVol }}">
            @else
                <img src="data:image/jpeg;base64,{{ base64_encode(Storage::get('avatar/' . Auth::user()->imageVol)) }}"
                    alt="{{ Auth::user()->nameVol }}" id="avatarInTopBar" />
            @endif
        </a>
        <span class="admin_name">
            <a href="{{ route('dashboard.showMyProfile') }}">
                {{ Auth::user()->nameVol }}
            </a>
        </span>
    </div>
@endif
