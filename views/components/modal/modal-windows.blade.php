@push('modals')
<!-- Вход -->
<div class="modal-content" id="modal-login" style="display:none;">
    <h3>Вход</h3>
    <form class="container-modal" novalidate>
        <input type="hidden" name="" value="">
    
        <div class="social-block-auth">
            <a href="" title="Google"><img src="/img/social/google.svg" alt="Google"></a>
            <a href="" title="apple"><img src="/img/social/apple-white.svg" alt="Apple"></a>
            <a href="" title="Facebook"><img src="/img/social/facebook.svg" alt="Facebook"></a>
            <a href="" title="X"><img src="/img/social/x-white.svg" alt="x"></a>
            <a href="" title="telegram"><img src="/img/social/tg.svg" alt="telegram"></a>
        </div>
        <p class="form-text-line">или войдите по email</p>
    
        <div class="input-group">
            <div class="input-field">
                <input type="email" name="" autofocus="" placeholder="E-mail" maxlength="254">
            </div>
            <div class="input-field">
                <input type="password" name="" placeholder="Пароль">
            </div>
        </div>

        <button type="submit" class="btn" onclick="cabLogin();">
            Войти 
        </button>

        <p class="form-text cont-center">
            <button class="form-btn-link" type="button" onclick="openModal('modal-password-reset')">Забыли пароль?</button>
        </p>

        <div class="form-line"></div>

        <p class="form-text cont-center">
            Нет аккаунта?&nbsp;  <button type="button" class="form-btn-link" onclick="openModal('modal-register')">Зарегистрироваться</button>
        </p>
    </form>
</div>

<!-- Регистрация -->
<div class="modal-content" id="modal-register" style="display:none;">
    <h3>Регистрация</h3>
    <form class="container-modal" novalidate>

        <input type="hidden" name="" value="">
    
        <div class="social-block-auth">
            <a href="" title="Google"><img src="/img/social/google.svg" alt="Google"></a>
            <a href="" title="apple"><img src="/img/social/apple-white.svg" alt="Apple"></a>
            <a href="" title="Facebook"><img src="/img/social/facebook.svg" alt="Facebook"></a>
            <a href="" title="X"><img src="/img/social/x-white.svg" alt="x"></a>
            <a href="" title="telegram"><img src="/img/social/tg.svg" alt="telegram"></a>
        </div>
        <p class="form-text-line">или используйте email</p>
    
        <div class="input-group">
            <div class="input-field">
                <input type="email" name="username" autofocus="" placeholder="E-mail" maxlength="254" >
            
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Пароль" data-pwcheck>
                <button type="button" class="input-fix-btn show-pass">
                    <i class="fa-regular fa-eye-closed"></i>
                </button>
            </div>
            <div class="input-field">
                <input type="password" name="password-2" placeholder="Повторите пароль" autocomplete="current-password" required="" id="id_password" data-pwcheck>
            </div>
        </div>

        <div class="auth-pwhints" data-pwhints>
            <span data-rule="lang">EN</span>
            <span data-rule="lower">строчная</span>
            <span data-rule="upper">заглавная</span>
            <span data-rule="digit">цифра</span>
            <span data-rule="len">8+ симв</span>
        </div>

        <button type="submit" class="btn">
            Создать аккаунт 
        </button>

        <p class="form-text cont-center">
            У вас есть аккаунт?&nbsp;  <button type="button" class="form-btn-link" onclick="openModal('modal-login')">Войти</button>
        </p>

        <div class="form-line"></div>
        <p class="form-text-mini cont-center">
            Регистрируясь, вы соглашаетесь с <a href="#">Условиями</a> и <a href="#">Политикой конфиденциальности</a>.
        </p>
    </form>
</div>

<!-- Восстановление пароля-->
<div class="modal-content" id="modal-password-reset" style="display:none;">
    <h3>Восстановление пароля</h3>
    <form class="container-modal" novalidate>
        <div class="form-alert alert-danger" style="display:none;">Тут можно выводить текст ошибок</div>
        <div class="form-alert alert-success" style="display:none;">Тут можно выводить текст БЕЗ ошибок</div>

        <p class="form-text-content">
            Введите email — мы отправим ссылку для сброса пароля.
        </p>
    
        <div class="input-group">
            <div class="input-field">
                <input type="email" name="" autofocus="" placeholder="E-mail" maxlength="254" id="">
            </div>
        </div>

        <button type="submit" class="btn">
            Отправить ссылку
        </button>

        <p class="form-text cont-center">
            Вспомнили пароль?&nbsp;  <button type="button" class="form-btn-link" onclick="openModal('modal-login')">Войти</button>
        </p>
    </form>
