<div class="cab-sidebar">
    <div class="cab-nav-profile">
        <div class="cab-prof__head">
            <div class="cab-prof__ava">SP</div>
            <div class="cab-prof__meta">
                <h4>Sergey Pavlovich</h4>
                <div class="cab-nav-level tier-bronze">
                    <i class="fa-solid fa-circle"></i>
                    <span>Bronze</span>
                </div>
            </div>
        </div>
        <div class="cab-prof__progress">
            <div class="cab-prof__progress-line">
                <span>До <span class="next-tier">Silver</span></span>
                <span>$234 / $300</span>
            </div>
            <div class="cab-prof__progress-bar">
                <div class="cab-prof__progress-fill" style="width:78%"></div>
            </div>
        </div>
    </div>

    <div class="cab-nav-line"></div>

    <div class="cab-nav-group">
        <div class="cab-nav-title">Главное</div>
        <div class="cab-nav-field">
            <a href="/cabinet" class="{{ $route === '/cabinet' ? 'active' : '' }}"><i class="fa-regular fa-objects-column"></i>Главная</a>
            <a href=""><i class="fa-regular fa-link"></i>Мои ссылки</a>
            <a href=""><i class="fa-regular fa-chart-line"></i>Статистика</a>
            <a href="/cabinet/sources" class="{{ $route === '/cabinet/sources' ? 'active' : '' }}"><i class="fa-regular fa-signal-stream"></i>Источники трафика</a>
            <a href="/cabinet/level" class="{{ $route === '/cabinet/level' ? 'active' : '' }}"><i class="fa-regular fa-trophy"></i>Мой уровень</a>
        </div>
    </div>

    <div class="cab-nav-group">
        <div class="cab-nav-title">Деньги</div>
        <div class="cab-nav-field">
            <a href="/cabinet/balance" class="{{ $route === '/cabinet/balance' ? 'active' : '' }}"><i class="fa-regular fa-wallet"></i>Баланс</a>
            <a href="/cabinet/withdraw" class="{{ $route === '/cabinet/withdraw' ? 'active' : '' }}"><i class="fa-regular fa-arrow-down-to-line"></i>Вывод средств</a>
            <a href="/cabinet/tax" class="{{ $route === '/cabinet/tax' ? 'active' : '' }}"><i class="fa-regular fa-file-invoice-dollar"></i>Налоговая информация</a>
        </div>
    </div>

    <div class="cab-nav-group">
        <div class="cab-nav-title">Заработать ещё</div>
        <div class="cab-nav-field">
            <a href="/cabinet/referrals" class="featured {{ $route === '/cabinet/referrals' ? 'active' : '' }}"><i class="fa-regular fa-gift"></i>Партнёрская программа</a>
        </div>
    </div>

    <div class="cab-nav-group">
        <div class="cab-nav-title">Аккаунт</div>
        <div class="cab-nav-field">
            <a href="/cabinet/notifications" class="{{ $route === '/cabinet/notifications' ? 'active' : '' }}"><i class="fa-regular fa-bell"></i>Уведомления<span class="cab-nav-badge">2</span></a>
            <a href="/cabinet/settings" class="{{ $route === '/cabinet/settings' ? 'active' : '' }}"><i class="fa-regular fa-gear"></i>Настройки</a>
            <a href="/cabinet/support" class="{{ $route === '/cabinet/support' ? 'active' : '' }}"><i class="fa-regular fa-headset"></i>Поддержка</a>
            <div class="cab-nav-line"></div>
            <a href="" class="red" onclick="cabLogout(); return false;"><i class="fa-regular fa-arrow-right-from-bracket"></i>Выйти</a>
        </div>
    </div>
</div>