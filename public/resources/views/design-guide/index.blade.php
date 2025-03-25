@extends('design-guide.layout')

@section('title', 'KRDS UI/UX 디자인 가이드')

@section('sidebar')
    <div class="search-box mb-4">
        <input type="text" id="component-search" class="form-control" placeholder="컴포넌트 검색...">
    </div>
    
    @foreach($categorizedComponents as $category => $components)
        <div class="category-section">
            <h4 class="category-title">{{ $category }}</h4>
            <ul class="component-list">
                @foreach($components as $component)
                    <li class="component-item" data-name="{{ $component }}">
                        <a href="{{ route('design-guide.component', $component) }}">
                            {{ $component }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="krds-container">
        <h1 class="page-title">KRDS UI/UX 디자인 가이드</h1>
        <p class="page-subtitle">다양한 웹 어플리케이션 제작을 위한 KRDS UI/UX 컴포넌트 라이브러리입니다.<br>
        왼쪽 사이드바에서 컴포넌트를 선택하여 세부 정보 및 예제 코드를 확인하세요.</p>
    </div>
    
    <div class="krds-container mt-5">
        <h2 class="mb-4">카테고리별 컴포넌트</h2>
        
        <div class="row">
            @foreach($categorizedComponents as $category => $components)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 krds-card">
                        <div class="card-header krds-card-header">
                            <h3 class="h5 mb-0">{{ $category }}</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-3">{{ count($components) }}개의 컴포넌트</p>
                            <ul class="list-unstyled krds-component-list">
                                @foreach($components as $index => $component)
                                    @if($index < 5)
                                        <li class="krds-component-item mb-2">
                                            <a href="{{ route('design-guide.component', $component) }}" class="d-flex align-items-center">
                                                <span class="mr-2 krds-icon"><i class="fa fa-puzzle-piece text-primary"></i></span>
                                                <span>{{ $component }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            
                            @if(count($components) > 5)
                                <p class="mt-3 text-muted">외 {{ count($components) - 5 }}개 컴포넌트...</p>
                            @endif
                        </div>
                        <div class="card-footer krds-card-footer bg-white border-top-0">
                            <button type="button" class="btn btn-sm btn-krds-primary" data-toggle="modal" data-target="#modal-{{ str_replace(' ', '-', $category) }}">
                                모든 컴포넌트 보기
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- 모달 -->
                <div class="modal fade krds-modal" id="modal-{{ str_replace(' ', '-', $category) }}" tabindex="-1" aria-labelledby="modal-{{ str_replace(' ', '-', $category) }}-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-{{ str_replace(' ', '-', $category) }}-label">{{ $category }} 컴포넌트</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="list-group krds-list-group">
                                    @foreach($components as $component)
                                        <a href="{{ route('design-guide.component', $component) }}" class="list-group-item list-group-item-action krds-list-item">
                                            {{ $component }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="krds-container mt-5 p-4 bg-light rounded">
        <h3>원하는 컴포넌트를 찾을 수 없나요?</h3>
        <p>KRDS UI/UX 디자인 시스템은 지속적으로 확장되고 있습니다. 필요한 컴포넌트가 있으면 개발팀에 문의해주세요.</p>
    </div>
@endsection

@section('additional_styles')
<style>
    .krds-container {
        margin-bottom: 3.2rem;
    }
    
    .krds-card {
        border-radius: 0.8rem;
        border-color: var(--krds-color-light-gray-20);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .krds-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .krds-card-header {
        background-color: var(--krds-color-light-gray-5);
        border-bottom-color: var(--krds-color-light-gray-20);
        padding: 1.6rem;
    }
    
    .krds-card-footer {
        padding: 1.6rem;
    }
    
    .krds-component-list a {
        color: var(--krds-color-light-gray-80);
        text-decoration: none;
        padding: 0.8rem;
        border-radius: 0.4rem;
        transition: background-color 0.2s ease;
    }
    
    .krds-component-list a:hover {
        background-color: var(--krds-color-light-gray-10);
        color: var(--krds-color-light-primary-50);
    }
    
    .krds-icon {
        width: 2.4rem;
        height: 2.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--krds-color-light-primary-10);
        border-radius: 50%;
        color: var(--krds-color-light-primary-50);
    }
    
    .btn-krds-primary {
        background-color: var(--krds-color-light-primary-50);
        border-color: var(--krds-color-light-primary-50);
        color: white;
        padding: 0.8rem 1.6rem;
        border-radius: 0.4rem;
        font-weight: 500;
    }
    
    .btn-krds-primary:hover {
        background-color: var(--krds-color-light-primary-60);
        border-color: var(--krds-color-light-primary-60);
        color: white;
    }
    
    .krds-list-group {
        border-radius: 0.4rem;
        overflow: hidden;
    }
    
    .krds-list-item {
        padding: 1.2rem 1.6rem;
        color: var(--krds-color-light-gray-80);
        border-color: var(--krds-color-light-gray-20);
    }
    
    .krds-list-item:hover {
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
    }
    
    .krds-modal .modal-content {
        border-radius: 0.8rem;
        border: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    
    .krds-modal .modal-header {
        background-color: var(--krds-color-light-primary-10);
        border-bottom-color: var(--krds-color-light-gray-20);
        padding: 1.6rem;
    }
    
    .krds-modal .modal-title {
        color: var(--krds-color-light-primary-50);
        font-weight: 600;
    }
    
    .krds-modal .modal-body {
        padding: 2rem;
    }
</style>
@endsection

@section('scripts')
<script>
    // 컴포넌트 검색 기능
    $(document).ready(function() {
        $('#component-search').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            $('.component-item').each(function() {
                const componentName = $(this).data('name').toLowerCase();
                
                if (componentName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            
            // 카테고리가 비어있으면 숨김
            $('.category-section').each(function() {
                const visibleItems = $(this).find('.component-item:visible').length;
                if (visibleItems === 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>
@endsection 