</div>

<!-- Смена пароля -->
<div class="modal-content" id="modal-password-change" style="display:none;">
    <h3>Изменить пароль</h3>
    <form class="container-modal" novalidate>
        <input type="hidden" name="" value="">
        <p class="form-text-content">Введите текущий и новый пароль</p>
    
        <div class="input-group">
            <div class="input-field">
                <input type="password" name="password" placeholder="Текущий пароль" autocomplete="current-password" required="" id="id_password" data-pwcheck>
                <button type="button" class="input-fix-btn show-pass">
                    <i class="fa-regular fa-eye-closed"></i>
                </button>
            </div>
            <div class="input-field">
                <input type="password" name="password-2" placeholder="Новый пароль" autocomplete="current-password" required="" id="id_password" data-pwcheck>
            </div>
            <div class="input-field">
                <input type="password" name="password-3" placeholder="Повторите пароль" autocomplete="current-password" required="" id="id_password" data-pwcheck>
            </div>
        </div>

        <div class="auth-pwhints" data-pwhints>
            <span data-rule="lang">EN</span>
            <span data-rule="lower">строчная</span>
            <span data-rule="upper">заглавная</span>
            <span data-rule="digit">цифра</span>
            <span data-rule="len">8+ симв</span>
        </div>

        <div class="btn-group right-group">
            <button type="button" class="btn outline full">Отмена</button>
            <button class="btn full">Продолжить</button>
        </div>

        <p class="form-text" style="text-align:center;">
            <button class="form-btn-link" type="button" onclick="openModal('modal-password-reset')">Забыли пароль?</button>
        </p>
    </form>
</div>

<!-- Смена email -->
<div class="modal-content" id="modal-email-change" style="display:none;">
    <h3>Изменить email</h3>
    <form class="container-modal" novalidate>
        <input type="hidden" name="" value="">

        <div class="form-text-content">
            Введите новый email
        </div>
    
        <div class="input-group">
            <div class="input-field">
                <input type="email" placeholder="E-mail" maxlength="254" value="example@gmail.com" readonly>
            </div>  
             <div class="input-field">
                <input type="email" placeholder="Новый e-mail" maxlength="254" value="">
            </div>    
        </div>

        <div class="btn-group right-group">
            <button type="button" class="btn outline full">Отмена</button>
            <button class="btn full">Продолжить</button>
        </div>

        
    </form>
</div> 

<!-- Ссылка на пароль устарела -->
<div class="modal-content" id="modal-reset-link-expired" style="display:none;">
    <h3>Ссылка на пароль устарела</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Ссылка для сброса пароля недействительна или устарела
        </div>
        <div class="btn-group">
            <button class="btn full">Запросить новую ссылку</button>
        </div>
    </div>
</div> 

<!-- Ссылка на пароль устарела-2 -->
<div class="modal-content" id="modal-reset-link-expired-2" style="display:none;">
    <h3 class="red"><i class="fa-regular fa-link-slash"></i>Ссылка на пароль устарела</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Ссылка для сброса пароля недействительна или устарела.
        </div>
        <button class="btn">Запросить новую ссылку</button>
    </div>
</div> 

<!-- Пароль успешно изменён -->
<div class="modal-content" id="modal-password-changed" style="display:none;">
    <h3>Все отлично!</h3>
    <div class="container-modal">
        
        <div class="form-text-content" style="margin-bottom:10px;">
            Ваш пароль успешно изменён.
        </div>
        <div class="btn-group center-group">
            <button class="btn full">Войти с новым паролем</button>
        </div>
    </div>
</div> 

<!-- Метож оплаты создан -->
<div class="modal-content" id="modal-add-payment-method" style="display:none;">
    <h3>Метод оплаты добавлен!</h3>
    <div class="container-modal">
        
        <div class="form-text-content" style="margin-bottom:10px;">
            Метод оплаты успешно добавлен. Проверьте почту для подтверждения перед использованием для вывода средств.
        </div>
        <div class="btn-group center-group">
            <button class="btn full" onclick="closeModal()">Все понятно</button>
        </div>
    </div>
</div> 

