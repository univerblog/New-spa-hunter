@php
$shops = [
  ['name' => 'Amazon',            'url' => 'amazon.com'],
  ['name' => 'Amazon UK',         'url' => 'amazon.co.uk'],
  ['name' => 'Amazon Germany',    'url' => 'amazon.de'],
  ['name' => 'Amazon Japan',      'url' => 'amazon.co.jp'],
  ['name' => 'eBay',              'url' => 'ebay.com'],
  ['name' => 'AliExpress',        'url' => 'aliexpress.com'],
  ['name' => 'Walmart',           'url' => 'walmart.com'],
  ['name' => 'Etsy',              'url' => 'etsy.com'],
  ['name' => 'Best Buy',          'url' => 'bestbuy.com'],
  ['name' => 'Target',            'url' => 'target.com'],
  ['name' => 'Adidas',            'url' => 'adidas.com'],
  ['name' => 'Adidas Australia',  'url' => 'adidas.com.au'],
  ['name' => 'Adidas Argentina',  'url' => 'adidas.com.ar'],
  ['name' => 'Adidas Brazil',     'url' => 'adidas.com.br'],
  ['name' => 'Adidas Hong Kong',  'url' => 'adidas.com.hk'],
  ['name' => 'Nike',              'url' => 'nike.com'],
  ['name' => 'Nike Brazil',       'url' => 'nike.com.br'],
  ['name' => 'Apple',             'url' => 'apple.com'],
  ['name' => 'Samsung',           'url' => 'samsung.com'],
  ['name' => 'IKEA',              'url' => 'ikea.com'],
  ['name' => 'Newegg',            'url' => 'newegg.com'],
  ['name' => 'Wayfair',           'url' => 'wayfair.com'],
  ['name' => 'Shein',             'url' => 'shein.com'],
  ['name' => 'ASOS',              'url' => 'asos.com'],
  ['name' => 'Zalando',           'url' => 'zalando.com'],
  ['name' => 'Booking',           'url' => 'booking.com'],
  ['name' => 'Airbnb',            'url' => 'airbnb.com'],
  ['name' => 'Steam',             'url' => 'store.steampowered.com'],
  ['name' => 'Farfetch',          'url' => 'farfetch.com'],
  ['name' => 'Temu',              'url' => 'temu.com'],
  ['name' => 'Mercado Libre',     'url' => 'mercadolibre.com'],
  ['name' => 'Wildberries',       'url' => 'wildberries.ru'],
  ['name' => 'Ozon',              'url' => 'ozon.ru'],
  ['name' => 'Yandex Market',     'url' => 'market.yandex.ru'],
  ['name' => 'Lamoda',            'url' => 'lamoda.ru'],
  ['name' => 'DNS',               'url' => 'dns-shop.ru'],
  ['name' => 'Citilink',          'url' => 'citilink.ru'],
  ['name' => 'Rozetka',           'url' => 'rozetka.com.ua'],
];
@endphp
<!-- ============ CREATE LINK FORM ============ -->

<div class="layout-block" id="">


  <div class="input-group-horisontal create-link__wrapper">
      <div class="select" data-select data-remote>
          <div class="input-field">
              <input type="text" class="select-trigger" placeholder="{{ __('nike.com or https://nike.com/some-product-page') }}" autocomplete="off">
          </div>
          <div class="select-panel">
              <div class="select-list">
                @foreach($shops as $shop)
                  <button type="button" class="select-option" data-value="{{ $shop['url'] }}">
                      <span class="select-option-name">{{ $shop['name'] }}</span>
                      <span class="select-option-sub">{{ $shop['url'] }}</span>
                  </button>
                @endforeach
              </div>
          </div>
      </div>
       
      <button type="button" class="btn create-link__btn" id="">
          <i class="fa-solid fa-link"></i>{{ __('Create link') }}
      </button>
      
  </div>

  <div class="create-form-bottom">
    <div class="create-footer-btns">
      <button type="button" class="btn min outline" id="rules-trigger">
        <i class="fa-solid fa-circle-info"></i>
        <span class="pill-full">{{ __('Earning rules') }}</span><span class="pill-short">{{ __('Rules') }}</span>
      </button>
      <button type="button" class="btn min outline" id="all-links-trigger">
        <i class="fa-solid fa-link"></i>
        <span class="pill-full">{{ __('All my links') }}</span><span class="pill-short">{{ __('My links') }}</span>
      </button>
    </div>
    <div class="form-text create-helpers-inline">
      <i class="fa-solid fa-check" style="color:var(--lime);"></i>
      <span class="js-merchants-count">41&nbsp;783</span>
      <span>{{ __('merchants and services') }}</span>
    </div>
  </div>

