 @php
    static $countries;
    $countries ??= include $_SERVER['DOCUMENT_ROOT'] . '/views/data/countries.php';
@endphp
<div class="phone-field">
    <div class="select select-phone" data-select>
        <button type="button" class="select-trigger">
            <span class="select-value"><span class="fi fi-ru"></span> +7</span>
            <i class="fa-solid fa-chevron-down select-arrow"></i>
        </button>
        <div class="select-panel">
            <div class="select-search">
                <i class="fa-regular fa-magnifying-glass"></i>
                <input type="text" placeholder="Страна или код" autocomplete="off">
            </div>
            <div class="select-list">
                @foreach ($countries as $iso => $c)
                    <button type="button" class="select-option{{ $iso === 'ru' ? ' is-selected' : '' }}" data-value="{{ $c['dial'] }}" data-iso="{{ $iso }}">    
                        <span class="select-option-name s-o-phone">
                            <span class="fi fi-{{ $iso }}"></span>{{ $c['name'] }}
                        </span>
                        <span class="select-option-sub">{{ $c['dial'] }}</span>
                    </button>
                @endforeach
            </div>
            <div class="select-empty" hidden>Ничего не найдено</div>
        </div>
    </div>
    <div class="phone-field__input">
        <input type="tel" name="{{ $name }}" placeholder="999 123-45-67" value=""  maxlength="20" data-phone-input>
        <input type="hidden" name="{{ $name }}_code" value="+7" data-phone-code>
    </div>
</div>

@push('scripts')
<script>
(function(){
    if (window.__phoneInit) return;
    window.__phoneInit = true;

    // страна по языку браузера при загрузке
    function apply(){
        var iso = ((navigator.language || '').split('-')[1] || '').toLowerCase();
        if (!iso) return;

        document.querySelectorAll('.select-phone').forEach(function(root){
            var opt = root.querySelector('.select-option[data-iso="' + iso + '"]');
            if (!opt) return;
            root.querySelectorAll('.select-option.is-selected').forEach(function(o){ o.classList.remove('is-selected'); });
            opt.classList.add('is-selected');
            var v = root.querySelector('.select-value');
            var flag = opt.querySelector('.fi');
            if (v) v.innerHTML = (flag ? flag.outerHTML : '') + ' ' + opt.dataset.value;
            var code = root.closest('.phone-field').querySelector('[data-phone-code]');
            if (code) code.value = opt.dataset.value;
        });
    }

    // после выбора страны показываем в триггере флаг + код (а не название)
    document.addEventListener('select:change', function(e){
        var root = e.target.closest('.select-phone');
        if (!root || !e.detail.option) return;
        var flag = e.detail.option.querySelector('.fi');
        var v = root.querySelector('.select-value');
        if (v) v.innerHTML = (flag ? flag.outerHTML : '') + ' ' + e.detail.value;
        var code = root.closest('.phone-field').querySelector('[data-phone-code]');
        if (code) code.value = e.detail.value;
    });

    document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', apply) : apply();
})();
</script>

@endpush