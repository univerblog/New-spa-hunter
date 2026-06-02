@php 
//$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';

@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/home-page.css?v={{ rand() }}">
@endpush

@section('content')

<!-- ============ HERO ============ -->
<section class="hero">
  <div class="container hero-grid">
   

      <div class="hero-left">
        <div class="hero-eyebrow">{{ __('Affiliate platform for creators') }}</div>
        <h1>{!! __('Earn on your <span class="accent">recommendations</span>') !!}</h1>
        <p class="hero-lead">{{ __('Your audience buys on your advice — you get a commission on every sale.') }}</p>
        <p class="hero-claim"><span class="accent">{{ __("The world's largest affiliate network.") }}</span> {{ __("Brand not here? Then it has no affiliate program at all.") }}</p>

        <div class="hero-ctas">
          <a href="#create" class="btn big">{{ __('Create link') }}</a>
          <button type="button" class="btn big outline" id="hero-video-btn" aria-label="{{ __('Watch demo') }}">
            <span class="hero-play-circle"><i class="fa-solid fa-play"></i></span>
            {{ __('Watch demo') }}
          </button>
        </div>

        <div class="hero-note">
          <span>
            <span class="hero-note-dot"></span>
            <span><strong class="hero-note-num js-merchants-count">41&nbsp;783</strong> {{ __('shops') }}</span>
          </span>
          <span>
            <span class="hero-note-dot"></span>
            <span><strong>{{ __('No') }}</strong> {{ __('moderation') }}</span>
          </span>
          <span>
            <span class="hero-note-dot"></span>
            <span>{{ __('Payout from') }} <strong>$50</strong></span>
          </span>
          <span>
            <span class="hero-note-dot"></span>
            <span class="hero-pay-method">{{ __('Bank') }}</span>
            <span class="hero-pay-method">PayPal</span>
            <span class="hero-pay-method">Wise</span>
            <span class="hero-pay-method">Payoneer</span>
            <span class="hero-pay-method">Skrill</span>
            <span class="hero-pay-method">Neteller</span>
            <span class="hero-pay-method">Crypto</span>
          </span>
        </div>
      </div>

      <!-- Dashboard mockup (декоративный) -->
      <div class="dash">
        <div class="dash-head">
          <div class="dash-tabs">
            <span class="dash-tab">{{ __('Week') }}</span>
            <span class="dash-tab active">{{ __('Month') }}</span>
            <span class="dash-tab">{{ __('Year') }}</span>
          </div>
          <div class="dash-stats">
            <span class="dash-stat dash-stat-green">$0.00 {{ __('confirmed') }}</span>
            <span class="dash-stat dash-stat-orange">$20.86 {{ __('pending') }}</span>
          </div>
        </div>
        <div class="chart-wrap">
          <svg viewBox="0 0 400 160" preserveAspectRatio="none">
            <line x1="0" y1="40" x2="400" y2="40" stroke="rgba(255,255,255,0.04)" stroke-width="1"></line>
            <line x1="0" y1="80" x2="400" y2="80" stroke="rgba(255,255,255,0.04)" stroke-width="1"></line>
            <line x1="0" y1="120" x2="400" y2="120" stroke="rgba(255,255,255,0.04)" stroke-width="1"></line>
            <path d="M0,140 L20,135 L40,128 L60,138 L80,120 L100,115 L120,135 L140,90 L160,110 L180,55 L200,80 L220,40 L240,60 L260,30 L280,50 L300,70 L320,65 L340,90 L360,55 L380,75 L400,95" fill="none" stroke="#4DD8E5" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            <path d="M0,150 L40,148 L80,145 L120,142 L160,135 L200,120 L220,80 L240,100 L260,105 L280,115 L320,108 L360,90 L400,118" fill="none" stroke="#FFB547" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            <circle cx="220" cy="80" r="3" fill="#FFB547"></circle>
            <circle cx="260" cy="30" r="3" fill="#4DD8E5"></circle>
            <circle cx="180" cy="55" r="3" fill="#4DD8E5"></circle>
          </svg>
        </div>
        <div class="legend">
          <span><i class="l-c"></i>{{ __('Clicks') }}</span>
          <span><i class="l-p"></i>{{ __('Sales') }}</span>
          <span><i class="l-r"></i>{{ __('Reward') }}</span>
        </div>
        <div class="dash-table">
          <div class="dash-th">
            <div>{{ __('Merchant') }}</div>
            <div>{{ __('Link') }}</div>
            <div>{{ __('Clicks') }}</div>
            <div>{{ __('Sales') }}</div>
            <div>{{ __('Status') }}</div>
          </div>
          <div class="dash-tr">
            <div class="merchant"><span class="merchant-dot">T</span>Trip.com</div>
            <div class="short-link">cpa.cx/d6...</div>
            <div>40</div><div>7</div>
            <div><span class="pill pill-amber">$29.33</span></div>
          </div>
          <div class="dash-tr">
            <div class="merchant"><span class="merchant-dot">A</span>aviasales</div>
            <div class="short-link">cpa.cx/29...</div>
            <div>7</div><div>3</div>
            <div><span class="pill pill-amber">$0.01</span></div>
          </div>
          <div class="dash-tr">
            <div class="merchant"><span class="merchant-dot">A</span>adidas thailand</div>
            <div class="short-link">cpa.cx/1c...</div>
            <div>4</div><div>1</div>
            <div><span class="pill pill-amber">$3.33</span></div>
          </div>
        </div>
      </div>

   
  </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="section" id="how">
  <div class="container">
    <div class="section-title">
      <h2>{{ __('How it works') }}</h2>
      <p>{{ __('From sign-up to first payout — 4 simple steps.') }}</p>
    </div>
    <div class="hiw-grid">

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-user-plus"></i></div>
          <div class="hiw-num">01</div>
        </div>
        <h3>{{ __('Free registration') }}</h3>
        <p>{{ __('30 seconds — via social login or email and password. No moderation, no entry barrier.') }}</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-display"></i></div>
          <div class="hiw-num">02</div>
        </div>
        <h3>{{ __('Add your platform') }}</h3>
        <p>{{ __('Connect Instagram, TikTok, YouTube, Twitch, X, Telegram or Facebook. We approve very fast!') }}</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-link"></i></div>
          <div class="hiw-num">03</div>
        </div>
        <h3>{{ __('Create link') }}</h3>
        <p>{{ __('Paste a product or store URL — get an affiliate link in 3 seconds.') }}</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-dollar-sign"></i></div>
          <div class="hiw-num">04</div>
        </div>
        <h3>{{ __('Get paid') }}</h3>
        <p>{{ __('Your audience buys — you earn. Real-time tracking.') }}</p>
      </div>

    </div>
  </div>
</section>


<section class="section create-section" id="create">
  <div class="container">
    <div class="section-title">
      <h2>{{ __('Create your first link right now') }}</h2>
      <p>{{ __("Paste a product URL or brand name — we'll find the store and generate an affiliate link.") }}</p>
    </div>
    @include('components.forms.create-link-form')
    </div>
</section> 

<section class="sectiom" style="scroll-margin-top: 30px;">
    <div class="container">
        <div class="section-title">
            <h2>Формы</h2>
            <p>From signup to first commission in 4 simple steps.</p>
        </div>
 
        <div class="flex-block-wrapper">
            @include('components.form')
        </div>
            
    </div>
</section> 


@endsection

@push('scripts')



@endpush
