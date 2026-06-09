@push('modals')
<div class="modal-content" id="modal-login" style="display:none;">
    <h3>Регистрация</h3>
    <form class="container-modal">
        <div class="form-alert alert-danger" style="display: none;"></div>
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
                <input type="email" name="username" autofocus="" placeholder="E-mail" maxlength="254" required="" id="id_username">
            
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Пароль" autocomplete="current-password" required="" id="id_password">
            
            </div>
        </div>

        <button type="submit" class="btn">
            Войти <i class="fa-regular fa-arrow-right-to-bracket"></i>
        </button>
        <input type="hidden" name="next" value="" id="login-next-field">

        <p class="form-text" style="text-align:center;">
            <button class="form-btn-link">Забыли пароль?</button>
        </p>

        <div class="form-line"></div>

        <p class="form-text" style="text-align:center;">
            Нет аккаунта?  <button class="form-btn-link">Присоединиться</button>
        </p>
    </form>

</div>
@endpush