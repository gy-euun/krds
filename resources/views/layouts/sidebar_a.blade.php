<div class="app-sidebar sidebar-a">
    <div class="sidebar-header">
        <h2>메뉴</h2>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="nav-list">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="nav-icon dashboard-icon"></span>
                    <span class="nav-text">대시보드</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('projects.index') || request()->routeIs('projects.create') ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}" class="nav-link">
                    <span class="nav-icon project-icon"></span>
                    <span class="nav-text">프로젝트</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('community.*') ? 'active' : '' }}">
                <a href="{{ route('community.index') }}" class="nav-link">
                    <span class="nav-icon community-icon"></span>
                    <span class="nav-text">커뮤니티</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('help.*') ? 'active' : '' }}">
                <a href="{{ route('help.index') }}" class="nav-link">
                    <span class="nav-icon help-icon"></span>
                    <span class="nav-text">도움말</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <a href="{{ route('profile.edit') }}" class="profile-link">
            <span class="profile-icon"></span>
            <span>내 정보</span>
        </a>
    </div>
</div> 