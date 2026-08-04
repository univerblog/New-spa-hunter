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
        <p class="hiw-dop">
          <span>Первая выплата – $20 вместо $50.</span> Плюс $5 наш бонус – до вывода остаётся заработать $15.</p>
      </div>

    </div>
  </div>
</section>

<!-- <section class="section" id="create">
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
        <button class="btn min outline" onclick="openModal('modal-notif-settings', { className: 'long' })" title="Настройки уведомлений"><i class="fa-regular fa-gear"></i>Настройка уведомлений</button>
      </div>
      
      <div class="section-title" style="margin:30px auto 10px auto;">
          <p>Вывод ошибок и сообщений</p>
      </div>
      <div class="modal-triggers">
        <button class="btn min outline" onclick="openModal('modal-link-created')"> Ссылка готова </button>
        <button class="btn min outline" onclick="openModal('modal-shop-not-found')"> Магазин не найден </button>
        <button class="btn min outline" onclick="openModal('modal-reset-link-expired')"> Ссылка на пароль устарела </button>

        <button class="btn min outline" onclick="openModal('modal-add-payment-method')"> Метод оплаты добавлен </button>
        <button class="btn min outline" onclick="openModal('mmodal-delete-payment-method')"> Удалить метод оплаты? </button>
       
        <button class="btn min outline" onclick="openModal('modal-password-changed')"> Пароль успешно изменён </button>
       
        
        <button class="btn min outline" onclick="openModal('modal-link-duplicate')"> Обнаружен дубликат ссылки </button>
        
        <button class="btn min outline" onclick="openModal('modal-link-error')"> Ошибка создания ссылки </button>
       
    </div>
  </div>
</section>  -->


<section class="section" id="create">
  <div class="container">
      <div class="section-title">
          <h2>{{ __('Create your first link right now') }}</h2>
          <p>{{ __("Paste a product URL or brand name — we'll find the store and generate an affiliate link.") }}</p>
      </div>
      <div class="layout-block layout-form">
         @include('components.create-link.create-link-short')
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
        <div class="btn-group flex-center" style="margin-top:30px;">
            <a href="" class="btn big outline">Смотреть все магазины</a>
        </div>
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

<!-- <section class="section">
  <div class="container">
     <div class="section-title">
        <p class="text-eyebrow">Бренды-партнёры</p>
        <h2>Топ детских магазинов</h2>
      </div>
      @include('components.shops-category')
    </div>
