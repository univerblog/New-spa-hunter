@php
    $data     = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/referrals.php';
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

    $isFragment = ($_SERVER['HTTP_X_FRAGMENT'] ?? '') === 'referrals';
@endphp

@php $fragment = function () use ($statuses, $status, $page, $totalPages, $pageRows) { @endphp
    @if (count($pageRows) === 0)
        <div class="cab-tx-empty">
            <div class="cab-tx-empty-icon"><i class="fa-regular fa-user-group"></i></div>
            <div class="cab-tx-empty-title">Рефералов пока нет</div>
            <div class="cab-tx-empty-text">Поделитесь персональной ссылкой – приглашённые авторы появятся здесь.</div>
        </div>
    @else
        <div class="ref-table">
            <div class="ref-table__head">
                <div>Автор</div>
                <div>Регистрация</div>
                <div>Статус</div>
                <div>Его доход</div>
                <div>Ваш доход</div>
                <div>Дней осталось</div>
            </div>

            @foreach ($pageRows as $row)
                <div class="ref-row" data-status="{{ $row['status'] }}">
                    <div class="ref-row__name">{{ $row['name'] }}</div>
                    <div class="ref-row__date"><span>Рег.</span>{{ $row['date'] }}</div>
                    <div class="ref-row__status">{{ $statuses[$row['status']] }}</div>
                    <div class="ref-row__income"><span>Его доход</span>{{ $row['income'] }}</div>
                    <div class="ref-row__mine"><span>Ваш доход</span>{{ $row['mine'] }}</div>
                    <div class="ref-row__days {{ $row['days'] === null ? 'expired' : ($row['days'] <= 14 ? 'warn' : '') }}"><span>Дней осталось</span>{{ $row['days'] === null ? 'Истекло' : $row['days'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="cab-tx-foot">
            <div class="mini-pagination">
                @if ($page > 1)
                    <a class="pag-btn" data-page="{{ $page - 1 }}" href="?status={{ $status }}&page={{ $page - 1 }}#referrals"><i class="fa-regular fa-chevron-left"></i></a>
                @else
                    <button disabled><i class="fa-regular fa-chevron-left"></i></button>
                @endif

                <div class="paginate-pages"><b>Page</b> {{ $page }} of {{ $totalPages }}</div>

                @if ($page < $totalPages)
                    <a class="pag-btn" data-page="{{ $page + 1 }}" href="?status={{ $status }}&page={{ $page + 1 }}#referrals"><i class="fa-solid fa-angle-right"></i></a>
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
    <div class="cab-card ref-block" id="referrals">
        <div class="cab-card-head">
            <div class="cab-card-title">Ваши рефералы</div>

            <div class="cab-tx-controls">
                <div class="select" data-select data-ref-filter>
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

        <div class="ref-panel">
            @php $fragment(); @endphp
        </div>
    </div>

    <p class="ref-kpi-hint">«Приносит доход» – реферал внутри 6-месячного окна. «Окно закрыто» – 6 месяцев прошли, начисления остановлены, исторический доход сохраняется. «Неактивен» – ещё не получил первую подтверждённую комиссию.</p>

    <script>
    (function () {
        if (window.__refInit) return;
        window.__refInit = true;

        function currentStatus(block) {
            var s = block.querySelector('[data-ref-filter] .select-option.is-selected');
            return s ? s.dataset.value : 'all';
        }

        function load(block, status, page) {
            var panel = block.querySelector('.ref-panel');
            panel.classList.add('is-loading');

            fetch(location.pathname + '?status=' + encodeURIComponent(status) + '&page=' + encodeURIComponent(page),
                  { headers: { 'X-Fragment': 'referrals' } })
                .then(function (r) { return r.text(); })
                .then(function (html) {
                    panel.innerHTML = html;
                    panel.classList.remove('is-loading');
                    history.pushState(null, '', location.pathname + '?status=' + encodeURIComponent(status) + '&page=' + encodeURIComponent(page));
                })
                .catch(function () { panel.classList.remove('is-loading'); });
        }

        document.addEventListener('click', function (e) {
            var ctrl = e.target.closest('.ref-block .pag-btn');
            if (!ctrl) return;
            e.preventDefault();
            var block = ctrl.closest('.ref-block');
            load(block, currentStatus(block), ctrl.dataset.page);
        });

        document.addEventListener('select:change', function (e) {
            var sel = e.target.closest('[data-ref-filter]');
            if (!sel) return;
            load(sel.closest('.ref-block'), currentStatus(sel.closest('.ref-block')), 1);
        });
    })();
    </script>
@endif