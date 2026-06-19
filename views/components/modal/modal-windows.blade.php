@push('modals')
<!-- Вход -->
<div class="modal-content" id="modal-login" style="display:none;">
    <h3>Вход</h3>
    <form class="container-modal" novalidate>
        <input type="hidden" name="" value="">
    
        <div class="social-block-auth">
            <a href="" title="Google"><img src="img/social/google.svg" alt="Google"></a>
            <a href="" title="apple"><img src="img/social/apple-white.svg" alt="Apple"></a>
            <a href="" title="Facebook"><img src="img/social/facebook.svg" alt="Facebook"></a>
            <a href="" title="X"><img src="img/social/x-white.svg" alt="x"></a>
            <a href="" title="telegram"><img src="img/social/tg.svg" alt="telegram"></a>
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

        <button type="submit" class="btn">
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
            <a href="" title="Google"><img src="img/social/google.svg" alt="Google"></a>
            <a href="" title="apple"><img src="img/social/apple-white.svg" alt="Apple"></a>
            <a href="" title="Facebook"><img src="img/social/facebook.svg" alt="Facebook"></a>
            <a href="" title="X"><img src="img/social/x-white.svg" alt="x"></a>
            <a href="" title="telegram"><img src="img/social/tg.svg" alt="telegram"></a>
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
<!-- Пароль успешно изменён 2 -->
<div class="modal-content" id="modal-password-changed-2" style="display:none;">
    <h3>Ваш пароль успешно изменён</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Ваш пароль успешно изменён.
        </div>
        <div class="btn-group right-group">
            <button class="btn">
            Войти с новым паролем <i class="fa-regular fa-arrow-right-to-bracket"></i>
            </button>
        </div>
        
    </div>
</div> 

<!-- Ссылка создана! -->
<div class="modal-content" id="modal-link-created" style="display:none;">
    <h3>Ссылка готова!</h3>
    <div class="container-modal">
        <div class="input-field" style="margin-top:10px;">
            <input type="text" name="" placeholder="" value="https://cpa.cx/a7e39246" readonly>
            <button type="button" class="input-fix-btn">
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
<!-- Обнаружен дубликат ссылки 2-->
<div class="modal-content" id="modal-link-duplicate-2" style="display:none;">
    <h3 class="orange">
        <i class="fa-regular fa-triangle-exclamation"></i> 
        Обнаружен дубликат ссылки
    </h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Такая реферальная ссылка уже создана. Точно создать ещё одну?
        </div>
        <div class="btn-group right-group">
            <button class="btn outline">Отмена</button>
            <button class="btn">Да создать</button>
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
    <h3>Отключить источник?</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            После отключения партнёрские ссылки этой площадки перестанут засчитываться.
        </div>
        <div class="btn-group right-group">
            <button class="btn outline">Отмена</button>
            <button class="btn red">Отключить</button>
        </div>
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
            <button class="btn outline">Отмена</button>
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
            <button type="button" class="input-fix-btn">
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