<!-- Удалить метод оплаты -->
<div class="modal-content" id="modal-delete-payment-method" style="display:none;">
    <h3>Удалить метод оплаты?</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Вы уверены, что хотите удалить этот метод оплаты?
        </div>
        <div class="btn-group right-group">
            <button class="btn outline" onclick="closeModal()">Отмена</button>
            <button class="btn red" data-del-confirm>Удалить</button>
        </div>
    </div>
</div>
<!-- Метод оплаты удалён -->
<div class="modal-content" id="modal-delete-payment-method-done" style="display:none;">
    <h3>Метод оплаты удалён</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Метод оплаты успешно удалён из вашего аккаунта.
        </div>
        <div class="btn-group center-group">
            <button class="btn full" onclick="closeModal()">Все понятно</button>
        </div>
    </div>
</div>
<!-- Удалить налоговый профиль -->
<div class="modal-content" id="modal-tax-delete" style="display:none;">
    <h3>Удалить налоговый профиль?</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Профиль будет удалён. Методы выплат, привязанные к нему, потребуют выбрать другой профиль.
        </div>
        <div class="btn-group right-group">
            <button class="btn outline" onclick="closeModal()">Отмена</button>
            <button class="btn red" data-tax-del-confirm>Удалить</button>
        </div>
    </div>
</div>

<!-- Ссылка создана! -->
<div class="modal-content" id="modal-link-created" style="display:none;">
    <h3>Ссылка готова!</h3>
    <div class="container-modal">
        <div class="input-field" style="margin-top:10px;">
            <input type="text" name="" placeholder="" value="https://cpa.cx/a7e39246" readonly>
            <button type="button" class="input-fix-btn" data-copy>
                <i class="fa-regular fa-copy"></i>
            </button>
        </div>
        <div class="modal-brand-stats">
            <span>Nike</span>•<span>до 3%</span>•<span>180+ стран</span>
        </div>
        <div class="form-text-content" style="margin-bottom:10px;">
            Делитесь в постах, сторис, описаниях видео или в Telegram-канале. Комиссия начисляется автоматически за каждую продажу.
        </div>
        <div class="btn-group center-group">
            <a href="#" class="btn full">Открыть мои ссылки</a>
            <button class="btn outline">Создать еще</button>
        </div>
    </div>
</div> 
<!-- Обнаружен дубликат ссылки -->
<div class="modal-content" id="modal-link-duplicate" style="display:none;">
    <h3>Обнаружен дубликат ссылки</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Такая реферальная ссылка уже создана. Точно создать ещё одну?
        </div>
        <div class="btn-group">
            <button class="btn outline full">Отмена</button>
            <button class="btn full">Да создать</button>
        </div>
    </div>
</div>   
<!-- Ошибка! Не удалось создать ссылку. -->
 <div class="modal-content" id="modal-link-error" style="display:none;">
    <h3>Ошибка!</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Не удалось создать ссылку. Попробуйте позже
        </div>
        <div class="btn-group">
            <button class="btn full red">Сообщить об ошибке</button>
            <button class="btn outline">Закрыть</button>
        </div>
    </div>
</div>  
<!-- Отключить источник -->
<div class="modal-content" id="modal-link-delete" style="display:none;">
    <h3>Отключить <span data-platform-name></span>?</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            После отключения партнёрские ссылки этой площадки перестанут засчитываться.
        </div>
        <div class="btn-group right-group">
            <button class="btn outline" onclick="closeModal()">Отмена</button>
            <button class="btn red" data-delete-confirm>Отключить</button>
        </div>
        <div class="modal-loader"><i></i><span>Авторизуемся через API...</span></div>
    </div>
</div>
<!-- Удалить аккаунт -->
<div class="modal-content" id="modal-account-delete" style="display:none;">
    <h3>Удалить аккаунт?</h3>
    <div class="container-modal">
        <div class="form-text-content">
            Это действие необратимо. Все данные, ссылки и история транзакций будут удалены. Доступные к выводу средства выплатим в течение 7 рабочих дней. У вас будет 7 дней на отмену.
        </div>
        <label class="modal-checkbox red">
            <input type="checkbox" data-gate><span>Я понимаю последствия и хочу удалить аккаунт</span>
        </label>
        <div class="btn-group right-group">
            <button class="btn outline" onclick="closeModal()">Отмена</button>
            <button class="btn red" data-gated disabled><i class="fa-regular fa-trash-can"></i>Удалить</button>
        </div>
    </div>
