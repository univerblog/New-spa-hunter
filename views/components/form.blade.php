<div class="layout-form">
    <div class="input-group">
        <div class="select" data-select>
            <button type="button" class="select-trigger">
                <span class="select-value">США и Канада</span>
                <i class="fa-solid fa-chevron-down select-arrow"></i>
            </button>
            <div class="select-panel">
                <div class="select-list">
                    <button type="button" class="select-option is-selected" data-value="us">США и Канада</button>
                    <button type="button" class="select-option" data-value="eu">Европа</button>
                    <button type="button" class="select-option" data-value="global">Весь мир</button>
                    <button type="button" class="select-option" data-value="fashion">Мода</button>
                    <button type="button" class="select-option" data-value="beauty">Красота и косметика</button>
                    <button type="button" class="select-option" data-value="tech">Техника и гаджеты</button>
                    <button type="button" class="select-option" data-value="eu">Европа</button>
                    <button type="button" class="select-option" data-value="global">Весь мир</button>
                    <button type="button" class="select-option" data-value="fashion">Мода</button>
                    <button type="button" class="select-option" data-value="beauty">Красота и косметика</button>
                    <button type="button" class="select-option" data-value="tech">Техника и гаджеты</button>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
    <div class="input-group-horisontal">
        <div class="select" data-select data-search>
            <button type="button" class="select-trigger">
                <span class="select-value">Красота и косметика</span>
                <i class="fa-solid fa-chevron-down select-arrow"></i>
            </button>
            <div class="select-panel">
                <div class="select-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="{{ __('Search') }}" autocomplete="off">
                </div>
                <div class="select-list">
                    <button type="button" class="select-option" data-value="us">США и Канада</button>
                    <button type="button" class="select-option" data-value="eu">Европа</button>
                    <button type="button" class="select-option" data-value="global">Весь мир</button>
                    <button type="button" class="select-option" data-value="fashion">Мода</button>
                    <button type="button" class="select-option is-selected" data-value="beauty">Красота и косметика</button>
                    <button type="button" class="select-option" data-value="tech">Техника и гаджеты</button>
                    <button type="button" class="select-option" data-value="eu">Европа</button>
                    <button type="button" class="select-option" data-value="global">Весь мир</button>
                    <button type="button" class="select-option" data-value="fashion">Мода</button>
                    <button type="button" class="select-option" data-value="beauty">Красота и косметика</button>
                    <button type="button" class="select-option" data-value="tech">Техника и гаджеты</button>
                </div>
                <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
            </div>
        </div>
        <div class="select select--input" data-select data-remote>
            <div class="input-field">
                <input type="text" class="select-trigger" placeholder="{{ __('nike.com or https://nike.com/some-product-page') }}" autocomplete="off">
            </div>
            <div class="select-panel">
                <div class="select-list">
                <!-- рисуется JS-ом: -->
                <button type="button" class="select-option" data-value="nike.com">
                    <span class="select-option-name">Nike</span>
                    <span class="select-option-sub">nike.com</span>
                </button>
                </div>
            </div>
        </div>

        <div class="select select--input" data-select data-add>
            <div class="input-field">
                <input type="text" class="select-trigger" placeholder="{{ __('Folder (new or existing)') }}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
            </div>
            <div class="select-panel">
                <div class="select-list">
                    <button type="button" class="select-option" data-value="travel">travel</button>
                    <button type="button" class="select-option" data-value="beauty">beauty</button>
                    <button type="button" class="select-option" data-value="New folder">New folder</button>
                </div>
                <div class="select-empty" hidden>{{ __('Nothing found') }}</div>
                <button type="button" class="select-option select-add" data-value="">
                <i class="fa-solid fa-plus"></i>
                <span>{{ __('Add folder') }} «<strong class="select-add-term"></strong>»</span>
                </button>
                <div class="select-empty" hidden>{{ __('Empty. Start typing to add.') }}</div>
            </div>
        </div>

        <div class="select select--input" data-select data-add>
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
                <button type="button" class="select-option select-add" data-value="">
                <i class="fa-solid fa-plus"></i>
                <span>{{ __('Add tag') }} «<strong class="select-add-term"></strong>»</span>
                </button>
                <div class="select-empty" hidden>{{ __('Empty. Start typing to add.') }}</div>
            </div>
        </div>
    </div>


</div>

 <div class="section-title">
      <h2>{{ __('Create your first link right now') }}</h2>
      <p>{{ __("Paste a product URL or brand name — we'll find the store and generate an affiliate link.") }}</p>
    </div>
    
<div class="layout-form">
    <div class="input-group-horisontal">
        <div class="input-field">
            <label for="2">Email</label>
            <input type="text" id="2" placeholder="Enter the URL" maxlength="150">
        </div>
        <div class="input-field">
            <input type="text" placeholder="Имя" maxlength="150">
        </div>
        <div class="input-field">
            <label>Пароль</label>
            <input type="password" placeholder="" maxlength="150">
        </div>
        <button class="btn">Кнопка</button>
    </div>
</div>
<div class="layout-form">
    <div class="btn-group">
        <button class="btn big">Кнопка</button>
        <button class="btn big outline">Кнопка</button>
        <button class="btn" disabled>Кнопка недоступна</button>
        
        <button class="btn">Кнопка</button>
        <button class="btn outline">Кнопка</button>

        <button class="btn min">Кнопка</button>
        <button class="btn min outline">Кнопка</button>
    </div>
</div>

<div class="btn-group">
        <button class="btn big">Кнопка</button>
        <button class="btn big outline">Кнопка</button>
        <button class="btn" disabled>Кнопка недоступна</button>
        
        <button class="btn">Кнопка</button>
        <button class="btn outline">Кнопка</button>

        <button class="btn min">Кнопка</button>
        <button class="btn min outline">Кнопка</button>
    </div>

