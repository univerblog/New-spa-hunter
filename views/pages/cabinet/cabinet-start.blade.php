<div class="cab-page-title">
    <h1>Привет, Alex!</h1>
    <p>Только начали&nbsp;– первые результаты обычно появляются за&nbsp;день-два после первой ссылки.</p>
</div>

<!-- Блок отображения средств -->
<div class="cab-kpi-grid">
    <a href="" class="cab-kpi-card">
        <div class="cab-kpi-label">Доступно к&nbsp;выводу</div>
        <div class="cab-kpi-value lime">$234,50</div>
        <div class="cab-kpi-note">
            <div class="cab-link"><span>Вывести</span><i class="fa-regular fa-arrow-right fa-xs"></i></div>
        </div>
    </a>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">В&nbsp;ожидании</div>
        <div class="cab-kpi-value">$378,20</div>
        <div class="cab-kpi-note">Ждёт подтверждения брендов</div>
    </div>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Всего заработано</div>
        <div class="cab-kpi-value">$1&nbsp;468,50</div>
        <div class="cab-kpi-note">За&nbsp;всё время</div>
    </div>
    <div class="cab-kpi-card empty">
        <div class="cab-kpi-label">Всего выведено</div>
        <div class="cab-kpi-value">$0,00</div>
        <div class="cab-kpi-note">Пока без&nbsp;выплат</div>
    </div>
</div>

<!-- График доходности -->
<div class="cab-card cab-graph-card">
    <div class="cab-graph-head">
        <div>
            <div class="cab-graph-label">Доход за 30 дней</div>
            <div class="cab-graph-value">$229,40</div>
        </div>
        <div class="cab-graph-delta up"><i class="fa-regular fa-arrow-up fa-xs"></i> 18% к прошлому периоду</div>
    </div>
    <svg class="cab-graph-svg" viewBox="0 0 600 90" preserveAspectRatio="none" aria-hidden="true">
        <polygon class="cab-graph-area" points="0,74 50,70 100,76 150,60 200,64 250,52 300,56 350,45 400,41 450,47 500,34 550,29 600,22 600,90 0,90"/>
        <polyline class="cab-graph-line" points="0,74 50,70 100,76 150,60 200,64 250,52 300,56 350,45 400,41 450,47 500,34 550,29 600,22"/>
    </svg>
    <!-- Блок когда пусто -->
    <!--  
    <svg class="cab-graph-svg" viewBox="0 0 600 90" preserveAspectRatio="none" aria-hidden="true">
        <polyline class="cab-graph-line flat" points="0,80 600,80"/>
    </svg>
    <div class="cab-graph-empty">График появится после первых комиссий.</div>
     -->
</div>

<!-- Мой уровень -->
<div class="cab-loyalty-card">
    <div class="cab-loyalty-card__head">
        <div class="cab-loyalty-current">
            <div class="cab-loyalty-current__level tier-silver">
                <i class="fa-solid fa-triangle"></i>
                <span>Silver</span>
            </div>
            <small>С 17 февраля 2026</small>
        </div>
        <div class="cab-loyalty-confirmed">
            <small>Подтверждено за 90 дней</small>
            <div class="cab-loyalty-confirmed__value">$687</div>
        </div>
    </div>


    <div class="cab-loyalty-progress">
        <div class="cab-loyalty-progress__head">
            <div><span>До Silver</span> – осталось $300 подтверждённой комиссии</div>
            <div>$0 / $300</div>
        </div>
        <div class="cab-loyalty-progress__bar">
            <div class="cab-loyalty-progress__fill" style="width:40%"></div>
        </div>
      
        <div class="cab-loyalty-progress__hint">Поделись первой ссылкой в видео или посте – первая комиссия запустит прогресс к Silver.</div>
    </div>

   
    <div class="cab-loyalty-tiers">
        <div class="cab-loyalty-tiers__item">
            <div class="cab-loyalty-tiers__name tier-bronze">
                <i class="fa-solid fa-square fa-xs"></i>
                Bronze
            </div>
            <span>пройден</span>
        </div>
        <div class="cab-loyalty-tiers__item current">
            <div class="cab-loyalty-tiers__name tier-silver">
               <i class="fa-solid fa-triangle"></i>
                Silver</div>
            <span><b>+14%</b> · текущий</span>
        </div>
        <div class="cab-loyalty-tiers__item">
            <div class="cab-loyalty-tiers__name tier-gold">
                <i class="fa-solid fa-star-sharp"></i>
                Gold</div>
            <span><b>+29%</b> · $1&nbsp;500</span>
        </div>
        <div class="cab-loyalty-tiers__item">
            <div class="cab-loyalty-tiers__name tier-platinum">
                <i class="fa-solid fa-crown"></i>
                Platinum</div>
            <span><b>+36%</b> · $7&nbsp;500</span>
        </div>
    </div>   
           
      
        
    

    
</div>


<!-- Последние выплаты -->
@include('components.cabinet.transactions', ['source' => 'cabinet'])

<!-- Ссылки внизу -->
<div class="cab-actions">
    <a href="" class="cab-action-btn">
        <i class="fa-regular fa-link"></i>
        <div class="cab-action-btn-text">
            <span>Создать ещё ссылку</span>
            <small>Вставьте URL товара</small>
        </div>
    </a>
    <a class="cab-action-btn disabled">
        <i class="fa-regular fa-arrow-down-to-line"></i>
        <div class="cab-action-btn-text">
            <span>Вывести средства</span>
            <small>От $50 · у вас $0,00</small>
        </div>
    </a>
    <a href="" class="cab-action-btn">
        <i class="fa-regular fa-chart-line-up"></i>
        <div class="cab-action-btn-text">
            <span>Открыть статистику</span>
            <small>Полная аналитика</small>
        </div>
    </a>
</div>