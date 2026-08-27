@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/legal.css?v={{ rand() }}">
@endpush

@section('content')
<nav class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="/">Главная</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Не продавать данные</span>
        </div>
    </div>
</nav>

<section class="section legal-page">
    <div class="container">
        <div class="section-title section-title-left">
            <h1>Не продавать и не передавать мои персональные данные</h1>
            <p>Ваше право по законам CCPA/CPRA отказаться от продажи и передачи персональных данных.</p>
            <small>Дата вступления в силу: 17 июня 2024 · Последнее обновление: 22 июля 2026</small>
        </div>
        @include('components.legal-nav')
        <div class="legal-layout">
            <aside class="legal-left-nav content-scroll">
                <b>Содержание</b>
                <a href="#dns1">1. Как это работает у нас</a>
                <a href="#dns2">2. Каких данных это касается</a>
                <a href="#dns3">3. Ваше право отказаться</a>
                <a href="#dns4">4. Авторизованный агент</a>
                <a href="#dns5">5. Без дискриминации</a>
                <a href="#dns6">6. Остальные права</a>
            </aside>

            <div class="legal-content">
                <p class="lead">Это уведомление касается жителей Калифорнии и других штатов США с аналогичными законами о приватности (CCPA/CPRA). Оно объясняет, что для нас означают «продажа» и «передача» персональных данных и как вы можете от них отказаться.</p>

                <section id="dns1"><h2>1. Как это работает у нас</h2><p>CPA Hunter связывает авторов с партнёрскими программами, которые ведут сторонние сети – Admitad, CJ, Awin – и магазины в них. Когда вы используете наши партнёрские ссылки, эти сети и магазины ставят собственные куки и идентификаторы, чтобы засчитать переход и выплатить комиссию. По законам CCPA и CPRA такая передача онлайн-идентификаторов для рекламы между сайтами может считаться «продажей» или «передачей» (sharing).</p></section>

                <section id="dns2"><h2>2. Каких данных это касается</h2><p>Отказ касается онлайн-идентификаторов, связанных с вашими переходами по партнёрским ссылкам (например, куки и click ID, которые ставят вышестоящие сети), и аналогичных данных об устройстве и активности. Мы не продаём и не передаём для рекламы ваши имя, адрес электронной почты, платёжные или KYC-данные.</p></section>

                <section id="dns3"><h2>3. Ваше право отказаться</h2><p>Переключателем ниже вы говорите нам не продавать и не передавать ваши персональные данные. Мы также автоматически учитываем сигнал Global Privacy Control (GPC): если ваш браузер его отправляет, отказ применяется сам, без дополнительных действий. Отказ не отключает основные функции сервиса.</p></section>

                <section id="dns4"><h2>4. Авторизованный агент</h2><p>Вы можете уполномочить другое лицо подать запрос от вашего имени. Мы вправе запросить подтверждение его полномочий и вашей личности, прежде чем выполнить запрос.</p></section>

                <section id="dns5"><h2>5. Без дискриминации</h2><p>Мы не будем ущемлять вас за реализацию ваших прав по приватности: цена, набор функций и качество сервиса от этого не изменятся.</p></section>

                <section id="dns6"><h2>6. Остальные права</h2><p>Права на доступ, удаление, исправление и перенос данных, а также права пользователей ЕС/ЕЭЗ по GDPR описаны в <a href="/privacy">Политике конфиденциальности</a>. Вопросы: <a href="mailto:hello@cpahunter.io">hello@cpahunter.io</a>.</p></section>

                <div class="optout-box">
                    <label class="optout-toggle">
                        <input type="checkbox" id="optout-cb">
                        <span class="optout-track"><span></span></span>
                        <b>Не продавать и не передавать мои персональные данные</b>
                    </label>
                    <p id="optout-status"></p>
                    <div class="optout-gpc" id="optout-gpc" hidden>Мы получили сигнал Global Privacy Control из вашего браузера и применили отказ автоматически.</div>
                </div>
            </div>
        </div>
    </div>
</section>      
@endsection

@push('scripts')
<script src="/js/legal.js?v={{ rand() }}"></script>
<script>
////// Отказ от продажи данных: localStorage + cookie + GPC
const KEY = 'cpah_privacy_optout';
const optCb = document.getElementById('optout-cb');
const gpc = navigator.globalPrivacyControl === true;

function optRead() { return localStorage.getItem(KEY) === '1' || document.cookie.includes(KEY + '=1'); }
function optWrite(v) {
    localStorage.setItem(KEY, v ? '1' : '0');
    document.cookie = KEY + '=' + (v ? '1' : '0') + ';path=/;max-age=31536000;SameSite=Lax';
}

function optReflect() {
    optCb.checked = optRead();
    document.getElementById('optout-status').textContent = optCb.checked ? 'Отказ применён. Мы не продаём и не передаём ваши персональные данные.' : 'Сейчас отказ не активирован.';
}

if (gpc) {
    if (!optRead()) optWrite(true);
    optCb.disabled = true;
    document.getElementById('optout-gpc').hidden = false;
}
optCb.addEventListener('change', () => { optWrite(optCb.checked); optReflect(); });
optReflect();
</script>
@endpush