</div>  
<!-- Магазин не найден -->
<div class="modal-content" id="modal-shop-not-found" style="display:none;">
    <h3>Магазин не найден!</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            У нас пока нет этого магазина или URL указан некорректно.
        </div>
        <div class="btn-group">
            <button class="btn full red">Сообщить об ошибке</button>
            <button class="btn outline">Закрыть</button>
        </div>
    </div>
</div>  

<!-- Добавить заметку -->
<div class="modal-content" id="modal-note-add" style="display:none;">
    <h3>Добавить заметку</h3>
    <div class="container-modal">
        <div class="input-field">
            <textarea rows="6" name="" placeholder="Добавить заметку..." maxlength="450"></textarea>
        </div>
        <div class="btn-group right-group">
            <button class="btn outline">Отмена</button>
            <button class="btn">Сохранить</button>
        </div>
    </div>
</div>  
<!-- Сообщение в поддержку -->
<div class="modal-content" id="modal-support-message" style="display:none;">
    <h3>Сообщение в поддержку</h3>
    <div class="container-modal">
        <div class="modal-image">
            <img src="https://img.lightshot.app/EGPCBqGQRgqpVClIuXYRIQ.png" alt="screen">
        </div>
        <div class="input-field">
            <textarea rows="6" name="" placeholder="Опишите проблему (минимум 10 символов)..." maxlength="450"></textarea>
        </div>
        <div class="btn-group">
            <button class="btn full">Отправить</button>
            <button class="btn outline">Отмена</button>
        </div>
    </div>
</div>  

<!-- Двухфакторная аутентификация -->
<div class="modal-content" id="modal-2fa" style="display:none;">
    <h3>Двухфакторная аутентификация</h3>
    <div class="container-modal">
        <div class="form-text-content">
            Отсканируйте QR-код в приложении-аутентификаторе (Google&nbsp;Authenticator, Authy и подобные).
        </div>
         <div class="modal-qr-image">
            <img src="/img/qr.png" alt="screen">
        </div>
        <div class="form-text-content cont-center">
            Или введите ключ вручную
        </div>
        <div class="input-field">
            <input type="text" name="" placeholder="" value="JBSW Y3DP EHPK 3PXP" readonly>
            <button type="button" class="input-fix-btn" data-copy>
                <i class="fa-regular fa-copy"></i>
            </button>
        </div>
        <div class="form-text-content cont-center">
            Введите 6-значный код из приложения:
        </div>
        <div class="code-input" data-code style="margin-bottom:10px;">
            <input type="text" inputmode="numeric" maxlength="1" autocomplete="one-time-code">
            <input type="text" inputmode="numeric" maxlength="1">
            <input type="text" inputmode="numeric" maxlength="1">
            <input type="text" inputmode="numeric" maxlength="1">
            <input type="text" inputmode="numeric" maxlength="1">
            <input type="text" inputmode="numeric" maxlength="1">
        </div>
       
       
        <div class="btn-group">
            <button class="btn outline full">Отмена</button>
            <button class="btn full">Подтвердить</button>
        </div>
    </div>
</div>  

<!-- Подключить источник через API -->
<div class="modal-content" id="modal-connect-source" style="display:none;">
    <h3>Подключить <span data-platform-name></span></h3>
    <div class="container-modal">
        <div class="form-text-content">
            Авторизация через официальный API – мы получаем только базовую инфу о канале (название, число подписчиков, тематика). Доступ к публикации/чтению – нет.
        </div>
        <div class="modal-card">
            <h4>Что мы получим:</h4>
            <ul class="ul-modal-list">
                <li>Название канала и handle</li>
                <li>Число подписчиков</li>
                <li>Тематика канала</li>
                <li>Гео аудитории (агрегированно)</li>
            </ul>
        </div>

        <div class="btn-group right-group">
            <a href="#" class="btn full" data-connect-oauth>Авторизация через <span data-platform-name></span></a>
            <button class="btn outline" onclick="closeModal()">Отмена</button>
        </div>
        <div class="modal-loader"><i></i><span>Авторизуемся через API...</span></div>
    </div>
</div>

