@php
$shops = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/shops-for-creat-link.php';
@endphp


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
      
    <button type="button" class="btn create-link__btn" onclick="openModal('modal-link-created')">
        <i class="fa-solid fa-link"></i>{{ __('Create link') }}
    </button>
    
</div>

<div class="create-form-bottom">
  <div class="create-footer-btns">
    <button type="button" class="btn min outline" onclick="openModal('modal-earn-rules', { className: 'long' })">
      <i class="fa-solid fa-circle-info"></i>
      <span class="pill-full">{{ __('Earning rules') }}</span><span class="pill-short">{{ __('Rules') }}</span>
    </button>
    <button type="button" class="btn min outline" disabled>
      <i class="fa-solid fa-link"></i>
      <span>Правила заработка</span>
    </button>
  </div>
  <div class="form-text create-helpers-inline">
    <!-- <i class="fa-solid fa-check" style="color:var(--lime);"></i> -->
    <span class="js-merchants-count">41&nbsp;783</span>
    <span>{{ __('merchants and services') }}</span>
  </div>
</div>

