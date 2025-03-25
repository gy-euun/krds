@extends('layouts.app')

@section('title', $project->name ?? '프로젝트 상세')

@section('page-title', $project->name ?? '서울 강남 지하철 공사')

@section('page-actions')
    <div class="action-buttons">
        <a href="{{ route('projects.edit', $project->id ?? 1) }}" class="btn btn-secondary">
            <span class="btn-icon-left edit-icon"></span>
            수정
        </a>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
            <span class="btn-icon-left back-icon"></span>
            목록으로
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">프로젝트 정보</h2>
                </div>
                <div class="card-body">
                    <div class="project-info-grid">
                        <div class="info-item">
                            <span class="info-label">상태</span>
                            <span class="info-value">
                                @if(($project->status ?? 'active') == 'active')
                                    <span class="badge badge-success">진행 중</span>
                                @elseif(($project->status ?? '') == 'completed')
                                    <span class="badge badge-secondary">완료</span>
                                @elseif(($project->status ?? '') == 'pending')
                                    <span class="badge badge-warning">대기 중</span>
                                @endif
                            </span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">위치</span>
                            <span class="info-value">{{ $project->location ?? '서울특별시 강남구' }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">시작일</span>
                            <span class="info-value">{{ $project->start_date ?? '2023-09-01' }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">완료 예정일</span>
                            <span class="info-value">{{ $project->end_date ?? '2024-12-31' }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">담당자</span>
                            <span class="info-value">{{ $project->manager_name ?? '홍길동' }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">생성일</span>
                            <span class="info-value">{{ $project->created_at ?? '2023-08-15' }}</span>
                        </div>
                    </div>
                    
                    <div class="project-description">
                        <h3 class="description-title">프로젝트 설명</h3>
                        <div class="description-content">
                            {{ $project->description ?? '서울 강남 지역 지하철 공사 프로젝트입니다. 이 프로젝트는 강남 지역의 대중교통 접근성을 향상시키기 위한 목적으로 진행되고 있습니다. 주요 작업으로는 터널 공사, 역사 건설, 선로 설치 등이 포함됩니다.' }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title">위험성 평가 현황</h2>
                    <a href="{{ route('projects.risk-assessments.index', $project->id ?? 1) }}" class="btn btn-sm btn-secondary">모두 보기</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>제목</th>
                                    <th>위험도</th>
                                    <th>담당자</th>
                                    <th>상태</th>
                                    <th>마지막 업데이트</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 샘플 데이터 - 실제 구현 시 모델 데이터로 대체 -->
                                <tr>
                                    <td>
                                        <a href="#">터널 작업 안전 평가</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">높음</span>
                                    </td>
                                    <td>김철수</td>
                                    <td>
                                        <span class="badge badge-warning">검토 중</span>
                                    </td>
                                    <td>2023-09-15</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">중장비 운용 위험성 평가</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">중간</span>
                                    </td>
                                    <td>이영희</td>
                                    <td>
                                        <span class="badge badge-success">완료</span>
                                    </td>
                                    <td>2023-09-10</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">전기 설비 작업 위험성 평가</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">중간</span>
                                    </td>
                                    <td>박지민</td>
                                    <td>
                                        <span class="badge badge-success">완료</span>
                                    </td>
                                    <td>2023-09-05</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title">근로자 현황</h2>
                    <a href="{{ route('projects.workers.index', $project->id ?? 1) }}" class="btn btn-sm btn-secondary">모두 보기</a>
                </div>
                <div class="card-body">
                    <div class="worker-stats">
                        <div class="stat-item">
                            <span class="stat-value">{{ $workersCount ?? 48 }}</span>
                            <span class="stat-label">총 근로자</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">{{ $activeWorkersCount ?? 42 }}</span>
                            <span class="stat-label">현재 작업 중</span>
                        </div>
                    </div>
                    
                    <h3 class="section-subtitle">최근 등록된 근로자</h3>
                    <ul class="worker-list">
                        <!-- 샘플 데이터 - 실제 구현 시 모델 데이터로 대체 -->
                        <li class="worker-item">
                            <div class="worker-avatar">박</div>
                            <div class="worker-info">
                                <h4 class="worker-name">박민수</h4>
                                <p class="worker-role">전기 기술자</p>
                            </div>
                            <span class="worker-status active"></span>
                        </li>
                        <li class="worker-item">
                            <div class="worker-avatar">김</div>
                            <div class="worker-info">
                                <h4 class="worker-name">김지영</h4>
                                <p class="worker-role">안전 관리자</p>
                            </div>
                            <span class="worker-status active"></span>
                        </li>
                        <li class="worker-item">
                            <div class="worker-avatar">이</div>
                            <div class="worker-info">
                                <h4 class="worker-name">이상호</h4>
                                <p class="worker-role">중장비 운전사</p>
                            </div>
                            <span class="worker-status inactive"></span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title">문서</h2>
                    <a href="{{ route('projects.documents.index', $project->id ?? 1) }}" class="btn btn-sm btn-secondary">모두 보기</a>
                </div>
                <div class="card-body">
                    <ul class="document-list">
                        <!-- 샘플 데이터 - 실제 구현 시 모델 데이터로 대체 -->
                        <li class="document-item">
                            <div class="document-icon pdf"></div>
                            <div class="document-info">
                                <h4 class="document-name">프로젝트 계획서.pdf</h4>
                                <p class="document-meta">홍길동, 2023-09-01</p>
                            </div>
                            <a href="#" class="document-download" title="다운로드"></a>
                        </li>
                        <li class="document-item">
                            <div class="document-icon doc"></div>
                            <div class="document-info">
                                <h4 class="document-name">안전교육 자료.docx</h4>
                                <p class="document-meta">김철수, 2023-09-05</p>
                            </div>
                            <a href="#" class="document-download" title="다운로드"></a>
                        </li>
                        <li class="document-item">
                            <div class="document-icon xls"></div>
                            <div class="document-info">
                                <h4 class="document-name">작업 일정표.xlsx</h4>
                                <p class="document-meta">이영희, 2023-09-10</p>
                            </div>
                            <a href="#" class="document-download" title="다운로드"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .action-buttons {
        display: flex;
        gap: 1rem;
    }
    
    .project-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .info-item {
        display: flex;
        flex-direction: column;
    }
    
    .info-label {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
        margin-bottom: 0.4rem;
    }
    
    .info-value {
        font-size: 1.6rem;
        color: var(--krds-color-light-gray-90);
        font-weight: 500;
    }
    
    .project-description {
        border-top: 1px solid var(--krds-color-light-gray-20);
        padding-top: 2rem;
    }
    
    .description-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--krds-color-light-gray-80);
    }
    
    .description-content {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-70);
        line-height: 1.6;
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
    
    .worker-stats {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .worker-stats .stat-item {
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.8rem;
        padding: 1.6rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .worker-stats .stat-value {
        font-size: 2.4rem;
        font-weight: 700;
        color: var(--krds-color-light-primary-50);
        margin-bottom: 0.4rem;
    }
    
    .worker-stats .stat-label {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
    }
    
    .section-subtitle {
        font-size: 1.4rem;
        font-weight: 600;
        margin: 2rem 0 1rem;
        color: var(--krds-color-light-gray-80);
    }
    
    .worker-list,
    .document-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .worker-item {
        display: flex;
        align-items: center;
        padding: 1.2rem 0;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
    }
    
    .worker-item:last-child {
        border-bottom: none;
    }
    
    .worker-avatar {
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
    
    .worker-info {
        flex: 1;
    }
    
    .worker-name {
        font-size: 1.4rem;
        font-weight: 500;
        margin: 0 0 0.2rem 0;
        color: var(--krds-color-light-gray-80);
    }
    
    .worker-role {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .worker-status {
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
    }
    
    .worker-status.active {
        background-color: var(--krds-color-light-success-50);
    }
    
    .worker-status.inactive {
        background-color: var(--krds-color-light-gray-40);
    }
    
    .document-item {
        display: flex;
        align-items: center;
        padding: 1.2rem 0;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
    }
    
    .document-item:last-child {
        border-bottom: none;
    }
    
    .document-icon {
        width: 3.2rem;
        height: 3.2rem;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        margin-right: 1.2rem;
    }
    
    .document-icon.pdf {
        background-image: url('/img/component/icon/ico_file_pdf.svg');
    }
    
    .document-icon.doc {
        background-image: url('/img/component/icon/ico_file.svg');
    }
    
    .document-icon.xls {
        background-image: url('/img/component/icon/ico_file.svg');
    }
    
    .document-info {
        flex: 1;
    }
    
    .document-name {
        font-size: 1.4rem;
        font-weight: 500;
        margin: 0 0 0.2rem 0;
        color: var(--krds-color-light-gray-80);
    }
    
    .document-meta {
        font-size: 1.2rem;
        color: var(--krds-color-light-gray-60);
        margin: 0;
    }
    
    .document-download {
        width: 2.4rem;
        height: 2.4rem;
        background-image: url('/img/component/icon/ico_download.svg');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .edit-icon {
        background-image: url('/img/component/icon/ico_edit.svg');
    }
    
    .back-icon {
        background-image: url('/img/component/icon/ico_angle.svg');
        transform: rotate(90deg);
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
        
        .project-info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection 