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
            <a href="/">Платформы</a>
             <i class="fa-solid fa-chevron-right"></i>
            <span>YouTube</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Зарабатывайте на YouTube <span class="lime">на видео, которые уже сняли.</span> Без вложений и бренд-сделок</h1>
        <p>YouTube – самая результативная площадка для партнёрских ссылок. Первые три строки описания и закреплённый комментарий дают 8-15% переходов. Разбираем форматы, ниши и приёмы, которые приносят доход.</p>
        <small>Обновлено в мае 2026</small>
      </div>
      <div class="btn-group center-group">
        <a href="" class="btn"><bdi>Создать ссылку для YouTube</bdi></a>
        <a href="" class="btn outline"><bdi>Посмотреть форматы</bdi></a>
      </div>
    </div>
</section>


<section class="section">
  <div class="container">
     <div class="section-title">
        <p class="text-eyebrow">Калькулятор доходности</p>
        <h2>Сколько зарабатывают на YouTube</h2>
        <p>Выберите платформу, аудиторию, нишу и географию – посмотрите ожидаемый месячный доход.</p>
      </div>
      @include('components.calculator')
    </div>
</section>


<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">История автора</p>
      <h2>Кейс @TravelWithMike</h2>
      <p>Реалистичный, но обобщённый пример – числа в подтверждённом отраслевом коридоре детской ниши.</p>
    </div>

    <div class="author-case">
      <div class="author-case__avatar"><img src="/img/img-4.jpg" alt="@TravelWithMike"></div>
      <div class="author-case__body">
        <div class="author-case__handle">
          @TravelWithMike 
          <span class="platform">YouTube</span>
        </div>
        <h3>«Закреплённый комментарий добавил $1 200 в месяц к ссылке, которая уже работала в описании»</h3>
        <p class="author-case__quote">
          «Когда у меня была только ссылка в описании – выходило около $2 200 в месяц. Добавил закреплённый комментарий с подборкой «вся моя техника из этого видео» – и доход вырос до $3 420. Та же аудитория, тот же контент, просто новая точка контакта.»
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
    
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Самые доходные ниши</p>
      <h2>Что лучше всего продается на YouTube</h2>
    </div>

    <div class="niches-link-grid">
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-laptop"></i>
            <div class="niches-link-head"><span>Техника и гаджеты</span><small>Apple, Best Buy, Dell, Logitech</small></div>
            <div class="niches-link-meta"><div><span>3-50%</span><small>комиссия</small></div><div><span>8,2%</span><small>переходов</small></div></div>
        </a>
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-gamepad"></i>
            <div class="niches-link-head"><span>Игры</span><small>Razer, Logitech G, NordVPN, G Fuel</small></div>
            <div class="niches-link-meta"><div><span>5-40%</span><small>комиссия</small></div><div><span>7,5%</span><small>переходов</small></div></div>
        </a>
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-chart-line"></i>
            <div class="niches-link-head"><span>Финансы и инвестиции</span><small>eToro, Coinbase, Binance, SoFi</small></div>
            <div class="niches-link-meta"><div><span>$20-500</span><small>комиссия</small></div><div><span>5,8%</span><small>переходов</small></div></div>
        </a>
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-heart-pulse"></i>
            <div class="niches-link-head"><span>Здоровье и велнес</span><small>iHerb, AG1, Ritual, BetterHelp</small></div>
            <div class="niches-link-meta"><div><span>2-40%</span><small>комиссия</small></div><div><span>5,3%</span><small>переходов</small></div></div>
        </a>
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-camera-retro"></i>
            <div class="niches-link-head"><span>Стиль жизни и влоги</span><small>Amazon, Skillshare, MasterClass, Brooklinen</small></div>
            <div class="niches-link-meta"><div><span>3-40%</span><small>комиссия</small></div><div><span>4,8%</span><small>переходов</small></div></div>
        </a>
        <a href="#" class="niches-link-card">
            <i class="fa-solid fa-plane"></i>
            <div class="niches-link-head"><span>Путешествия</span><small>Booking, Expedia, Airbnb, Klook</small></div>
            <div class="niches-link-meta"><div><span>3-8%</span><small>комиссия</small></div><div><span>4,2%</span><small>переходов</small></div></div>
        </a>
     </div>

    <div class="niches-link-grid-2">
    <a href="#" class="niches-link-card-2">
        <i class="fa-solid fa-user-plus"></i>
        <div>
            <span>Для новичков</span>
            <small>Магазины, которые принимают авторов от 1K подписчиков</small>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
    </a>
    <a href="#" class="niches-link-card-2">
        <i class="fa-solid fa-users"></i>
        <div>
            <span>Для микро-блогеров</span>
            <small>Лучшие условия для аудитории 5K-50K</small>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
    </a>
    <a href="#" class="niches-link-card-2">
        <i class="fa-solid fa-dollar-sign"></i>
        <div>
            <span>Высокая комиссия</span>
            <small>Магазины с комиссией 10%+</small>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
    </a>
    

    </div>


  </div>
