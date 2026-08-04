@php 
    $this->share('navLocked', true); 
@endphp

@extends('layout.cabinet')

@section('content')
<div class="cab-card">
    <div class="onb-hero__row">
        <div>
            <h1>Быстрый старт</h1>
            <p>Несколько простых шагов, чтобы начать зарабатывать с CPA Hunter.</p>
        </div>
        <button class="btn min outline" data-tour-replay><i class="fa-regular fa-circle-info"></i> Подсказки</button>
    </div>
    <div class="onb-hero__progress">
        <div class="onb-hero__seg active"></div>
        <div class="onb-hero__seg"></div>
        <div class="onb-hero__seg"></div>
    </div>
    <div class="onb-hero__counter">Шаг 1 из 3 – подключите источник трафика</div>
</div>

<div class="cab-card">
    <div class="pay-progress__top">У тебя уже $5 <i class="fa-solid fa-gift"></i></div>
    <div class="pay-progress__amt">
        <span class="pay-progress__big">$5</span>
        <span class="pay-progress__of">/ $20</span>
        <span class="pay-progress__goal">до первой выплаты</span>
    </div>
    <div class="pay-progress__track"><div class="pay-progress__fill" style="width:25%"></div></div>
    <p class="pay-progress__text">Создай ссылку, размести – заработай ещё $15, и выводишь $20. Первая выплата от $20, дальше от $50.</p>
</div>


<div class="onboarding">
    <div class="onboard-step is-active">
        <!-- \\\\\\\ -->
        <div class="cab-card layout-form">
            <div class="quick-start-head">
                <div class="quick-start-head_num">01</div>
                <div class="quick-start-head_body">
                    <h2>Подключите источник трафика</h2>
                    <p>Подключите соцсеть – проверка владения моментальная. Качество площадки оценим в фоне за 24 часа, на работу со ссылками не влияет.</p>
                </div>
                <div class="quick-start-head_status required">Обязательно</div>
            </div>
        
            @include('components.cabinet.sources')
        </div>
        <!-- \\\\\\\\ -->
        <div class="onboard-note-rail">
            <div class="onboard-note">
                <span>Шаг 1 из 4</span>
                <p>Шаг 1 – подключение источника. Проверка владения через OAuth моментальная, качество площадки оценим в фоне.</p>
                <div class="btn-group">
                    <button type="button" class="btn min full">Далее</button>
                    <button type="button" class="btn min outline full" data-tour-skip>Пропустить</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="onboard-step">
        <!-- \\\\\\\\ -->
        <div class="cab-card layout-form">
            <div class="quick-start-head">
                <div class="quick-start-head_num">02</div>
                <div class="quick-start-head_body">
                    <h2>Добавьте способ связи</h2>
                    <p>Минимум один контакт – чтобы мы могли уведомить вас о выплатах и проблемах с аккаунтом.</p>
                </div>
                <div class="quick-start-head_status required">Обязательно</div>
            </div>
        
            <div class="layout-form">
                <div class="input-group-horisontal phone-group">
                     <div class="input-field">
                        <label for="">Телефон</label>
                        @include('components.cabinet.phone-select', ['name' => 'phone'])
                    </div>
                    <div class="input-field">
                        <label for="">WhatsApp</label>
                        @include('components.cabinet.phone-select', ['name' => 'whatsapp'])
                    </div>
                </div>
                 <div class="input-group-horisontal phone-group">
                    <div class="input-field">
                        <label for="">Viber</label>
                        @include('components.cabinet.phone-select', ['name' => 'viber'])
                    </div>
                   <!-- <div class="input-field">
                        <label for="">Telegram</label>
                        <input type="text" id="" value="" placeholder="@xx757xx" maxlength="150">
                    </div> -->
                    <div class="input-field">
                        <label>Telegram</label>
                        <button type="button" class="input-btn" onclick="openModal('modal-tg-link')">
                            <i class="fa-brands fa-telegram"></i>
                            <span>Привязать Telegram-аккаунт</span>
                        </button>
                    </div>
                </div>
                <div class="btn-group" style="margin-top:10px;">
                    <button class="btn">Сохранить контакты</button>
                </div>
            </div>
        </div>
        <!-- \\\\\\\\ -->
        <div class="onboard-note-rail">
            <div class="onboard-note">
                <span>Шаг 2 из 4</span>
                <p>Шаг 2 – добавь хотя бы один контакт. Нужен, чтобы получать уведомления о выплатах и проблемах с аккаунтом.</p>
                <div class="btn-group">
                    <button type="button" class="btn min full">Далее</button>
                    <button type="button" class="btn min outline full" data-tour-skip>Пропустить</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="onboard-step">
        <!-- \\\\\\\ -->
        <div class="cab-card layout-form">
            <div class="quick-start-head">
                <div class="quick-start-head_num">03</div>
                <div class="quick-start-head_body">
                    <h2>Создайте первую партнёрскую ссылку</h2>
                    <p>Вставьте URL товара из 41 783 магазинов – и получите свою партнёрскую ссылку. Откроется после шагов 1 и 2.</p>
                </div>
                <div class="quick-start-head_status required">Обязательно</div>
            </div>
        
             @include('components.create-link.create-link-long')
             @include('components.cabinet.popular-shops')
        </div>
        <!-- \\\\\\\ -->
        <div class="onboard-note-rail">
            <div class="onboard-note">
                <span>Шаг 3 из 4</span>
                <p>Шаг 3 – создай первую партнёрскую ссылку. Откроется в новом окне с формой и таблицей статистики прямо под ней.</p>
                <div class="btn-group">
                    <button type="button" class="btn min full">Далее</button>
                    <button type="button" class="btn min outline full" data-tour-skip>Пропустить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="onboard-bg"></div>
