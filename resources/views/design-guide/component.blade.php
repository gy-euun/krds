@extends('design-guide.layout')

@section('title', $component . ' - KRDS UI/UX 디자인 가이드')

@section('sidebar')
    <div class="search-box mb-4">
        <input type="text" id="component-search" class="form-control" placeholder="컴포넌트 검색...">
    </div>

    @foreach($categorizedComponents as $category => $components)
        <div class="category-section {{ $currentCategory === $category ? 'active' : '' }}">
            <h4 class="category-title">{{ $category }}</h4>
            <ul class="component-list">
                @foreach($components as $componentName)
                    <li class="component-item" data-name="{{ $componentName }}">
                        <a href="{{ route('design-guide.component', $componentName) }}"
                           class="{{ $componentName === $component ? 'active' : '' }}">
                            {{ $componentName }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="component-detail krds-container">
        <div class="component-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-title">{{ $component }}</h1>
                <a href="{{ route('design-guide.index') }}" class="btn btn-krds-secondary">
                    <i class="fa fa-arrow-left mr-2"></i> 목록으로
                </a>
            </div>
            @if($currentCategory)
                <span class="krds-badge">{{ $currentCategory }}</span>
            @endif
            <hr class="krds-divider">
        </div>
        
        @if($componentContent)
            <div class="component-section">
                <ul class="nav krds-nav-tabs" id="componentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="preview-tab" data-toggle="tab" href="#preview" role="tab" aria-controls="preview" aria-selected="true">미리보기</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code" aria-selected="false">코드</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="usage-tab" data-toggle="tab" href="#usage" role="tab" aria-controls="usage" aria-selected="false">사용법</a>
                    </li>
                </ul>
                
                <div class="tab-content krds-tab-content" id="componentTabsContent">
                    <div class="tab-pane fade show active" id="preview" role="tabpanel" aria-labelledby="preview-tab">
                        <div class="component-preview">
                            {!! $componentContent !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="code" role="tabpanel" aria-labelledby="code-tab">
                        <div class="code-actions mb-2">
                            <button class="btn btn-sm btn-krds-secondary copy-code-btn" data-clipboard-target="#component-code">
                                <i class="fa fa-copy mr-1"></i> 코드 복사
                            </button>
                        </div>
                        <pre class="krds-code"><code class="language-html" id="component-code">{{ $componentContent }}</code></pre>
                    </div>
                    <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                        <div class="usage-content krds-usage">
                            <h4>{{ $component }} 사용법</h4>
                            <p>이 컴포넌트는 다음과 같은 상황에서 사용됩니다:</p>
                            
                            <h5>구성요소</h5>
                            <ul class="krds-list">
                                <li>HTML 요소: 기본 마크업 구조</li>
                                <li>CSS 클래스: 스타일과 레이아웃</li>
                                @if(strpos($component, 'accordion') !== false || strpos($component, 'carousel') !== false || strpos($component, 'modal') !== false)
                                <li>JavaScript: 상호작용 및 상태 관리</li>
                                @endif
                            </ul>
                            
                            <h5>JavaScript 초기화</h5>
                            @if(strpos($component, 'accordion') !== false)
                            <pre class="krds-code"><code class="language-javascript">// 아코디언 초기화
if (typeof initAccordion === 'function') {
    initAccordion();
}</code></pre>
                            @elseif(strpos($component, 'carousel') !== false)
                            <pre class="krds-code"><code class="language-javascript">// 캐러셀 초기화
if (typeof initCarousel === 'function') {
    initCarousel();
}</code></pre>
                            @elseif(strpos($component, 'modal') !== false)
                            <pre class="krds-code"><code class="language-javascript">// 모달 초기화
if (typeof initModal === 'function') {
    initModal();
}</code></pre>
                            @else
                            <p>이 컴포넌트는 별도의 JavaScript 초기화가 필요하지 않습니다.</p>
                            @endif
                            
                            <h5>접근성 고려사항</h5>
                            <p>이 컴포넌트는 다음과 같은 접근성 기능을 제공합니다:</p>
                            <ul class="krds-list krds-check-list">
                                <li>키보드 접근성</li>
                                <li>스크린 리더 지원</li>
                                <li>충분한 색상 대비</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="related-components mt-5">
                <h3>관련 컴포넌트</h3>
                <div class="row">
                    @php
                        $relatedComponents = [];
                        if ($currentCategory && isset($categorizedComponents[$currentCategory])) {
                            $relatedComponents = array_filter($categorizedComponents[$currentCategory], function($item) use ($component) {
                                return $item !== $component;
                            });
                            $relatedComponents = array_slice($relatedComponents, 0, 3);
                        }
                    @endphp
                    
                    @forelse($relatedComponents as $relatedComponent)
                        <div class="col-md-4 mb-3">
                            <div class="card krds-card-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedComponent }}</h5>
                                    <a href="{{ route('design-guide.component', $relatedComponent) }}" class="btn btn-sm btn-krds-primary">보기</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">관련 컴포넌트가 없습니다.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @else
            <div class="component-error">
                <div class="krds-alert krds-alert-warning">
                    <h4>컴포넌트를 찾을 수 없습니다.</h4>
                    <p>요청하신 컴포넌트 '{{ $component }}'를 찾을 수 없습니다.</p>
                    <a href="{{ route('design-guide.index') }}" class="btn btn-krds-primary mt-3">
                        메인 페이지로 돌아가기
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('additional_styles')
<style>
    .krds-container {
        margin-bottom: 3.2rem;
    }
    
    .krds-badge {
        display: inline-block;
        background-color: var(--krds-color-light-primary-40);
        color: white;
        padding: 0.4rem 1.2rem;
        border-radius: 2rem;
        font-size: 1.4rem;
        font-weight: 500;
        margin-top: 0.8rem;
    }
    
    .krds-divider {
        border-top: 1px solid var(--krds-color-light-gray-20);
        margin: 2.4rem 0;
    }
    
    .btn-krds-secondary {
        background-color: var(--krds-color-light-gray-10);
        border-color: var(--krds-color-light-gray-20);
        color: var(--krds-color-light-gray-70);
        font-weight: 500;
        padding: 0.8rem 1.6rem;
        border-radius: 0.4rem;
        transition: all 0.2s ease;
    }
    
    .btn-krds-secondary:hover {
        background-color: var(--krds-color-light-gray-20);
        color: var(--krds-color-light-gray-80);
    }
    
    .krds-nav-tabs {
        border-bottom: 1px solid var(--krds-color-light-gray-20);
        margin-bottom: 0;
    }
    
    .krds-nav-tabs .nav-link {
        color: var(--krds-color-light-gray-70);
        font-size: 1.6rem;
        font-weight: 500;
        padding: 1.2rem 2.4rem;
        border: none;
        border-bottom: 2px solid transparent;
        margin-bottom: -1px;
        transition: all 0.2s ease;
    }
    
    .krds-nav-tabs .nav-link:hover {
        color: var(--krds-color-light-primary-50);
        border-bottom-color: var(--krds-color-light-primary-30);
    }
    
    .krds-nav-tabs .nav-link.active {
        color: var(--krds-color-light-primary-50);
        border-bottom-color: var(--krds-color-light-primary-50);
        background-color: transparent;
    }
    
    .krds-tab-content {
        padding: 2.4rem;
        background-color: var(--krds-color-light-gray-0);
        border: 1px solid var(--krds-color-light-gray-20);
        border-top: none;
        border-radius: 0 0 0.4rem 0.4rem;
        margin-bottom: 3.2rem;
    }
    
    .krds-code {
        background-color: var(--krds-color-light-gray-10);
        border-radius: 0.4rem;
        padding: 1.6rem;
        margin: 0;
    }
    
    .krds-usage h4 {
        font-size: 2.4rem;
        font-weight: 600;
        margin-bottom: 1.6rem;
        color: var(--krds-color-light-gray-80);
    }
    
    .krds-usage h5 {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 2.4rem 0 1.2rem;
        color: var(--krds-color-light-gray-70);
    }
    
    .krds-list {
        list-style: disc;
        padding-left: 2rem;
        margin-bottom: 2rem;
    }
    
    .krds-list li {
        margin-bottom: 0.8rem;
        font-size: 1.6rem;
    }
    
    .krds-check-list {
        list-style: none;
        padding-left: 0;
    }
    
    .krds-check-list li {
        position: relative;
        padding-left: 2.8rem;
    }
    
    .krds-check-list li:before {
        content: '';
        display: inline-block;
        width: 1.6rem;
        height: 1.6rem;
        background-color: var(--krds-color-light-primary-50);
        mask-image: url(/img/component/icon/ico_checkbox_checked.svg);
        -webkit-mask-image: url(/img/component/icon/ico_checkbox_checked.svg);
        mask-size: contain;
        -webkit-mask-size: contain;
        position: absolute;
        left: 0;
        top: 0.4rem;
    }
    
    .krds-card-sm {
        border-radius: 0.8rem;
        border-color: var(--krds-color-light-gray-20);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .krds-card-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .krds-alert {
        padding: 2.4rem;
        border-radius: 0.8rem;
        margin: 2.4rem 0;
    }
    
    .krds-alert-warning {
        background-color: var(--krds-color-light-warning-10);
        border-left: 4px solid var(--krds-color-light-warning-40);
        color: var(--krds-color-light-warning-60);
    }
    
    .krds-alert h4 {
        color: var(--krds-color-light-warning-60);
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1.2rem;
    }
    
    .krds-alert p {
        margin-bottom: 0;
        font-size: 1.6rem;
    }
    
    .btn-krds-primary {
        background-color: var(--krds-color-light-primary-50);
        border-color: var(--krds-color-light-primary-50);
        color: white;
        padding: 0.8rem 1.6rem;
        border-radius: 0.4rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    
    .btn-krds-primary:hover {
        background-color: var(--krds-color-light-primary-60);
        border-color: var(--krds-color-light-primary-60);
        color: white;
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
        
        // 탭 기능 초기화
        $('.nav-tabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
        
        // 코드 복사 기능
        $('.copy-code-btn').on('click', function() {
            const codeText = $('#component-code').text();
            navigator.clipboard.writeText(codeText).then(function() {
                alert('코드가 클립보드에 복사되었습니다.');
            }, function() {
                alert('코드 복사에 실패했습니다.');
            });
        });
    });
</script>
@endsection 