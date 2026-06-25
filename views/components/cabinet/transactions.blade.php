@php
    // ===== выборка (бэк потом заменит источник на запрос к БД по $source) =====
    $source = $source ?? ($_GET['source'] ?? 'default');

    $tabs = [
        'all'       => 'Все',
        'confirmed' => 'Подтверждено',
        'pending'   => 'В ожидании',
        'cancelled' => 'Отменено',
        'empty'     => 'Нету ни чего', 
    ];

    $status = $_GET['status'] ?? 'all';
    if (!isset($tabs[$status])) $status = 'all';

    $all  = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/transactions.php';
    $rows = $status === 'all'
        ? $all
        : array_values(array_filter($all, fn($t) => $t['status'] === $status));

    $perPage    = 6;
    $total      = count($rows);
    $totalPages = max(1, (int) ceil($total / $perPage));
    $page       = max(1, min($totalPages, (int) ($_GET['page'] ?? 1)));
    $pageRows   = array_slice($rows, ($page - 1) * $perPage, $perPage);

    $isFragment = ($_SERVER['HTTP_X_FRAGMENT'] ?? '') === 'transactions';
@endphp


{{-- ===== фрагмент (тело + футер) — общий для перезагрузки и AJAX ===== --}}
@php $fragment = function () use ($tabs, $status, $page, $totalPages, $pageRows) { @endphp
    @if (count($pageRows) === 0)
        <div class="cab-tx-empty">
            <div class="cab-tx-empty-icon"><i class="fa-regular fa-clock"></i></div>
            <div class="cab-tx-empty-title">Транзакций ещё нет</div>
            <div class="cab-tx-empty-text">Поделись ссылкой в&nbsp;видео или посте&nbsp;– первый клик и&nbsp;комиссия появятся здесь после прохождения через мерчанта.</div>
        </div>
    @else
        <div class="cab-tx">
            <div class="cab-tx-head">
                <div>Дата</div>
                <div>Магазин</div>
                <div>Сумма заказа</div>
                <div>Ставка</div>
                <div>Заработано</div>
                <div>Статус</div>
            </div>

            @foreach ($pageRows as $row)
                <div class="cab-tx-row" data-status="{{ $row['status'] }}">
                    <div class="cab-tx-date">{{ $row['date'] }}</div>
                    <div class="cab-tx-shop">{{ $row['shop'] }}</div>
                    <div class="cab-tx-order"><span>Сумма заказа</span>{{ $row['order'] }}</div>
                    <div class="cab-tx-rate"><span>Ставка</span>{{ $row['rate'] }}</div>
                    <div class="cab-tx-earned">{{ $row['earned'] }}</div>
                    <div class="cab-tx-status">{{ $tabs[$row['status']] }}</div>
                </div>
            @endforeach
        </div>

        <div class="cab-tx-foot">
            <a href="" class="cab-link">
                <span>Открыть полную статистику</span>
                <i class="fa-regular fa-arrow-right fa-xs"></i>
            </a>
            <div class="mini-pagination">
                @if ($page > 1)
                    <a class="pag-btn" data-page="{{ $page - 1 }}" href="?status={{ $status }}&page={{ $page - 1 }}#transactions"><i class="fa-regular fa-chevron-left"></i></a>
                @else
                    <button disabled><i class="fa-regular fa-chevron-left"></i></button>
                @endif

                <div class="paginate-pages"><b>Page</b> {{ $page }} of {{ $totalPages }}</div>

                @if ($page < $totalPages)
                    <a class="pag-btn" data-page="{{ $page + 1 }}" href="?status={{ $status }}&page={{ $page + 1 }}#transactions"><i class="fa-solid fa-angle-right"></i></a>
                @else
                    <button disabled><i class="fa-solid fa-angle-right"></i></button>
                @endif
            </div>
        </div>
    @endif
@php }; @endphp


@if ($isFragment)
    {{-- ===== AJAX: только фрагмент ===== --}}
    @php $fragment(); @endphp
@else
    {{-- ===== обычный заход: весь блок ===== --}}
    <div class="cab-card cab-tx-block" data-source="{{ $source }}" id="transactions">
        <div class="cab-card-head">
            <div class="cab-card-title">Последние транзакции</div>

            <div class="cab-tx-controls">
                {{-- табы по статусу --}}
                <nav class="cab-tabs-nav">
                    @foreach ($tabs as $key => $label)
                        <a class="cab-tab-btn{{ $status === $key ? ' active' : '' }}"
                           data-status="{{ $key }}"
                           href="?status={{ $key }}#transactions">{{ $label }}</a>
                    @endforeach
                </nav>

                {{-- селект по статусу (альтернатива табам — выберешь, что оставить) --}}
                <div class="select" data-select data-tx-filter="status">
                    <button type="button" class="select-trigger">
                        <span class="select-value">{{ $tabs[$status] }}</span>
                        <i class="fa-regular fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            @foreach ($tabs as $key => $label)
                                <button type="button" class="select-option{{ $status === $key ? ' is-selected' : '' }}" data-value="{{ $key }}">{{ $label }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cab-tx-panel">
            @php $fragment(); @endphp
        </div>
    </div>

    <script>
    (function () {
        if (window.__txInit) return;
        window.__txInit = true;

        function currentStatus(block) {
            var s = block.querySelector('[data-tx-filter="status"] .select-option.is-selected');
            if (s) return s.dataset.value;
            var t = block.querySelector('.cab-tab-btn.active');
            return t ? t.dataset.status : 'all';
        }

        function loadTx(block, status, page) {
            var source = block.dataset.source || 'default';
            var panel  = block.querySelector('.cab-tx-panel');
            panel.classList.add('is-loading');

            var url = location.pathname +
                      '?source=' + encodeURIComponent(source) +
                      '&status=' + encodeURIComponent(status) +
                      '&page='   + encodeURIComponent(page);

            fetch(url, { headers: { 'X-Fragment': 'transactions' } })
                .then(function (r) { return r.text(); })
                .then(function (html) {
                    panel.innerHTML = html;
                    panel.classList.remove('is-loading');
                    block.querySelectorAll('.cab-tab-btn').forEach(function (t) {
                        t.classList.toggle('active', t.dataset.status === status);
                    });
                    history.pushState(null, '',
                        location.pathname + '?status=' + encodeURIComponent(status) + '&page=' + encodeURIComponent(page));
                })
                .catch(function () { panel.classList.remove('is-loading'); });
        }

        // табы и пагинация
        document.addEventListener('click', function (e) {
            var ctrl = e.target.closest('.cab-tab-btn, .cab-tx-foot .pag-btn');
            if (!ctrl) return;
            var block = ctrl.closest('.cab-tx-block');
            if (!block) return;
            e.preventDefault();

            var isTab  = ctrl.classList.contains('cab-tab-btn');
            var status = isTab ? ctrl.dataset.status : currentStatus(block);
            var page   = isTab ? 1 : ctrl.dataset.page;
            loadTx(block, status, page);
        });

        // селект по статусу
        document.addEventListener('select:change', function (e) {
            var sel = e.target.closest('[data-tx-filter]');
            if (!sel) return;
            var block = sel.closest('.cab-tx-block');
            if (!block) return;
            loadTx(block, currentStatus(block), 1);
        });
    })();
    </script>
@endif