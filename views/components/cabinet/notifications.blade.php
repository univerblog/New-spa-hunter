@php
    $data       = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/notifications.php';
    $categories = $data['categories'];
    $periods    = $data['periods'];

    $cat = $_GET['cat'] ?? 'all';
    if (!isset($categories[$cat])) $cat = 'all';

    $all  = $data['rows'];
    $rows = $cat === 'all' ? $all : array_values(array_filter($all, fn($r) => $r['cat'] === $cat));

    // счётчики непрочитанных по категориям
    $counts = [];
    foreach ($all as $r) {
        if (empty($r['unread'])) continue;
        $counts['all']     = ($counts['all'] ?? 0) + 1;
        $counts[$r['cat']] = ($counts[$r['cat']] ?? 0) + 1;
    }

    // группировка по периодам
    $grouped = [];
    foreach ($rows as $r) $grouped[$r['period']][] = $r;

    $isFragment = ($_SERVER['HTTP_X_FRAGMENT'] ?? '') === 'notifications';
@endphp

@php $fragment = function () use ($categories, $periods, $grouped) { @endphp
    @if (empty($grouped))
        <div class="cab-tx-empty">
            <div class="cab-tx-empty-icon"><i class="fa-regular fa-bell"></i></div>
            <div class="cab-tx-empty-title">Уведомлений нет</div>
            <div class="cab-tx-empty-text">Здесь появятся события по балансу, ссылкам, выплатам и аккаунту.</div>
        </div>
    @else
        @foreach ($periods as $pKey => $pLabel)
            @if (!empty($grouped[$pKey]))
                <div class="notif-group">{{ $pLabel }}</div>

                @foreach ($grouped[$pKey] as $row)
                    <div class="notif-item{{ !empty($row['unread']) ? ' unread' : '' }}" data-cat="{{ $row['cat'] }}">
                        <div class="notif-item__icon">{!! $categories[$row['cat']]['icon'] !!}</div>
                        <div class="notif-item__body">
                            <div class="notif-item__text">{{ $row['text'] }}</div>
                            <div class="notif-item__date">{{ $row['date'] }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
    @endif
@php }; @endphp


@if ($isFragment)
    @php $fragment(); @endphp
@else
    <div class="cab-card notif-block" id="notifications">
        <div class="cab-card-head">
            <div class="cab-card-title">
                <button class="cab-link"><span>Отметить всё прочитанным</span></button>
            </div>

            <div class="cab-tx-controls">
                <div class="select" data-select data-notif-filter>
                    <button type="button" class="select-trigger">
                        <span class="select-value sel-val-num">{{ $categories[$cat]['name'] }}@if (!empty($counts[$cat]))<b>{{ $counts[$cat] }}</b>@endif</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            @foreach ($categories as $key => $c)
                                <button type="button" class="select-option{{ $cat === $key ? ' is-selected' : '' }}" data-value="{{ $key }}"><span class="select-option-txt">{{ $c['name'] }}@if (!empty($counts[$key]))<b>{{ $counts[$key] }}</b>@endif</span></button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="cab-notif-gear" onclick="openModal('modal-notif-settings', { className: 'long' })" title="Настройки уведомлений"><i class="fa-regular fa-gear"></i></button>
            </div>
        </div>

        <div class="notif-panel">
            @php $fragment(); @endphp
        </div>
    </div>

    <script>
    (function () {
        if (window.__notifInit) return;
        window.__notifInit = true;

        document.addEventListener('select:change', function (e) {
            var sel = e.target.closest('[data-notif-filter]');
            if (!sel) return;

            var block = sel.closest('.notif-block');
            var panel = block.querySelector('.notif-panel');
            var cat   = e.detail.value;

            panel.classList.add('is-loading');
            fetch(location.pathname + '?cat=' + encodeURIComponent(cat), { headers: { 'X-Fragment': 'notifications' } })
                .then(function (r) { return r.text(); })
                .then(function (html) {
                    panel.innerHTML = html;
                    panel.classList.remove('is-loading');
                    history.pushState(null, '', location.pathname + '?cat=' + encodeURIComponent(cat));
                })
                .catch(function () { panel.classList.remove('is-loading'); });
        });
    })();
    </script>
@endif