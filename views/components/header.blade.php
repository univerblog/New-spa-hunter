@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/header.css?v={{ rand() }}">  
@endpush

<header class="header">
    <div class="container top-block">
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
                        <a href="/niche/beginners"><i class="fa-solid fa-rocket-launch"></i> {{ __('For beginners') }}</a>
                        <a href="/niche/micro"><i class="fa-solid fa-star"></i> {{ __('For micro-bloggers') }}</a>
                        <a href="/niche/high-commission"><i class="fa-sharp fa-solid fa-bolt"></i> {{ __('High commission') }}</a>
                    </div>

                    <div class="nav-dropdown-section nav-grid">
                        <a href="/niche/beauty"><i class="fa-solid fa-lips"></i> {{ __('Beauty & Cosmetics') }}</a>
                        <a href="/niche/fashion"><i class="fa-solid fa-sunglasses"></i> {{ __('Fashion') }}</a>
                        <a href="/niche/finance"><i class="fa-solid fa-sack-dollar"></i> {{ __('Finance') }}</a>
                        <a href="/niche/food"><i class="fa-solid fa-burger-glass"></i> {{ __('Food & Cooking') }}</a>
                        <a href="/niche/gaming"><i class="fa-solid fa-gamepad-modern"></i> {{ __('Gaming') }}</a>
                        <a href="/niche/wellness"><i class="fa-solid fa-heart-pulse"></i> {{ __('Health') }}</a>
                        <a href="/niche/fitness"><i class="fa-solid fa-bicycle"></i> {{ __('Fitness') }}</a>
                        <a href="/niche/home"><i class="fa-solid fa-puzzle-piece"></i> {{ __('Home & Interior') }}</a>
                        <a href="/niche/parenting"><i class="fa-solid fa-baby-carriage"></i> {{ __('Kids & Parenting') }}</a>
                        <a href="/niche/pets"><i class="fa-solid fa-paw"></i> {{ __('Pets') }}</a>
                        <a href="/niche/tech"><i class="fa-solid fa-watch-apple"></i> {{ __('Tech & Gadgets') }}</a>
                        <a href="/niche/travel"><i class="fa-solid fa-plane fa-rotate-by" style="--fa-rotate-angle:-45deg;"></i> {{ __('Travel') }}</a>
                        <a href="/niche/lifestyle"><i class="fa-solid fa-camera-retro"></i> {{ __('Lifestyle & Vlogs') }}</a>
                    </div>

                    </div>
                </div>

                <!-- 3. Платформы -->
                <div class="nav-dropdown">
                    <button><span>{{ __('Platforms') }}</span><i class="arrow-icon"></i></button>
                    <div class="nav-dropdown-menu">
                    <a href="/platform/youtube"><i class="fa-solid fa-circle-play"></i> YouTube</a>
                    <a href="/platform/instagram"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="/platform/tiktok"><i class="fa-brands fa-tiktok"></i> TikTok</a>
                    <a href="/platform/telegram"><i class="fa-solid fa-paper-plane"></i> Telegram</a>
                    <a href="/platform/x"><i class="fa-brands fa-x-twitter"></i> X (Twitter)</a>
                    <a href="/platform/twitch"><i class="fa-brands fa-twitch"></i> Twitch</a>
                    <a href="/platform/facebook"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
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
            <!-- <button class="btn min" onclick="openModal('modal-login')">Вход</button> -->

            <div class="dropdown-block">
                <button class="dropdown-btn header-avatar">
                    <img src="/img/ava.webp" alt="">
                    <!-- <span>Sp</span> -->
                </button>
                <div class="dropdown-item header-cab-list">

                    <div class="cab-nav-profile">
                        <a href="cabinet" class="cab-prof__head">
                           
                            <div class="cab-prof__meta">
                                <h4>Sergey Pavlovich</h4>
                                <div class="cab-nav-level">
                                    <i class="fa-regular fa-chess-rook-piece"></i>
                                    <span>Bronze</span>
                                </div>
                            </div>
                        </a>
                        <div class="cab-prof__progress">
                            <div class="cab-prof__progress-line">
                                <span>До <span class="next-tier">Silver</span></span>
                                <span>$234 / $300</span>
                            </div>
                            <div class="cab-prof__progress-bar">
                                <div class="cab-prof__progress-fill" style="width:78%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cab-nav-line"></div>
                    <div class="cab-nav-group">
                        <div class="cab-nav-field">
                            <a href=""><i class="fa-regular fa-gear"></i>Настройки</a>
                            <a href=""><i class="fa-regular fa-chart-line"></i>Статистика</a>
                            <a href=""><i class="fa-regular fa-gift"></i>Партнёрская программа</a>
                            <a href=""><i class="fa-regular fa-headset"></i>Поддержка</a>
                            <div class="cab-nav-line"></div>
                            <a href="" class="red"><i class="fa-regular fa-arrow-right-from-bracket"></i>Выйти</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="nav-toggle"><span></span></div>


    </div>
</header>
