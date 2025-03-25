@extends('layouts.app')

@section('title', '대시보드')

@section('page-title', '대시보드')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">안전관리 현황</h2>
                </div>
                <div class="card-body">
                    <div class="dashboard-stats">
                        <div class="stat-item">
                            <div class="stat-icon primary">
                                <i class="project-icon"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">{{ $projectsCount ?? 5 }}</h3>
                                <p class="stat-label">진행 중인 프로젝트</p>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon warning">
                                <i class="risk-icon"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">{{ $pendingAssessmentsCount ?? 12 }}</h3>
                                <p class="stat-label">위험성 평가 항목</p>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon success">
                                <i class="worker-icon"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">{{ $workersCount ?? 87 }}</h3>
                                <p class="stat-label">등록된 근로자</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <h3 class="chart-title">월별 안전 점검 현황</h3>
                        <div class="chart-placeholder">
                            <div class="placeholder-text">차트가 이곳에 표시됩니다.</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">최근 활동</h2>
                </div>
                <div class="card-body">
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon document-icon"></div>
                            <div class="activity-content">
                                <h4 class="activity-title">안전 보건 교육 문서가 업로드되었습니다.</h4>
                                <p class="activity-meta">홍길동 | 2시간 전</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon risk-icon"></div>
                            <div class="activity-content">
                                <h4 class="activity-title">신규 위험성 평가가 완료되었습니다.</h4>
                                <p class="activity-meta">김철수 | 어제</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon project-icon"></div>
                            <div class="activity-content">
                                <h4 class="activity-title">새 프로젝트가 생성되었습니다: 해운대 공사현장</h4>
                                <p class="activity-meta">박지민 | 3일 전</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-secondary">모든 활동 보기</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">내 프로젝트</h2>
                </div>
                <div class="card-body">
                    <ul class="project-list">
                        <li class="project-item">
                            <a href="{{ route('projects.show', ['id' => 1]) }}" class="project-link">
                                <h3 class="project-name">서울 강남 지하철 공사</h3>
                                <span class="project-status active">진행 중</span>
                            </a>
                        </li>
                        <li class="project-item">
                            <a href="{{ route('projects.show', ['id' => 2]) }}" class="project-link">
                                <h3 class="project-name">부산 해운대 아파트 건설</h3>
                                <span class="project-status active">진행 중</span>
                            </a>
                        </li>
                        <li class="project-item">
                            <a href="{{ route('projects.show', ['id' => 3]) }}" class="project-link">
                                <h3 class="project-name">인천 공장 시설 정비</h3>
                                <span class="project-status inactive">완료</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">새 프로젝트 생성</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">공지사항</h2>
                </div>
                <div class="card-body">
                    <ul class="notice-list">
                        <li class="notice-item">
                            <a href="#" class="notice-link">
                                <h3 class="notice-title">안전관리 시스템 업데이트 안내</h3>
                                <p class="notice-date">2023-10-20</p>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#" class="notice-link">
                                <h3 class="notice-title">2023년 안전관리 지침 개정사항</h3>
                                <p class="notice-date">2023-10-15</p>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#" class="notice-link">
                                <h3 class="notice-title">위험성평가 작성 방법 안내</h3>
                                <p class="notice-date">2023-10-10</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('help.index') }}" class="btn btn-sm btn-secondary">모든 공지 보기</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .dashboard-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 2.4rem;
        margin-bottom: 3.2rem;
    }
    
    .stat-item {
        flex: 1;
        min-width: 18rem;
        display: flex;
        align-items: center;
        padding: 1.6rem;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.8rem;
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
        background-color: var(--krds-color-light-primary-50);
    }
    
    .stat-icon.warning {
        background-color: var(--krds-color-light-warning-10);
    }
    
    .stat-icon.warning i {
        background-color: var(--krds-color-light-warning-40);
    }
    
    .stat-icon.success {
        background-color: var(--krds-color-light-success-10);
    }
    
    .stat-icon.success i {
        background-color: var(--krds-color-light-success-50);
    }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-value {
        font-size: 2.4rem;
        font-weight: 700;
        margin: 0;
        color: var(--krds-color-light-gray-90);
    }
    
    .stat-label {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .chart-container {
        margin-top: 2.4rem;
    }
    
    .chart-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 1.6rem;
        color: var(--krds-color-light-gray-80);
    }
    
    .chart-placeholder {
        height: 24rem;
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
    
    .activity-list {
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
    
    .activity-icon {
        width: 3.2rem;
        height: 3.2rem;
        border-radius: 50%;
        background-color: var(--krds-color-light-primary-10);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.6rem;
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
    }
    
    .activity-meta {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .project-list,
    .notice-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .project-item,
    .notice-item {
        margin-bottom: 1.2rem;
    }
    
    .project-link,
    .notice-link {
        display: block;
        padding: 1.2rem;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.8rem;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .project-link:hover,
    .notice-link:hover {
        background-color: var(--krds-color-light-primary-10);
    }
    
    .project-name,
    .notice-title {
        font-size: 1.4rem;
        font-weight: 500;
        margin: 0 0 0.4rem 0;
        color: var(--krds-color-light-gray-80);
    }
    
    .project-status,
    .notice-date {
        font-size: 1.2rem;
        display: inline-block;
    }
    
    .project-status.active {
        color: var(--krds-color-light-success-50);
    }
    
    .project-status.inactive {
        color: var(--krds-color-light-gray-60);
    }
    
    .notice-date {
        color: var(--krds-color-light-gray-60);
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