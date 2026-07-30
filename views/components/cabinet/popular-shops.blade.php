@php
    $shops = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/shops-for-creat-link.php';
    $categories = [
        'popular'     => 'Популярные',
        'home'        => 'Дом',
        'travel'      => 'Путешествия',
        'electronics' => 'Техника',
        'beauty'      => 'Бьюти',
        'fashion'     => 'Мода',
        'lifestyle'   => 'Лайфстайл',
    ];

    $activeCategory = 'popular';
@endphp

<div class="shops-block" id="shops-create-link">

    <div class="cab-card-head">
        <div class="cab-card-title">Или выбери магазин</div>
        <div class="shops-filter">
            <div class="select" data-select data-shop-filter>
                <button type="button" class="select-trigger">
                    <span class="select-value">{{ $categories[$activeCategory] }}</span>
                    <i class="fa-solid fa-chevron-down select-arrow"></i>
                </button>

                <div class="select-panel">
                    <div class="select-list">
                        @foreach ($categories as $key => $label)
                            <button type="button"
                                    class="select-option{{ $activeCategory === $key ? ' is-selected' : '' }}"
                                    data-value="{{ $key }}">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shops-grid" data-shops-list>
        @foreach ($shops as $shop)
            @php
                $isPopular = !empty($shop['popular']);
                $isVisible = $activeCategory === 'popular'
                    ? $isPopular
                    : $shop['category'] === $activeCategory;
            @endphp

            <div class="shop-card" data-shop-card data-category="{{ $shop['category'] }}" data-popular="{{ $isPopular ? '1' : '0' }}" @if (!$isVisible) hidden @endif>

                <div class="shop-card__info">
                    <div class="shop-card__name">{{ $shop['name'] }}</div>
                    <div class="shop-card__commission">{{ $shop['commission'] }}</div>
                </div>

                <button type="button" class="btn min outline">Создать ссылку</button>
                
            </div>
        @endforeach
    </div>

</div>

@push('scripts')
<script>
(function () {
    if (window.__popularShopsInit) return;
    window.__popularShopsInit = true;

    document.addEventListener('select:change', function (e) {
        var select = e.target.closest('[data-shop-filter]');
        if (!select) return;

        var block = select.closest('.shops-block');
        if (!block) return;

        var category = e.detail.value;

        block.querySelectorAll('[data-shop-card]').forEach(function (card) {
            var visible;

            if (category === 'popular') {
                visible = card.dataset.popular === '1';
            } else {
                visible = card.dataset.category === category;
            }

            card.hidden = !visible;
        });
    });
})();
</script>
@endpush