@push('modals')
<div class="modal-content" id="modal-login" style="display:none;">
    <h3>Регистрация</h3>
    <form class="container-modal">
        <div class="form-alert alert-danger" style="display: none;"></div>
        <input type="hidden" name="" value="">
    
        <div class="social-block-auth">
            <a href="" title="Google"><i class="fa-brands fa-google"></i></a>
            <a href="" title="Google"><i class="fa-brands fa-apple"></i></a>
            <a href="" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="" title="X"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="" title="X"><i class="fa-solid fa-paper-plane"></i></a>
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