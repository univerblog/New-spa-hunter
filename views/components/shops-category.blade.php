@php
$shops = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/shops-category.php';
@endphp

<div class="shop-list" data-shops>
    @foreach ($shops as $shop)
    <div class="shop-row">
        <div class="shop-row__head">
            <div class="shop-row__abbr">{{ $shop['abbr'] }}</div>
            <div class="shop-row__id">
                <span class="shop-row__name">{{ $shop['name'] }}</span>
                <span class="shop-row__url">{{ $shop['domain'] }}</span>
            </div>
            
        </div>
       

        <div class="shop-row__metrics">
            <div><span>Средний чек</span><b>{{ $shop['check'] }}</b></div>
            <div><span>Комиссия</span><b>{{ $shop['commission'] }}</b></div>
            <div><span>Cookie</span><b>{{ $shop['cookie'] }}</b></div>
        </div>

         <button type="button" class="btn min outline shop-btn">
            <span>Подробнее</span><i class="fa-regular fa-angle-right"></i>
        </button>
        
        <a href="#" class="btn min shop-link__btn">Создать ссылку</a>

        <div class="shop-details">
            <p>{{ $shop['desc'] }}</p>
            <div class="brand-shop__pros">
                @if (!empty($shop['pros']))
                <div>
                    <b>Плюсы</b>
                        @foreach ($shop['pros'] as $pro)
                            <span>{{ $pro }}</span>
                        @endforeach
                </div>
                @endif

                @if (!empty($shop['cons']))
                <div>
                    <b>Минусы</b>
                        @foreach ($shop['cons'] as $con)
                            <span>{{ $con }}</span>
                        @endforeach
                </div>
                @endif
            </div>
            <a href="#" class="btn min shop-link__btn-mob">Создать ссылку</a>
        </div>
    </div>
    @endforeach
</div>

<div class="btn-group flex-center" style="margin-top:30px;">
    <button class="btn big" onclick="showMore(this)">Показать еще 10</button>
 </div>

@push('scripts')
<script>
function showMore(btn) {
    const list = document.querySelector('.shop-list[data-shops]');
    const rows = [...list.querySelectorAll('.shop-row')];
    const STEP = 10;
    const INIT = 10;
    let shown = +btn.dataset.shown || INIT;

    if (shown >= rows.length) {
        // всё открыто → сворачиваем
        shown = INIT;
        rows.forEach((r, i) => r.classList.toggle('is-shown', i < INIT));
    } else {
        shown = Math.min(shown + STEP, rows.length);
        rows.slice(0, shown).forEach(r => r.classList.add('is-shown'));
    }

    btn.dataset.shown = shown;

    // текст по реальному остатку
    if (shown >= rows.length) {
        btn.textContent = 'Свернуть';
    } else {
        const remaining = Math.min(STEP, rows.length - shown);
        btn.textContent = 'Показать еще ' + remaining;
    }
}

</script>
 @endpush