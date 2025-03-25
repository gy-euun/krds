@extends('layouts.app')

@section('title', '홈 - KRDS 웹 애플리케이션')

@section('content')
    <h1 class="page-title">KRDS 디자인 시스템을 활용한 웹 애플리케이션</h1>
    <p class="page-subtitle">KRDS UI/UX 컴포넌트 키트를 이용하여 만든 웹 애플리케이션 샘플입니다.</p>

    <div class="krds-row">
        <div class="krds-col-8">
            <div class="krds-card">
                <h2 class="krds-card-title">시작하기</h2>
                <p>이 웹 애플리케이션은 KRDS UI/UX 디자인 시스템을 기반으로 개발되었습니다. 다양한 컴포넌트와 스타일을 활용하여 쉽고 빠르게 웹 애플리케이션을 구축할 수 있습니다.</p>
                
                <h3 class="mt-4 mb-3">주요 기능</h3>
                <ul>
                    <li>KRDS 디자인 시스템 기반 UI</li>
                    <li>반응형 레이아웃</li>
                    <li>다양한 컴포넌트 활용</li>
                    <li>일관된 디자인 경험</li>
                </ul>
                
                <div class="mt-4">
                    <a href="{{ route('design-guide.index') }}" class="krds-btn krds-btn-primary">디자인 가이드 보기</a>
                </div>
            </div>
            
            <div class="krds-alert krds-alert-success">
                <h3>KRDS 컴포넌트 활용하기</h3>
                <p>디자인 가이드에서 필요한 컴포넌트를 찾아 애플리케이션에 적용할 수 있습니다.</p>
            </div>
        </div>
        
        <div class="krds-col-4">
            <div class="krds-card">
                <h2 class="krds-card-title">컴포넌트 바로가기</h2>
                <ul class="krds-component-list">
                    <li><a href="{{ route('design-guide.component', 'button') }}">버튼</a></li>
                    <li><a href="{{ route('design-guide.component', 'badge') }}">배지</a></li>
                    <li><a href="{{ route('design-guide.component', 'text_input') }}">텍스트 입력</a></li>
                    <li><a href="{{ route('design-guide.component', 'checkbox') }}">체크박스</a></li>
                    <li><a href="{{ route('design-guide.component', 'modal') }}">모달</a></li>
                </ul>
            </div>
            
            <div class="krds-card">
                <h2 class="krds-card-title">커스텀 컴포넌트 예시</h2>
                <p>UserCard 컴포넌트</p>
                
                <x-user-card 
                    name="홍길동" 
                    email="hong@example.com"
                    role="관리자">
                    <button class="krds-btn krds-btn-secondary">편집</button>
                </x-user-card>
                
                <x-user-card 
                    name="김철수" 
                    email="kim@example.com">
                    <button class="krds-btn krds-btn-secondary">편집</button>
                </x-user-card>
            </div>
            
            <div class="krds-card">
                <h2 class="krds-card-title">폼 예제</h2>
                <form>
                    <div class="krds-form-group">
                        <label class="krds-form-label" for="name">이름</label>
                        <input type="text" id="name" class="krds-form-control" placeholder="이름을 입력하세요">
                    </div>
                    
                    <div class="krds-form-group">
                        <label class="krds-form-label" for="email">이메일</label>
                        <input type="email" id="email" class="krds-form-control" placeholder="이메일을 입력하세요">
                    </div>
                    
                    <div class="krds-form-group">
                        <label class="krds-check">
                            <input type="checkbox" class="krds-check-input">
                            <span class="krds-check-label">뉴스레터 구독</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="krds-btn krds-btn-primary">제출하기</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .krds-component-list {
        list-style: none;
        padding: 0;
    }
    
    .krds-component-list li {
        margin-bottom: 1.2rem;
    }
    
    .krds-component-list a {
        display: block;
        padding: 1.2rem;
        background-color: var(--krds-color-light-gray-5);
        border-radius: 0.4rem;
        color: var(--krds-color-light-gray-80);
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .krds-component-list a:hover {
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
    }
</style>
@endsection 