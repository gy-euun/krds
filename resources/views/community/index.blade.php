@extends('layouts.app')

@section('title', '커뮤니티')

@section('page-title', '커뮤니티')

@section('page-actions')
    <a href="{{ route('community.create') }}" class="btn btn-primary">
        <span class="btn-icon-left create-icon"></span>
        새 글 작성
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="filter-area">
                <form action="{{ route('community.index') }}" method="GET" class="filter-form">
                    <div class="filter-group">
                        <label for="search" class="filter-label">검색:</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="제목, 내용 검색..." value="{{ request('search') }}">
                    </div>
                    
                    <div class="filter-group">
                        <label for="category" class="filter-label">카테고리:</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">모든 카테고리</option>
                            <option value="notice" {{ request('category') == 'notice' ? 'selected' : '' }}>공지사항</option>
                            <option value="qna" {{ request('category') == 'qna' ? 'selected' : '' }}>질문 & 답변</option>
                            <option value="share" {{ request('category') == 'share' ? 'selected' : '' }}>자료 공유</option>
                            <option value="free" {{ request('category') == 'free' ? 'selected' : '' }}>자유게시판</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary">필터 적용</button>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            <ul class="post-list">
                @foreach($posts ?? [] as $post)
                    <li class="post-item">
                        <div class="post-category {{ $post->category ?? 'notice' }}">
                            {{ $post->category_name ?? '공지사항' }}
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', $post->id ?? 1) }}">
                                    {{ $post->title ?? '[공지] 안전관리 시스템 커뮤니티 이용 안내' }}
                                </a>
                                @if(($post->is_new ?? true))
                                    <span class="new-badge">New</span>
                                @endif
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">{{ $post->author_name ?? '관리자' }}</span>
                                <span class="post-date">{{ $post->created_at ?? '2023-10-15' }}</span>
                                <span class="post-views">조회 {{ $post->views ?? 128 }}</span>
                                <span class="post-comments">댓글 {{ $post->comments_count ?? 5 }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach

                @if(empty($posts ?? []))
                    <li class="post-item empty">
                        등록된 게시글이 없습니다.
                    </li>
                @else
                    <!-- 샘플 데이터 - 실제 구현 시 제거 -->
                    <li class="post-item">
                        <div class="post-category notice">
                            공지사항
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', 1) }}">
                                    [공지] 안전관리 시스템 커뮤니티 이용 안내
                                </a>
                                <span class="new-badge">New</span>
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">관리자</span>
                                <span class="post-date">2023-10-15</span>
                                <span class="post-views">조회 128</span>
                                <span class="post-comments">댓글 5</span>
                            </div>
                        </div>
                    </li>
                    <li class="post-item">
                        <div class="post-category qna">
                            질문 & 답변
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', 2) }}">
                                    고소 작업 시 안전벨트 착용 관련 문의드립니다.
                                </a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">홍길동</span>
                                <span class="post-date">2023-10-12</span>
                                <span class="post-views">조회 64</span>
                                <span class="post-comments">댓글 3</span>
                            </div>
                        </div>
                    </li>
                    <li class="post-item">
                        <div class="post-category share">
                            자료 공유
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', 3) }}">
                                    최신 건설현장 안전 관리 매뉴얼 공유합니다.
                                </a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">김철수</span>
                                <span class="post-date">2023-10-10</span>
                                <span class="post-views">조회 96</span>
                                <span class="post-comments">댓글 2</span>
                            </div>
                        </div>
                    </li>
                    <li class="post-item">
                        <div class="post-category free">
                            자유게시판
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', 4) }}">
                                    현장에서 찍은 가을 풍경 사진입니다.
                                </a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">이영희</span>
                                <span class="post-date">2023-10-08</span>
                                <span class="post-views">조회 52</span>
                                <span class="post-comments">댓글 7</span>
                            </div>
                        </div>
                    </li>
                    <li class="post-item">
                        <div class="post-category qna">
                            질문 & 답변
                        </div>
                        <div class="post-main">
                            <h3 class="post-title">
                                <a href="{{ route('community.show', 5) }}">
                                    위험성 평가 작성 방법 질문드립니다.
                                </a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-author">박지민</span>
                                <span class="post-date">2023-10-05</span>
                                <span class="post-views">조회 78</span>
                                <span class="post-comments">댓글 4</span>
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
            
            <!-- 페이지네이션 -->
            <div class="pagination-container">
                {{ $posts->links() ?? '' }}
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .post-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .post-item {
        display: flex;
        padding: 2rem 0;
        border-bottom: 1px solid var(--krds-color-light-gray-20);
    }
    
    .post-item:last-child {
        border-bottom: none;
    }
    
    .post-item.empty {
        text-align: center;
        color: var(--krds-color-light-gray-60);
        padding: 3rem 0;
    }
    
    .post-category {
        flex-shrink: 0;
        width: 10rem;
        padding: 0.6rem 1rem;
        border-radius: 0.4rem;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 500;
        margin-right: 2rem;
        height: fit-content;
    }
    
    .post-category.notice {
        background-color: var(--krds-color-light-information-10);
        color: var(--krds-color-light-information-50);
    }
    
    .post-category.qna {
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
    }
    
    .post-category.share {
        background-color: var(--krds-color-light-success-10);
        color: var(--krds-color-light-success-50);
    }
    
    .post-category.free {
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-gray-60);
    }
    
    .post-main {
        flex: 1;
    }
    
    .post-title {
        font-size: 1.6rem;
        font-weight: 500;
        margin: 0 0 1rem 0;
        color: var(--krds-color-light-gray-90);
    }
    
    .post-title a {
        color: inherit;
        text-decoration: none;
    }
    
    .post-title a:hover {
        color: var(--krds-color-light-primary-50);
    }
    
    .new-badge {
        display: inline-block;
        color: var(--krds-color-light-danger-50);
        font-size: 1.2rem;
        font-weight: 500;
        margin-left: 0.8rem;
    }
    
    .post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1.6rem;
        font-size: 1.3rem;
        color: var(--krds-color-light-gray-60);
    }
    
    .post-author {
        color: var(--krds-color-light-gray-70);
        font-weight: 500;
    }
    
    .pagination-container {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }
    
    .create-icon {
        background-image: url('/img/component/icon/ico_create.svg');
    }
    
    @media (max-width: 576px) {
        .post-item {
            flex-direction: column;
        }
        
        .post-category {
            width: auto;
            margin-right: 0;
            margin-bottom: 1rem;
            display: inline-block;
        }
    }
</style>
@endsection 