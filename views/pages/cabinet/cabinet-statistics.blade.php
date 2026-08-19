@php 
$stata = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/statistics/statistic.php';
$merchants = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/statistics/merchants.php';

$totalClicks = array_sum(array_column($stata, 'clicks_count'));
$totalPurchases = array_sum(array_column($stata, 'purchases_count'));
$totalReward = array_sum(array_column($stata, 'total_reward'));

$tags = [];
foreach ($stata as $link) {
    $tag = $link['tag'] ?: 'No tag';
    $tags[$tag] = ($tags[$tag] ?? 0) + 1;
}

$folders = [];
    foreach ($stata as $link) {
        $folder = $link['folder'] ?: 'No folder';
        $folders[$folder] = ($folders[$folder] ?? 0) + 1;
    }
@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/statistics.css?v={{ rand() }}">
@endpush

@section('content')
<nav class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="/">Главная</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="/">Инструменты</a>
             <i class="fa-solid fa-chevron-right"></i>
            <span>Статистика</span>
        </div>
    </div>
</nav>
<section class="section statistics-link-block">
    <div class="container">
        <div class="create-link__main" data-state="compact">
            <div class="create-link__main-mini input-group-horisontal">
                <div class="input-field">
                    <input type="text" placeholder="Вставьте URL товара или название бренда – появится полная форма" maxlength="150">
                </div>
                <button class="btn"><i class="fa-solid fa-plus"></i><span>Создать <b>ссылку</b></span></button>
            </div>
            <div class="create-link__main-full layout-block layout-form">
                <div class="create-link-head">
                    <span>Новая ссылка</span>
                    <button class="btn min outline"><i class="fa-regular fa-xmark"></i>Свернуть</button>
                </div>
                @include('components.create-link.create-link-long')
            </div>
        </div>

    </div>
</section>