</section> -->

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Подходит для авторов любого масштаба</h2>
            <p>От нано-блогеров до топовых медиаперсон.</p>
        </div>
        
        <div class="creators-grid">

            <div class="creator-card ig">
                <div class="creator-card__head">
                    <div class="cre__ava">
                        <img src="img/img-1.jpg" alt="">
                        <span><i class="fa-brands fa-instagram"></i></span>
                    </div>
                    <div class="cre__who">
                        <span>типичный автор</span>
                        <small>@example</small>
                    </div>
                    <div class="cre__niche">Lifestyle · Instagram</div>
                </div>
                <div class="creator-card__stats">
                    <span><b>128K</b>подписчиков</span>
                    <span><b>$2&nbsp;100</b>в месяц</span>
                </div>
            </div>

            <div class="creator-card yt">
                <div class="creator-card__head">
                    <div class="cre__ava">
                        <img src="img/img-2.jpg" alt="">
                        <span><i class="fa-brands fa-youtube"></i></span>
                    </div>
                    <div class="cre__who">
                        <span>типичный автор</span>
                        <small>@example</small>
                    </div>
                    <div class="cre__niche">Tech · YouTube</div>
                </div>
                <div class="creator-card__stats">
                    <span><b>54K</b>подписчиков</span>
                    <span><b>$3&nbsp;600</b>в месяц</span>
                </div>
            </div>

            <div class="creator-card tt">
                <div class="creator-card__head">
                    <div class="cre__ava">
                        <i class="fa-regular fa-user"></i>
                        <span><i class="fa-brands fa-tiktok"></i></span>
                    </div>
                    <div class="cre__who">
                        <span>типичный автор</span>
                        <small>@example</small>
                    </div>
                    <div class="cre__niche">Beauty · TikTok</div>
                </div>
                <div class="creator-card__stats">
                    <span><b>9K</b>подписчиков</span>
                    <span><b>$420</b>в месяц</span>
                </div>
            </div>

            <div class="creator-card tg">
                <div class="creator-card__head">
                    <div class="cre__ava">
                        <img src="img/img-4.jpg" alt="">
                        <span><i class="fa-brands fa-telegram"></i></span>
                    </div>
                    <div class="cre__who">
                        <span>типичный автор</span>
                        <small>@example</small>
                    </div>
                    <div class="cre__niche">Finance · Telegram</div>
                </div>
                <div class="creator-card__stats">
                    <span><b>22K</b>подписчиков</span>
                    <span><b>$5&nbsp;800</b>в месяц</span>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Найдите программы для вашей ниши</h2>
            <p>Лучшие партнёрские программы под ваш контент.</p>
        </div>

        <div class="niches">
            <a href="#"><i class="fa-regular fa-baby-carriage"></i><span>Дети и родительство</span></a>
            <a href="#"><i class="fa-regular fa-house"></i><span>Дом и интерьер</span></a>
            <a href="#"><i class="fa-regular fa-utensils"></i><span>Еда и кулинария</span></a>
            <a href="#"><i class="fa-regular fa-leaf"></i><span>Здоровье</span></a>
            <a href="#"><i class="fa-regular fa-gamepad"></i><span>Игры</span></a>
            <a href="#"><i class="fa-regular fa-heart"></i><span>Красота и косметика</span></a>
            <a href="#"><i class="fa-regular fa-shirt"></i><span>Мода</span></a>
            <a href="#"><i class="fa-regular fa-paw"></i><span>Питомцы</span></a>
            <a href="#"><i class="fa-regular fa-plane"></i><span>Путешествия</span></a>
            <a href="#"><i class="fa-regular fa-video"></i><span>Стиль жизни и влоги</span></a>
            <a href="#"><i class="fa-regular fa-mobile"></i><span>Техника и гаджеты</span></a>
            <a href="#"><i class="fa-regular fa-dollar-sign"></i><span>Финансы</span></a>
            <a href="#"><i class="fa-regular fa-dumbbell"></i><span>Фитнес</span></a>
        </div>

        <div class="niches niches--curated">
            <a href="#"><i class="fa-regular fa-rocket"></i><span>Для новичков</span></a>
            <a href="#"><i class="fa-regular fa-star"></i><span>Для микро-блогеров</span></a>
            <a href="#"><i class="fa-regular fa-bolt"></i><span>Высокая комиссия</span></a>
        </div>
    </div>
</section>

<section class="section">
  <div class="container">
        <div class="section-title title-left">
           <p class="text-eyebrow">Система лояльности</p>
           <h2>Чем больше зарабатываете – тем <span class="lime">выше ваши ставки</span></h2>
           <p>С каждым уровнем растут ваши ставки на всех партнёрских программах. На Platinum – максимум платформы и индивидуальные условия. Уровень обновляется автоматически каждые 90 дней.</p>
        </div>
        <div class="btn-group flex-left" style="margin-top:30px;">
           <a href="" class="btn big ">Подробнее об уровнях</a>
        </div>
     
        <div class="tier-stair">
          <div class="tier-stair__card s0">
              <div class="ts__top tier-bronze">Bronze <i class="fa-solid fa-circle"></i></div>
              <div class="ts__up base">База
                  <small>стандартная ставка</small>
              </div>
              <div class="ts__thr">Без условий <b>по умолчанию</b></div>
          </div>
          <div class="tier-stair__card s1">
              <div class="ts__top tier-silver">Silver <i class="fa-solid fa-circle"></i></div>
              <div class="ts__up">+14%
                  <small>к базовой ставке</small>
              </div>
              <div class="ts__thr">от $300 <b>90 дней</b></div>
          </div>
          <div class="tier-stair__card s2">
              <div class="ts__top tier-gold">Gold <i class="fa-solid fa-circle"></i></div>
              <div class="ts__up">+29%
                  <small>к базовой ставке</small>
              </div>
              <div class="ts__thr">от $1&nbsp;500 <b>90 дней</b></div>
          </div>
          <div class="tier-stair__card s3">
              <div class="ts__top">Platinum <span>Макс</span></div>
              <div class="ts__up">+36%
                  <small>к базовой ставке</small>
              </div>
              <div class="ts__thr">от $7&nbsp;500 <b>90 дней</b></div>
          </div>
      </div>
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