</div>


@endsection

@push('scripts')
<script>
(function(){
    if (window.__onbInit) return;
    window.__onbInit = true;

    var wrap  = document.querySelector('.onboarding');
    if (!wrap) return;
    var steps = [].slice.call(wrap.querySelectorAll('.onboard-step'));
    var nav   = document.querySelector('.cab-sidebar');
    var link  = document.querySelector('[data-onb-links]');
    var cur   = 0;

    // n: 0..2 — шаги; 3 — сайдбар (шаг 4); -1 — тур выключен
    function state(n){
        cur = n;
        var last = n === steps.length;
        steps.forEach(function(s, i){ s.classList.toggle('is-active', i === n); });
        if (link) link.classList.toggle('is-onb-target', last);
        if (nav)  nav.classList.toggle('is-onb-raised', last);
        wrap.classList.toggle('is-done', n < 0);
        (n >= 0 ? (last ? nav : steps[n]) : steps[0]).scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    document.addEventListener('click', function(e){
        if (e.target.closest('[data-tour-replay]')) state(0);
        else if (e.target.closest('[data-tour-skip], [data-tour-finish]')) state(-1);
        else if (e.target.closest('.onboard-note button')) state(cur + 1);
    });

   /* ========== МОБИЛА: шаг 4 <-> панель сайдбара ========== */
    var _state = state;
    state = function(n){
        _state(n);
        if (!matchMedia('(max-width: 1200px)').matches || !nav) return;
        nav.classList.toggle('show', n === steps.length);
    };

    if (nav) new MutationObserver(function(){
        if (cur === steps.length && matchMedia('(max-width: 1200px)').matches && !nav.classList.contains('show')) state(-1);
    }).observe(nav, { attributes: true, attributeFilter: ['class'] });

    state(0);

    setTimeout(function(){
        if (cur === 0 && !wrap.classList.contains('is-done')) steps[0].scrollIntoView({ block: 'start' });
    }, 150);
})();
</script>

@endpush