<section class="section statistics-page-block">
    
    <div class="container full">

        <div class="stata-setting-block">
            <div class="stata-setting-item">

                <div class="select" data-select data-name="tags" id="select_tags">
                    <button type="button" class="select-trigger">
                        <span class="select-value">Все теги ({{ count($stata) }})</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="all">Все теги ({{ count($stata) }})</button>
                            @foreach($tags as $tag => $count)
                                <button type="button" class="select-option" data-value="{{ $tag }}">{{ $tag }} ({{ $count }})</button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="select" data-select data-name="folder" id="select_folder">
                    <button type="button" class="select-trigger">
                        <span class="select-value">Все папки ({{ count($stata) }})</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="all">Все папки ({{ count($stata) }})</button>
                            @foreach($folders as $folder => $count)
                                <button type="button" class="select-option" data-value="{{ $folder }}">{{ $folder }} ({{ $count }})</button>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="stata-setting-item">
                <div class="entries">Показано от 1 до 20 из 100 записей</div>
                <div class="select select-min for-mobile" data-select data-name="sort" id="select_sort_table">
                    <button type="button" class="select-trigger">
                        <span class="select-value">
                            <i class="fa-regular fa-arrow-down-arrow-up"></i>
                        </span>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="">По умолчанию</button>
                            <button type="button" class="select-option" data-value="clicks-desc">
                                Клики <span><i class="fa-regular fa-arrow-up"></i></span></button>
                            <button type="button" class="select-option" data-value="clicks-asc">
                                Клики <span><i class="fa-regular fa-arrow-down"></i></span></button>
                            <button type="button" class="select-option" data-value="purchases-desc">
                                Покупки <span><i class="fa-regular fa-arrow-up"></i></span></button>
                            <button type="button" class="select-option" data-value="purchases-asc">
                                Покупки <span><i class="fa-regular fa-arrow-down"></i></span></button>
                            <button type="button" class="select-option" data-value="confirmed-desc">
                                Подтверждено <span><i class="fa-regular fa-arrow-up"></i></span></button>
                            <button type="button" class="select-option" data-value="confirmed-asc">
                                Подтверждено <span><i class="fa-regular fa-arrow-down"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stata-setting-item">

                <div class="select select-min" data-select data-name="length" id="select_length_table">
                    <button type="button" class="select-trigger">
                        <span class="select-value">10</span>
                        <i class="fa-solid fa-chevron-down select-arrow"></i>
                    </button>
                    <div class="select-panel">
                        <div class="select-list">
                            <button type="button" class="select-option is-selected" data-value="10">10</button>
                            <button type="button" class="select-option" data-value="20">20</button>
                            <button type="button" class="select-option" data-value="40">40</button>
                            <button type="button" class="select-option" data-value="80">80</button>
                            <button type="button" class="select-option" data-value="100">100</button>
                        </div>
                    </div>
                </div>

                <div class="input-field">
                    <input type="text" placeholder="Search" maxlength="150" id="stata-search">
                </div>

            </div>
        </div>


       <div class="stata-table-wrapper">
            <table class="stata-table" id="for-paginate-only">
                <thead>
                    <tr>
                        <th><div class="tab-filter">Магазин</div></th>
                        <th><div class="tab-filter">Ссылка на товар</div></th>
                        <th>Короткая ссылка</th>
                        <th><div class="tab-filter">Тег</div></th>
                        <th><div class="tab-filter">Папка</div></th>
                        <th><div class="tab-filter">Заметка</div></th>
                        <th><div class="tab-filter">Создано</div></th>
                        <th><div class="tab-filter">Клики</div></th>
                        <th><div class="tab-filter">Покупки</div></th>
                        <th><div class="tab-filter">CR</div></th>
                        <th><div class="tab-filter">В ожидании</div></th>
                        <th><div class="tab-filter">Подтверждено</div></th>
                        <th><div class="tab-filter">Отменено</div></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stata as $link)
                    <tr data-id="{{ $link['id'] }}">

                        <td class="-merchant">
                            <div class="table-flex merch">
                                <a href="#" onclick="loadMerchantData('{{ $link['merchant_key'] }}'); event.preventDefault();">
                                    {{ $link['merchant__name'] }} <i>i</i>
                                </a>
                            </div>
                            <div class="page-link" style="font-size:13px;">
                                <button type="button" onclick="openModal('modal-how-to-place', { className: 'long' })"><span>Как разместить?</span></button>
                            </div>
                        </td>

                        <td class="-url">
                            <span class="td-label">Ссылка на товар</span>
                            <div class="table-flex url-link"><a href="{{ $link['product_url'] }}" target="_blank">
                                <span>{{ $link['product_url'] }}</span>
                                <i class="fa-regular fa-arrow-up-right-from-square"></i>
                            </a></div>
                        </td>

                        <td class="-short">
                            <div class="table-flex copy">
                                <a href="{{ $link['short_url'] }}" target="_blank">{{ $link['short_url'] }}</a>
                                <button type="button" onclick="copyUrl(this, '{{ $link['short_url'] }}')"><i class="fa-solid fa-copy"></i></button>
                            </div>
                        </td>

                        <td class="center -tag">
                            <div class="table-flex tags" onclick="openTagModal('{{ $link['id'] }}')"><i class="fa-solid fa-hashtag"></i><span>{{ $link['tag'] ?: '-' }}</span></div>
                        </td>

                        <td class="-folder">
                            <div class="table-flex folder" onclick="openFolderModal('{{ $link['id'] }}')">
                                <i class="fa-solid fa-folder-open"></i> <span>{{ $link['folder'] ?: '-' }}</span>
                            </div>
                        </td>

                        <td class="center note -note{{ $link['note'] ? '' : ' no-note' }}">
                            @if($link['note'])
                                <span onclick="openNoteModal('{{ $link['id'] }}', this.textContent.trim())">{{ $link['note'] }}</span>
                            @else
                                <button type="button" onclick="openNoteModal('{{ $link['id'] }}', '')"><i class="fa-solid fa-plus" style="font-size:10px;"></i> Заметка</button>
                            @endif
                        </td>

                        <td class="data-created -created">{{ $link['created_at'] }}</td>

                        <td class="center clicks-count -clicks">
                            <span class="td-label">Клики</span>
                            @if($link['clicks_count'] != 0)
                                <button type="button" onclick="openDetailsModal('{{ $link['id'] }}', 'clicks')">{{ $link['clicks_count'] }}</button>
                            @else
                                0
                            @endif
                        </td>

                        <td class="center purchases-count -purchases">
                            <span class="td-label">Покупки</span>
                            @if($link['purchases_count'] != 0)
                                <button type="button" onclick="openDetailsModal('{{ $link['id'] }}', 'purchases')">{{ $link['purchases_count'] }}</button>
                            @else
                                0
                            @endif
                        </td>

                        <td class="center -cr"><span class="td-label">CR</span>16.22%</td>

                        <td class="center pending-count -pending"><span class="td-label">В ожидании</span><b>${{ $link['total_reward'] }}</b></td>

                        <td class="center -confirmed"><span class="td-label">Подтверждено</span><b>${{ $link['total_reward'] }}</b></td>

                        <td class="center -withdrawn"><span class="td-label">Отменено</span><b>${{ $link['total_reward'] }}</b></td>

                        <td class="center -actions">
                            <button type="button" class="stata-menu" data-stata-menu><i class="fa-solid fa-ellipsis-vertical"></i></button>
                            <div class="stata-pop">
                                <button type="button" onclick="openNoteModal('{{ $link['id'] }}', '{{ $link['note'] }}')"><i class="fa-regular fa-pen"></i> Заметка</button>
                                <button type="button" onclick="openTagModal('{{ $link['id'] }}', '{{ $link['note'] }}')"><i class="fa-regular fa-pen"></i> Тег</button>
                                <button type="button" onclick="openFolderModal('{{ $link['id'] }}', '{{ $link['note'] }}')"><i class="fa-regular fa-pen"></i> Папка</button>
                                <button type="button" class="red" onclick="openDeleteModal('{{ $link['id'] }}')"><i class="fa-solid fa-trash-can"></i> Удалить</button>
                            </div>
                        </td>

                        <td class="-links-toggle">
                            <button type="button" data-links-toggle>Доходы<i class="fa-solid fa-chevron-down"></i></button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Итого по странице:</td>
                        <td colspan="6"><i class="fa-light fa-arrow-right"></i></td>
                        <td class="center" id="page-clicks">0</td>
                        <td class="center" id="page-purchases">0</td>
                        <td></td>
                        <td class="center" id="page-reward">$0</td>
                        <td class="center">-</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Итого:</td>
                        <td colspan="6"><i class="fa-light fa-arrow-right"></i></td>
                        <td class="center">{{ $totalClicks }}</td>
                        <td class="center">{{ $totalPurchases }}</td>
                        <td></td>
                        <td class="center">${{ number_format($totalReward, 2) }}</td>
                        <td class="center">${{ number_format($totalReward, 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>


        <div class="pagination for-desktop" id="pagination"></div>

        <div class="mini-pagination for-mobile" id="mini-pagination">
            <button><i class="fa-solid fa-angles-left"></i></button>
            <button><i class="fa-solid fa-angle-left"></i></button>
            <div class="paginate-pages"><b>Page</b> <span id="mini-current">1</span> of <span id="mini-total">1</span></div>
            <button><i class="fa-solid fa-angle-right"></i></button>
            <button><i class="fa-solid fa-angles-right"></i></button>
        </div>
           
    </div>  
</section>

@push('modals')
<div class="modal-content" id="note-modal-content" style="display:none;">
    <h3>Добавить заметку</h3>
    <div class="container-modal">
        <div class="input-field">
            <textarea id="note-textarea" rows="6" placeholder="Добавить заметку..." maxlength="450"></textarea>
        </div>
        <div class="btn-group right-group">
            <button type="button" class="btn outline" onclick="closeModal()">Отмена</button>
            <button type="button" class="btn" onclick="saveNote()">Сохранить</button>
        </div>
    </div>
</div>  

<div class="modal-content" id="delete-modal-content" style="display:none;">
    <h3>Удалить ссылку</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Вы уверены? Это действие нельзя&nbsp;отменить, ссылка будет удалена навсегда.
        </div>
        <div class="btn-group right-group">
            <button type="button" class="btn outline" onclick="closeModal()">Отмена</button>
            <button type="button" class="btn red" onclick="confirmDelete()">Удалить</button>
        </div>
    </div>
</div>

<div class="modal-content" id="delete-done-content" style="display:none;">
    <h3>Ссылка удалена</h3>
    <div class="container-modal">
        <div class="form-text-content" style="margin-bottom:10px;">
            Ссылка успешно удалена из вашего аккаунта.
        </div>
        <div class="btn-group right-group">
            <button class="btn" onclick="closeDeleteAndRemoveRow()">Закрыть</button>
        </div>
    </div>
</div>

<div class="modal-content" id="modal-how-to-place" style="display:none;">
    <h3>Как разместить ссылку</h3>
    <div class="container-modal">
        <div class="form-text-content">Где разместить, как пометить и готовый текст, если нужен.</div>
        <div class="form-text-content">Партнёрские ссылки нужно помечать как рекламу (правила FTC и площадок). Добавь пометку в текст.</div>
        <div class="modal-card-block">
            <h4>Если твоя аудитория в США или ЕС</h4>
            <div class="input-field">
                <input type="text" value="#ad" readonly>
                <button type="button" class="input-fix-btn" data-copy><i class="fa-regular fa-copy"></i></button>
            </div>
        </div>    
        <div class="modal-card-block">    
             <h4>Для RU-аудитории</h4>
            <div class="input-field">
                <input type="text" value="#реклама" readonly>
                <button type="button" class="input-fix-btn" data-copy><i class="fa-regular fa-copy"></i></button>
            </div>
        </div>

        <div class="modal-card-block">
            <h4>Выбери площадку</h4>
            <div class="place-platforms">
                <button type="button" class="place-platform is-active" data-name="YouTube" data-text="В описании под видео + в закреплённом комментарии. Первые 3 строки описания и закреп дают 8-15% переходов. Проговори голосом: «ссылки в описании и закрепе».">YouTube</button>
                <button type="button" class="place-platform" data-name="Instagram" data-text="Ссылка-стикер в Сторис + в шапке профиля. В Reels – призыв «ссылка в профиле».">Instagram</button>
                <button type="button" class="place-platform" data-name="TikTok" data-text="Одна ссылка в профиле (био) + закреплённый комментарий «ссылка в профиле, копируйте». Назови голосом.">TikTok</button>
                <button type="button" class="place-platform" data-name="Twitch" data-text="В панелях под плеером + через чат-команду (напр. !mouse). В описании канала укажи про партнёрские ссылки.">Twitch</button>
                <button type="button" class="place-platform" data-name="X (Twitter)" data-text="НЕ в первом твите (режет охват). Ссылку – в последний твит треда, в reply на свой твит или в закреплённый твит профиля + в био.">X</button>
                <button type="button" class="place-platform" data-name="Facebook" data-text="Лучше в первый комментарий (ссылка в посте режет охват) либо в текст поста + закреплённый пост страницы.">Facebook</button>
                <button type="button" class="place-platform" data-name="Telegram" data-text="В тексте поста + в закреплённом сообщении канала.">Telegram</button>
            </div>
            <div class="place-platform-content">
                <strong><i class="fa-solid fa-circle"></i> Где разместить на <span id="place-platform-name">YouTube</span></strong>
                <p id="place-platform-text">В описании под видео + в закреплённом комментарии. Первые 3 строки описания и закреп дают 8-15% переходов. Проговори голосом: «ссылки в описании и закрепе».</p>
            </div>
        </div>

        <div class="modal-card-block">
            <div class="link-rules__open-block">
                <div class="link-rules__toggle" onclick="toggleLinkRules(event)">Нужен текст или сценарий? Держи!<i class="fa-solid fa-caret-down"></i></div>

                <div class="link-rules__content">
                    <p>Снимаешь свой контент или крепишь ссылку в сторис? Просто бери ссылку. Нужен текст – вот готовый:</p>

<div class="link-rules__templates">
    <div class="link-rules__template">
        <div class="link-template__head">
            <span class="link-template__name">Подпись</span>
            <button class="link-template__copy" data-copy=""><i class="fa-regular fa-copy"></i></button>
        </div>
<p data-copy-text="">Пользуюсь [магазин] и реально доволен(льна). Если присматривались –
вот ссылка:
[магазин] -> [твоя ссылка]
#реклама</p>
    </div>

    <div class="link-rules__template">
        <div class="link-template__head">
            <span class="link-template__name">15-сек сценарий</span>
            <button class="link-template__copy" data-copy=""><i class="fa-regular fa-copy"></i></button>
        </div>
<p data-copy-text="">0-3 сек – хук: «[магазин]? Коротко и честно».
3-12 сек – покажи или назови одну вещь, которая нравится.
12-15 сек – «Ссылка в шапке/описании, загляни».
Пометь #реклама.</p>
        </div>

</div>

                </div>
            </div>
        </div>

        <div class="page-link" style="font-size:14px;">
            <a href=""><span>Правила и проверка аккаунта </span> <i class="fa-regular fa-arrow-right fa-xs"></i></a>
        </div>
    </div>
</div>


<div class="modal-content" id="folder-modal-content" style="display:none;">
    <h3>Изменить папку</h3>
    <div class="container-modal">
        <div class="select" data-select data-add id="folder-modal-select">
            <div class="input-field">
                <input type="text" class="select-trigger" placeholder="Папка (новая или существующая)" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                 <i class="fa-solid fa-chevron-down select-arrow"></i>
            </div>
            <div class="select-panel">
                <div class="select-list">
                    @foreach($folders as $folder => $count)
                        @if($folder !== 'No folder')
                        <button type="button" class="select-option" data-value="{{ $folder }}">{{ $folder }}</button>
                        @endif
                    @endforeach
                </div>
                <div class="select-empty" hidden>Ничего не найдено</div>
                <div class="select-hint" hidden>Пусто. Начните вводить, чтобы добавить.</div>
                <button type="button" class="select-option select-add" data-value="">
                    <i class="fa-solid fa-plus"></i>
                    <span>Добавить папку «<strong class="select-add-term"></strong>»</span>
                </button>
            </div>
        </div>
        <div class="btn-group right-group">
            <button type="button" class="btn outline" onclick="clearFolderSelect()">Очистить папку</button>
            <button type="button" class="btn" onclick="saveFolder()">Сохранить</button>
        </div>
    </div>
</div>

<div class="modal-content" id="tag-modal-content" style="display:none;">
    <h3>Изменить тег</h3>
    <div class="container-modal">
        <div class="select" data-select data-add id="tag-modal-select">
            <div class="input-field">
                <input type="text" class="select-trigger" placeholder="Тег (новый или существующий)" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                <i class="fa-solid fa-chevron-down select-arrow"></i>
            </div>
            <div class="select-panel">
                <div class="select-list">
                    @foreach($tags as $tag => $count)
                        @if($tag !== 'No tag')
                        <button type="button" class="select-option" data-value="{{ $tag }}">{{ $tag }}</button>
                        @endif
                    @endforeach
                </div>
                <div class="select-empty" hidden>Ничего не найдено</div>
                <div class="select-hint" hidden>Пусто. Начните вводить, чтобы добавить.</div>
                <button type="button" class="select-option select-add" data-value="">
                    <i class="fa-solid fa-plus"></i>
                    <span>Добавить тег «<strong class="select-add-term"></strong>»</span>
                </button>
            </div>
        </div>
        <div class="btn-group right-group">
            <button type="button" class="btn outline" onclick="clearTagSelect()">Очистить тег</button>
            <button type="button" class="btn" onclick="saveTag()">Сохранить</button>
        </div>
    </div>
</div>

<div id="merchant-loading-content" style="display:none;">
    <div class="modal-loading">Loading...</div>
</div>
@endpush







@endsection

@push('scripts')
<script>
////// Это скрипт на переключение стрелок при фильтрации таблицы  
document.querySelectorAll('.tab-filter').forEach(filter => {
    filter.addEventListener('click', function() {
        // Сбрасываем все остальные
        document.querySelectorAll('.tab-filter').forEach(f => {
            if (f !== this) {
                f.classList.remove('dt-ordering-asc', 'dt-ordering-desc');
            }
        });

        // Переключаем текущий
        if (this.classList.contains('dt-ordering-desc')) {
            this.classList.remove('dt-ordering-desc');
        } else if (this.classList.contains('dt-ordering-asc')) {
            this.classList.remove('dt-ordering-asc');
            this.classList.add('dt-ordering-desc');
        } else {
            this.classList.add('dt-ordering-asc');
        }
    });
});
</script>


<script>
////// Фильтры + пагинация: единое состояние
const rows = Array.from(document.querySelectorAll('#for-paginate-only tbody tr'));
const state = { tag: 'all', folder: 'all', search: '', perPage: 10, page: 1, sort: '' };
let visibleRows = rows;

function cellNum(row, selector) {
    return parseFloat(row.querySelector(selector)?.textContent.replace(/[^\d.]/g, '')) || 0;
}

function applyFilters() {
    visibleRows = rows.filter(row => {
        const tag = row.querySelector('.tags span')?.textContent.trim() || '-';
        const folder = row.querySelector('.folder span')?.textContent.trim() || '-';
        if (state.tag !== 'all' && tag !== state.tag && !(state.tag === 'No tag' && tag === '-')) return false;
        if (state.folder !== 'all' && folder !== state.folder && !(state.folder === 'No folder' && folder === '-')) return false;
        if (state.search && !row.textContent.toLowerCase().includes(state.search)) return false;
        return true;
    });

    if (state.sort) {
        const [field, dir] = state.sort.split('-');
        const sel = { clicks: '.clicks-count', purchases: '.purchases-count', confirmed: '.-confirmed' }[field];
        visibleRows = visibleRows.slice().sort((a, b) => (cellNum(a, sel) - cellNum(b, sel)) * (dir === 'asc' ? 1 : -1));
    }

    state.page = 1;
    render();
}

function showPage(page) {
    state.page = page;
    render();
}

function render() {
    const total = visibleRows.length;
    const totalPages = Math.max(1, Math.ceil(total / state.perPage));
    if (state.page > totalPages) state.page = totalPages;
    const start = (state.page - 1) * state.perPage;
    const end = Math.min(start + state.perPage, total);

    let pageClicks = 0, pagePurchases = 0, pageReward = 0;

    rows.forEach(row => { row.style.display = 'none'; });
    visibleRows.forEach((row, i) => {
        if (i < start || i >= end) return;
        row.style.display = '';
        pageClicks += cellNum(row, '.clicks-count');
        pagePurchases += cellNum(row, '.purchases-count');
        pageReward += cellNum(row, '.pending-count');
    });

    document.getElementById('page-clicks').textContent = pageClicks;
    document.getElementById('page-purchases').textContent = pagePurchases;
    document.getElementById('page-reward').textContent = '$' + pageReward.toFixed(2);
    document.querySelector('.stata-setting-item .entries').textContent = total ? `Показано от ${start + 1} до ${end} из ${total} записей` : 'Записей нет';

    let html = `<button onclick="showPage(1)" ${state.page === 1 ? 'disabled' : ''}><i class="fa-solid fa-angles-left"></i></button>`;
    html += `<button onclick="showPage(${state.page - 1})" ${state.page === 1 ? 'disabled' : ''}><i class="fa-solid fa-angle-left"></i></button>`;
    for (let i = 1; i <= totalPages; i++) {
        html += `<span onclick="showPage(${i})" class="${i === state.page ? 'active' : ''}">${i}</span>`;
    }
    html += `<button onclick="showPage(${state.page + 1})" ${state.page === totalPages ? 'disabled' : ''}><i class="fa-solid fa-angle-right"></i></button>`;
    html += `<button onclick="showPage(${totalPages})" ${state.page === totalPages ? 'disabled' : ''}><i class="fa-solid fa-angles-right"></i></button>`;
    document.getElementById('pagination').innerHTML = html;

    document.getElementById('mini-current').textContent = state.page;
    document.getElementById('mini-total').textContent = totalPages;
    const mini = document.querySelectorAll('#mini-pagination button');
    mini[0].disabled = mini[1].disabled = state.page === 1;
    mini[2].disabled = mini[3].disabled = state.page === totalPages;
    mini[0].onclick = () => showPage(1);
    mini[1].onclick = () => showPage(state.page - 1);
    mini[2].onclick = () => showPage(state.page + 1);
    mini[3].onclick = () => showPage(totalPages);
}

document.getElementById('select_tags').addEventListener('select:change', e => { state.tag = e.detail.value; applyFilters(); });
document.getElementById('select_sort_table').addEventListener('select:change', function(e) { state.sort = e.detail.value; this.querySelector('.select-value').innerHTML = '<i class="fa-regular fa-arrow-down-arrow-up"></i>'; applyFilters(); });
document.getElementById('select_folder').addEventListener('select:change', e => { state.folder = e.detail.value; applyFilters(); });
document.getElementById('select_length_table').addEventListener('select:change', e => { state.perPage = parseInt(e.detail.value); state.page = 1; render(); });
document.getElementById('stata-search').addEventListener('input', function() { state.search = this.value.trim().toLowerCase(); applyFilters(); });

render();
</script>


<script>
/// Отображение данных мерча в окне при клике на него   
function loadMerchantData(merchantKey) {
    openModal('merchant-loading-content', {
        className: 'long',
        onOpen: (content) => {
            //content.innerHTML = 'Loading...';
            fetch('/views/data/statistics/api/merchant-info.php?key=' + merchantKey)
                .then(r => r.json())
                .then(data => {
                    content.innerHTML = data.error ? 'Error: ' + data.error : data.html;
                })
                .catch(() => {
                    content.innerHTML = 'Error loading data';
                });
        }
    });
}

/// Открытие скрытых деталей в мерче
function toggleMerchant(event) {
    event.preventDefault();
    const toggle = event.target.closest('.mer-toggle');
    const block = toggle.closest('.mer-open-block');
    
    block.classList.toggle('open');
}

////// Копирование URL 
function copyUrl(btn, url) {
    navigator.clipboard.writeText(url).then(() => {
        const icon = btn.querySelector('i');
        icon.classList.remove('fa-copy');
        icon.classList.add('fa-check');
        
        setTimeout(() => {
            icon.classList.remove('fa-check');
            icon.classList.add('fa-copy');
        }, 1000);
    });
}

/////// Замена текста в поле note
let currentNoteId = null;

function openNoteModal(id, text) {
    currentNoteId = id;
    openModal('note-modal-content', {
        onOpen: (content) => {
            content.querySelector('h3').textContent = text ? 'Редактировать заметку' : 'Добавить заметку';
            const textarea = content.querySelector('#note-textarea');
            textarea.value = text;
            textarea.focus();
        }
    });
}

function saveNote() {
    const text = document.getElementById('note-textarea').value.trim();

    fetch('/views/data/statistics/api/save-note.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            id: currentNoteId,
            note: text
        })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const row = document.querySelector(`tr[data-id="${currentNoteId}"]`);
            const noteCell = row.querySelector('.note');

            noteCell.classList.toggle('no-note', !text);
            if (text) {
                noteCell.innerHTML = `<span onclick="openNoteModal('${currentNoteId}', this.textContent.trim())">${text}</span>`;
            } else {
                noteCell.innerHTML = `<button type="button" onclick="openNoteModal('${currentNoteId}', '')"><i class="fa-solid fa-plus" style="font-size:10px;"></i> Заметка</button>`;
            }

            closeModal();
        } else {
            alert(data.error || 'Ошибка сохранения');
        }
    })
    .catch(() => {
        alert('Ошибка сохранения');
    });
}

