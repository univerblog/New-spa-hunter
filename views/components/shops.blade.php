@php 
$shops = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/shops.php';
@endphp

<div class="brand-shops-wrapper">
    @foreach ($shops as $shop)
    <div class="brand-shop">
        <div class="brand-shop__head">
            <img class="shop-logo" src="/img/brands/{{ $shop['logo'] }}-2.png" data-logo="{{ $shop['logo'] }}" alt="{{ $shop['name'] }}">
            <p>{{ $shop['domain'] }}</p>
        </div>
        <div class="brand-shop__stat">
            <div><span>Средний чек</span><b>{{ $shop['check'] }}</b></div>
            <div><span>Комиссия</span><b> от {{ $shop['commission'] }}</b></div>
        </div>
        
        <div class="brand-shop__expand">
            <button class="btn min outline brand-shop__toggle">Подробнее<i class="fa-light fa-angle-down"></i></button>
            <div class="brand-shop__panel">
                <h4>{{ $shop['tagline'] }}</h4>
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
            </div>
            <button class="btn min">Создать ссылку</button>
        </div>
    </div>
    @endforeach
</div>

@push('scripts')
<script>
    /* ===== Логотипы магазинов под тему ===== */
(function(){
  var html = document.documentElement;
  function updateLogos(){
    var light = html.getAttribute('data-theme') === 'light';
    document.querySelectorAll('.shop-logo[data-logo]').forEach(function(img){
      var src = '/img/brands/' + img.getAttribute('data-logo') + (light ? '.png' : '-2.png');
      if (!img.src.endsWith(src)) img.src = src; // грузим только если реально сменилось
    });
  }
  // следим за сменой темы (атрибут data-theme на <html>)
  new MutationObserver(updateLogos).observe(html, { attributes: true, attributeFilter: ['data-theme'] });
  document.readyState === 'loading'
    ? document.addEventListener('DOMContentLoaded', updateLogos)
    : updateLogos();
})();

document.addEventListener('click', (e) => {
    const btn = e.target.closest('.brand-shop__toggle');
    if (!btn) return;
    const card = btn.closest('.brand-shop');
    if (window.innerWidth <= 800) {
        card.parentElement.querySelectorAll('.brand-shop.is-open').forEach(el => {
            if (el !== card) el.classList.remove('is-open');
        });
    }
    card.classList.toggle('is-open');
});
</script>
@endpush