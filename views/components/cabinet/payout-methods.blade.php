@php
    $pm       = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/payout-methods.php';
    $types    = $pm['types'];
    $statuses = $pm['statuses'];

    if (!isset($_SESSION['payout_methods'])) $_SESSION['payout_methods'] = $pm['methods'];

    $action = $_POST['pm_action'] ?? '';

    if ($action === 'add') {
        $type = $_POST['type'] ?? '';
        if (isset($types[$type])) {
            $name = trim($_POST['method_name'] ?? '');
            if ($name === '') $name = $types[$type]['name'];

            $_SESSION['payout_methods'][] = [
                'type'     => $type,
                'name'     => $name,
                'currency' => $_POST['currency'] ?? 'USD',
                'tax'      => $_POST['tax'] ?? '',
                'status'   => 'pending',
            ];
        }
    }

    if ($action === 'delete') {
        $name = $_POST['name'] ?? '';
        $_SESSION['payout_methods'] = array_values(array_filter($_SESSION['payout_methods'], fn($m) => $m['name'] !== $name));
    }

    $methods = $_SESSION['payout_methods'];
@endphp

<div class="layout-form" id="payout-methods">

    <div class="cab-card pay-methods-wrap" data-pay-methods>
        <div class="cab-card-head">
            <div class="cab-card-title">Методы оплаты</div>
        </div>

        <div class="pay-methods">
            @foreach ($methods as $m)
                @php
                    $t  = $types[$m['type']];
                    $st = $statuses[$m['status']];
                @endphp
                <div class="pay-method">
                    <div class="pay-method__top">
                        <div class="pay-method__icon">{!! $t['icon'] !!}</div>
                        <div>
                            <div class="pay-method__name">{{ $m['name'] }}</div>
                            <div class="pay-method__type">{{ $t['name'] }}</div>
                        </div>
                        <button class="pay-method__menu" aria-label="Меню"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <div class="pay-method__pop">
                            <button class="pay-method__del" data-method-del="{{ $m['name'] }}"><i class="fa-regular fa-trash-can"></i>Удалить</button>
                        </div>
                    </div>

                    <div class="pay-method__kv"><span>Валюта</span><span>{{ $m['currency'] }}</span></div>
                    <div class="pay-method__kv"><span>Налоговый профиль</span><span>{{ $m['tax'] }}</span></div>

                    <div class="pay-method__status {{ $st['class'] }}">{{ $st['label'] }}</div>
                </div>
            @endforeach

            <button class="pay-method-add" data-method-add>
                <span class="pay-method-add__plus"><i class="fa-solid fa-plus"></i></span>
                <strong>Добавить метод</strong>
                <small>Настроить новый метод вывода</small>
            </button>
        </div>
    </div>

    {{-- форма --}}
    <div class="cab-card" data-method-form-card hidden>
        <div class="cab-card-head" style="flex-wrap:nowrap;">
            <div class="cab-card-title">Добавить метод оплаты</div>
            <button type="button" class="close-cab-card" data-method-cancel><i class="fa-regular fa-xmark"></i></button>
        </div>

        <form class="layout-form" data-method-form method="post" action="{{ $route }}">
            <input type="hidden" name="pm_action" value="add">
            <input type="hidden" name="type"     data-hidden="type">
            <input type="hidden" name="currency" value="USD" data-hidden="currency">
            <input type="hidden" name="tax"      value="РФ – Физлицо" data-hidden="tax">
            <input type="hidden" name="country"  data-hidden="country">
            <input type="hidden" name="network"  value="BEP-20 (BSC)" data-hidden="network">

            <div class="input-group-horisontal">
                <div class="input-field">
                    <label>Способ получения выплат</label>
                    <div class="select" data-select data-method-type data-fills="type">
                        <button type="button" class="select-trigger">
                            <span class="select-value">Выберите способ</span>
                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                        </button>
                        <div class="select-panel">
                            <div class="select-list">
                                @foreach ($types as $key => $t)
                                    <button type="button" class="select-option" data-value="{{ $key }}">{{ $t['name'] }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <label>Валюта счёта</label>
                    <div class="select" data-select data-fills="currency">
                        <button type="button" class="select-trigger">
                            <span class="select-value">USD</span>
                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                        </button>
                        <div class="select-panel">
                            <div class="select-list">
                                <button type="button" class="select-option is-selected" data-value="USD">USD</button>
                                <button type="button" class="select-option" data-value="EUR">EUR</button>
                                <button type="button" class="select-option" data-value="RUB">RUB</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <div class="input-field">
                    <label>Налоговый профиль</label>
                    <div class="select" data-select data-fills="tax">
                        <button type="button" class="select-trigger">
                            <span class="select-value">РФ – Физлицо</span>
                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                        </button>
                        <div class="select-panel">
                            <div class="select-list">
                                <button type="button" class="select-option is-selected" data-value="ru-ind">РФ – Физлицо</button>
                                <button type="button" class="select-option" data-value="ru-org">РФ – Юрлицо</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div><a href="#" class="cab-link" style="margin-left:18px;"><span>Добавить налоговую информацию</span> <i class="fa-regular fa-arrow-right"></i></a></div>

            {{-- Банк --}}
            <div class="layout-form" data-method-fields="bank">
                <div class="form-group-name">
                    <h3>Данные банка</h3>
                    <p>Пожалуйста заполните все поля для информации</p>
                </div>
                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label>Название банка</label>
                        <input type="text" name="bank_name" placeholder="">
                    </div>
                    <div class="input-field">
                        <label>Владелец счёта</label>
                        <input type="text" name="bank_owner" placeholder="">
                    </div>
                </div>
                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label>Страна</label>
                        <div class="select" data-select data-search data-fills="country">
                            <button type="button" class="select-trigger">
                                <span class="select-value">Выберите...</span>
                                <i class="fa-solid fa-chevron-down select-arrow"></i>
                            </button>
                            <div class="select-panel">
                                <div class="select-search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" placeholder="{{ __('Search') }}" autocomplete="off">
                                </div>
                                <div class="select-list">
                                    <button type="button" class="select-option" data-value="ru">Российская Федерация</button>
                                    <button type="button" class="select-option" data-value="us">США</button>
                                    <button type="button" class="select-option" data-value="de">Германия</button>
                                    <button type="button" class="select-option" data-value="gb">Великобритания</button>
                                </div>
                                <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <label>Город банка</label>
                        <input type="text" name="bank_city" placeholder="">
                    </div>
                </div>
                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label>Индекс</label>
                        <input type="text" name="bank_index" placeholder="">
                    </div>
                    <div class="input-field">
                        <label>Адрес банка</label>
                        <input type="text" name="bank_address" placeholder="">
                    </div>
                </div>
                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label>SWIFT / BIC</label>
                        <input type="text" name="bank_swift" placeholder="">
                    </div>
                    <div class="input-field">
                        <label>IBAN / номер счёта</label>
                        <input type="text" name="bank_iban" placeholder="">
                    </div>
                </div>
            </div>

            {{-- Email --}}
            <div class="layout-form" data-method-fields="email">
                <div class="input-group">
                    <div class="input-field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="you@example.com">
                    </div>
                </div>
            </div>

            {{-- Крипто --}}
            <div class="layout-form" data-method-fields="crypto">
                <div class="input-group">
                    <div class="input-field">
                        <label>Сеть вывода</label>
                        <div class="select" data-select data-fills="network">
                            <button type="button" class="select-trigger">
                                <span class="select-value">BEP-20 (BSC)</span>
                                <i class="fa-solid fa-chevron-down select-arrow"></i>
                            </button>
                            <div class="select-panel">
                                <div class="select-list">
                                    <button type="button" class="select-option is-selected" data-value="bep20">BEP-20 (BSC)</button>
                                    <button type="button" class="select-option" data-value="trc20">TRC-20 (Tron)</button>
                                    <button type="button" class="select-option" data-value="erc20">ERC-20 (Ethereum)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <label>Адрес кошелька</label>
                        <input type="text" name="crypto_addr" placeholder="0x...">
                    </div>
                </div>
            </div>

            {{-- Название метода --}}
            <div class="input-group">
                <div class="input-field">
                    <label>Название метода</label>
                    <input type="text" name="method_name" placeholder="Например, Citibank">
                    <span class="input-field__hint">Понятное название, чтобы отличать методы – напр. «Основной PayPal» или «Бизнес-счёт».</span>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn" data-method-submit disabled>Добавить метод</button>
                <button type="button" class="btn outline" data-method-cancel>Отмена</button>
            </div>
        </form>

        <div class="cabinet-line"></div>

        <div class="sources-note" style="margin-top:16px;">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
                <strong>После добавления вы получите письмо с&nbsp;подтверждением</strong>
                <small>Перейдите в свой email для активации нового метода вывода средств.</small>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
(function(){
    var branch = { bank:'bank', paypal:'email', skrill:'email', neteller:'email', payoneer:'email', crypto:'crypto' };
    var pendingDelete = null;   // имя метода, ждущего подтверждения удаления

    // подменить блок методов ответом сервера
    function refresh(html){
        var wrap = document.getElementById('payout-methods');
        wrap.outerHTML = html;
        if (window.initSelects) window.initSelects();   // переинициализация селектов в новом DOM
    }

    // POST действия (add/delete) с подменой фрагмента; done='added' → окно после создания
    function send(body, done){
        fetch(location.pathname, {
            method: 'POST',
            headers: { 'X-Fragment': 'payout-methods', 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(body)
        })
        .then(function(r){ return r.text(); })
        .then(function(html){
            refresh(html);
            if (done === 'added') {
                var m = document.querySelector('[data-pay-methods]');
                if (m) m.scrollIntoView({ behavior: 'smooth', block: 'start' });   // прокрутка сразу
                setTimeout(function(){ openModal('modal-add-payment-method'); }, 1000);   // окно через 1 сек
            }
        });
    }

    // всё делегируем на document — переживает подмену блока
    document.addEventListener('click', function(e){

        // открыть форму
        if (e.target.closest('[data-method-add]')) {
            var card = document.querySelector('[data-method-form-card]');
            card.classList.add('show');
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            return;
        }

        // закрыть форму (отмена / крестик)
        if (e.target.closest('[data-method-cancel]')) {
            document.querySelector('[data-method-form-card]').classList.remove('show');
            var m = document.querySelector('[data-pay-methods]');
            if (m) m.scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        // меню карточки (попап)
        var menu = e.target.closest('.pay-method__menu');
        if (menu) {
            var pop = menu.parentElement.querySelector('.pay-method__pop');
            var open = pop.classList.contains('show');
            closePops();
            if (!open) pop.classList.add('show');
            return;
        }

        // удалить метод → открыть подтверждение (не удаляем сразу)
        var del = e.target.closest('[data-method-del]');
        if (del) {
            pendingDelete = del.dataset.methodDel;
            closePops();
            openModal('modal-delete-payment-method');
            return;
        }

        // подтверждение удаления в модалке → удалить без финального окна
        if (e.target.closest('[data-del-confirm]')) {
            if (pendingDelete !== null) {
                closeModal();
                send({ pm_action: 'delete', name: pendingDelete });
                pendingDelete = null;
            }
            return;
        }

        // клик вне попапа — закрыть
        if (!e.target.closest('.pay-method__pop')) closePops();
    });

    function closePops(){
        document.querySelectorAll('.pay-method__pop.show').forEach(function(p){ p.classList.remove('show'); });
    }

    // переключение веток + запись селектов в hidden (делегированно)
    document.addEventListener('select:change', function(e){
        var root = e.target;
        var form = root.closest('[data-method-form]');
        if (!form) return;

        var key = root.getAttribute('data-fills');
        if (key) {
            var hidden = form.querySelector('[data-hidden="' + key + '"]');
            if (hidden) hidden.value = e.detail.value;
        }

        if (root.hasAttribute('data-method-type')) {
            var want = branch[e.detail.value] || null;
            form.querySelectorAll('[data-method-fields]').forEach(function(b){
                b.classList.toggle('show', b.getAttribute('data-method-fields') === want);
            });
            form.querySelector('[data-method-submit]').disabled = !want;
        }
    });

    // submit формы → add через fetch (без перезагрузки)
    document.addEventListener('submit', function(e){
        var form = e.target.closest('[data-method-form]');
        if (!form) return;
        e.preventDefault();
        document.querySelector('[data-method-form-card]').classList.remove('show');   // закрыть форму
        send(new URLSearchParams(new FormData(form)), 'added');
    });
})();
</script>
@endpush