/////// Смена папки
let currentFolderId = null;

function openFolderModal(id) {
    currentFolderId = id;
    const row = document.querySelector(`tr[data-id="${id}"]`);
    const current = row.querySelector('.folder span')?.textContent.trim() || '';
    openModal('folder-modal-content', {
        onOpen: (content) => {
            const input = content.querySelector('.select-trigger');
            input.value = '';
            content.querySelectorAll('.select-option').forEach(o => o.classList.remove('is-selected'));
            const opt = Array.from(content.querySelectorAll('.select-list .select-option')).find(o => o.dataset.value === current);
            if (opt) opt.click();
        }
    });
}

/////// Смена тега
let currentTagId = null;

function openTagModal(id) {
    currentTagId = id;
    const row = document.querySelector(`tr[data-id="${id}"]`);
    const current = row.querySelector('.tags span')?.textContent.trim() || '';
    openModal('tag-modal-content', {
        onOpen: (content) => {
            const input = content.querySelector('.select-trigger');
            input.value = '';
            content.querySelectorAll('.select-option').forEach(o => o.classList.remove('is-selected'));
            const opt = Array.from(content.querySelectorAll('.select-list .select-option')).find(o => o.dataset.value === current);
            if (opt) opt.click();
        }
    });
}

function saveTag() {
    const value = document.querySelector('#tag-modal-select .select-trigger').value.trim();
    const row = document.querySelector(`tr[data-id="${currentTagId}"]`);
    row.querySelector('.tags span').textContent = value || '-';
    closeModal();
}