</div>
<br /><br />
<!-- ============ CREATE LINK FORM ============ -->

<div class="layout-block" id="">


  <div class="input-group-horisontal create-link__wrapper">
      <div class="select create-link__select" data-select data-remote>
          <div class="input-field">
              <input type="text" class="select-trigger" placeholder="{{ __('nike.com or https://nike.com/some-product-page') }}" autocomplete="off">
          </div>
          <div class="select-panel">
              <div class="select-list">
                @foreach($shops as $shop)
                  <button type="button" class="select-option" data-value="{{ $shop['url'] }}">
                      <span class="select-option-name">{{ $shop['name'] }}</span>
                      <span class="select-option-sub">{{ $shop['url'] }}</span>
                  </button>
                @endforeach
              </div>
          </div>
      </div>
      

      <div class="select" data-select data-add>
          <div class="input-field">
              <input type="text" class="select-trigger" placeholder="{{ __('Folder (new or existing)') }}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
          </div>
          <div class="select-panel">
              <div class="select-list">
                 
              </div>
              <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
              <div class="select-hint" hidden>{{ __('Empty. Start typing to add.') }}</div>
              <button type="button" class="select-option select-add" data-value="">
              <i class="fa-solid fa-plus"></i>
              <span>{{ __('Add folder') }} «<strong class="select-add-term"></strong>»</span>
              </button>
              <div class="select-empty" hidden>{{ __('Empty. Start typing to add.') }}</div>
          </div>
      </div>

      <div class="select" data-select data-add>
          <div class="input-field">
              <input type="text" class="select-trigger" placeholder="{{ __('Tag (e.g. youtube)') }}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
          </div>
          <div class="select-panel">
              <div class="select-list">
                  <button type="button" class="select-option" data-value="travel">travel</button>
                  <button type="button" class="select-option" data-value="beauty">beauty</button>
                  <button type="button" class="select-option" data-value="New folder">New folder</button>
                  <button type="button" class="select-option" data-value="Новый тег">Новый тег</button>
                  <button type="button" class="select-option" data-value="тег номер 2">тег номер 2</button>
              </div>
              <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
              <div class="select-hint" hidden>{{ __('Empty. Start typing to add.') }}</div>
              <button type="button" class="select-option select-add" data-value="">
              <i class="fa-solid fa-plus"></i>
              <span>{{ __('Add tag') }} «<strong class="select-add-term"></strong>»</span>
              </button>
              <div class="select-empty" hidden>{{ __('Empty. Start typing to add.') }}</div>
          </div>
      </div>

      <div class="input-field">
          <input type="text" placeholder="{{ __('Note (optional)') }}" maxlength="150">
      </div>

      <button type="button" class="btn create-link__btn" id="">
          <i class="fa-solid fa-link"></i>{{ __('Create link') }}
      </button>
      
  </div>

  <div class="create-form-bottom">
    <div class="create-footer-btns">
      <button type="button" class="btn min outline" id="rules-trigger">
        <i class="fa-solid fa-circle-info"></i>
        <span class="pill-full">{{ __('Earning rules') }}</span><span class="pill-short">{{ __('Rules') }}</span>
      </button>
      <button type="button" class="btn min outline" id="all-links-trigger">
        <i class="fa-solid fa-link"></i>
        <span class="pill-full">{{ __('All my links') }}</span><span class="pill-short">{{ __('My links') }}</span>
      </button>
    </div>
    <div class="form-text create-helpers-inline">
      <i class="fa-solid fa-check" style="color:var(--lime);"></i>
      <span class="js-merchants-count">41&nbsp;783</span>
      <span>{{ __('merchants and services') }}</span>
    </div>
  </div>

</div>