@php
    $data = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/payouts.php';

    $statuses = $data['statuses'];

    $status = $_GET['status'] ?? 'all';
    if (!isset($statuses[$status])) $status = 'all';

    $all  = $data['rows'];
    $rows = $status === 'all'
        ? $all
        : array_values(array_filter($all, fn($r) => $r['status'] === $status));

    $perPage    = 6;
    $total      = count($rows);
    $totalPages = max(1, (int) ceil($total / $perPage));
    $page       = max(1, min($totalPages, (int) ($_GET['page'] ?? 1)));
    $pageRows   = array_slice($rows, ($page - 1) * $perPage, $perPage);

    $isFragment = ($_SERVER['HTTP_X_FRAGMENT'] ?? '') === 'payouts';
@endphp

{{-- фрагмент (тело + футер) — общий для перезагрузки и AJAX --}}
@php $fragment = function () use ($statuses, $status, $page, $totalPages, $pageRows) { @endphp
    @if (count($pageRows) === 0)
        <div class="cab-tx-empty">
            <div class="cab-tx-empty-icon"><i class="fa-light fa-money-check-dollar"></i></div>
            <div class="cab-tx-empty-title">Выплат пока не было</div>
            <div class="cab-tx-empty-text">Здесь появятся ваши выплаты. Создавайте ссылки, привлекайте аудиторию и выводите заработанное удобным способом.</div>
             <div class="btn-group" style="margin-top:10px;">
                <a href="" class="btn min">Создать ссылку</a>
            </div>
        </div>
    @else
        <div class="cab-pay-table">
            <div class="cab-pay-head">
                <div>ID</div>
                <div>Дата</div>
                <div>Метод</div>
                <div>Сумма</div>
                <div>Комиссия</div>
                <div>К получению</div>
                <div>Статус</div>
                <div>Инвойс</div>
            </div>

            @foreach ($pageRows as $row)
                @php
                    $doc = [
                        'title' => 'Инвойс ' . $row['id'],
                        'sub'   => 'Дата выплаты: ' . $row['date'],
                        'rows'  => [
                            ['Способ', $row['method']],
                            ['Сумма', $row['amount']],
                            ['Комиссия', $row['fee']],
                            ['Получено', $row['receive']],
                            ['Статус', $statuses[$row['status']]],
                        ],
                        'foot'  => 'Получатель: Сергей Павлович. Документ сформирован автоматически в личном кабинете cpahunter.io.',
                    ];
                @endphp
                <div class="cab-pay-row" data-status="{{ $row['status'] }}">
                    <div class="cab-pay-id">{{ $row['id'] }}</div>
                    <div class="cab-pay-date"><span>Дата</span>{{ $row['date'] }}</div>
                    <div class="cab-pay-method"><span>Метод</span>{{ $row['method'] }}</div>
                    <div class="cab-pay-amount"><span>Сумма</span>{{ $row['amount'] }}</div>
                    <div class="cab-pay-fee"><span>Комиссия</span>{{ $row['fee'] }}</div>
                    <div class="cab-pay-receive"><span>К получению</span>{{ $row['receive'] }}</div>
                    <div class="cab-pay-status">
                        @if (!empty($row['comment']))
                            <button class="cab-pay-status__btn" data-pay-comment aria-expanded="false">{{ $statuses[$row['status']] }}<i class="fa-solid fa-chevron-down"></i></button>
                        @else
                            {{ $statuses[$row['status']] }}
                        @endif
                    </div>
                    <div class="cab-pay-invoice">
                        <button data-doc="{{ json_encode($doc, JSON_UNESCAPED_UNICODE) }}" title="Открыть инвойс"><i class="fa-regular fa-file-lines"></i><span>Инвойс</span></button>
                    </div>
                </div>
                @if (!empty($row['comment']))
                    <div class="cab-pay-comment" data-status="{{ $row['status'] }}">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{!! $row['comment'] !!}</span>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="cab-tx-foot">
            <div class="mini-pagination">
                @if ($page > 1)
                    <a class="pag-btn" data-page="{{ $page - 1 }}" href="?status={{ $status }}&page={{ $page - 1 }}#payouts"><i class="fa-regular fa-chevron-left"></i></a>
                @else
                    <button disabled><i class="fa-regular fa-chevron-left"></i></button>
                @endif

                <div class="paginate-pages"><b>Page</b> {{ $page }} of {{ $totalPages }}</div>

                @if ($page < $totalPages)
                    <a class="pag-btn" data-page="{{ $page + 1 }}" href="?status={{ $status }}&page={{ $page + 1 }}#payouts"><i class="fa-solid fa-angle-right"></i></a>
                @else
                    <button disabled><i class="fa-solid fa-angle-right"></i></button>
                @endif
            </div>
        </div>
    @endif
@php }; @endphp


@if ($isFragment)
    @php $fragment(); @endphp
@else
    <div class="cab-card cab-pay-block" id="payouts">
        <div class="cab-card-head">
            <div class="cab-card-title">История выплат</div>

            <div class="cab-tx-controls">
                <div class="select" data-select data-pay-filter="status">
                    <button type="button" class="select-trigger">
                        <span class="select-value">{{ $statuses[$status] }}</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            @foreach ($statuses as $key => $label)
                                <button type="button" class="select-option{{ $status === $key ? ' is-selected' : '' }}" data-value="{{ $key }}">{{ $label }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cab-pay-panel">
            @php $fragment(); @endphp
        </div>
    </div>

    <script>
    (function () {
        if (window.__payoutsInit) return;
        window.__payoutsInit = true;

        function currentStatus(block) {
            var s = block.querySelector('[data-pay-filter="status"] .select-option.is-selected');
            return s ? s.dataset.value : 'all';
        }

        function load(block, status, page) {
            var panel = block.querySelector('.cab-pay-panel');
            panel.classList.add('is-loading');

            var url = location.pathname +
                      '?status=' + encodeURIComponent(status) +
                      '&page='   + encodeURIComponent(page);

            fetch(url, { headers: { 'X-Fragment': 'payouts' } })
                .then(function (r) { return r.text(); })
                .then(function (html) {
                    panel.innerHTML = html;
                    panel.classList.remove('is-loading');
                    history.pushState(null, '',
                        location.pathname + '?status=' + encodeURIComponent(status) + '&page=' + encodeURIComponent(page));
                })
                .catch(function () { panel.classList.remove('is-loading'); });
        }

        // пагинация
        document.addEventListener('click', function (e) {
            var ctrl = e.target.closest('.cab-pay-foot .pag-btn, .cab-pay-block .pag-btn');
            if (!ctrl) return;
            var block = ctrl.closest('.cab-pay-block');
            if (!block) return;
            e.preventDefault();
            load(block, currentStatus(block), ctrl.dataset.page);
        });

        // селект по статусу
        document.addEventListener('select:change', function (e) {
            var sel = e.target.closest('[data-pay-filter]');
            if (!sel) return;
            var block = sel.closest('.cab-pay-block');
            if (!block) return;
            load(block, currentStatus(block), 1);
        });
    })();

    document.addEventListener('click', function(e){
        var btn = e.target.closest('[data-pay-comment]');
        if (!btn) return;
        var row = btn.closest('.cab-pay-row');
        var note = row && row.nextElementSibling;
        if (!note || !note.classList.contains('cab-pay-comment')) return;
        var open = note.classList.toggle('is-open');
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    </script>
@endif