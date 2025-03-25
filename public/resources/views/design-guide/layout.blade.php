<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KRDS UI/UX 디자인 가이드')</title>
    
    <!-- 외부 라이브러리 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/styles/github.min.css">
    
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
        }
    </style>
    
    <!-- KRDS 스타일 -->
    <link rel="stylesheet" href="{{ asset('/css/krds/token/krds_tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/krds/common/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/krds/component/component.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/krds/component/output.css') }}">
    
    <style>
        /* 디자인 가이드 스타일 - KRDS 디자인 시스템 기반 */
        :root {
            --sidebar-width: 280px;
            --sidebar-bg: var(--krds-color-light-gray-5);
            --header-height: 60px;
            --primary-color: var(--krds-color-light-primary-50);
            --secondary-color: var(--krds-color-light-gray-60);
            --border-color: var(--krds-color-light-gray-20);
            --text-color: var(--krds-color-light-gray-90);
            --light-text-color: var(--krds-color-light-gray-50);
        }
        
        body {
            color: var(--text-color);
            background-color: var(--krds-color-light-gray-0);
            line-height: var(--krds-line-height-base, 1.5);
            font-size: 16px;
        }
        
        .design-guide-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            padding: 2.4rem;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            height: 100vh;
            position: fixed;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }
        
        .category-section {
            margin-bottom: 2rem;
        }
        
        .category-title {
            font-size: 1.6rem;
            font-weight: 500;
            margin-bottom: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--secondary-color);
        }
        
        .category-section.active .category-title {
            color: var(--primary-color);
        }
        
        .component-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .component-item {
            margin-bottom: 0.4rem;
        }
        
        .component-item a {
            display: block;
            padding: 0.8rem 1rem;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 0.4rem;
            font-size: 1.4rem;
            transition: all 0.2s ease;
        }
        
        .component-item a:hover {
            background-color: var(--krds-color-light-primary-10);
            color: var(--krds-color-light-primary-50);
        }
        
        .component-item a.active {
            background-color: var(--krds-color-light-primary-50);
            color: white;
            font-weight: 500;
        }
        
        .content {
            flex: 1;
            padding: 3.2rem;
            margin-left: var(--sidebar-width);
            max-width: calc(100% - var(--sidebar-width));
        }
        
        .search-box {
            margin-bottom: 2rem;
        }
        
        .form-control {
            padding: 0.8rem 1.2rem;
            border: 1px solid var(--border-color);
            border-radius: 0.4rem;
            width: 100%;
            font-family: var(--krds-typo-font-type);
            font-size: 1.4rem;
        }
        
        .component-preview {
            padding: 2.4rem;
            border: 1px solid var(--border-color);
            border-radius: 0.4rem;
            background-color: var(--krds-color-light-gray-0);
            margin-bottom: 2.4rem;
            position: relative;
        }
        
        .component-code {
            background-color: var(--krds-color-light-gray-5);
            border: 1px solid var(--border-color);
            border-radius: 0.4rem;
            padding: 1.6rem;
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            font-size: 1.4rem;
            overflow-x: auto;
            white-space: pre-wrap;
            margin-bottom: 2.4rem;
        }
        
        .tab-content {
            background-color: var(--krds-color-light-gray-0);
        }
        
        pre {
            margin: 0;
        }
        
        .component-header {
            margin-bottom: 3.2rem;
        }
        
        .component-header h1 {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--krds-color-light-gray-90);
        }
        
        .category-badge {
            background-color: var(--krds-color-light-primary-40);
            color: white;
            padding: 0.4rem 1.2rem;
            border-radius: 2rem;
            font-size: 1.4rem;
            font-weight: 500;
        }
        
        .related-components h3 {
            font-size: 2.4rem;
            font-weight: 600;
            margin-bottom: 1.6rem;
            color: var(--krds-color-light-gray-80);
        }
        
        .code-actions {
            text-align: right;
        }
        
        /* 버튼 스타일 KRDS 적용 */
        .btn-primary {
            background-color: var(--krds-color-light-primary-50);
            border-color: var(--krds-color-light-primary-50);
        }
        
        .btn-primary:hover {
            background-color: var(--krds-color-light-primary-60);
            border-color: var(--krds-color-light-primary-60);
        }
        
        .btn-outline-primary {
            color: var(--krds-color-light-primary-50);
            border-color: var(--krds-color-light-primary-50);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--krds-color-light-primary-50);
            border-color: var(--krds-color-light-primary-50);
        }
        
        /* 모바일 반응형 */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1.6rem;
            left: 1.6rem;
            z-index: 1010;
            background-color: var(--krds-color-light-primary-50);
            color: white;
            border: none;
            border-radius: 0.4rem;
            padding: 0.8rem;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .content {
                margin-left: 0;
                max-width: 100%;
                padding: 2.4rem;
                padding-top: 6.4rem;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 990;
            }
        }
        
        /* 아이콘 CSS 수정: 경로 수정용 */
        .svg-icon {
            mask-image: url(/img/component/icon/ico_help.svg);
            -webkit-mask-image: url(/img/component/icon/ico_help.svg);
        }
        
        /* 인라인 아이콘 수정 (기본적으로 필요한 아이콘들) */
        [class*=ico_] {
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }
        
        .ico-angle {
            mask-image: url(/img/component/icon/ico_angle.svg);
            -webkit-mask-image: url(/img/component/icon/ico_angle.svg);
        }
        
        .ico-help {
            mask-image: url(/img/component/icon/ico_help.svg);
            -webkit-mask-image: url(/img/component/icon/ico_help.svg);
        }
        
        .ico-sch {
            mask-image: url(/img/component/icon/ico_sch.svg);
            -webkit-mask-image: url(/img/component/icon/ico_sch.svg);
        }
        
        .ico-checkbox {
            mask-image: url(/img/component/icon/ico_checkbox.svg);
            -webkit-mask-image: url(/img/component/icon/ico_checkbox.svg);
        }
        
        .ico-checkbox-checked {
            mask-image: url(/img/component/icon/ico_checkbox_checked.svg);
            -webkit-mask-image: url(/img/component/icon/ico_checkbox_checked.svg);
        }
        
        .ico-reset {
            mask-image: url(/img/component/icon/ico_reset.svg);
            -webkit-mask-image: url(/img/component/icon/ico_reset.svg);
        }
        
        .ico-pw-visible-off {
            mask-image: url(/img/component/icon/ico_pw_visible_off.svg);
            -webkit-mask-image: url(/img/component/icon/ico_pw_visible_off.svg);
        }
        
        /* 페이지 타이틀 KRDS 스타일 */
        .page-title {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 1.6rem;
            color: var(--krds-color-light-gray-90);
        }
        
        .page-subtitle {
            font-size: 1.8rem;
            color: var(--krds-color-light-gray-60);
            margin-bottom: 3.2rem;
        }
    </style>
    
    @yield('additional_styles')