<!-- Подключить источник через ввод @ника -->
<div class="modal-content" id="modal-connect-input-source" style="display:none;">
    <h3>Подтвердите ваш аккаунт <span data-platform-name></span></h3>
    <div class="container-modal">
        <div class="input-group">
            <div class="input-field">
                <input type="text" name="" autofocus="" placeholder="Введите ваш @username" maxlength="254" data-connect-handle>
            </div>
        </div>
        <div class="btn-group right-group">
            <button class="btn outline" onclick="closeModal()">Отмена</button>
            <button class="btn" data-connect-submit>Продолжить</button>
        </div>
        <div class="modal-loader"><i></i><span>Авторизуемся через API...</span></div>
    </div>
</div>

<!-- Настройки уведомлений -->
<div class="modal-content" id="modal-notif-settings" style="display:none;">
    <h3>Настройки уведомлений</h3>
    <div class="container-modal">
        <div class="form-text-content">Выберите, о чём получать уведомления</div>

        <div class="form-text-label">Каналы доставки</div>

        <div class="notif-chan">
            <i class="fa-regular fa-envelope"></i>
            <span class="notif-chan__name">Email</span>
            <span class="notif-chan__addr">bloggers.tools.view@gmail.com</span>
            <div class="cab-toggle" data-toggle></div>
        </div>
        <div class="notif-chan">
            <i class="fa-regular fa-paper-plane"></i>
            <span class="notif-chan__name">Telegram</span>
            <span class="notif-chan__addr">@xx757xx</span>
            <div class="cab-toggle on" data-toggle></div>
        </div>
        <div class="notif-chan">
            <i class="fa-regular fa-bell"></i>
            <span class="notif-chan__name">На сайте</span>
            <span class="notif-chan__addr">В браузере</span>
            <div class="cab-toggle on" data-toggle></div>
        </div>

        <div class="form-text-label">Типы уведомлений</div>

        <div class="notif-matrix">
            <div class="notif-matrix__head">
                <span></span>
                <span>Email</span>
                <span>Telegram</span>
                <span>Сайт</span>
            </div>
            <div class="notif-matrix__row">
                <span>Изменение баланса</span>
                <span><div class="cab-toggle" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
            </div>
            <div class="notif-matrix__row">
                <span>Обновление ссылки</span>
                <span><div class="cab-toggle" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
            </div>
            <div class="notif-matrix__row">
                <span>Аккаунт одобрен</span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
            </div>
            <div class="notif-matrix__row">
                <span>Выплата</span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
            </div>
            <div class="notif-matrix__row">
                <span>Система</span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
                <span><div class="cab-toggle on" data-toggle></div></span>
            </div>
        </div>

        <div class="btn-group right-group">
            <button class="btn" onclick="closeModal()">Готово</button>
        </div>
    </div>
</div>
<!-- Правила заработка -->
<div class="modal-content" id="modal-earn-rules" style="display:none;">
    <h3>Правила заработка</h3>
    <div class="container-modal">
        <div class="form-text-content">Как вы зарабатываете на CPA Hunter и когда получаете деньги.</div>

        <div class="modal-card">
            <h4>Основные правила</h4>
            <ul class="ul-modal-list">
                <li>Покупка должна произойти по вашей партнёрской ссылке CPA Hunter – в течение срока действия ссылки (от <b>24 часов до 30 дней</b>, зависит от бренда)</li>
                <li>Магазины и сервисы передают статус заказа в CPA Hunter – обычно <b>за 1–2 дня</b>, иногда до 7 дней</li>
                <li>Срок до подтверждения у каждого магазина свой – от <b>30 до 180 дней</b>. Если за это время заказ не отменён, не возвращён и не возмещён – он подтверждается</li>
                <li>CPA Hunter выплачивает <b>в конце каждого месяца</b> (если достигнут порог выплат) – не забудьте настроить способ вывода средств</li>
            </ul>
        </div>

        <div class="modal-card">
            <h4>Что не засчитывается</h4>
            <ul class="ul-modal-list">
                <li>Возвраты товара – комиссия аннулируется автоматически</li>
                <li>Отменённые или незавершённые оплаты</li>
                <li>Покупки автором по собственной ссылке</li>
                <li>Накрутка трафика, вредоносные программы, подмена партнёрских меток – пожизненный бан</li>
            </ul>
        </div>

        <div class="modal-card">
            <h4>Выплаты</h4>
            <ul class="ul-modal-list">
                <li>Минимум к выводу: $50</li>
                <li>Выплаты – в конце каждого месяца</li>
                <li>Способы: PayPal, банковский перевод (SEPA / SWIFT / ACH), Wise, Payoneer. Криптовалюта (USDT, USDC) – опционально, по запросу в настройках кабинета</li>
                <li>Обработка – 1–3 рабочих дня в зависимости от метода</li>
            </ul>
        </div>
        <div class="btn-group right-group">
            <button class="btn min" onclick="closeModal()">Понятно</button>
        </div>
    </div>
