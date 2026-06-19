@php 
//$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';
@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/cabinet.css?v={{ rand() }}">  
@endpush

@section('content')


@endsection

<section class="section">
    <div class="container">
        <div class="cabinet-wrapper">
            <aside class="cab-sidebar">
                <div class="cab-profile">
                    <div class="cab-profile-head">
                    <div class="cab-profile-avatar">SP</div>
                    <div class="cab-profile-meta">
                        <div class="cab-profile-name">Sergey Pavlovich</div>
                        <div class="cab-profile-tier-line">
                        <span class="cab-tier-dot tier-bronze"></span>
                        <span>Bronze</span>
                        </div>
                    </div>
                    </div>
                    <div class="cab-profile-progress">
                    <div class="cab-profile-progress-line">
                        <span>До <span class="next-tier">Silver</span></span>
                        <span>$234 / $300</span>
                    </div>
                    <div class="cab-progress-bar"><div class="cab-progress-fill" style="width:78%"></div></div>
                    </div>
                </div>

                <div class="cab-nav-group">
                    <div class="cab-nav-group-title">Главное</div>
                    <a class="cab-nav-item active" data-route="cabinet">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
                    <span class="cab-nav-label">Главная</span>
                    </a>
                    <a class="cab-nav-item" href="#stats" target="_blank" rel="noopener" title="Откроется в&nbsp;новом окне">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    <span class="cab-nav-label">Мои ссылки</span>
                    <svg class="cab-nav-external" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    </a>
                    <a class="cab-nav-item" data-route="cabinet-sources">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M2 12h20"></path><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    <span class="cab-nav-label">Источники трафика</span>
                    </a>
                    <a class="cab-nav-item" data-route="cabinet-tiers">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 L15 8.5 L22 9.3 L17 14 L18.5 21 L12 17.5 L5.5 21 L7 14 L2 9.3 L9 8.5 Z"></path></svg>
                    <span class="cab-nav-label">Мой уровень</span>
                    </a>
                </div>

                <div class="cab-nav-group">
                    <div class="cab-nav-group-title">Деньги</div>
                    <a class="cab-nav-item" data-route="cabinet-balance">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4z"></path></svg>
                    <span class="cab-nav-label">Баланс</span>
                    </a>
                    <a class="cab-nav-item" data-route="cabinet-withdraw">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5"></path><path d="M5 12l7 7 7-7"></path></svg>
                    <span class="cab-nav-label">Вывод</span>
                    </a>
                    <a class="cab-nav-item" data-route="cabinet-tax">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="3" y1="10" x2="21" y2="10"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="16" y1="2" x2="16" y2="6"></line></svg>
                    <span class="cab-nav-label">Налоги</span>
                    </a>
                </div>

                <div class="cab-nav-group">
                    <div class="cab-nav-group-title">Заработать ещё</div>
                    <a class="cab-nav-item featured" data-route="cabinet-referrals">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                    <span class="cab-nav-label">Партнёрка</span>
                    </a>
                </div>

                <div class="cab-nav-group">
                    <div class="cab-nav-group-title">Прочее</div>
                    <a class="cab-nav-item" data-route="cabinet-notifications">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="cab-nav-label">Уведомления</span><span class="cab-nav-badge">2</span>
                    </a>
                    <a class="cab-nav-item" data-route="cabinet-settings">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span class="cab-nav-label">Настройки</span>
                    </a>
                    <a class="cab-nav-item" data-route="logout">
                    <svg class="cab-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="cab-nav-label">Выйти</span>
                    </a>
                </div>
                </aside>
            <div class="cabinet-main"></div>
        </div>  
      
    </div>
</section>
@push('scripts')



@endpush