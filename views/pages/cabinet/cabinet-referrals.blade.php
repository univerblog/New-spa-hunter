@php
    $refpost       = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/referral-post.php';
    $templates = $refpost['templates'];
   
@endphp

@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Партнёрская программа</h1>
    <p>Приглашайте друзей-блогеров, зарабатывайте 10% с их дохода в течение первых 6 месяцев.
        <a href="" class="cab-link"><span>Подробнее об условиях</span><i class="fa-regular fa-arrow-right fa-xs"></i></a>
    </p>
</div>
<div class="cab-kpi-grid">
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Активных рефералов</div>
        <div class="cab-kpi-value lime">27</div>
        <div class="cab-kpi-note">Сейчас зарабатывают</div>
    </div>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Всего приглашённых</div>
        <div class="cab-kpi-value">134</div>
        <div class="cab-kpi-note">За всё время</div>
    </div>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Доход в этом месяце</div>
        <div class="cab-kpi-value lime">$284.50</div>
        <div class="cab-kpi-note">Обновляется ежедневно</div>
    </div>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Доход за всё время</div>
        <div class="cab-kpi-value">$3 847.20</div>
        <div class="cab-kpi-note">С момента регистрации</div>
    </div>
</div>

<p class="ref-kpi-hint"><b>Всего приглашённых</b> – все блогеры, которые зарегистрировались по вашей ссылке за всё время. <b>Активных</b> – те из них, кто сейчас приносит доход: 10% с их заработка начисляются вам первые 6 месяцев после регистрации каждого.</p>

<div class="ref-link cab-card">
    <div class="cab-card-head">
        <div class="cab-card-title">Ваша персональная ссылка</div>
    </div>

    <div class="input-field ref-link__field">
        <input type="text" value="cpahunter.io/r/SERGEYK" readonly>
        <button class="input-fix-btn" data-copy><i class="fa-regular fa-copy"></i></button>
    </div>

    <div class="ref-link__share">
        <span>Поделиться в:</span>
        <a href="https://twitter.com/intent/tweet?url=https://cpahunter.io/r/SERGEYK" target="_blank" rel="noopener" title="X"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="https://t.me/share/url?url=https://cpahunter.io/r/SERGEYK" target="_blank" rel="noopener" title="Telegram"><i class="fa-brands fa-telegram"></i></a>
        <a href="https://wa.me/?text=https://cpahunter.io/r/SERGEYK" target="_blank" rel="noopener" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="mailto:?body=https://cpahunter.io/r/SERGEYK" title="Email"><i class="fa-regular fa-envelope"></i></a>
    </div>
</div>

<div class="ref-templates-wrap">
    <script>(function(){var e=document.currentScript.parentElement;try{if(localStorage.getItem('cpah-templates')==='0')e.classList.add('is-collapsed');}catch(x){}})();</script>

    <div class="cab-page-title ref-templates__head">
        <div>
            <h2>Готовые шаблоны постов</h2> 
            <button class="btn min outline" data-templates-toggle>
                <span class="is-on">Скрыть</span>
                <span class="is-off">Показать</span>
                <i class="fa-regular fa-chevron-up"></i>
            </button>
        </div>
        <p>Скопируйте любой, подкрутите под свой голос и опубликуйте. Где стоит пропуск – подставьте свои цифры.</p>
    </div>

    <div class="ref-templates">
        @foreach ($templates as $t)
            <div class="ref-template">
                <div class="ref-template__head">
                    <span class="ref-template__name">{{ $t['name'] }}</span>
                    <button class="ref-template__copy" data-copy><i class="fa-regular fa-copy"></i></button>
                </div>
                <p data-copy-text>{{ $t['text'] }}</p>
            </div>
        @endforeach
    </div>
</div>

@include('components.cabinet.referrals-table')
<div class="section-title">
    <p class="text-eyebrow">Советы</p>
    <h2>Как приглашать эффективнее</h2>
 </div>

<div class="level-benefits">
    <div class="level-benefits__grid level-benefits__grid--2">
        <div class="level-benefit cab-card">
            <h4>Делитесь в постах про заработок</h4>
            <p>Когда вы показываете цифры дохода со ссылками, аудитория задаёт вопросы «как». Дайте им реферальную ссылку в ответе.</p>
        </div>
        <div class="level-benefit cab-card">
            <h4>QR-код в шапке профиля</h4>
            <p>QR-код вашей ссылки добавьте в шапку профиля. Часть аудитории придёт через сканирование.</p>
        </div>
        <div class="level-benefit cab-card">
            <h4>Подпись в письмах и канал</h4>
            <p>Добавьте ссылку в подпись писем и в закреплённое сообщение канала. Пассивный источник на годы.</p>
        </div>
        <div class="level-benefit cab-card">
            <h4>Сообщения в чатах коллег</h4>
            <p>В закрытых группах блогеров (Discord, Telegram) разовая рекомендация может принести 3-5 рефералов за раз.</p>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
// Свернуть/развернуть посты     
document.addEventListener('click', function(e){
    var btn = e.target.closest('[data-templates-toggle]');
    if (!btn) return;
    var wrap = btn.closest('.ref-templates-wrap');
    var collapsed = wrap.classList.toggle('is-collapsed');
    try { localStorage.setItem('cpah-templates', collapsed ? '0' : '1'); } catch(x){}
});
</script>
@endpush