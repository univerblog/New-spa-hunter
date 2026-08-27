@php
    $data = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/notifications.php';
    $notifications = array_slice($data['rows'], 0, 6);
@endphp

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/header.css?v={{ rand() }}">  
@endpush

<header class="header">
    <div class="container top-block">
        <div class="nav-toggle"><span></span></div>
        
        <a href="/" class="logo"><span><i>CPA</i></span>Hunter</a>
        <div class="top-menu">
            
            <nav class="nav" data-mob-menu>

                <!-- 1. Инструменты -->
                <div class="nav-dropdown">
                    <button><span>{{ __('Tools') }}</span><i class="arrow-icon"></i></button>
                    <div class="nav-dropdown-menu start-open">
                    <a href="#how"><i class="fa-solid fa-circle-question"></i> {{ __('How it works') }}</a>
                    <a href="/getlink"><i class="fa-solid fa-link"></i> {{ __('Create link') }}</a>
                    <a href="/stats"><i class="fa-solid fa-chart-line"></i> {{ __('Statistics') }}</a>
                    </div>
                </div>

                <!-- 2. Программы -->
                <div class="nav-dropdown">
                    <button><span>{{ __('Programs') }}</span><i class="arrow-icon"></i></button>
                    <div class="nav-dropdown-menu">

                    <div class="nav-dropdown-section nav-special">
                        <a href="/program-page"><i class="fa-solid fa-rocket-launch"></i> {{ __('For beginners') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-star"></i> {{ __('For micro-bloggers') }}</a>
                        <a href="/program-page"><i class="fa-sharp fa-solid fa-bolt"></i> {{ __('High commission') }}</a>
                    </div>

                    <div class="nav-dropdown-section nav-grid">
                        <a href="/program-page"><i class="fa-solid fa-lips"></i> {{ __('Beauty & Cosmetics') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-sunglasses"></i> {{ __('Fashion') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-sack-dollar"></i> {{ __('Finance') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-burger-glass"></i> {{ __('Food & Cooking') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-gamepad-modern"></i> {{ __('Gaming') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-heart-pulse"></i> {{ __('Health') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-bicycle"></i> {{ __('Fitness') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-puzzle-piece"></i> {{ __('Home & Interior') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-baby-carriage"></i> {{ __('Kids & Parenting') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-paw"></i> {{ __('Pets') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-watch-apple"></i> {{ __('Tech & Gadgets') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-plane fa-rotate-by" style="--fa-rotate-angle:-45deg;"></i> {{ __('Travel') }}</a>
                        <a href="/program-page"><i class="fa-solid fa-camera-retro"></i> {{ __('Lifestyle & Vlogs') }}</a>
                    </div>

                    </div>
                </div>

                <!-- 3. Платформы -->
                <div class="nav-dropdown">
                    <button><span>{{ __('Platforms') }}</span><i class="arrow-icon"></i></button>
                    <div class="nav-dropdown-menu">
                    <a href="/platform-page"><i class="fa-solid fa-circle-play"></i> YouTube</a>
                    <a href="/platform-page"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="/platform-page"><i class="fa-brands fa-tiktok"></i> TikTok</a>
                    <a href="/platform-page"><i class="fa-solid fa-paper-plane"></i> Telegram</a>
                    <a href="/platform-page"><i class="fa-brands fa-x-twitter"></i> X (Twitter)</a>
                    <a href="/platform-page"><i class="fa-brands fa-twitch"></i> Twitch</a>
                    <a href="/platform-page"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
                    </div>
                </div>

                <!-- 4. О нас -->
                <div class="nav-dropdown">
                    <button><span>{{ __('About us') }}</span><i class="arrow-icon"></i></button>
                    <div class="nav-dropdown-menu">
                    <a href="/about"><i class="fa-solid fa-users"></i> {{ __('Who we are') }}</a>
                    <a href="/contacts"><i class="fa-solid fa-envelope"></i> {{ __('Contacts') }}</a>
                    <a href="/roadmap"><i class="fa-solid fa-map"></i> {{ __('Roadmap') }}</a>
                    </div>
                </div>

            </nav>
           
            <div class="header-actions">
                <div class="header-toggle">

                    <button class="theme-toggle" type="button" aria-label="{{ __('Toggle theme') }}">
                        <i class="fa-regular fa-sun-bright icon-sun"></i>
                        <i class="fa-regular fa-moon icon-moon"></i>
                    </button>

                    <div class="dropdown-block lang-picker">
                        <button class="dropdown-btn">
                            <span class="fi fi-{{ $current['flag'] }}"></span>
                            <span>{{ $current['code'] }}</span>
                            <i class="fa-regular fa-angle-down"></i>
                        </button>
                        <div class="dropdown-item">
                            @foreach ($languages as $code => $lng)
                                <a href="{{ $lng['url'] }}" class="@if($code === $lang) active @endif">
                                    <span class="fi fi-{{ $lng['flag'] }}"></span>{{ $lng['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>               
            </div>

        </div>
      
        <div class="header-auth">
            <button class="btn min" onclick="openModal('modal-login')" style="display:none;">Вход</button>

            <a href="/cabinet/balance" class="header-balance">
                <div>
                    <small>Подтверждено</small>
                    <span class="green">$234,50</span>
                </div>
                <div>
                    <small>В ожидании</small>
                    <span>$124,00</span>
                </div>
            </a>

           
            <div class="dropdown-block">

                <button type="button" class="dropdown-btn header-notif__btn">
                    <i class="fa-regular fa-bell"></i>
                    <span>6</span>
                </button>

                <div class="dropdown-item header-notif__pop">

                    <div class="header-notif__head">
                        <span>Уведомления</span>
                        <button type="button" class="header-notif__readall">Прочитать все</button>
                    </div>

                    <div class="header-notif__list content-scroll">

                        @foreach ($notifications as $row)
                            <div class="header-notif__item">

                                <div class="header-notif__icon">
                                    {!! $data['categories'][$row['cat']]['icon'] !!}
                                </div>

                                <div class="header-notif__body">
                                    <div class="header-notif__text">{{ $row['text'] }}</div>
                                    <div class="header-notif__date">{{ $row['date'] }}</div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <a href="cabinet/notifications" class="header-notif__all">Все уведомления</a>
                </div>
            </div>

            <div class="dropdown-block">
                <button class="dropdown-btn header-avatar" data-cab-toggle>
                    <img src="/img/ava.webp" alt="">
                    <!-- <span>Sp</span> -->
                </button>
                <div class="dropdown-item header-cab-list">
                    @include('components.cabinet.cabinet-short-nav')
                </div>
            </div>

        </div>


    </div>
</header>

@push('scripts')
<script>
// открытие меню кабинета в хедере можно выводить только у юзеров     
(function(){
    var btn    = document.querySelector('[data-cab-toggle]');   
    var cab    = document.querySelector('.cab-sidebar');         
    var navBtn = document.querySelector('.nav-toggle');          
    var top    = document.querySelector('.top-menu');            
    if(!btn || !cab) return;

    var mq = window.matchMedia('(max-width:1200px)');

    // ава: тоггл кабинета + закрыть основное
    btn.addEventListener('click', function(e){
        if(!mq.matches) return;          // ПК: не мешаем дропдауну
        e.stopPropagation();             // мобила: гасим дропдаун-логику my.js
        cab.classList.toggle('show');
        if(top)    top.classList.remove('show');
        if(navBtn) navBtn.classList.remove('active');
    });

    // бургер основного: закрыть кабинет
    if(navBtn){
        navBtn.addEventListener('click', function(){
            cab.classList.remove('show');
        });
    }
})();
</script>

<script>
/// ЭТО ВРЕМЕННЫЙ СКРИПТ, ЛОГИН/ВЫХОД - УДАЛИТЬ ПОТОМ НА БЭКЕ !!!    

/////////////////////////////////// ВЫШЕ УДАЛИТЬ !!!
</script>
@endpush
