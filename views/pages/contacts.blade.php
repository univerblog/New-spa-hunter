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
            <span>Контакты</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Напишите нам – ответим в течение <span class="lime">часа</span></h1>
        <p>Мы отвечаем на письма и сообщения в течение часа в рабочее время. Для срочных вопросов используйте мессенджеры – так быстрее всего.</p>
      </div>
      <div class="section-title">
        <p class="text-eyebrow">Каналы связи</p>
        <h2>Выберите удобный канал</h2>
      </div>
      <div class="set-tiles">

        <div class="cab-card set-tile">
            <div class="set-tile__icon"><i class="fa-regular fa-envelope"></i></div>
            <div class="set-tile__body">
                <div class="set-tile__title">Поддержка авторов</div>
                <small>Вопросы по работе с платформой, ссылками, выплатами.</small>
                <a class="cab-link" href="mailto:hello@cpahunter.io"><span>hello@cpahunter.io</span></a>
            </div>
        </div>

        <div class="cab-card set-tile">
            <div class="set-tile__icon"><i class="fa-regular fa-clock"></i></div>
            <div class="set-tile__body">
                <div class="set-tile__title">Часы работы</div>
                <small>Будни, 9:00 – 18:00 по Нью-Йорку</small>
            </div>
        </div>

        <div class="cab-card set-tile">
            <div class="set-tile__icon"><i class="fa-brands fa-whatsapp"></i></div>
            <div class="set-tile__body">
                <div class="set-tile__title">WhatsApp / Viber</div>
                <small>Быстрые ответы в мессенджерах, в течение часа.</small>
                <a class="cab-link" href="https://wa.me/12025550100" target="_blank" rel="noopener"><span>+1 (202) 555-0100</span></a>
            </div>
        </div>

        <div class="cab-card set-tile">
            <div class="set-tile__icon">
                <i class="fa-regular fa-paper-plane"></i>
            </div>
            <div class="set-tile__body">
                <div class="set-tile__title">Telegram</div>
                <small>Канал с новостями и обновлениями платформы.</small>
                <a class="cab-link" href="https://t.me/cpahunter" target="_blank" rel="noopener"><span>@cpahunter</span></a>
            </div>
        </div>

    </div>

     <div class="section-title">
        <p class="text-eyebrow">Форма обратной связи</p>
        <h2>Напишите нам</h2>
        <p>Опишите ваш вопрос, и мы вернёмся с ответом в течение часа в рабочее время.</p>
      </div>

      <form class="layout-form support-contacts-form" data-support-form>

        <div class="input-group-horisontal">
            <div class="input-field">
                <label>Ваше имя</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-field">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
        </div>

        <div class="input-field">
            <label>Тема обращения</label>
            <div class="select" data-select data-name="topic">
                <button type="button" class="select-trigger">
                    <span class="select-value">Выберите тему</span>
                    <i class="fa-solid fa-chevron-down select-arrow"></i>
                </button>
                <div class="select-panel">
                    <div class="select-list">
                        <button type="button" class="select-option" data-value="programs">Партнёрские программы и магазины</button>
                        <button type="button" class="select-option" data-value="sources">Подключение источника трафика</button>
                        <button type="button" class="select-option" data-value="payouts">Выплаты</button>
                        <button type="button" class="select-option" data-value="referral">Реферальная программа</button>
                        <button type="button" class="select-option" data-value="tech">Технический вопрос</button>
                        <button type="button" class="select-option" data-value="ads">Сотрудничество и реклама</button>
                        <button type="button" class="select-option" data-value="other">Другое</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="input-field">
            <label>Сообщение</label>
            <textarea name="message" rows="5" placeholder="Ваше сообщение..." required></textarea>
        </div>

         <div class="btn-group">
            <button type="submit" class="btn">Отправить сообщение</button>
        </div>

        

    </form>


    </div>
</section>



@endsection

@push('scripts')

@endpush