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
            <span>Дорожная карта</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Что <span class="lime">мы строим</span> и&nbsp;когда это будет</h1>
        <p>Прозрачный план развития CPA Hunter. Здесь мы пишем не то, что уже готово, а то, что разрабатывается – с конкретными квартальными датами. Никаких пустых обещаний.</p>
      </div>

       <div class="roadmap">

            <article class="roadmap-quarter">
                <header class="roadmap-quarter__head">
                <h2>Q4 2026</h2>
                <span>3 фичи · октябрь – декабрь</span>
                </header>

                <article class="roadmap-card">
                <h3>Open API для разработчиков</h3>
                <p>Публичный API для интеграции CPA Hunter в свои инструменты: боты, дашборды, автоматизации. REST + Webhooks. Документация на <a href="https://api.cpahunter.io/docs" target="_blank" rel="noopener">api.cpahunter.io/docs</a>.</p>
                <ul class="roadmap-card__tags">
                    <li>REST</li>
                    <li>Webhooks</li>
                    <li>OAuth 2.0</li>
                </ul>
                <span class="roadmap-card__status roadmap-card__status--now">В работе · 75%</span>
                </article>

                <article class="roadmap-card">
                <h3>Мобильное приложение (iOS + Android)</h3>
                <p>Нативные приложения – создание ссылок, отслеживание заработка, уведомления о продажах в реальном времени. React Native, релиз одновременно в App Store и Google Play.</p>
                <ul class="roadmap-card__tags">
                    <li>React Native</li>
                    <li>Push-уведомления</li>
                    <li>Apple Pay / Google Pay</li>
                </ul>
                <span class="roadmap-card__status roadmap-card__status--now">В работе · 40%</span>
                </article>

                <article class="roadmap-card">
                <h3>Расширение для браузеров</h3>
                <p>Расширение для Chrome, Edge, Firefox и Brave – создание партнёрской ссылки одним кликом прямо на странице магазина. Не нужно переходить в кабинет, копировать ссылку, возвращаться. Альфа-версия в декабре для бета-тестеров.</p>
                <ul class="roadmap-card__tags">
                    <li>Chrome Web Store</li>
                    <li>Firefox Add-ons</li>
                    <li>Edge Add-ons</li>
                </ul>
                <span class="roadmap-card__status roadmap-card__status--now">В работе · 25%</span>
                </article>
            </article>

            <article class="roadmap-quarter">
                <header class="roadmap-quarter__head">
                <h2>Q1 2027</h2>
                <span>2 фичи · январь – март</span>
                </header>

                <article class="roadmap-card">
                <h3>Авто-генерация коротких ссылок</h3>
                <p>Кастомизируемые домены (cpa.cx/ваш-ник), QR-коды, UTM-разметка. Сейчас короткая ссылка генерируется случайно – будет осознанной.</p>
                <ul class="roadmap-card__tags">
                    <li>Custom slugs</li>
                    <li>QR</li>
                    <li>UTM</li>
                </ul>
                <span class="roadmap-card__status roadmap-card__status--planned">Планируется</span>
                </article>

                <article class="roadmap-card">
                <h3>Витрина автора</h3>
                <p>Личная страница автора (cpa.cx/ник) – подборка рекомендуемых вами товаров по категориям, ссылки на соцсети, аналитика. Как у Komi, Stan Store или Beacons, но интегрировано с каталогом программ. Одна ссылка для всего контента в био.</p>
                <ul class="roadmap-card__tags">
                    <li>Ссылка в био</li>
                    <li>Коллекции</li>
                    <li>Настройка дизайна</li>
                </ul>
                <span class="roadmap-card__status roadmap-card__status--planned">Планируется</span>
                </article>
            </article>

        </div>

         <div class="section-title">
            <h2>Чего не хватает в дорожной карте?</h2>
            <p>Мы строим продукт для авторов, которые им пользуются. Если вы видите пробел – напишите нам, и мы рассмотрим включение в план.</p>
        </div>
        <div class="btn-group center-group">
            <a href="/contacts" class="btn big">Написать команде</a>
        </div>
     



    </div>
</section>
@endsection

@push('scripts')

@endpush