</section>





<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Что работает</p>
      <h2>Где ставить ссылку на YouTube</h2>
    </div>

    <div class="tactics-grid">
      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Лучший формат</span>
          <span class="tactic-metric"><b>8-15%</b> переходов</span>
        </div>
        <h4>Описание: первые 3 строки</h4>
        <p>Первые три строки описания видны без раскрытия. Туда ставится CPA Hunter ссылка с короткой подводкой. Лучшая отдача на платформе.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Долгоиграющий</span>
          <span class="tactic-metric"><b>6-12%</b> переходов</span>
        </div>
        <h4>Закреплённый комментарий</h4>
        <p>Видят все зрители. Переходы накапливаются с просмотрами – ссылка работает годами. Идеально для подборок товаров.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Поверх видео</span>
          <span class="tactic-metric"><b>4-8%</b> переходов</span>
        </div>
        <h4>Финальные заставки и подсказки</h4>
        <p>Встроенные элементы поверх видео. Переходов меньше, чем с описания, но добираются до тех, кто досмотрел ролик до конца.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Растущий</span>
          <span class="tactic-metric"><b>3-6%</b> переходов</span>
        </div>
        <h4>Shorts: описание под кнопкой</h4>
        <p>Shorts собирают максимум охвата, но описание скрыто за кнопкой – открывают реже. Лучше использовать как тизер: «Полный обзор и ссылки в основном ролике».</p>
      </div>
    </div>

     <div class="inline-cta">
      <div class="inline-cta__body">
        <p class="text-eyebrow">Видишь свой потенциал?</p>
        <p>Готов запустить? Ссылка в описании или в углу Shorts – за 2 минуты</p>
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
      <p class="text-eyebrow">Что работает</p>
      <h2>Пять приёмов, которые увеличивают доход</h2>
    </div>

    <div class="tactics-grid">
      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">8-15% переходов</span>
          <span class="tactic-num">01</span>
        </div>
        <h4>Первые три строки описания – главное</h4>
        <p>Без раскрытия видны только три строки. Туда ставится одна сильная ссылка с короткой подводкой. Не списком, не семь штук подряд – одна, под которой контекст ролика.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">+40% к доходу</span>
          <span class="tactic-num">02</span>
        </div>
        <h4>Закреплённый комментарий обязательно</h4>
        <p>Закрепляем первый комментарий с подборкой товаров из ролика. Переходы накапливаются вместе с просмотрами и продолжают приходить годами после публикации.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">+30% переходов</span>
          <span class="tactic-num">03</span>
        </div>
        <h4>Голосовой призыв в конце видео</h4>
        <p>Скажите вслух: «Ссылки на всё, что упомянул, – в описании и закреплённом комментарии». На то, что услышали голосом, кликают значительно чаще.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">+25% переходов</span>
          <span class="tactic-num">04</span>
        </div>
        <h4>Таймкоды притягивают переходы</h4>
        <p>В описании: «0:32 – мой микрофон [ссылка]», «1:48 – моё кресло [ссылка]». Зрители перескакивают по таймкодам и попутно видят ссылки. Дополнительный плюс – YouTube подсвечивает таймкоды в поиске.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Тизер-связка</span>
          <span class="tactic-num">05</span>
        </div>
        <h4>Shorts → основной ролик → описание</h4>
        <p>Shorts собирают максимум охвата, но описание открывают реже, чем в обычных роликах. Используйте Shorts как тизер к основному ролику, где ссылка работает на полную.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title">
      <p class="text-eyebrow">Защита дохода</p>
      <h2>Как не потерять комиссию на YouTube</h2>
    </div>

    <div class="tactics-grid">
      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Купонные расширения</span>
          <span class="tactic-num">01</span>
        </div>
        <h4>Honey, Rakuten и другие перебивают вашу ссылку</h4>
        <p>Зритель кликает вашу ссылку → доходит до корзины → активирует Honey ради купона → Honey подменяет вашу cookie на свою → комиссия достаётся им. В 2024-2025 это вылилось в публичный скандал (PayPal vs MKBHD/LinusTechTips), но Honey, Rakuten, Capital One Shopping, Coupert, Karma продолжают работать у миллионов пользователей. Аудитория YouTube – с Chrome-расширениями на десктопе.</p>
        <p class="what-to-do"><b>Что делать:</b> в голосовом призыве и в описании добавляйте «отключите Honey/Rakuten перед покупкой – это помогает каналу». Аудитория поддержит, если объяснить. Дополнительно – продвигайте товары через мобильные ссылки (расширения там не работают): «Все ссылки оптимизированы для покупки с телефона».</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Последний клик</span>
          <span class="tactic-num">02</span>
        </div>
        <h4>Кэшбэк-сайты забирают последний клик</h4>
        <p>Почти все партнёрские сети работают по принципу «последний клик»: если зритель кликнул вашу ссылку, потом промокод-сайт (RetailMeNot, CouponBirds), потом купил – комиссия уходит промокод-сайту. На YouTube это особенно болезненно, потому что зрители часто открывают видео, идут искать промокод, и возвращаются купить.</p>
        <p class="what-to-do"><b>Что делать:</b> давайте свой промокод – зритель использует его, последним кликом останется ваша ссылка. Используйте deeplink на конкретный товар, а не на главную страницу бренда – меньше шансов, что зритель уйдёт искать промокод в Google. Если у бренда сейчас публичная распродажа – упомяните её в видео и закреплённом комментарии, чтобы зритель не шёл искать «лучшую скидку».</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Mobile→Desktop</span>
          <span class="tactic-num">03</span>
        </div>
        <h4>Клик на телефоне, покупка на компьютере = пропавшая комиссия</h4>
        <p>YouTube смотрят с телефона (70%+ трафика), но дорогие покупки часто делают с десктопа. Если зритель кликнул вашу ссылку на мобильном, потом сел за ноут и купил оттуда – cookie не переносится, продажа теряется. Особенно это бьёт по дорогим категориям: техника, мебель, премиум.</p>
        <p class="what-to-do"><b>Что делать:</b> в описании пишите «откройте ссылку на том устройстве, с которого будете покупать». Для премиум-товаров – указывайте «лучше открыть на десктопе». Дополнительно: дублируйте ссылки в Discord/Telegram-канале (если есть) – зритель откроет на любом устройстве.</p>
      </div>

      <div class="tactic-card">
        <div class="tactic-head">
          <span class="tactic-tag">Возвраты</span>
          <span class="tactic-num">04</span>
        </div>
        <h4>Возврат товара = списание вашей комиссии</h4>
        <p>Продажа отслеживается → покупатель возвращает товар → комиссия списывается обратно. На YouTube это особенно заметно для одежды (процент возвратов в fashion 30-40%) и дорогой техники (тестовый период). Если 5 из 10 покупок вернутся – вы увидите половину суммы в партнёрке через 30-60 дней после первоначального учёта.</p>
        <p class="what-to-do"><b>Что делать:</b> избегайте overpromote категорий с высокими возвратами – fast fashion, fad fitness gear, hyped tech. Лучше работают категории с низкими возвратами: книги, подписки (Audible, Skillshare), велнес-добавки, расходники (фильтры, картриджи, бельё). Стабильный доход важнее одной большой комиссии, которая через месяц спишется.</p>
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
            <h2>Частые вопросы про YouTube</h2>
        </div>
        <div class="accordion-wrapper" style="max-width:100%;" data-faq data-open-first="true">
            @include('components.faq-short')
        </div>
        
    </div>
</section>


<section class="section">
  <div class="container">
      <div class="section-title">
        <p class="text-eyebrow">Другие платформы</p>
        <h2>Гайды для остальных платформ</h2>
      </div>

      <div class="platform-link-grid-in-3">
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-instagram"></i>
            <h4>Instagram</h4>
            </div>
            <p>Сторис, Reels, профиль</p>
        </a>
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-tiktok"></i>
            <h4>TikTok</h4>
            </div>
            <p>Ссылка в профиле, голосом</p>
        </a>
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-telegram"></i>
            <h4>Telegram</h4>
            </div>
            <p>Канал, закреп</p>
        </a>
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-x-twitter"></i>
            <h4>X (Twitter)</h4>
            </div>
            <p>Треды, профиль</p>
        </a>
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-twitch"></i>
            <h4>Twitch</h4>
            </div>
            <p>Панели, команды</p>
        </a>
        <a href="" class="pl-link-card">
            <div class="pl-link-card_head">
            <i class="fa-brands fa-square-facebook"></i>
            <h4>Facebook</h4>
            </div>
            <p>Страницы, группы</p>
        </a>
    </div>

      
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