function clearFolderSelect() {
    const root = document.getElementById('folder-modal-select');
    root.querySelector('.select-trigger').value = '';
    root.querySelectorAll('.select-option').forEach(o => o.classList.remove('is-selected'));
}

function clearTagSelect() {
    const root = document.getElementById('tag-modal-select');
    root.querySelector('.select-trigger').value = '';
    root.querySelectorAll('.select-option').forEach(o => o.classList.remove('is-selected'));
}

function saveFolder() {
    const value = document.querySelector('#folder-modal-select .select-trigger').value.trim();
    const row = document.querySelector(`tr[data-id="${currentFolderId}"]`);
    row.querySelector('.folder span').textContent = value || '-';
    closeModal();
}

/////// END замены текста в поле note

//// Открытие модалок для clics и далее
function openDetailsModal(id, type) {
    openModal('merchant-loading-content', {
        className: 'long',
        onOpen: (content) => {
            //content.innerHTML = 'Loading...';
            fetch('/views/data/statistics/api/link-details.php?id=' + id + '&type=' + type)
                .then(r => r.json())
                .then(data => {
                    content.innerHTML = data.error ? 'Error: ' + data.error : data.html;
                    initModalPagination();
                })
                .catch(() => {
                    content.innerHTML = 'Error loading data';
                });
        }
    });
}

