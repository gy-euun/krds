<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '관리자 페이지') - 안전관리 시스템</title>
    
    <!-- 폰트 설정 -->
    <style>
        @font-face {
            font-family: 'Pretendard GOV';
            font-weight: 400;
            font-style: normal;
            src: url('/fonts/PretendardGOV-Regular.subset.woff2') format('woff2'),
                 url('/fonts/PretendardGOV-Regular.subset.woff') format('woff');
        }
        
        @font-face {
            font-family: 'Pretendard GOV';
            font-weight: 500;
            font-style: normal;
            src: url('/fonts/PretendardGOV-Medium.subset.woff2') format('woff2'),
                 url('/fonts/PretendardGOV-Medium.subset.woff') format('woff');
        }
        
        @font-face {
            font-family: 'Pretendard GOV';
            font-weight: 700;
            font-style: normal;
            src: url('/fonts/PretendardGOV-Bold.subset.woff2') format('woff2'),
                 url('/fonts/PretendardGOV-Bold.subset.woff') format('woff');
        }
        
        :root {
            --krds-typo-font-type: 'Pretendard GOV', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        html, body {
            font-family: var(--krds-typo-font-type);
            font-size: 62.5%; /* 10px = 1rem 설정 */
        }
        
        body {
            font-size: 1.6rem; /* 기본 텍스트 크기 16px */
            color: var(--krds-color-light-gray-90);
            background-color: var(--krds-color-light-gray-5);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
    </style>
    
    <!-- KRDS 스타일 -->
    <link rel="stylesheet" href="{{ asset('/css/krds/token/krds_tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/krds/common/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/krds/component/component.css') }}">
    
    <!-- 애플리케이션 커스텀 스타일 -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    @yield('styles')
</head>
<body class="admin-body">
    <div class="admin-container">
        <!-- 관리자 헤더 -->
        <header class="admin-header">
            <div class="header-container">
                <div class="header-left">
                    <button class="menu-toggle" id="adminSidebarToggle">
                        <span class="menu-icon"></span>
                    </button>
                    <div class="admin-logo">
                        <a href="{{ route('admin.dashboard') }}">
                            <span class="admin-badge">관리자</span>
                            안전관리 시스템
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-user-menu">
                        <button class="user-menu-button">
                            <span class="user-avatar admin-avatar">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </button>
                        <div class="user-dropdown">
                            <ul>
                                <li><a href="{{ route('dashboard') }}">사용자 페이지로</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">로그아웃</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="admin-body">
            <!-- 관리자 사이드바 -->
            <div class="admin-sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav-list">
                        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <span class="nav-icon dashboard-icon"></span>
                                <span class="nav-text">대시보드</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <span class="nav-icon user-icon"></span>
                                <span class="nav-text">사용자 관리</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.projects.index') }}" class="nav-link">
                                <span class="nav-icon project-icon"></span>
                                <span class="nav-text">프로젝트 관리</span>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings.index') }}" class="nav-link">
                                <span class="nav-icon settings-icon"></span>
                                <span class="nav-text">시스템 설정</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- 메인 콘텐츠 영역 -->
            <main class="admin-content">
                <!-- 페이지 제목 영역 -->
                <div class="page-header">
                    <h1 class="page-title">@yield('page-title', '관리자 페이지')</h1>
                    <div class="page-actions">
                        @yield('page-actions')
                    </div>
                </div>

                <!-- 알림 메시지 영역 -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- 페이지 콘텐츠 영역 -->
                <div class="page-content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- 기본 스크립트 -->
    <script src="{{ asset('/js/krds/component/ui-script.js') }}"></script>
    
    <!-- 추가 스크립트 -->
    @yield('scripts')
    
    <script>
        // 사이드바 토글 기능
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('adminSidebarToggle');
            const adminContainer = document.querySelector('.admin-container');
            
            sidebarToggle.addEventListener('click', function() {
                adminContainer.classList.toggle('sidebar-collapsed');
            });
            
            // 사용자 메뉴 토글
            const userMenuButton = document.querySelector('.user-menu-button');
            const userDropdown = document.querySelector('.user-dropdown');
            
            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', function() {
                    userDropdown.classList.toggle('active');
                });
                
                // 외부 클릭 시 드롭다운 닫기
                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                        userDropdown.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>
</html> 