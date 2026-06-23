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
      @include('components.hero-home')
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
        <h3>Зарегистрируйтесь и&nbsp;добавьте площадку</h3>
        <p>30 секунд. Без порога входа по подписчикам и модерации кампаний. Также даём $5 бонусом к будущим выплатам.</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-display"></i></div>
          <div class="hiw-num">02</div>
        </div>
        <h3>Создайте партнёрскую ссылку</h3>
        <p>Выберите любой из 40 000+ магазинов из каталога или вставьте URL на конкретный товар.</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-link"></i></div>
          <div class="hiw-num">03</div>
        </div>
        <h3>Разместите ссылку в&nbsp;соцсетях</h3>
        <p>Создавайте интересный и полезный контент о товаре и прикрепляйте к нему наши партнёрские ссылки.</p>
      </div>

      <div class="hiw-card">
        <div class="hiw-top">
          <div class="hiw-icon"><i class="fa-solid fa-dollar-sign"></i></div>
          <div class="hiw-num">04</div>
        </div>
        <h3>Получайте выплаты в&nbsp;любое время</h3>
        <p>Аудитория покупает – вы зарабатываете. Отслеживание в реальном времени.</p>
        <p class="hiw-dop">Первая выплата – $20 вместо $50. Плюс $5 наш бонус – до вывода остаётся заработать $15.</p>
      </div>

    </div>
  </div>
</section>

<section class="section" id="create">
  <div class="container">
      <div class="section-title" style="margin:0 auto 10px auto;">
        <h2>Модалки</h2>
        <p>Ввод данных</p>
      </div>
      <div class="modal-triggers">
        <button class="btn min outline" onclick="openModal('modal-login')"> Вход </button>
        <button class="btn min outline" onclick="openModal('modal-register')"> Регистрация </button>
        <button class="btn min outline" onclick="openModal('modal-password-reset')"> Восстановление пароля </button>
        <button class="btn min outline" onclick="openModal('modal-password-change')"> Смена пароля </button>
        <button class="btn min outline" onclick="openModal('modal-email-change')"> Смена email </button>
        <button class="btn min outline" onclick="openModal('modal-note-add')"> Добавить заметку </button>
        <button class="btn min outline" onclick="openModal('modal-support-message')"> Сообщение в поддержку </button>
        <button class="btn min outline" onclick="openModal('modal-2fa')"> Двухфакторная аутентификация </button>
      </div>

      <div class="section-title" style="margin:30px auto 10px auto;">
        <p>Действия</p>
      </div>
      <div class="modal-triggers">
        <button class="btn min outline" onclick="openModal('modal-link-delete')"> Отключить источник </button>
        <button class="btn min outline" onclick="openModal('modal-account-delete')"> Удалить аккаунт </button>
      </div>
      
      <div class="section-title" style="margin:30px auto 10px auto;">
          <p>Вывод ошибок и сообщений</p>
      </div>
      <div class="modal-triggers">
        <button class="btn min outline" onclick="openModal('modal-link-created')"> Ссылка готова </button>
        <button class="btn min outline" onclick="openModal('modal-shop-not-found')"> Магазин не найден </button>
        <button class="btn min outline" onclick="openModal('modal-reset-link-expired')"> Ссылка на пароль устарела </button>
        <!-- <button class="btn min outline" onclick="openModal('modal-reset-link-expired-2')"> Ссылка на пароль устарела 2 </button> -->
        <button class="btn min outline" onclick="openModal('modal-password-changed')"> Пароль успешно изменён </button>
        <!-- <button class="btn min outline" onclick="openModal('modal-password-changed-2')"> Пароль успешно изменён 2 </button> -->
        
        <button class="btn min outline" onclick="openModal('modal-link-duplicate')"> Обнаружен дубликат ссылки </button>
        <!-- <button class="btn min outline" onclick="openModal('modal-link-duplicate-2')"> Обнаружен дубликат ссылки 2 </button> -->
        <button class="btn min outline" onclick="openModal('modal-link-error')"> Ошибка создания ссылки </button>
        <!-- <button class="btn min outline" onclick="openModal('modal-link-invalid')"> Недействительная ссылка </button> -->
    </div>
  </div>
</section> 


<section class="section" id="create">
  <div class="container">
    <div class="section-title">
      <h2>{{ __('Create your first link right now') }}</h2>
      <p>{{ __("Paste a product URL or brand name — we'll find the store and generate an affiliate link.") }}</p>
    </div>
    @include('components.create-link-form')
    </div>
</section> 

<section class="section">
  <div class="container">
     <div class="section-title">
         <p class="text-eyebrow">{{ __('90% of creators are leaving money on the table') }}</p>
         <h2>{{ __('No sponsors?') }}<br>{{ __('No platform monetization?') }}</h2>
      </div>
      <div class="objection-wrap">
         <p>{{ __('No matter. Affiliate links work from day one — for beginners and pros alike. No budget, no technical skills, no waiting.') }}</p>
         <p>{{ __('You already recommend products to your audience.') }} <span>{{ __('Start earning a commission for it.') }}</span></p>
         <div class="btn-group">
            <a data-auth="register" class="btn big">{{ __('Start earning') }}</a>
         </div>
      </div>
    </div>
</section>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h2>Продвигайте бренды,<br /> которые ваша аудитория уже покупает</h2>
        <p>Тысячи топовых магазинов в каждой нише.</p>
      </div>
      @include('components.shops')
    </div>
</section>

<section class="section">
  <div class="container">
     <div class="section-title">
        <p class="text-eyebrow">Калькулятор доходности</p>
        <h2>Реальные цифры дохода блогеров</h2>
        <p>Выберите платформу, аудиторию, нишу и географию – посмотрите ожидаемый месячный доход.</p>
      </div>
      @include('components.calculator')
    </div>
</section>

<section class="section">
  <div class="container">
     <div class="section-title">
        <p class="text-eyebrow">Бренды-партнёры</p>
        <h2>Топ детских магазинов</h2>
      </div>
      @include('components.shops-category')
    </div>
</section>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h2>{{ __('Questions? We\'ve Got You') }}</h2>
        <p>{{ __('Search our FAQs for quick answers, or connect with us for extra support.') }}</p>
      </div>
      @include('components.faq')
    </div>
</section>





@endsection

@push('scripts')



@endpush