////// Пагинация и сортировка для модалки
function initModalPagination() {
    const table = document.getElementById('modal-details-table');
    if (!table) return;

    const content = table.closest('.modal-content');
    const box = table.closest('.lined-table-box');
    const pagination = document.getElementById('modal-pagination');
    const resetBtn = content.querySelector('.modal-sort-reset');
    const perPage = parseInt(table.dataset.perPage) || 6;
    const defaultRows = Array.from(table.children);
    let rows = defaultRows;
    let page = 1;

    function render() {
        rows.forEach((row, i) => {
            table.appendChild(row);
            row.style.display = (i >= (page - 1) * perPage && i < page * perPage) ? '' : 'none';
        });

        if (!box.style.minHeight && rows.length > perPage) box.style.minHeight = (box.offsetHeight + 10) + 'px';

        if (!pagination) return;

        const totalPages = Math.ceil(rows.length / perPage);
        pagination.innerHTML = `
            <button ${page === 1 ? 'disabled' : ''} id="mp-prev"><i class="fa-solid fa-angle-left"></i></button>
            <div class="paginate-pages"><b>Стр.</b> ${page} из ${totalPages}</div>
            <button ${page === totalPages ? 'disabled' : ''} id="mp-next"><i class="fa-solid fa-angle-right"></i></button>
        `;

        document.getElementById('mp-prev').addEventListener('click', () => { page--; render(); });
        document.getElementById('mp-next').addEventListener('click', () => { page++; render(); });
    }

    function resetSort() {
        content.querySelectorAll('.tab-filter').forEach(f => f.classList.remove('dt-ordering-asc', 'dt-ordering-desc'));
        rows = defaultRows;
        page = 1;
        render();
    }

    content.querySelectorAll('.tab-filter').forEach(filter => {
        filter.addEventListener('click', function() {
            const th = this.closest('th');
            const col = Array.from(th.parentNode.children).indexOf(th);
            const state = this.classList.contains('dt-ordering-asc') ? 'asc' : this.classList.contains('dt-ordering-desc') ? 'desc' : '';

            if (state === 'desc') { resetSort(); return; }

            content.querySelectorAll('.tab-filter').forEach(f => f.classList.remove('dt-ordering-asc', 'dt-ordering-desc'));
            const asc = state === '';
            this.classList.add(asc ? 'dt-ordering-asc' : 'dt-ordering-desc');

            rows = defaultRows.slice().sort((a, b) => {
                const ta = a.children[col].dataset.sort || a.children[col].textContent.trim();
                const tb = b.children[col].dataset.sort || b.children[col].textContent.trim();
                const na = Number(ta.replace(/,/g, ''));
                const nb = Number(tb.replace(/,/g, ''));
                const cmp = (!isNaN(na) && !isNaN(nb)) ? na - nb : ta.localeCompare(tb, 'ru');
                return cmp * (asc ? 1 : -1);
            });

            page = 1;
            render();
        });
    });

    if (resetBtn) resetBtn.addEventListener('click', resetSort);

    render();
}