</head>
<body>
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fa fa-bars"></i>
    </button>
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
    
    <div class="design-guide-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2 class="mb-4">KRDS UI/UX 컴포넌트</h2>
            </div>
            
            @yield('sidebar')
        </aside>
        
        <main class="content">
            @yield('content')
            
            <footer class="mt-5 pt-4 border-top text-center text-muted">
                <p class="mb-1">KRDS UI/UX 디자인 가이드 &copy; 2023</p>
                <p class="small">웹 애플리케이션을 위한 디자인 시스템</p>
            </footer>
        </main>
    </div>
    
    <!-- 외부 라이브러리 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
    
    <!-- KRDS 스크립트 -->
    <script src="{{ asset('/js/krds/plugin/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/js/krds/component/ui-script.js') }}"></script>
    
    <script>
        // 코드 하이라이팅 초기화
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('pre code').forEach(function(block) {
                hljs.highlightBlock(block);
            });
        });
        
        // 모바일 사이드바 토글
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            sidebar.classList.toggle('show');
            
            if (sidebar.classList.contains('show')) {
                backdrop.style.display = 'block';
            } else {
                backdrop.style.display = 'none';
            }
        });
        
        document.getElementById('sidebarBackdrop').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = this;
            sidebar.classList.remove('show');
            backdrop.style.display = 'none';
        });
        
        // 아코디언 초기화
        if (typeof initAccordion === 'function') {
            initAccordion();
        }
        
        // 캐러셀 초기화
        if (typeof initCarousel === 'function') {
            initCarousel();
        }
        
        // 모달 초기화
        if (typeof initModal === 'function') {
            initModal();
        }
    </script>
    
    @yield('scripts')
</body>
</html> 