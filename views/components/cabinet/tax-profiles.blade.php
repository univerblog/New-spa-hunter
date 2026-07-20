@php
    $tax       = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/tax.php';
    $types     = $tax['types'];
    $countries = $tax['countries'];
    $statuses  = $tax['statuses'];

    // сброс демо-данных: /cabinet/tax?reset
    if (isset($_GET['reset'])) unset($_SESSION['tax_profiles']);
    if (!isset($_SESSION['tax_profiles'])) $_SESSION['tax_profiles'] = $tax['profiles'];

    $action = $_POST['tax_action'] ?? '';
    $id     = isset($_POST['id']) && $_POST['id'] !== '' ? (int) $_POST['id'] : null;

    // сохранение (добавление или правка)
    if ($action === 'save') {
        $row = [
            'country' => $_POST['country'] ?? '',
            'type'    => $_POST['type'] ?? '',
            'name'    => trim($_POST['name'] ?? ''),
            'city'    => trim($_POST['city'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'zip'     => trim($_POST['zip'] ?? ''),
            'taxnum'  => trim($_POST['taxnum'] ?? ''),
            'status'  => 'pending',   // изменённый/новый профиль уходит на модерацию
        ];

        if ($id !== null && isset($_SESSION['tax_profiles'][$id])) {
            $row['default'] = $_SESSION['tax_profiles'][$id]['default'] ?? false;
            $_SESSION['tax_profiles'][$id] = $row;
        } else {
            $row['default'] = count($_SESSION['tax_profiles']) === 0;   // первый профиль — сразу основной
            $_SESSION['tax_profiles'][] = $row;
        }
    }

    // удаление
    if ($action === 'delete' && isset($_SESSION['tax_profiles'][$id])) {
        $wasDefault = $_SESSION['tax_profiles'][$id]['default'] ?? false;
        unset($_SESSION['tax_profiles'][$id]);
        $_SESSION['tax_profiles'] = array_values($_SESSION['tax_profiles']);
        // удалили основной — основным становится первый оставшийся
        if ($wasDefault && count($_SESSION['tax_profiles'])) $_SESSION['tax_profiles'][0]['default'] = true;
    }

    // сделать основным
    if ($action === 'default' && isset($_SESSION['tax_profiles'][$id])) {
        foreach ($_SESSION['tax_profiles'] as $k => $v) $_SESSION['tax_profiles'][$k]['default'] = ($k === $id);
    }

    // какой профиль редактируем (форма откроется заполненной)
    $editId = ($action === 'edit' && isset($_SESSION['tax_profiles'][$id])) ? $id : null;
    $edit   = $editId !== null ? $_SESSION['tax_profiles'][$editId] : null;

    $profiles = $_SESSION['tax_profiles'];
@endphp

<div class="layout-form" id="tax-profiles">

    <div class="cab-card" data-tax-block>
        <div class="cab-card-head">
            <div class="cab-card-title">Налоговые профили</div>
             <p class="cab-card-note">Профиль определяет, как считается удержание, и привязывается к методу выплаты. Можно добавить несколько для разных регионов или типов организаций.</p>
        </div>

        <div class="pay-methods">
            @foreach ($profiles as $i => $p)
                @php
                    $t  = $types[$p['type']];
                    $st = $statuses[$p['status'] ?? 'pending'] ?? $statuses['pending'];
                @endphp
                <div class="pay-method">
                    <div class="pay-method__top">
                        <div class="pay-method__icon">{!! $t['icon'] !!}</div>
                        <div>
                            <div class="pay-method__name">{{ $countries[$p['country']] ?? $p['country'] }}</div>
                            <div class="pay-method__type">{{ $t['name'] }}</div>
                        </div>
                        <div class="pay-method__actions">
                            @if (!empty($p['default']))
                                <span class="pay-method__badge">По умолчанию</span>
                            @endif
                            <button class="pay-method__menu" aria-label="Меню"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="pay-method__pop">
                            @if (empty($p['default']))
                                <button class="pay-method__edit" data-tax-default="{{ $i }}"><i class="fa-regular fa-star"></i>Сделать по умолчанию</button>
                            @endif
                            <button class="pay-method__edit" data-tax-edit="{{ $i }}"><i class="fa-regular fa-pen"></i>Редактировать</button>
                            <button class="pay-method__del" data-tax-del="{{ $i }}"><i class="fa-regular fa-trash-can"></i>Удалить</button>
                        </div>
                    </div>

                    <div class="pay-method__kv"><span>{{ $t['name_label'] }}</span><span>{{ $p['name'] }}</span></div>
                    <div class="pay-method__kv"><span>Город</span><span>{{ $p['city'] }}</span></div>
                    <div class="pay-method__kv"><span>Адрес</span><span>{{ $p['address'] }}</span></div>
                    <div class="pay-method__kv"><span>Индекс</span><span>{{ $p['zip'] }}</span></div>
                    <div class="pay-method__kv"><span>Налоговый номер</span><span>{{ $p['taxnum'] }}</span></div>

                    <div class="pay-method__status {{ $st['class'] }}">{{ $st['label'] }}</div>
                </div>
            @endforeach

            <button class="pay-method-add" data-tax-add>
                <span class="pay-method-add__plus"><i class="fa-solid fa-plus"></i></span>
                <strong>Добавить профиль</strong>
                <small>Создать новый налоговый профиль</small>
            </button>
        </div>
    </div>

    <!-- Добавление профиля -->
     <div class="cab-card{{ $edit ? ' show' : '' }}" data-tax-form-card>
        <div class="cab-card-head" style="flex-wrap:nowrap;">
            <div class="cab-card-title">{{ $edit ? 'Редактировать налоговый профиль' : 'Добавить налоговую информацию' }}</div>
            <button type="button" class="close-cab-card" data-tax-cancel><i class="fa-regular fa-xmark"></i></button>
        </div>

        <form class="layout-form" data-tax-form method="post" action="{{ $route }}">
            <input type="hidden" name="tax_action" value="save">
            <input type="hidden" name="id" value="{{ $editId ?? '' }}">
            <input type="hidden" name="country" value="{{ $edit['country'] ?? '' }}" data-hidden="country">
            <input type="hidden" name="type" value="{{ $edit['type'] ?? '' }}" data-hidden="type">

            <div class="input-group-horisontal" style="align-items: start;">
                <div class="input-field">
                    <label>Страна налогового резидентства</label>
                    <div class="select" data-select data-search data-fills="country">
                        <button type="button" class="select-trigger">
                            <span class="select-value">{{ $edit ? ($countries[$edit['country']] ?? 'Выберите...') : 'Выберите...' }}</span>
                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                        </button>
                        <div class="select-panel">
                            <div class="select-search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" placeholder="{{ __('Search') }}" autocomplete="off">
                            </div>
                            <div class="select-list">
                                @foreach ($countries as $key => $label)
                                    <button type="button" class="select-option{{ ($edit['country'] ?? '') === $key ? ' is-selected' : '' }}" data-value="{{ $key }}">{{ $label }}</button>
                                @endforeach
                            </div>
                            <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
                        </div>
                    </div>
                    <span class="input-field__hint">Влияет на применимые ставки удержания</span>
                </div>

                <div class="input-field">
                    <label>Тип организации</label>
                    <div class="select" data-select data-tax-type data-fills="type">
                        <button type="button" class="select-trigger">
                            <span class="select-value">{{ $edit ? $types[$edit['type']]['name'] : 'Выберите...' }}</span>
                            <i class="fa-solid fa-chevron-down select-arrow"></i>
                        </button>
                        <div class="select-panel">
                            <div class="select-list">
                                @foreach ($types as $key => $t)
                                    <button type="button" class="select-option{{ ($edit['type'] ?? '') === $key ? ' is-selected' : '' }}" data-value="{{ $key }}" data-label="{{ $t['name_label'] }}">{{ $t['name'] }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layout-form{{ $edit ? ' show' : '' }}" data-tax-fields>
                <div class="form-group-name">
                    <h3>Налоговые данные</h3>
                    <p>Пожалуйста заполните все поля для налоговой информации</p>
                </div>
                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label data-tax-name-label>{{ $edit ? $types[$edit['type']]['name_label'] : 'ФИО' }}</label>
                        <input type="text" name="name" value="{{ $edit['name'] ?? '' }}" placeholder="Иван Иванов">
                    </div>
                    <div class="input-field">
                        <label>Город</label>
                        <input type="text" name="city" value="{{ $edit['city'] ?? '' }}">
                    </div>
                </div>

                <div class="input-group-horisontal">
                    <div class="input-field">
                        <label>Адрес</label>
                        <input type="text" name="address" value="{{ $edit['address'] ?? '' }}">
                    </div>
                    <div class="input-field">
                        <label>Индекс</label>
                        <input type="text" name="zip" value="{{ $edit['zip'] ?? '' }}">
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-field">
                        <label>ИНН / Tax ID</label>
                        <input type="text" name="taxnum" value="{{ $edit['taxnum'] ?? '' }}">
                        <span class="input-field__hint">Указывается в годовых налоговых справках</span>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn" data-tax-submit {{ $edit ? '' : 'disabled' }}>
                    Сохранить <span>{{ $edit ? 'изменения' : 'налоговую информацию' }}</span>
                </button>
                <button type="button" class="btn outline" data-tax-cancel>Отмена</button>
            </div>
        </form>
    </div>

</div>

@push('scripts')
<script>
(function(){
    var pendingDel = null;

    function refresh(html, scroll){
        document.getElementById('tax-profiles').outerHTML = html;
        if (window.initSelects) window.initSelects();

        if (scroll === false) return;   // «сделать по умолчанию» — не двигаем

        var card = document.querySelector('[data-tax-form-card].show');
        if (card) {
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });    // редактирование — к форме
        } else {
            var b = document.querySelector('[data-tax-block]');
            if (b) b.scrollIntoView({ behavior: 'smooth', block: 'start' });  // сохранил/удалил — к карточкам
        }
    }

    function send(body, scroll){
        fetch(location.pathname, {
            method: 'POST',
            headers: { 'X-Fragment': 'tax-profiles', 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(body)
        })
        .then(function(r){ return r.text(); })
        .then(function(html){ refresh(html, scroll); });
    }

    function closePops(){
        document.querySelectorAll('.pay-method__pop.show').forEach(function(p){ p.classList.remove('show'); });
    }

    document.addEventListener('click', function(e){

        // открыть пустую форму
        if (e.target.closest('[data-tax-add]')) {
            var card = document.querySelector('[data-tax-form-card]');
            card.classList.add('show');
            card.scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        // закрыть форму
        if (e.target.closest('[data-tax-cancel]')) {
            document.querySelector('[data-tax-form-card]').classList.remove('show');
            var b = document.querySelector('[data-tax-block]');
            if (b) b.scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        // меню карточки
        var menu = e.target.closest('.pay-method__menu');
        if (menu) {
            var pop = menu.closest('.pay-method__top').querySelector('.pay-method__pop');
            var open = pop.classList.contains('show');
            closePops();
            if (!open) pop.classList.add('show');
            return;
        }

        // редактировать → сервер вернёт форму открытой и заполненной
        var ed = e.target.closest('[data-tax-edit]');
        if (ed) { closePops(); send({ tax_action: 'edit', id: ed.dataset.taxEdit }); return; }

        // сделать основным
        var df = e.target.closest('[data-tax-default]');
        if (df) { closePops(); send({ tax_action: 'default', id: df.dataset.taxDefault }, false); return; }

        // удалить → подтверждение
        var dl = e.target.closest('[data-tax-del]');
        if (dl) { pendingDel = dl.dataset.taxDel; closePops(); openModal('modal-tax-delete'); return; }

        // подтверждение удаления
        if (e.target.closest('[data-tax-del-confirm]')) {
            if (pendingDel !== null) { closeModal(); send({ tax_action: 'delete', id: pendingDel }); pendingDel = null; }
            return;
        }

        // клик вне попапа
        if (!e.target.closest('.pay-method__pop')) closePops();
    });

    // селекты → hidden; тип открывает поля и меняет подпись
    document.addEventListener('select:change', function(e){
        var root = e.target;
        var form = root.closest('[data-tax-form]');
        if (!form) return;

        var key = root.getAttribute('data-fills');
        if (key) {
            var hidden = form.querySelector('[data-hidden="' + key + '"]');
            if (hidden) hidden.value = e.detail.value;
        }

        if (root.hasAttribute('data-tax-type')) {
            form.querySelector('[data-tax-fields]').classList.add('show');
            form.querySelector('[data-tax-submit]').disabled = false;
            var opt = root.querySelector('.select-option.is-selected');
            var lbl = form.querySelector('[data-tax-name-label]');
            if (opt && lbl) lbl.textContent = opt.dataset.label;
        }
    });

    // submit → сохранить (добавление или правка)
    document.addEventListener('submit', function(e){
        var form = e.target.closest('[data-tax-form]');
        if (!form) return;
        e.preventDefault();
        document.querySelector('[data-tax-form-card]').classList.remove('show');
        send(new URLSearchParams(new FormData(form)));
    });
})();
</script>
@endpush