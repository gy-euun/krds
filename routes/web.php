<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignGuideController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/design-guide', [DesignGuideController::class, 'index'])->name('design-guide.index');
Route::get('/design-guide/{component}', [DesignGuideController::class, 'showComponent'])->name('design-guide.component');

// 대시보드
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// 프로젝트 관련 라우트
Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/', function () {
        return view('projects.index');
    })->name('index');
    
    Route::get('/create', function () {
        return view('projects.create');
    })->name('create');
    
    Route::post('/', function () {
        // 실제 구현 시 컨트롤러에서 처리
        return redirect()->route('projects.index')->with('success', '프로젝트가 생성되었습니다.');
    })->name('store');
    
    Route::get('/{id}', function ($id) {
        return view('projects.show');
    })->name('show');
    
    Route::get('/{id}/edit', function ($id) {
        return view('projects.edit');
    })->name('edit');
    
    Route::put('/{id}', function ($id) {
        // 실제 구현 시 컨트롤러에서 처리
        return redirect()->route('projects.show', $id)->with('success', '프로젝트가 수정되었습니다.');
    })->name('update');
    
    Route::delete('/{id}', function ($id) {
        // 실제 구현 시 컨트롤러에서 처리
        return redirect()->route('projects.index')->with('success', '프로젝트가 삭제되었습니다.');
    })->name('destroy');
    
    // 프로젝트 내부 라우트
    Route::prefix('/{id}')->group(function () {
        Route::get('/risk-assessments', function ($id) {
            return view('projects.risk-assessments.index');
        })->name('risk-assessments.index');
        
        Route::get('/workers', function ($id) {
            return view('projects.workers.index');
        })->name('workers.index');
        
        Route::get('/documents', function ($id) {
            return view('projects.documents.index');
        })->name('documents.index');
        
        Route::get('/chatbot', function ($id) {
            return view('projects.chatbot.index');
        })->name('chatbot.index');
    });
});

// 커뮤니티 관련 라우트
Route::prefix('community')->name('community.')->group(function () {
    Route::get('/', function () {
        return view('community.index');
    })->name('index');
    
    Route::get('/create', function () {
        return view('community.create');
    })->name('create');
    
    Route::post('/', function () {
        // 실제 구현 시 컨트롤러에서 처리
        return redirect()->route('community.index')->with('success', '게시글이 작성되었습니다.');
    })->name('store');
    
    Route::get('/{id}', function ($id) {
        return view('community.show');
    })->name('show');
});

// 도움말 관련 라우트
Route::prefix('help')->name('help.')->group(function () {
    Route::get('/', function () {
        return view('help.index');
    })->name('index');
});

// 사용자 프로필 관련 라우트
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/edit', function () {
        return view('profile.edit');
    })->name('edit');
});

// 관리자 페이지 라우트
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', function () {
            return view('admin.users.index');
        })->name('index');
        
        Route::get('/create', function () {
            return view('admin.users.create');
        })->name('create');
        
        Route::post('/', function () {
            // 실제 구현 시 컨트롤러에서 처리
            return redirect()->route('admin.users.index')->with('success', '사용자가 생성되었습니다.');
        })->name('store');
        
        Route::get('/{id}/edit', function ($id) {
            return view('admin.users.edit');
        })->name('edit');
        
        Route::put('/{id}', function ($id) {
            // 실제 구현 시 컨트롤러에서 처리
            return redirect()->route('admin.users.index')->with('success', '사용자 정보가 수정되었습니다.');
        })->name('update');
        
        Route::delete('/{id}', function ($id) {
            // 실제 구현 시 컨트롤러에서 처리
            return redirect()->route('admin.users.index')->with('success', '사용자가 삭제되었습니다.');
        })->name('destroy');
    });
    
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', function () {
            return view('admin.projects.index');
        })->name('index');
    });
    
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', function () {
            return view('admin.settings.index');
        })->name('index');
    });
});

// 인증 관련 라우트 (Laravel의 기본 인증 사용 시)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    return redirect()->route('home');
})->name('logout');