</div>

<!-- Пароль успешно изменён -->
<div class="modal-content" id="modal-tg-link" style="display:none;">
    <h3>Привязка Telegram-аккаунта</h3>
    <div class="container-modal">
        
        <div class="form-text-content" style="margin-bottom:10px;">
            Нажмите кнопку ниже, чтобы открыть нашего Telegram-бота и подтвердить привязку. Ссылка действительна 10 минут.
        </div>
        <div class="btn-group">
            <a class="btn full" href="https://t.me/cpahunter_bot?start=zVhJIxrVKS1ujQnuQqBbB28LfgdJWVDN94zmamJP3So">Открыть Telegram-бота</a>
            <button class="btn outline" onclick="closeModal()">Отмена</button>
        </div>
    </div>
</div> 
@endpush

@push('scripts')
<script>
// ---- Глазок: показать/скрыть пароль ----
document.addEventListener('click', function (e) {
    var btn = e.target.closest('.show-pass');
    if (!btn) return;
    var form = btn.closest('form');
    if (!form) return;

    var pw = form.querySelectorAll('input[type=password]');
    var show = pw.length > 0;
    (show ? pw : form.querySelectorAll('input[data-pass]')).forEach(function (i) {
        i.type = show ? 'text' : 'password';
        if (show) i.dataset.pass = 1;
    });

    var ic = btn.querySelector('i');
    if (ic) ic.classList.replace(show ? 'fa-eye-closed' : 'fa-eye', show ? 'fa-eye' : 'fa-eye-closed');
});

// ---- Подсказки по паролю ----
document.addEventListener('input', function (e) {
    var inp = e.target;
    if (!inp.matches('[data-pwcheck]')) return;

    var form  = inp.closest('form');
    var hints = form && form.querySelector('[data-pwhints]');
    if (!hints) return;

    var v = inp.value, r = {
        lang:  /^[\x00-\x7F]*$/.test(v),   // только латиница
        lower: /[a-z]/.test(v),
        upper: /[A-Z]/.test(v),
        digit: /\d/.test(v),
        len:   v.length >= 8
    };

    hints.querySelectorAll('[data-rule]').forEach(function (p) {
        p.classList.remove('valid', 'invalid');
        if (v) p.classList.add(r[p.dataset.rule] ? 'valid' : 'invalid');
    });
});

// ---- Чекбокс на модалке ----
document.addEventListener('change', function (e) {
    var box = e.target;
    if (!box.matches('[data-gate]')) return;

    var scope = box.closest('.modal-content') || document;
    scope.querySelectorAll('[data-gated]').forEach(function (btn) {
        btn.disabled = !box.checked;
    });
});

// ---- Ввод 6-ти значного кода ----
// ввод цифры → следующее поле
document.addEventListener('input', function (e) {
    var input = e.target, box = input.closest('[data-code]');
    if (!box) return;
    input.value = input.value.replace(/\D/g, '').slice(0, 1);
    if (input.value) {
        var inputs = box.querySelectorAll('input');
        var i = [].indexOf.call(inputs, input);
        if (inputs[i + 1]) inputs[i + 1].focus();
    }
});

// backspace на пустом → предыдущее поле
document.addEventListener('keydown', function (e) {
    if (e.key !== 'Backspace') return;
    var input = e.target, box = input.closest && input.closest('[data-code]');
    if (!box || input.value !== '') return;
    var inputs = box.querySelectorAll('input');
    var i = [].indexOf.call(inputs, input);
    if (inputs[i - 1]) { inputs[i - 1].focus(); inputs[i - 1].value = ''; e.preventDefault(); }
});

// вставка кода целиком → раскидываем по полям
document.addEventListener('paste', function (e) {
    var input = e.target, box = input.closest && input.closest('[data-code]');
    if (!box) return;
    e.preventDefault();
    var digits = (e.clipboardData.getData('text') || '').replace(/\D/g, '');
    var inputs = box.querySelectorAll('input');
    for (var j = 0; j < inputs.length; j++) inputs[j].value = digits[j] || '';
    var last = Math.min(digits.length, inputs.length) - 1;
    (inputs[last] || inputs[0]).focus();
});

</script>
@endpush