////// УДАЛЕНИЕ блока
let deleteId = null;

function openDeleteModal(id) {
    deleteId = id;
    openModal('delete-modal-content');
}

function confirmDelete() {
    openModal('delete-done-content');
}

function closeDeleteAndRemoveRow() {
    const row = document.querySelector(`tr[data-id="${deleteId}"]`);
    if (row) { row.remove(); rows.splice(rows.indexOf(row), 1); visibleRows = visibleRows.filter(r => r !== row); render(); }
    deleteId = null;
    closeModal();
}
////// END УДАЛЕНИЕ блока

</script>

<script>
    ////// меню в блоке статы для мобильного
document.addEventListener('click', function(e){
    var menuBtn = e.target.closest('[data-stata-menu]');
    var pop = menuBtn ? menuBtn.nextElementSibling : null;

    document.querySelectorAll('.stata-pop.show').forEach(function(p){
        if (p !== pop) p.classList.remove('show');
    });
    if (pop) { pop.classList.toggle('show'); return; }

    var lt = e.target.closest('[data-links-toggle]');
    if (lt) lt.closest('tr').classList.toggle('links-open');
});
</script>

<script>
    ////// Сворачивание формы создания ссылки
const qsWrap = document.querySelector('.create-link__main');
const qsInput = qsWrap.querySelector('.create-link__main-mini input');

