<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DesignGuideController extends Controller
{
    /**
     * 디자인 가이드 메인 페이지를 표시합니다.
     */
    public function index()
    {
        // 카테고리별 컴포넌트 목록을 가져옵니다.
        $categorizedComponents = $this->getCategorizedComponents();
        
        // 추가: 정적 에셋 경로를 뷰에 전달
        $assetPath = asset('/');
        
        return view('design-guide.index', compact('categorizedComponents', 'assetPath'));
    }
    
    /**
     * 특정 컴포넌트를 표시합니다.
     */
    public function showComponent($component)
    {
        $categorizedComponents = $this->getCategorizedComponents();
        $componentContent = $this->getComponentContent($component);
        $currentCategory = $this->findComponentCategory($component, $categorizedComponents);
        
        // 추가: 정적 에셋 경로를 뷰에 전달
        $assetPath = asset('/');
        
        // 컴포넌트 내용 전처리: 상대 경로를 절대 경로로 변환
        if ($componentContent) {
            // 아이콘 경로 수정
            $componentContent = $this->fixIconPaths($componentContent);
        }
        
        return view('design-guide.component', compact('categorizedComponents', 'component', 'componentContent', 'currentCategory', 'assetPath'));
    }
    
    /**
     * 컴포넌트 내용에서 아이콘 경로를 수정합니다.
     */
    private function fixIconPaths($content)
    {
        // 상대 경로를 절대 경로로 변환
        $content = preg_replace(
            '/url\((?:\.\.\/)+img\/component\/icon\/([\w\-\.]+\.svg)\)/',
            'url(' . asset('/img/component/icon') . '/$1)',
            $content
        );
        
        // 중복된 img 경로 수정
        $content = preg_replace(
            '/url\((?:\.\.\/)+img\/img\/component\/icon\/([\w\-\.]+\.svg)\)/',
            'url(' . asset('/img/component/icon') . '/$1)',
            $content
        );
        
        return $content;
    }
    
    /**
     * 컴포넌트의 카테고리를 찾습니다.
     */
    private function findComponentCategory($component, $categorizedComponents)
    {
        foreach ($categorizedComponents as $category => $components) {
            if (in_array($component, $components)) {
                return $category;
            }
        }
        
        return null;
    }
    
    /**
     * 카테고리별로 정리된 컴포넌트 목록을 반환합니다.
     */
    private function getCategorizedComponents()
    {
        $componentFiles = File::files(base_path('krds-uiux/html/code'));
        $components = [];
        
        foreach ($componentFiles as $file) {
            $filename = $file->getFilename();
            $name = str_replace('.html', '', $filename);
            $components[] = $name;
        }
        
        sort($components);
        
        // 컴포넌트를 카테고리별로 분류
        $categories = [
            '입력 요소' => $this->filterComponentsByPattern($components, ['button', 'checkbox', 'radio', 'text_input', 'select', 'textarea', 'date_input', 'file_upload']),
            '탐색 요소' => $this->filterComponentsByPattern($components, ['breadcrumb', 'pagination', 'skip_link', 'in_page_navigation', 'side_navigation', 'main_menu', 'language_switcher']),
            '컨테이너' => $this->filterComponentsByPattern($components, ['accordion', 'modal', 'card', 'structured_list', 'tab', 'disclosure']),
            '정보 표시' => $this->filterComponentsByPattern($components, ['badge', 'tag', 'tooltip', 'table', 'critical_alerts', 'spinner', 'calendar']),
            '레이아웃' => $this->filterComponentsByPattern($components, ['header', 'footer', 'masthead', 'help_panel', 'tutorial_panel']),
            '미디어' => $this->filterComponentsByPattern($components, ['carousel', 'carousel_banner'])
        ];
        
        // 분류되지 않은 컴포넌트는 '기타' 카테고리에 추가
        $categorizedComponentIds = [];
        foreach ($categories as $categoryComponents) {
            $categorizedComponentIds = array_merge($categorizedComponentIds, $categoryComponents);
        }
        
        $uncategorized = array_diff($components, $categorizedComponentIds);
        
        if (count($uncategorized) > 0) {
            $categories['기타'] = $uncategorized;
        }
        
        return $categories;
    }
    
    /**
     * 주어진 패턴에 맞는 컴포넌트를 필터링합니다.
     */
    private function filterComponentsByPattern($components, $patterns)
    {
        $filtered = [];
        
        foreach ($components as $component) {
            foreach ($patterns as $pattern) {
                if (strpos($component, $pattern) !== false) {
                    $filtered[] = $component;
                    break;
                }
            }
        }
        
        return $filtered;
    }
    
    /**
     * 특정 컴포넌트의 HTML 내용을 가져옵니다.
     */
    private function getComponentContent($component)
    {
        $filePath = base_path("krds-uiux/html/code/{$component}.html");
        
        if (File::exists($filePath)) {
            return File::get($filePath);
        }
        
        return null;
    }
}
