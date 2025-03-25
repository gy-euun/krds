<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserCard extends Component
{
    /**
     * 사용자 이름
     *
     * @var string
     */
    public $name;
    
    /**
     * 사용자 이메일
     *
     * @var string
     */
    public $email;
    
    /**
     * 사용자 역할
     *
     * @var string
     */
    public $role;
    
    /**
     * 프로필 이미지 URL
     *
     * @var string|null
     */
    public $avatar;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $email, string $role = '사용자', string $avatar = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->avatar = $avatar ?? 'https://via.placeholder.com/64';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-card');
    }
}