function qsOpen() {
    qsWrap.dataset.state = 'full';
    const fullInput = qsWrap.querySelector('.create-link__wrapper [data-remote] .select-trigger');
    if (fullInput && qsInput.value) fullInput.value = qsInput.value;
    setTimeout(() => fullInput && fullInput.focus(), 50);
}

qsInput.addEventListener('focus', qsOpen);
qsWrap.querySelector('.create-link__main-mini .btn').addEventListener('click', qsOpen);
qsWrap.querySelector('.create-link-head .btn').addEventListener('click', () => { qsWrap.dataset.state = 'compact'; });
</script>

<script>
    /// открытие блоков в окне "как разместить?"
function toggleLinkRules(event) {
    event.preventDefault();
    const toggle = event.target.closest('.link-rules__toggle');
    const block = toggle.closest('.link-rules__open-block');
    
    block.classList.toggle('open');
}
////// Модалка «Как разместить»: площадки и копирование текстов
document.addEventListener('click', function(e) {
    const chip = e.target.closest('.place-platform');
    if (chip) {
        chip.closest('.place-platforms').querySelectorAll('.place-platform').forEach(c => c.classList.remove('is-active'));
        chip.classList.add('is-active');
        chip.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        document.getElementById('place-platform-name').textContent = chip.dataset.name;
        document.getElementById('place-platform-text').textContent = chip.dataset.text;
        return;
    }

    const copyBtn = e.target.closest('[data-copy-text]');
    if (copyBtn) {
        navigator.clipboard.writeText(copyBtn.closest('.place-snippet').querySelector('p').textContent.trim()).then(() => {
            copyBtn.textContent = 'Скопировано';
            setTimeout(() => { copyBtn.textContent = 'Копировать'; }, 1000);
        });
    }
});
</script>



@endpush