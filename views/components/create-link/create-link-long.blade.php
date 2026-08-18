@php
$shops = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/shops-for-creat-link.php';
@endphp


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

    <button type="button" class="btn create-link__btn" onclick="openModal('modal-link-created')">
        <i class="fa-solid fa-link"></i>{{ __('Create link') }}
    </button>
    
</div>

<div class="create-form-bottom">
<div class="create-footer-btns">
    <button type="button" class="btn min outline" onclick="openModal('modal-earn-rules', { className: 'long' })">
    <i class="fa-solid fa-circle-info"></i>
    <span>Правила заработка</span>
    </button>
   
</div>
<div class="form-text create-helpers-inline">
    <span class="js-merchants-count">41&nbsp;783</span>
    <span>{{ __('merchants and services') }}</span>
</div>
</div>

