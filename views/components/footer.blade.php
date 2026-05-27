@php 

@endphp

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/footer.css?v={{ rand() }}">
    
@endpush



<footer class="container">
    <div class="container-item">


        <div class="foot-wrapper" data-foot-accordion>
            <div class="foot-brand">
                <a href="/" class="foot-logo"><img src="/img/logo.svg" alt=""></a>
                <p class="foot-merch"><span>41 783</span> {{ __('merchants and services') }}</p>
                <p>{{ __('The largest affiliate platform for creators. Quick setup. Start earning today.') }}</p>
            </div>

            <div class="foot-nav">
                <!-- 1. Программы -->
                <div class="foot-item foot-nav-block">
                    <div class="foot-tit">{{ __('Programs') }} <i class="fa-regular fa-angle-down"></i></div>
                    <ul class="ul-wrap programs-list ">
                        <li><a href="/niche/parenting">{{ __('Kids & Parenting') }}</a></li>
                        <li><a href="/niche/home">{{ __('Home & Interior') }}</a></li>
                        <li><a href="/niche/food">{{ __('Food & Cooking') }}</a></li>
                        <li><a href="/niche/wellness">{{ __('Health') }}</a></li>
                        <li><a href="/niche/gaming">{{ __('Gaming') }}</a></li>
                        <li><a href="/niche/beauty">{{ __('Beauty & Cosmetics') }}</a></li>
                        <li><a href="/niche/fashion">{{ __('Fashion') }}</a></li>
                        <li><a href="/niche/pets">{{ __('Pets') }}</a></li>
                        <li><a href="/niche/travel">{{ __('Travel') }}</a></li>
                        <li><a href="/niche/lifestyle">{{ __('Lifestyle & Vlogs') }}</a></li>
                        <li><a href="/niche/tech">{{ __('Tech & Gadgets') }}</a></li>
                        <li><a href="/niche/finance">{{ __('Finance') }}</a></li>
                        <li><a href="/niche/fitness">{{ __('Fitness') }}</a></li>
                        <li><a href="/niche/beginners">{{ __('For beginners') }}</a></li>
                        <li><a href="/niche/micro">{{ __('For micro-bloggers') }}</a></li>
                        <li><a href="/niche/high-commission">{{ __('High commission') }}</a></li>
                    </ul>
                </div>
                <!-- 2. Платформы -->
                <div class="foot-item foot-nav-block">
                    <div class="foot-tit">{{ __('Platforms') }} <i class="fa-regular fa-angle-down"></i></div>
                    <ul class="ul-wrap">
                        <li><a href="/platform/youtube">YouTube</a></li>
                        <li><a href="/platform/instagram">Instagram</a></li>
                        <li><a href="/platform/tiktok">TikTok</a></li>
                        <li><a href="/platform/telegram">Telegram</a></li>
                        <li><a href="/platform/x">X (Twitter)</a></li>
                        <li><a href="/platform/twitch">Twitch</a></li>
                        <li><a href="/platform/facebook">Facebook</a></li>
                    </ul>
                </div>
                <!-- 3. Для авторов -->
                <div class="foot-item foot-nav-block">
                    <div class="foot-tit">{{ __('For creators') }} <i class="fa-regular fa-angle-down"></i></div>
                    <ul class="ul-wrap">
                        <li><a href="#how">{{ __('How it works') }}</a></li>
                        <li><a href="/getlink">{{ __('Create link') }}</a></li>
                        <li><a href="/stats">{{ __('Statistics') }}</a></li>
                        <li><a href="/blog">{{ __('Blog') }}</a></li>
                    </ul>
                </div>
                <!-- 4. Компания -->
                <div class="foot-item foot-nav-block">
                    <div class="foot-tit">{{ __('Company') }} <i class="fa-regular fa-angle-down"></i></div>
                    <ul class="ul-wrap">
                        <li><a href="/about">{{ __('About us') }}</a></li>
                        <li><a href="/contacts">{{ __('Contacts') }}</a></li>
                        <li><a href="/roadmap">{{ __('Roadmap') }}</a></li>
                        <li><a href="https://api.cpahunter.io/docs" target="_blank" rel="noopener">{{ __('Open API') }}</a></li>
                    </ul>
                </div>
            </div>
           
        
    </div>

        
        <div class="foot-wrapper-2">
            <div class="foot-item-soz">
                <a target="_blank" rel="nofollow" href="https://"><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" rel="nofollow" href="https://"><i class="fa-brands fa-facebook-f"></i></a>
                <a target="_blank" rel="nofollow" href="https://"><i class="fa-brands fa-threads"></i></a>
                <a target="_blank" rel="nofollow" href="https://"><i class="fa-brands fa-medium"></i></a>
            </div>  

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

        <div class="foot-copy">
            © 2026 CPA Hunter. People PRO Inc. / 30 N Gould St Ste R, Sheridan, WY, 82801, USA
           <span>
                <a href="/terms">{{ __('Terms of use') }}</a>
                <a href="/privacy">{{ __('Privacy policy') }}</a>
            </span>
        </div>

    </div>
</footer>


@push('scripts')


@endpush