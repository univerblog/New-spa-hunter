<!-- ============ CREATE LINK FORM ============ -->
<div class="create-form-wrap create-form-wrap--compact">
    <div id="create-form">
    <div class="create-form-row create-form-row--anon">
        <div class="create-input-wrap">
        <input type="text" class="create-input" id="create-input" placeholder="{{ __('nike.com or https://nike.com/some-product-page') }}" autocomplete="off">
        <div class="create-suggestions" id="create-suggestions"></div>
        </div>
        <button type="button" class="create-btn-main" id="create-btn">
        <i class="fa-solid fa-link"></i>
        {{ __('Create link') }}
        </button>
    </div>
    <div class="create-form-bottom">
        <div class="create-footer-btns">
        <button type="button" id="rules-trigger">
            <i class="fa-solid fa-circle-info"></i>
            <span class="pill-full">{{ __('Earning rules') }}</span><span class="pill-short">{{ __('Rules') }}</span>
        </button>
        <button type="button" id="all-links-trigger">
            <i class="fa-solid fa-link"></i>
            <span class="pill-full">{{ __('All my links') }}</span><span class="pill-short">{{ __('My links') }}</span>
        </button>
        </div>
        <div class="create-helpers-inline">
        <i class="fa-solid fa-check" style="color:var(--lime);"></i>
        <span class="js-merchants-count">41&nbsp;783</span>
        <span>{{ __('merchants and services') }}</span>
        </div>
    </div>
    </div>
</div>
  