@php 

@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/blocks.css?v={{ rand() }}">
@endpush

@section('content')
<nav class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="/">Главная</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="/">Программы</a>
             <i class="fa-solid fa-chevron-right"></i>
            <span>Дети и родительство</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Мама-блогерам доверяют больше всех. <span class="lime">Превратите доверие в доход</span></h1>
        <p>Мама-блогерам доверяют как никому: семья тратит ~$12 000 на детское в первый год. 37 магазинов в каталоге. Средний чек $30-1 000, комиссии 3-15%.</p>
        <small>Обновлено в мае 2026</small>
      </div>
      <div class="btn-group center-group">
        <a href="" class="btn"><bdi>Создать первую ссылку – бесплатно</bdi></a>
      </div>
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
        <p class="text-eyebrow">Калькулятор доходности</p>
        <h2>Сколько реально зарабатывают мама-блогеры</h2>
        <p>Выберите платформу, аудиторию, нишу и географию – посмотрите ожидаемый месячный доход.</p>
      </div>
      @include('components.calculator')
    </div>
</section>


<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">История автора</p>
      <h2>Кейс @mama.blog</h2>
      <p>Реалистичный, но обобщённый пример – числа в подтверждённом отраслевом коридоре детской ниши.</p>
    </div>

    <div class="author-case">
      <div class="author-case__avatar"><img src="/img/img-2.jpg" alt="@mama.blog"></div>
      <div class="author-case__body">
        <div class="author-case__handle">
          @mama.blog 
          <span class="platform">Instagram + Facebook</span>
        </div>
        <h3>«Что в сумке для малыша» + регистры – канал 38K</h3>
        <p class="author-case__quote">
          «Родители доверяют проверенным рекомендациям. Максимум отдачи – регистр (Babylist/Target): один чек-лист – много покупок родственниками за месяцы. Под долгий выбор – бренды с cookie 30+ дней, прямая ссылка на товар.»
        </p>
        <div class="author-case__nums">
          <div><b>34K</b><span>Подписчиков</span></div>
          <div><b>$750</b><span>Доход за месяц</span></div>
          <div><b>28</b><span>Продаж в месяц</span></div>
          <div><b>8 мес.</b><span>На платформе</span></div>
        </div>
        <p class="author-case__disclaimer">Иллюстративный пример. Заменим на реального креатора с верифицируемым каналом.</p>
      </div>
    </div>
       
    <div class="inline-cta">
      <div class="inline-cta__body">
        <p class="text-eyebrow">Видишь свой потенциал?</p>
        <p>Создай первую ссылку для родителей – 2 минуты, бесплатно</p>
      </div>
      <div class="btn-group">
        <a href="" class="btn big">Начать сейчас</a>
      </div>
    </div>
     
  </div>
</section>


