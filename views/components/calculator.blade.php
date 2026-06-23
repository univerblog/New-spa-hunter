@php
$calc = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/calculator.php';

$fields = [
    'platform' => ['n' => 1, 'label' => 'Platform',     'default' => 'yt'],
    'audience' => ['n' => 2, 'label' => 'Audience size', 'default' => 'small'],
    'niche'    => ['n' => 3, 'label' => 'Niche',         'default' => 'beauty'],
    'region'   => ['n' => 4, 'label' => 'Region',        'default' => 'us'],
];

$ratesJson = [];
foreach ($calc as $group => $items) {
    foreach ($items as $it) {
        $row = $it;
        unset($row['key'], $row['label']);   // оставляем только числа
        $ratesJson[$group][$it['key']] = $row;
    }
}

ini_set('serialize_precision', -1);

@endphp

<div class="calc" data-calc='{{ json_encode($ratesJson) }}'>

    <div class="calc-btn-group">
        @foreach ($fields as $group => $f)
            @php
                $options = $calc[$group];
                $defaultLabel = $options[0]['label'];
                foreach ($options as $o) {
                    if ($o['key'] === $f['default']) { $defaultLabel = $o['label']; break; }
                }
            @endphp

            <div class="calc-btn" data-group="{{ $group }}">
                <div class="select" data-select>
                    <button type="button" class="select-trigger">
                        <div class="calc-btn__label">
                            <span>{{ $f['n'] }}</span>{{ __($f['label']) }}
                        </div>
                        <span class="select-value">{{ __($defaultLabel) }}</span>
                        <i class="fa-regular fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            @foreach ($options as $opt)
                                <button type="button"
                                        class="select-option{{ $opt['key'] === $f['default'] ? ' is-selected' : '' }}"
                                        data-value="{{ $opt['key'] }}">{{ __($opt['label']) }}</button>
                            @endforeach
                        </div>
                        <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="calc-result">
        <div class="calc-result__main">
            <div class="calc-result__label">{{ __('Expected income') }}</div>
            <div class="calc-result__amount">
                <span data-ec="min">$320</span> – <span data-ec="max">$612</span>
                <span class="calc-result__period">{{ __('/ mo') }}</span>
            </div>
            <div class="calc-result__desc" data-ec="desc"></div>

            <div class="btn-group">
                <a data-auth="register" class="btn btn-primary" onclick="openModal('modal-login')">{{ __('Start earning') }}</a>
                <p class="calc-result__note">{{ __('This is an estimate. Real income depends on engagement, posting consistency, content quality and your exact audience location.') }}</p>
            </div>
        </div>

        <div class="calc-breakdown">
            <div class="calc-breakdown__row">
                <span>{{ __('Clicks per month') }}</span>
                <strong data-ec="clicks">3 000</strong>
            </div>
            <div class="calc-breakdown__row">
                <span>{{ __('Conversion to purchase') }}</span>
                <strong data-ec="cr">3%</strong>
            </div>
            <div class="calc-breakdown__row">
                <span>{{ __('Average order') }}</span>
                <strong data-ec="order">$85</strong>
            </div>
            <div class="calc-breakdown__row">
                <span>{{ __('Commission (~)') }}</span>
                <strong data-ec="comm">8%</strong>
            </div>
            <div class="calc-breakdown__row">
                <span>{{ __('Earnings per sale (~)') }}</span>
                <strong data-ec="sale">$7</strong>
            </div>
            <div class="calc-breakdown__row">
                <span>{{ __('Region') }}</span>
                <strong data-ec="region">US &amp; Canada <span>×</span> 1.0</strong>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
/* ===== Калькулятор дохода ===== */
document.querySelectorAll('[data-calc]').forEach(function (root) {
    let rates;
    try { rates = JSON.parse(root.getAttribute('data-calc')); } catch (e) { return; }

    function selOpt(group) {
        return root.querySelector('.calc-btn[data-group="' + group + '"] .select-option.is-selected');
    }
    function key(group)   { const o = selOpt(group); return o ? o.getAttribute('data-value') : null; }
    function label(group) { const o = selOpt(group); return o ? o.textContent.trim() : ''; }
    function money(n)     { return '$' + Math.round(n).toLocaleString('en-US'); }
    function set(name, v) { const el = root.querySelector('[data-ec="' + name + '"]'); if (el) el.textContent = v; }

    function calc() {
        const p = rates.platform[key('platform')] || {};
        const a = rates.audience[key('audience')] || {};
        const n = rates.niche[key('niche')]       || {};
        const r = rates.region[key('region')]     || {};

        const clicks  = Math.round((a.clicks || 0) * (p.k || 1));
        const sales    = clicks * ((n.cr || 0) / 100);
        const perSale  = (n.order || 0) * ((n.comm || 0) / 100);
        const base     = sales * perSale * (r.mult != null ? r.mult : 1);

        set('clicks', clicks.toLocaleString('en-US'));
        set('cr',     (n.cr || 0) + '%');
        set('order',  money(n.order || 0));
        set('comm',   (n.comm || 0) + '%');
        set('sale',   money(perSale));
        set('min',    money(base * 0.55));   // нижняя граница диапазона
        set('max',    money(base));          // верхняя

        // регион: подпись + множитель (со span ×)
        const regionEl = root.querySelector('[data-ec="region"]');
        if (regionEl) {
            regionEl.textContent = label('region') + ' ';
            const x = document.createElement('span');
            x.textContent = '×';
            regionEl.append(x, ' ' + (r.mult != null ? r.mult : 1));
        }

        // описание из выбранных подписей
        set('desc', ['platform', 'audience', 'niche', 'region'].map(label).filter(Boolean).join(' · '));
    }

    // твой select-компонент шлёт select:change (всплывает)
    root.addEventListener('select:change', function (e) {
        if (e.target.closest('.calc-btn[data-group]')) calc();
    });

    calc();   // первичный расчёт по дефолтам
});

</script>
 @endpush