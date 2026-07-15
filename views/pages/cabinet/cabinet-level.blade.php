@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Мой уровень</h1>
    <p>Ваш текущий статус, прогресс до следующего уровня и оценка времени по вашему темпу. 
        <a href="" class="cab-link"><span>Подробнее об уровнях</span><i class="fa-regular fa-arrow-right fa-xs"></i></a>
    </p>
</div>


<!-- Текущий уровень -->
<div class="level-current cab-card">
    <div class="level-current__now">
        <small>Текущий уровень</small>
        <div class="level-current__tier tier-bronze">
           <i class="fa-regular fa-chess-rook-piece"></i>
            Bronze
        </div>
        <div class="level-current__since">С 17 февраля 2026</div>
    </div>
    <div class="level-current__stats">
        <div class="level-stat">
            <small>Уровень ставок</small>
            <div class="level-stat__value">Повышенные <b>+14%</b></div>
        </div>
        <div class="level-stat">
            <small>Подтверждено за 90 дней</small>
            <div class="level-stat__value">$687</div>
        </div>
        <div class="level-stat">
            <small>В ожидании за 90 дней</small>
            <div class="level-stat__value">$214</div>
        </div>
    </div>
</div>

<!-- Прогресс до следующего уровня -->
<div class="level-progress cab-card">
    <div class="level-progress__head">
        <div>
            <small>Прогресс до Silver</small>
            <div class="level-progress__amount">$687 / $1 500</div>
        </div>
        <div class="level-progress__eta">
            <small>При текущем темпе</small>
            <div class="level-progress__eta-value">Silver через ~3,5 месяца</div>
            <small>оценка обновлена сегодня</small>
        </div>
    </div>

    <div class="level-progress__bar">
        <div class="level-progress__fill" style="width:45.8%"></div>
    </div>

    <div class="level-milestones">
        <div class="level-milestone done">
            <i class="fa-solid fa-check"></i>
            <span>Первая продажа</span>
        </div>
        <div class="level-milestone done">
            <i class="fa-solid fa-check"></i>
            <span>25% пути</span>
        </div>
        <div class="level-milestone active">
            <i class="fa-solid fa-check"></i>
            <span>50% пути</span>
        </div>
        <div class="level-milestone">
            <i></i>
            <span>75% пути</span>
        </div>
        <div class="level-milestone">
            <i></i>
            <span>Gold</span>
        </div>
    </div>
</div>

<!-- Топ программ -->
<div class="level-top cab-card">
    <div class="level-top__head">
        <h3>Топ программ за 90 дней</h3>
        <small>Что приносит больше всего – удобно понимать, на чём фокусироваться.</small>
    </div>
    <div class="level-top__list">
        <div class="level-top__row">
            <span>Nike</span>
            <div class="level-top__track"><div class="level-top__fill" style="width:100%"></div></div>
            <b>$268</b>
        </div>
        <div class="level-top__row">
            <span>Booking.com</span>
            <div class="level-top__track"><div class="level-top__fill" style="width:66%"></div></div>
            <b>$176</b>
        </div>
        <div class="level-top__row">
            <span>Sephora</span>
            <div class="level-top__track"><div class="level-top__fill" style="width:35%"></div></div>
            <b>$94</b>
        </div>
    </div>
    <div class="level-top__foot">И ещё несколько программ – $149 за 90 дней</div>
</div>

<!-- Что откроет следующий уровень -->
 <div class="section-title">
 <p class="text-eyebrow">Следующий уровень</p>
 <h2>Что откроет Silver</h2>
 </div>
<div class="level-benefits">
    <div class="level-benefits__grid">
        <div class="level-benefit cab-card">
            <i class="fa-regular fa-arrow-trend-up"></i>
            <h4>Премиальные ставки на всех программах</h4>
            <p>Ставки повышаются на всех программах. Например, Booking 4% → 4,5%, Nike 8% → 9%. На вашем темпе за 90 дней – примерно +$90.</p>
        </div>
        <div class="level-benefit cab-card">
            <i class="fa-regular fa-headset"></i>
            <h4>Личный менеджер</h4>
            <p>Прямой канал связи в Telegram, помощь с оптимизацией ссылок, подсказки по сезонным программам.</p>
        </div>
        <div class="level-benefit cab-card">
            <i class="fa-regular fa-sparkles"></i>
            <h4>Эксклюзивные программы</h4>
            <p>Доступ к программам с повышенными ставками, недоступными на Bronze и Silver.</p>
        </div>
    </div>
</div>

<!-- Все уровни -->
 <div class="section-title">
    <p class="text-eyebrow">Справка</p>
    <h2>Все уровни и пороги</h2>
 </div> 
<div class="level-tiers cab-card">
    <div class="level-tiers__row level-tiers__row--head">
        <div>Уровень</div>
        <div>Порог за 90 дней</div>
        <div>Ставки</div>
        <div>Условия</div>
    </div>

    <div class="level-tiers__row tier-bronze">
        <div class="level-tiers__name"><i class="fa-regular fa-chess-rook-piece"></i>Bronze</div>
        <div><span>Порог за 90 дней</span>По умолчанию</div>
        <div><span>Ставки</span>Стандартные</div>
        <div>Базовый уровень для всех новых блогеров</div>
    </div>

    <div class="level-tiers__row tier-silver current">
        <div class="level-tiers__name"><i class="fa-regular fa-star"></i>Silver <span>текущий</span></div>
        <div><span>Порог за 90 дней</span>$300</div>
        <div><span>Ставки</span>Повышенные <b>+14%</b></div>
        <div>Приоритетная поддержка, ранний доступ к новым программам</div>
    </div>

    <div class="level-tiers__row tier-gold">
        <div class="level-tiers__name"><i class="fa-regular fa-trophy"></i>Gold</div>
        <div><span>Порог за 90 дней</span>$1 500</div>
        <div><span>Ставки</span>Премиальные <b>+29%</b></div>
        <div>Личный менеджер, эксклюзивные программы</div>
    </div>

    <div class="level-tiers__row tier-platinum">
        <div class="level-tiers__name"><i class="fa-regular fa-crown"></i>Platinum</div>
        <div><span>Порог за 90 дней</span>$7 500</div>
        <div><span>Ставки</span>Максимальные <b>+36%</b></div>
        <div>Закрепление статуса на 12 мес, индивидуальные условия</div>
    </div>

    <p>Оценка времени до следующего уровня – прогноз по вашему среднему темпу за последние 90 дней. Это не обещание, фактический срок зависит от реальной активности.</p>
</div>

@endsection

@push('scripts')


@endpush