<section class="section">
  <div class="container">
      <div class="section-title">
        <p class="text-eyebrow">Где зарабатывать</p>
        <h2>Лучшие платформы для продажи детских товаров</h2>
      </div>

      <div class="platform-link-grid">
        <a href="" class="pl-link-card">
          <div class="pl-link-card_head">
            <i class="fa-brands fa-instagram"></i>
            <h4>Instagram</h4>
          </div>
          <p>Сторис с ежедневной рутиной, Reels</p>
        </a>
        <a href="" class="pl-link-card">
          <div class="pl-link-card_head">
            <i class="fa-brands fa-square-facebook"></i>
            <h4>Facebook</h4>
          </div>
          <p>Группы родителей, аудитория 25-45</p>
        </a>
        <a href="" class="pl-link-card">
         <div class="pl-link-card_head">
            <i class="fa-solid fa-circle-play"></i>
            <h4>YouTube</h4>
          </div>
          <p>Обзоры колясок, гайды по этапам</p>
        </a>
        <a href="" class="pl-link-card">
          <div class="pl-link-card_head">
            <i class="fa-brands fa-tiktok"></i>
            <h4>TikTok</h4>
          </div>
          <p>Мам-блогеры, лайфхаки с детьми</p>
        </a>
      </div>

      
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Что работает</p>
      <h2>4 тактики в детской нише</h2>
    </div>

     <div class="tactics-grid">
      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Долгая отдача</span>
          <span class="tactic-num">01</span>
        </div>
        <h4>«Что в моей сумке для малыша» – долгоиграющий хит</h4>
        <p>Видео-серия с показом каждого предмета: пелёнки, бутылочки, игрушки, аптечка. На каждый предмет – ссылка. Один пост работает 12+ месяцев – родители постоянно ищут «что положить в сумку».</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">30-50 продаж</span>
          <span class="tactic-num">02</span>
        </div>
        <h4>Регистры для малыша (Baby Registry)</h4>
        <p>Babylist – главный baby-registry сервис с партнёрскими комиссиями (до 5%, cookie 30 дней). Партнёрский регистр приносит комиссию с каждой покупки родственниками. Один регистр = 30-50 продаж за 3-6 месяцев беременности + покупки в первый год.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Точное попадание</span>
          <span class="tactic-num">03</span>
        </div>
        <h4>Этапы развития – таргетированные подборки</h4>
        <p>«0-3 месяца: что нужно», «6 месяцев: первый прикорм», «1 год: первые шаги». Родители ищут именно по возрасту – узкие подборки продают лучше общих списков.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Пиковый сезон</span>
          <span class="tactic-num">04</span>
        </div>
        <h4>Сезонные подборки: лето с ребёнком, школа, праздники</h4>
        <p>«Что взять на пляж с малышом» (май-июль), «Подготовка к школе» (август), «Подарки на Рождество для детей 3-5 лет» (ноябрь-декабрь) – пиковые сезоны.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Большой чек</p>
      <h2>Премиум-товары для детей</h2>
    </div>

    <div class="tactics-grid">
      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">30 дней / до 6%</span>
          <span class="tactic-num">01</span>
        </div>
        <h4>Bugaboo – премиум-коляски ($1 000+)</h4>
        <p>До 6% на колясках, до 2% на аксессуарах и автокреслах. Окно отслеживания 30 дней (источник: Awin). Премиум-коляски – долгое решение: родители сравнивают модели 1-3 месяца, читают обзоры, советуются. Хорошо работают форматы «Bugaboo Fox vs UPPAbaby Vista» с конкретикой по весу, складыванию, проходимости. Контент с реальным опытом использования за 2-3 месяца после рождения конвертит сильно лучше первых впечатлений в магазине.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">$50 за SNOO</span>
          <span class="tactic-num">02</span>
        </div>
        <h4>Happiest Baby – умная люлька SNOO</h4>
        <p>SNOO – FDA-одобренная умная люлька ($1 700), которая сама укачивает ребёнка. Программа платит $50 за подтверждение доставки аренды и 4-6% с продажи (источник: Happiest Baby affiliate). Окно отслеживания 30 дней. Контент: «Как мы спим 7 часов с 1-месячным», «SNOO – стоит ли $1 700», «Прокат против покупки». Аудитория – молодые родители, которые не спят, и бабушки-дедушки, готовые на дорогой подарок.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Не только мамы</span>
          <span class="tactic-num">03</span>
        </div>
        <h4>Бабушки и дедушки – отдельная аудитория</h4>
        <p>Премиум-подарки малышу часто покупают не родители, а бабушки и дедушки. Они ищут на Pinterest и Facebook, не на TikTok. Контент для них: «Лучшие подарки малышу до $200/$500/$1 000», «Что подарить новорождённому от бабушки», «Премиум-подарки для baby shower». Стиль формальнее, упор на безопасность и долговечность. Прямая ссылка на товар работает лучше «ссылки в профиле» – старшая аудитория не привыкла искать.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">$25-75 с продажи</span>
          <span class="tactic-num">04</span>
        </div>
        <h4>Одна премиум-продажа = неделя дохода с декора</h4>
        <p>Bugaboo $1 200 × 3-6% = $36-72. SNOO $1 700 × 4% = $68. UPPAbaby Vista $1 000 × 5% = $50. Doona $550 × 6% = $33. Одна продажа премиум-снаряжения приносит больше, чем неделя продаж декора и одежды. Учитывая что американская семья тратит около $12 000 на товары для малыша в первый год (wifitalents, 2026), потенциал значителен – но нужны контент с реальным опытом и терпение на долгие циклы решения.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Путь к выплате</p>
      <h2>Ваш путь от регистрации до первой выплаты</h2>
      <p>Каждый шаг открывает следующий.</p>
    </div>

    <div class="journey">
      <div class="journey__step">
        <div><b>1</b></div>
        <span>Зарегистрируйтесь</span>
        <small>Бесплатно, 1 минута. Никаких порогов по подписчикам.</small>
      </div>
      <div class="journey__step">
        <div><b>2</b></div>
        <span>Подключите свою соцсеть</span>
        <small>Подтверждение 24-48 часов. Доступ к 41 783 партнёрским программам.</small>
      </div>
      <div class="journey__step">
        <div><b>3</b></div>
        <span>Найдите товары для своей ниши</span>
        <small>Соберите 5-10 товаров для детей: игрушки, одежда, бренды для малышей. Получите партнёрскую ссылку на каждый.</small>
      </div>
      <div class="journey__step">
        <div><b>4</b></div>
        <span>Разместите ссылки в публикациях</span>
        <small>В описании, био или закрепе ваших публикаций. Помечайте рекламные посты.</small>
      </div>
    </div>

    <div class="btn-group flex-center" style="margin-top:30px;">
        <a href="" class="btn big">Начать с первого шага</a>
    </div>
    
  </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <p class="text-eyebrow">Вопросы и ответы</p>
            <h2>Частые вопросы про детские товары</h2>
        </div>
        <div class="accordion-wrapper" style="max-width:100%;" data-faq data-open-first="true">
            @include('components.faq-short')
        </div>
        
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <p class="text-eyebrow">Другие ниши</p>
            <h2>Смотреть остальные программы</h2>
        </div>
        @include('components.programs')
        
    </div>
</section>

<section class="section">
    <div class="container">
            <div class="section-title">
                <h2>Ещё сомневаешься,<br> подходит ли тебе CPA Hunter?</h2>
                <p>Пусть ИИ разберётся за тебя. Нажми кнопку и посмотри, что твой любимый ассистент скажет о CPA Hunter.</p>
            </div>
            
            <div class="btn-group center-group ai-btns">
                @include('components.ai')
            </div>

            <div class="ai-badges">
                <div class="ai-badge ai-badge-box">
                    <i class="fa-light fa-unlock"></i><span>CCPA</span>
                </div>
                <div class="ai-badge ai-badge-stars">
                    <img src="/img/ai/stars.svg" alt="">
                </div>
                <div class="ai-badge ai-badge-box">
                    <i class="fa-light fa-unlock"></i><span>CPRA</span>
                </div>
            </div>
            
      
    </div>
</section>
@endsection

@push('scripts')

@endpush