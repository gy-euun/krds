@extends('layouts.app')

@section('title', '대시보드')

@section('page-title', '대시보드')

@section('content')
    <div class="dashboard-row">
        <div class="dashboard-card primary">
            <div class="card-icon primary-icon">
                <i class="user-icon"></i>
            </div>
            <div class="card-content">
                <div class="card-value">5</div>
                <div class="card-label">진행 중인 프로젝트</div>
            </div>
        </div>
        
        <div class="dashboard-card warning">
            <div class="card-icon warning-icon">
                <i class="warning-icon"></i>
            </div>
            <div class="card-content">
                <div class="card-value">12</div>
                <div class="card-label">위험성 평가 필요</div>
            </div>
        </div>
        
        <div class="dashboard-card success">
            <div class="card-icon success-icon">
                <i class="worker-icon"></i>
            </div>
            <div class="card-content">
                <div class="card-value">87</div>
                <div class="card-label">등록된 근로자</div>
            </div>
        </div>
    </div>

    <div class="dashboard-row two-columns">
        <div class="dashboard-column">
            <div class="dashboard-card full">
                <div class="card-header">
                    <h2 class="card-title">월별 안전 점검 현황</h2>
                </div>
                <div class="card-body chart-container">
                    <div class="chart-placeholder">
                        차트가 이곳에 표시됩니다.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="dashboard-column">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">내 프로젝트</h2>
                    <a href="{{ route('projects.index') }}" class="card-link">모두 보기</a>
                </div>
                <div class="card-body">
                    <ul class="project-list">
                        <li class="project-item">
                            <a href="{{ route('projects.show', 1) }}" class="project-link">
                                <span class="project-name">서울 강남 지하철 공사</span>
                                <span class="project-status active">진행 중</span>
                            </a>
                        </li>
                        <li class="project-item">
                            <a href="{{ route('projects.show', 2) }}" class="project-link">
                                <span class="project-name">부산 해운대 아파트 건설</span>
                                <span class="project-status active">진행 중</span>
                            </a>
                        </li>
                        <li class="project-item">
                            <a href="{{ route('projects.show', 3) }}" class="project-link">
                                <span class="project-name">인천 공장 시설 정비</span>
                                <span class="project-status completed">완료</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">최근 활동</h2>
                </div>
                <div class="card-body">
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon update-icon"></div>
                            <div class="activity-content">
                                <p class="activity-text">안전 보고서가 업데이트되었습니다.</p>
                                <p class="activity-meta">2시간 전</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon user-icon"></div>
                            <div class="activity-content">
                                <p class="activity-text">신규 근로자 등록이 완료되었습니다.</p>
                                <p class="activity-meta">어제</p>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon project-icon"></div>
                            <div class="activity-content">
                                <p class="activity-text">새 프로젝트가 생성되었습니다: 대전 오피스 빌딩</p>
                                <p class="activity-meta">2023-10-10</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="dashboard-card full">
        <div class="card-header">
            <h2 class="card-title">공지사항</h2>
            <a href="{{ route('community.index') }}" class="card-link">더 보기</a>
        </div>
        <div class="card-body">
            <div class="notice-list">
                <div class="notice-item">
                    <div class="notice-date">
                        <div class="notice-month">10월</div>
                        <div class="notice-day">20</div>
                    </div>
                    <div class="notice-content">
                        <h3 class="notice-title">안전관리 시스템 업데이트 안내</h3>
                        <p class="notice-text">2023년 10월 20일부터 새로운 안전관리 시스템이 적용됩니다. 모든 사용자는 필수로 안전교육을 이수해야 합니다.</p>
                    </div>
                </div>
                
                <div class="notice-item">
                    <div class="notice-date">
                        <div class="notice-month">10월</div>
                        <div class="notice-day">15</div>
                    </div>
                    <div class="notice-content">
                        <h3 class="notice-title">2023년 안전관리 지침 개정사항</h3>
                        <p class="notice-text">안전관리 지침이 개정되었습니다. 모든 프로젝트 매니저는 새로운 지침에 따라 안전 계획을 수립해야 합니다.</p>
                    </div>
                </div>
                
                <div class="notice-item">
                    <div class="notice-date">
                        <div class="notice-month">10월</div>
                        <div class="notice-day">10</div>
                    </div>
                    <div class="notice-content">
                        <h3 class="notice-title">위험성평가 세미나 개최 안내</h3>
                        <p class="notice-text">위험성평가 작성 방법 및 사례 공유를 위한 세미나가 진행됩니다. 많은 참여 바랍니다.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .dashboard-row {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .dashboard-row.two-columns {
        flex-wrap: wrap;
    }
    
    .dashboard-column {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
    
    .dashboard-card {
        background-color: white;
        border-radius: 0.8rem;
        box-shadow: 0 0.2rem 0.4rem rgba(0, 0, 0, 0.05);
        flex: 1;
        overflow: hidden;
    }
    
    .dashboard-card.full {
        width: 100%;
    }
    
    .dashboard-card.primary {
        border-left: 4px solid var(--krds-color-light-primary-50);
    }
    
    .dashboard-card.warning {
        border-left: 4px solid var(--krds-color-light-warning-50);
    }
    
    .dashboard-card.success {
        border-left: 4px solid var(--krds-color-light-success-50);
    }
    
    .dashboard-card:not(.full) {
        display: flex;
        align-items: center;
        padding: 2rem;
    }
    
    .card-header {
        padding: 1.6rem 2rem;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .card-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
        color: var(--krds-color-light-gray-90);
    }
    
    .card-link {
        font-size: 1.4rem;
        color: var(--krds-color-light-primary-50);
        text-decoration: none;
    }
    
    .card-body {
        padding: 2rem;
    }
    
    .card-icon {
        width: 6rem;
        height: 6rem;
        border-radius: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 2rem;
        flex-shrink: 0;
    }
    
    .card-icon i {
        width: 3.2rem;
        height: 3.2rem;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .primary-icon {
        background-color: var(--krds-color-light-primary-10);
    }
    
    .primary-icon i {
        background-image: url('/img/component/icon/ico_file.svg');
        filter: invert(36%) sepia(38%) saturate(3217%) hue-rotate(199deg) brightness(102%) contrast(95%);
    }
    
    .warning-icon {
        background-color: var(--krds-color-light-warning-10);
    }
    
    .warning-icon i {
        background-image: url('/img/component/icon/ico_warning_fill.svg');
        filter: invert(58%) sepia(93%) saturate(497%) hue-rotate(359deg) brightness(103%) contrast(106%);
    }
    
    .success-icon {
        background-color: var(--krds-color-light-success-10);
    }
    
    .success-icon i {
        background-image: url('/img/component/icon/ico_my.svg');
        filter: invert(47%) sepia(87%) saturate(427%) hue-rotate(105deg) brightness(96%) contrast(92%);
    }
    
    .card-content {
        flex: 1;
        min-width: 0;
    }
    
    .card-value {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--krds-color-light-gray-90);
        margin-bottom: 0.4rem;
    }
    
    .card-label {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
    }
    
    .chart-container {
        height: 30rem;
    }
    
    .chart-placeholder {
        height: 100%;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--krds-color-light-gray-60);
        font-size: 1.4rem;
    }
    
    .project-list, .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .project-item {
        margin-bottom: 1.6rem;
    }
    
    .project-item:last-child {
        margin-bottom: 0;
    }
    
    .project-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.2rem;
        border-radius: 0.4rem;
        background-color: var(--krds-color-light-gray-5);
        text-decoration: none;
        transition: background-color 0.2s;
    }
    
    .project-link:hover {
        background-color: var(--krds-color-light-gray-10);
    }
    
    .project-name {
        font-size: 1.4rem;
        font-weight: 500;
        color: var(--krds-color-light-gray-80);
    }
    
    .project-status {
        font-size: 1.2rem;
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
    }
    
    .project-status.active {
        background-color: var(--krds-color-light-success-10);
        color: var(--krds-color-light-success-60);
    }
    
    .project-status.completed {
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-gray-60);
    }
    
    .activity-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.6rem;
        padding-bottom: 1.6rem;
        border-bottom: 1px solid var(--krds-color-light-gray-10);
    }
    
    .activity-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .activity-icon {
        width: 3.6rem;
        height: 3.6rem;
        border-radius: 50%;
        background-color: var(--krds-color-light-gray-10);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.2rem;
        flex-shrink: 0;
        background-size: 2rem 2rem;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .activity-icon.update-icon {
        background-image: url('/img/component/icon/ico_warning_fill.svg');
    }
    
    .activity-icon.user-icon {
        background-image: url('/img/component/icon/ico_my.svg');
    }
    
    .activity-icon.project-icon {
        background-image: url('/img/component/icon/ico_file.svg');
    }
    
    .activity-content {
        flex: 1;
        min-width: 0;
    }
    
    .activity-text {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-80);
        margin: 0 0 0.4rem;
    }
    
    .activity-meta {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .notice-list {
        display: flex;
        flex-direction: column;
        gap: 1.6rem;
    }
    
    .notice-item {
        display: flex;
        align-items: flex-start;
        padding: 1.6rem;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.8rem;
        transition: background-color 0.2s;
    }
    
    .notice-item:hover {
        background-color: var(--krds-color-light-gray-10);
    }
    
    .notice-date {
        width: 5.6rem;
        height: 5.6rem;
        border-radius: 0.8rem;
        background-color: var(--krds-color-light-primary-50);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-right: 1.6rem;
        flex-shrink: 0;
    }
    
    .notice-month {
        font-size: 1.2rem;
        font-weight: 500;
    }
    
    .notice-day {
        font-size: 2rem;
        font-weight: 700;
    }
    
    .notice-content {
        flex: 1;
        min-width: 0;
    }
    
    .notice-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin: 0 0 0.8rem;
        color: var(--krds-color-light-gray-90);
    }
    
    .notice-text {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-70);
        margin: 0;
        line-height: 1.5;
    }
    
    @media (max-width: 768px) {
        .dashboard-row {
            flex-direction: column;
        }
        
        .dashboard-column {
            width: 100%;
        }
    }
</style>
@endsection 