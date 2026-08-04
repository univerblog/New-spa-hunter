@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Настройки</h1>
    <p>Профиль, безопасность и предпочтения.</p>
</div>

<div class="cab-card">
    <div class="cab-card-head">
        <div class="cab-card-title">Профиль</div>
        <p class="cab-card-note">Фото подтягивается из вашей соцсети при регистрации. Если получить не удалось – загрузите JPG или PNG.</p>
    </div>
    <div class="layout-form set-profile">
        <div class="set-avatar-row">
            <div class="set-avatar" data-initials="SP">SP</div>
            <div class="set-avatar-side">
                <div class="set-avatar-actions">
                    <label class="btn min outline">Загрузить фото<input type="file" accept="image/*" data-avatar-file></label>
                    <button class="cab-link" data-avatar-reset><span>Сбросить</span></button>
                </div>
            </div>
        </div>

        
        <div class="input-field">
            <label>Имя</label>
            <input type="text" id="set-name" value="Sergey Pavlovich" maxlength="150">
        </div>
        <div class="input-group-horisontal">
            <div class="input-field">
                <label>Email</label>
                <input type="text" name="" placeholder="" value="sergey@peoplepro.com" readonly="">
                <button type="button" class="input-fix-btn" onclick="openModal('modal-email-change')">
                    <i class="fa-regular fa-pen"></i>
                </button>
            </div>
            <div class="input-field">
                <label>Часовой пояс</label>
                <div class="select" data-select data-name="timezone">
                    <button type="button" class="select-trigger">
                        <span class="select-value">America / New York (UTC-5)</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option" data-value="America / Los Angeles (UTC-8)">America / Los Angeles (UTC-8)</button>
                            <button type="button" class="select-option" data-value="America / Chicago (UTC-6)">America / Chicago (UTC-6)</button>
                            <button type="button" class="select-option is-selected" data-value="America / New York (UTC-5)">America / New York (UTC-5)</button>
                            <button type="button" class="select-option" data-value="America / Sao Paulo (UTC-3)">America / Sao Paulo (UTC-3)</button>
                            <button type="button" class="select-option" data-value="Europe / London (UTC+0)">Europe / London (UTC+0)</button>
                            <button type="button" class="select-option" data-value="Europe / Berlin (UTC+1)">Europe / Berlin (UTC+1)</button>
                            <button type="button" class="select-option" data-value="Europe / Madrid (UTC+1)">Europe / Madrid (UTC+1)</button>
                            <button type="button" class="select-option" data-value="Europe / Moscow (UTC+3)">Europe / Moscow (UTC+3)</button>
                            <button type="button" class="select-option" data-value="Asia / Bangkok (UTC+7)">Asia / Bangkok (UTC+7)</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="input-group-horisontal">
             <div class="input-field">
                <label>Валюта</label>
                <div class="select" data-select data-name="currency">
                    <button type="button" class="select-trigger">
                        <span class="select-value">USD ($)</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="USD">USD ($)</button>
                            <button type="button" class="select-option" data-value="EUR">EUR (€)</button>
                            <button type="button" class="select-option" data-value="GBP">GBP (£)</button>
                            <button type="button" class="select-option" data-value="RUB">RUB (₽)</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="input-field">
                <label>Язык интерфейса</label>
                <div class="select" data-select data-name="lang">
                    <button type="button" class="select-trigger">
                        <span class="select-value">RU</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="USD">RU</button>
                            <button type="button" class="select-option" data-value="EURO">EN</button>
                        </div>
                    </div>
                </div>
            </div>
         </div>   
        
           <div class="input-field">
            <label>Короткое описание – для будущих функций (публичный профиль, умный подбор программ).</label>
            <textarea rows="3" placeholder="Расскажите о своём контенте и аудитории..."></textarea>
            <!-- <span class="input-field__hint">Короткое описание – для будущих функций (публичный профиль, умный подбор программ).</span> -->
        </div>
       
        <div class="btn-group">
            <button class="btn">Сохранить</button>
        </div>
    </div>

</div>


<div class="cab-card layout-form">
    <div class="cab-card-head" style="margin-bottom:0;">
        <div class="cab-card-title">Контакты</div>
        <p class="cab-card-note">Для уведомлений о выплатах и проблемах с аккаунтом. Часть заполнена на онбординге – остальные можно добавить.</p>
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

<div class="set-tiles">
    <div class="cab-card set-tile">
        <div class="set-tile__icon"><i class="fa-regular fa-wallet"></i></div>
        <div class="set-tile__body">
            <div class="set-tile__title">Платёжные данные</div>
            <small>Кошельки и реквизиты для выплат настраиваются в разделе «Вывод».</small>
            <a class="cab-link" href="/cabinet/withdraw"><span>Управление выводом</span></a>
        </div>
    </div>

    <div class="cab-card set-tile">
        <div class="set-tile__icon"><i class="fa-regular fa-key"></i></div>
        <div class="set-tile__body">
            <div class="set-tile__title">Пароль</div>
            <small>Последняя смена: 14 октября 2025</small>
            <button class="cab-link" onclick="openModal('modal-password-change')"><span>Изменить пароль</span></button>
        </div>
    </div>

    <div class="cab-card set-tile">
        <div class="set-tile__icon"><i class="fa-regular fa-shield-check"></i></div>
        <div class="set-tile__body">
            <div class="set-tile__title">Двухфакторная аутентификация</div>
            <small>Дополнительная защита через приложение-аутентификатор</small>
            <div class="set-tile__toggle">
                <div class="cab-toggle on" data-toggle data-tfa></div>
                <span data-tfa-status>Включено</span>
            </div>
        </div>
    </div>

    <div class="cab-card set-tile">
        <div class="set-tile__icon"><i class="fa-regular fa-bell"></i></div>
        <div class="set-tile__body">
            <div class="set-tile__title">Уведомления</div>
            <small>Email, Telegram и на сайте – по каждому типу события</small>
            <button class="cab-link" onclick="openModal('modal-notif-settings', { className: 'long' })"><span>Настроить</span></button>
        </div>
    </div>
</div>

<div class="set-danger">
    <div class="set-danger__title">Опасная зона</div>
    <p>Удаление аккаунта необратимо. Все данные, ссылки и история транзакций удаляются безвозвратно. Доступные к выводу средства выплачиваются в течение 7 рабочих дней до закрытия, если их сумма достигла минимального порога вывода ($50). Остаток ниже порога к выводу не подлежит.</p>
    <div class="btn-group" style="margin-top:10px;">
        <button class="btn min set-danger__btn" onclick="openModal('modal-account-delete')">Удалить аккаунт</button>
    </div>
</div>
    

@endsection

@push('scripts')
<script>
document.addEventListener('click', function(e){
    var t = e.target.closest('[data-tfa]');
    if (!t) return;
    var s = t.closest('.set-tile').querySelector('[data-tfa-status]');
    if (!s) return;
    var on = t.classList.contains('on');
    s.textContent = on ? 'Выключено' : 'Включено' ;
    s.style.color = on ? 'var(--text-muted)' : 'var(--lime)' ;
});
</script>

@endpush