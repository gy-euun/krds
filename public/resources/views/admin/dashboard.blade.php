@extends('layouts.admin')

@section('title', '관리자 대시보드')

@section('page-title', '관리자 대시보드')

@section('head')
<link rel="stylesheet" href="{{ asset('css/krds/token/krds_tokens.css') }}">
@endsection

@section('content')
    <div class="stats-row">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="user-icon"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-value">{{ $usersCount ?? 125 }}</h3>
                <p class="stat-label">총 사용자</p>
                <p class="stat-change positive">
                    <i class="arrow-up-icon"></i> {{ $newUsersPercent ?? '15%' }} 증가
                </p>
            </div>
        </div>
        
        <div class="stat-card danger">
            <div class="stat-icon danger">
                <i class="project-icon"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-value">{{ $projectsCount ?? 38 }}</h3>
                <p class="stat-label">총 프로젝트</p>
                <p class="stat-change positive">
                    <i class="arrow-up-icon"></i> {{ $newProjectsPercent ?? '8%' }} 증가
                </p>
            </div>
        </div>
        
        <div class="stat-card success">
            <div class="stat-icon success">
                <i class="risk-icon"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-value">{{ $assessmentsCount ?? 256 }}</h3>
                <p class="stat-label">위험성 평가</p>
                <p class="stat-change positive">
                    <i class="arrow-up-icon"></i> {{ $newAssessmentsPercent ?? '25%' }} 증가
                </p>
            </div>
        </div>
        
        <div class="stat-card warning">
            <div class="stat-icon warning">
                <i class="login-icon"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-value">{{ $logins ?? 540 }}</h3>
                <p class="stat-label">월간 로그인</p>
                <p class="stat-change negative">
                    <i class="arrow-down-icon"></i> {{ $loginsChangePercent ?? '3%' }} 감소
                </p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="card-header">
                    <h2 class="card-title">시스템 사용 현황</h2>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <div class="placeholder-text">사용량 차트가 이곳에 표시됩니다.</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="admin-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title">최근 활동</h2>
                    <a href="#" class="btn btn-sm btn-secondary">모두 보기</a>
                </div>
                <div class="card-body">
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-avatar">
                                <span>홍</span>
                            </div>
                            <div class="activity-content">
                                <h4 class="activity-title">홍길동님이 새 프로젝트를 생성했습니다: 부산 해운대 공사현장</h4>
                                <p class="activity-meta">30분 전</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-avatar">
                                <span>김</span>
                            </div>
                            <div class="activity-content">
                                <h4 class="activity-title">김철수님이 위험성 평가를 완료했습니다: 터널 작업 안전 평가</h4>
                                <p class="activity-meta">2시간 전</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-avatar">
                                <span>이</span>
                            </div>
                            <div class="activity-content">
                                <h4 class="activity-title">이영희님이 게시글을 작성했습니다: 최신 건설현장 안전 관리 매뉴얼 공유합니다</h4>
                                <p class="activity-meta">어제</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-avatar">
                                <span>박</span>
                            </div>
                            <div class="activity-content">
                                <h4 class="activity-title">박지민님이 새 근로자 5명을 등록했습니다: 서울 강남 지하철 공사</h4>
                                <p class="activity-meta">2일 전</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="card-header">
                    <h2 class="card-title">시스템 정보</h2>
                </div>
                <div class="card-body">
                    <div class="system-info">
                        <div class="info-item">
                            <span class="info-label">시스템 버전</span>
                            <span class="info-value">v1.2.3</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">마지막 업데이트</span>
                            <span class="info-value">2023-10-15</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">서버 상태</span>
                            <span class="info-value"><span class="status-badge active">정상</span></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">데이터베이스 상태</span>
                            <span class="info-value"><span class="status-badge active">정상</span></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">저장 공간</span>
                            <span class="info-value">68% 사용 중</span>
                        </div>
                    </div>
                    
                    <div class="storage-bar">
                        <div class="storage-progress" style="width: 68%"></div>
                    </div>
                </div>
            </div>
            
            <div class="admin-card">
                <div class="card-header">
                    <h2 class="card-title">최근 가입 사용자</h2>
                </div>
                <div class="card-body">
                    <ul class="user-list">
                        <li class="user-item">
                            <div class="user-avatar">박</div>
                            <div class="user-info">
                                <h4 class="user-name">박민수</h4>
                                <p class="user-meta">2023-10-16 가입</p>
                            </div>
                            <span class="user-role manager">매니저</span>
                        </li>
                        <li class="user-item">
                            <div class="user-avatar">김</div>
                            <div class="user-info">
                                <h4 class="user-name">김지영</h4>
                                <p class="user-meta">2023-10-15 가입</p>
                            </div>
                            <span class="user-role">사용자</span>
                        </li>
                        <li class="user-item">
                            <div class="user-avatar">이</div>
                            <div class="user-info">
                                <h4 class="user-name">이상호</h4>
                                <p class="user-meta">2023-10-14 가입</p>
                            </div>
                            <span class="user-role">사용자</span>
                        </li>
                        <li class="user-item">
                            <div class="user-avatar">최</div>
                            <div class="user-info">
                                <h4 class="user-name">최유진</h4>
                                <p class="user-meta">2023-10-13 가입</p>
                            </div>
                            <span class="user-role">사용자</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">모든 사용자 보기</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(24rem, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        padding: 2.4rem;
        background-color: white;
        border-radius: 0.8rem;
        box-shadow: 0 0.2rem 0.4rem rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        border-top: 4px solid var(--krds-color-light-gray-80);
    }
    
    .stat-card.primary {
        border-top-color: var(--krds-color-light-primary-50);
    }
    
    .stat-card.danger {
        border-top-color: var(--krds-color-light-danger-50);
    }
    
    .stat-card.success {
        border-top-color: var(--krds-color-light-success-50);
    }
    
    .stat-card.warning {
        border-top-color: var(--krds-color-light-warning-30);
    }
    
    .stat-icon {
        width: 4.8rem;
        height: 4.8rem;
        border-radius: 50%;
        background-color: var(--krds-color-light-primary-10);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.6rem;
    }
    
    .stat-icon i {
        width: 2.4rem;
        height: 2.4rem;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .stat-icon.primary {
        background-color: var(--krds-color-light-primary-10);
    }
    
    .stat-icon.primary i {
        background-image: url('/img/component/icon/ico_my.svg');
    }
    
    .stat-icon.danger {
        background-color: var(--krds-color-light-danger-10);
    }
    
    .stat-icon.danger i {
        background-image: url('/img/component/icon/ico_file.svg');
    }
    
    .stat-icon.success {
        background-color: var(--krds-color-light-success-10);
    }
    
    .stat-icon.success i {
        background-image: url('/img/component/icon/ico_warning_fill.svg');
    }
    
    .stat-icon.warning {
        background-color: var(--krds-color-light-warning-10);
    }
    
    .stat-icon.warning i {
        background-image: url('/img/component/icon/ico_login.svg');
    }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-value {
        font-size: 2.4rem;
        font-weight: 700;
        color: var(--krds-color-light-gray-90);
        margin: 0;
    }
    
    .stat-label {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
        margin: 0.4rem 0 0.8rem 0;
    }
    
    .stat-change {
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        margin: 0;
    }
    
    .stat-change i {
        width: 1.2rem;
        height: 1.2rem;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        margin-right: 0.4rem;
    }
    
    .stat-change.positive {
        color: var(--krds-color-light-success-50);
    }
    
    .stat-change.positive i {
        background-image: url('/img/component/icon/ico_angle.svg');
        transform: rotate(180deg);
    }
    
    .stat-change.negative {
        color: var(--krds-color-light-danger-50);
    }
    
    .stat-change.negative i {
        background-image: url('/img/component/icon/ico_angle.svg');
    }
    
    .chart-container {
        margin-top: 2rem;
    }
    
    .chart-placeholder {
        height: 30rem;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .placeholder-text {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
    }
    
    .activity-list,
    .user-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .activity-item {
        display: flex;
        align-items: flex-start;
        padding: 1.6rem 0;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-avatar {
        width: 3.2rem;
        height: 3.2rem;
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 1.2rem;
        flex-shrink: 0;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-title {
        font-size: 1.4rem;
        font-weight: 500;
        margin: 0 0 0.4rem 0;
        color: var(--krds-color-light-gray-80);
        line-height: 1.4;
    }
    
    .activity-meta {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .system-info {
        margin-bottom: 2rem;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.2rem;
    }
    
    .info-label {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
    }
    
    .info-value {
        font-size: 1.4rem;
        font-weight: 500;
        color: var(--krds-color-light-gray-80);
    }
    
    .storage-bar {
        height: 0.8rem;
        background-color: var(--krds-color-light-gray-10);
        border-radius: 0.4rem;
        overflow: hidden;
    }
    
    .storage-progress {
        height: 100%;
        background-color: var(--krds-color-light-primary-50);
        border-radius: 0.4rem;
    }
    
    .user-item {
        display: flex;
        align-items: center;
        padding: 1.2rem 0;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
    }
    
    .user-item:last-child {
        border-bottom: none;
    }
    
    .user-avatar {
        width: 3.2rem;
        height: 3.2rem;
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 1.2rem;
    }
    
    .user-info {
        flex: 1;
    }
    
    .user-name {
        font-size: 1.4rem;
        font-weight: 500;
        margin: 0 0 0.2rem 0;
        color: var(--krds-color-light-gray-80);
    }
    
    .user-meta {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .user-role {
        font-size: 1.2rem;
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-gray-60);
    }
    
    .user-role.manager {
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
    }
    
    .user-role.admin {
        background-color: var(--krds-color-light-danger-10);
        color: var(--krds-color-light-danger-50);
    }
    
    .d-flex {
        display: flex;
    }
    
    .justify-content-between {
        justify-content: space-between;
    }
    
    .align-items-center {
        align-items: center;
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -1.2rem;
    }
    
    .col-lg-8,
    .col-lg-4 {
        padding: 0 1.2rem;
    }
    
    .col-lg-8 {
        width: 66.666%;
    }
    
    .col-lg-4 {
        width: 33.333%;
    }
    
    @media (max-width: 992px) {
        .col-lg-8,
        .col-lg-4 {
            width: 100%;
        }
    }
</style>
@endsection