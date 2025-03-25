<div class="krds-user-card">
    <div class="krds-user-card-avatar">
        <img src="{{ $avatar }}" alt="{{ $name }}의 프로필 이미지">
    </div>
    <div class="krds-user-card-info">
        <h3 class="krds-user-card-name">{{ $name }}</h3>
        <p class="krds-user-card-email">{{ $email }}</p>
        <span class="krds-user-card-role">{{ $role }}</span>
    </div>
    @if($slot->isNotEmpty())
        <div class="krds-user-card-actions">
            {{ $slot }}
        </div>
    @endif
</div>

<style>
    .krds-user-card {
        display: flex;
        background-color: white;
        border-radius: 0.8rem;
        padding: 1.6rem;
        box-shadow: 0 0.2rem 0.8rem rgba(0, 0, 0, 0.1);
        margin-bottom: 1.6rem;
    }
    
    .krds-user-card-avatar {
        margin-right: 1.6rem;
    }
    
    .krds-user-card-avatar img {
        width: 6.4rem;
        height: 6.4rem;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .krds-user-card-info {
        flex: 1;
    }
    
    .krds-user-card-name {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0 0 0.4rem 0;
        color: var(--krds-color-light-gray-90);
    }
    
    .krds-user-card-email {
        font-size: 1.4rem;
        color: var(--krds-color-light-gray-60);
        margin: 0 0 0.8rem 0;
    }
    
    .krds-user-card-role {
        display: inline-block;
        font-size: 1.2rem;
        background-color: var(--krds-color-light-primary-10);
        color: var(--krds-color-light-primary-50);
        padding: 0.4rem 0.8rem;
        border-radius: 1.2rem;
    }
    
    .krds-user-card-actions {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }
</style>