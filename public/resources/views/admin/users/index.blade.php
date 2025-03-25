@extends('layouts.admin')

@section('title', '사용자 관리')

@section('page-title', '사용자 관리')

@section('page-actions')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <span class="btn-icon-left user-add-icon"></span>
        새 사용자 등록
    </a>
@endsection

@section('content')
    <div class="admin-card">
        <div class="card-header">
            <div class="filter-area">
                <form action="{{ route('admin.users.index') }}" method="GET" class="filter-form">
                    <div class="filter-group">
                        <label for="search" class="filter-label">검색:</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="이름, 이메일 검색..." value="{{ request('search') }}">
                    </div>
                    
                    <div class="filter-group">
                        <label for="role" class="filter-label">역할:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">모든 역할</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>관리자</option>
                            <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>매니저</option>
                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>일반 사용자</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="status" class="filter-label">상태:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">모든 상태</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>활성</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>비활성</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary">필터 적용</button>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>이름</th>
                            <th>이메일</th>
                            <th>역할</th>
                            <th>가입일</th>
                            <th>최근 로그인</th>
                            <th>상태</th>
                            <th class="text-right">작업</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users ?? [] as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">{{ substr($user->name ?? 'A', 0, 1) }}</div>
                                    <span>{{ $user->name ?? '홍길동' }}</span>
                                </div>
                            </td>
                            <td>{{ $user->email ?? 'user@example.com' }}</td>
                            <td>
                                @if(($user->role ?? 'admin') == 'admin')
                                    <span class="role-badge admin">관리자</span>
                                @elseif(($user->role ?? '') == 'manager')
                                    <span class="role-badge manager">매니저</span>
                                @else
                                    <span class="role-badge user">일반 사용자</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at ?? '2023-01-15' }}</td>
                            <td>{{ $user->last_login_at ?? '2023-10-15 14:32:10' }}</td>
                            <td>
                                @if(($user->status ?? 'active') == 'active')
                                    <span class="status-badge active">활성</span>
                                @else
                                    <span class="status-badge inactive">비활성</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="action-buttons">
                                    <a href="{{ route('admin.users.edit', $user->id ?? 1) }}" class="btn btn-sm btn-secondary">
                                        수정
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id ?? 1) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?')">
                                            삭제
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if(empty($users ?? []))
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    등록된 사용자가 없습니다.
                                </td>
                            </tr>
                        @else
                            <!-- 샘플 데이터 - 실제 구현 시 제거 -->
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar admin-avatar">홍</div>
                                        <span>홍길동</span>
                                    </div>
                                </td>
                                <td>admin@example.com</td>
                                <td>
                                    <span class="role-badge admin">관리자</span>
                                </td>
                                <td>2023-01-15</td>
                                <td>2023-10-15 14:32:10</td>
                                <td>
                                    <span class="status-badge active">활성</span>
                                </td>
                                <td class="text-right">
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.edit', 1) }}" class="btn btn-sm btn-secondary">
                                            수정
                                        </a>
                                        <form action="{{ route('admin.users.destroy', 1) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?')">
                                                삭제
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">김</div>
                                        <span>김철수</span>
                                    </div>
                                </td>
                                <td>manager@example.com</td>
                                <td>
                                    <span class="role-badge manager">매니저</span>
                                </td>
                                <td>2023-02-20</td>
                                <td>2023-10-14 09:15:22</td>
                                <td>
                                    <span class="status-badge active">활성</span>
                                </td>
                                <td class="text-right">
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.edit', 2) }}" class="btn btn-sm btn-secondary">
                                            수정
                                        </a>
                                        <form action="{{ route('admin.users.destroy', 2) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?')">
                                                삭제
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">이</div>
                                        <span>이영희</span>
                                    </div>
                                </td>
                                <td>user@example.com</td>
                                <td>
                                    <span class="role-badge user">일반 사용자</span>
                                </td>
                                <td>2023-03-10</td>
                                <td>2023-10-10 16:45:33</td>
                                <td>
                                    <span class="status-badge inactive">비활성</span>
                                </td>
                                <td class="text-right">
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.edit', 3) }}" class="btn btn-sm btn-secondary">
                                            수정
                                        </a>
                                        <form action="{{ route('admin.users.destroy', 3) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?')">
                                                삭제
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- 페이지네이션 -->
            <div class="pagination-container">
                {{ $users->links() ?? '' }}
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .filter-area {
        padding: 1.6rem;
    }
    
    .user-info {
        display: flex;
        align-items: center;
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
    
    .admin-avatar {
        background-color: var(--krds-color-light-danger-10);
        color: var(--krds-color-light-danger-50);
    }
    
    .role-badge {
        display: inline-block;
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
        font-size: 1.2rem;
        font-weight: 500;
    }
    
    .role-badge.admin {
        background-color: var(--krds-color-light-danger-10);
        color: var(--krds-color-light-danger-50);
    }
    
    .role-badge.manager {
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
    }
    
    .role-badge.user {
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-gray-60);
    }
    
    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 0.8rem;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
        font-size: 1.2rem;
        font-weight: 500;
    }
    
    .status-badge::before {
        content: '';
        display: inline-block;
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        margin-right: 0.6rem;
    }
    
    .status-badge.active {
        background-color: var(--krds-color-light-success-10);
        color: var(--krds-color-light-success-60);
    }
    
    .status-badge.active::before {
        background-color: var(--krds-color-light-success-50);
    }
    
    .status-badge.inactive {
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-gray-60);
    }
    
    .status-badge.inactive::before {
        background-color: var(--krds-color-light-gray-50);
    }
    
    .text-right {
        text-align: right;
    }
    
    .d-inline {
        display: inline;
    }
    
    .pagination-container {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }
    
    .py-4 {
        padding-top: 1.6rem;
        padding-bottom: 1.6rem;
    }
    
    .text-center {
        text-align: center;
    }
    
    .user-add-icon {
        background-image: url('/img/component/icon/ico_plus.svg');
    }
</style>
@endsection 