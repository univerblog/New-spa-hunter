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
            <span>Настройки cookie</span>
        </div>
    </div>
</nav>

<section class="section legal-page">
    <div class="container">
        <div class="section-title section-title-left">
            <h1>Настройки cookie</h1>
            <p>Управляйте тем, какие необязательные cookies мы можем использовать.</p>
            <small>Дата вступления в силу: 17 июня 2024 · Последнее обновление: 22 июля 2026</small>
        </div>
        @include('components.legal-nav')
        <div class="legal-content" style="max-width:760px;">
            <p>Здесь вы можете выбрать, какие категории cookies разрешить. Строго необходимые cookies всегда включены – без них сайт не работает. Ваш выбор сохраняется в этом браузере, и вы можете изменить его в любой момент.</p>

            <div class="optout-gpc" id="consent-gpc" hidden>Ваш браузер отправляет сигнал Global Privacy Control, поэтому необязательные cookies отключены и заблокированы.</div>

            <div class="consent-row">
                <div>
                    <b>Строго необходимые</b>
                    <p>Нужны для входа, безопасности и сохранения ваших настроек. Отключить нельзя.</p>
                </div>
                <label class="optout-toggle">
                    <input type="checkbox" checked disabled>
                    <span class="optout-track"><span></span></span>
                </label>
            </div>

            <div class="consent-row">
                <div>
                    <b>Аналитические</b>
                    <p>Помогают понять, как используется сайт, чтобы улучшать его.</p>
                </div>
                <label class="optout-toggle">
                    <input type="checkbox" id="consent-analytics">
                    <span class="optout-track"><span></span></span>
                </label>
            </div>

            <div class="consent-row">
                <div>
                    <b>Маркетинговые</b>
                    <p>Используются для оценки эффективности и показа релевантных предложений.</p>
                </div>
                <label class="optout-toggle">
                    <input type="checkbox" id="consent-marketing">
                    <span class="optout-track"><span></span></span>
                </label>
            </div>

            <div class="btn-group">
                <button type="button" class="btn" onclick="saveCookiePrefs()">Сохранить выбор</button>
            </div>
            
            
            <div class="page-link" style="font-size:15px; margin-top:30px;">
                Подробнее – в
                <a href="/cookie"><span>Политике в отношении cookies</span> <i class="fa-regular fa-arrow-right fa-xs"></i></a>
            </div>
        </div>
    </div>
</section>      
@endsection

@push('modals')
<div class="modal-content" id="modal-cookie-saved" style="display:none;">
    <h3>Выбор сохранён</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Ваш выбор настроек cookie сохранён.
        </div>
        <div class="btn-group right-group">
            <button type="button" class="btn" onclick="closeModal()">Ok</button>
        </div>
    </div>
</div>
@endpush

@push('scripts')
<script>
////// Настройки cookie: категории в localStorage + cookie + GPC
const csA = document.getElementById('consent-analytics');
const csM = document.getElementById('consent-marketing');

let prefs = { analytics: false, marketing: false };
if (localStorage.getItem('cpah_cookie_consent') === 'all') prefs = { analytics: true, marketing: true };
const saved = localStorage.getItem('cpah_cookie_prefs');
if (saved) prefs = JSON.parse(saved);

csA.checked = prefs.analytics;
csM.checked = prefs.marketing;

if (navigator.globalPrivacyControl === true) {
    csA.checked = csM.checked = false;
    csA.disabled = csM.disabled = true;
    document.getElementById('consent-gpc').hidden = false;
}

window.saveCookiePrefs = function () {
    const p = { analytics: csA.checked, marketing: csM.checked };
    const consent = p.analytics || p.marketing ? 'all' : 'necessary';
    localStorage.setItem('cpah_cookie_prefs', JSON.stringify(p));
    localStorage.setItem('cpah_cookie_consent', consent);
    document.cookie = 'cpah_cookie_consent=' + consent + ';path=/;max-age=31536000;SameSite=Lax';
    openModal('modal-cookie-saved');
};
</script>
@endpush

