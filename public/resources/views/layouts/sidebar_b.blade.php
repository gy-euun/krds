<div class="app-sidebar sidebar-b">
    <div class="sidebar-header">
        <h2>프로젝트</h2>
        <a href="{{ route('projects.index') }}" class="back-link">
            <span class="back-icon"></span>
            <span>프로젝트 목록으로</span>
        </a>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="nav-list">
            <li class="nav-item {{ request()->routeIs('projects.show', ['id' => $projectId ?? 0]) ? 'active' : '' }}">
                <a href="{{ route('projects.show', ['id' => $projectId ?? 0]) }}" class="nav-link">
                    <span class="nav-icon dashboard-icon"></span>
                    <span class="nav-text">대시보드</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('projects.risk-assessments.*') ? 'active' : '' }}">
                <a href="{{ route('projects.risk-assessments.index', ['id' => $projectId ?? 0]) }}" class="nav-link">
                    <span class="nav-icon risk-icon"></span>
                    <span class="nav-text">위험성 평가</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('projects.workers.*') ? 'active' : '' }}">
                <a href="{{ route('projects.workers.index', ['id' => $projectId ?? 0]) }}" class="nav-link">
                    <span class="nav-icon worker-icon"></span>
                    <span class="nav-text">근로자 관리</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('projects.documents.*') ? 'active' : '' }}">
                <a href="{{ route('projects.documents.index', ['id' => $projectId ?? 0]) }}" class="nav-link">
                    <span class="nav-icon document-icon"></span>
                    <span class="nav-text">문서 관리</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('projects.chatbot.*') ? 'active' : '' }}">
                <a href="{{ route('projects.chatbot.index', ['id' => $projectId ?? 0]) }}" class="nav-link">
                    <span class="nav-icon chatbot-icon"></span>
                    <span class="nav-text">안전 챗봇</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <div class="project-info">
            <h3>{{ $currentProject->name ?? '프로젝트 이름' }}</h3>
            <p>{{ $currentProject->status ?? '진행 중' }}</p>
        </div>
    </div>
</div> 