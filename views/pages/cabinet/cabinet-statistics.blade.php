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

<section class="section">
    <div class="container full">

        <div class="stata-setting-block">
            <div class="stata-setting-item">
                <div class="input-group input__min">
                    <select id="select_tags" style="width:calc(100% + 20px);">
                        <option value="all">All tags ({{ count($stata) }})</option>
                        @foreach($tags as $tag => $count)
                            <option value="{{ $tag }}">{{ $tag }} ({{ $count }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input__min">
                    <select id="select_folder" style="width:calc(100% + 20px);">
                        <option value="all">All folder ({{ count($stata) }})</option>
                        @foreach($folders as $folder => $count)
                            <option value="{{ $folder }}">{{ $folder }} ({{ $count }})</option>
                        @endforeach
                    </select>
                </div>
                <!--
                <div class="input-group input__min" style="display:none">
                    <button class="btn-min-solid yellow folders-btn" onclick="openFolders(this);">
                        <i class="fa-solid fa-folder-arrow-right"></i> 
                        Select folder
                        <i class="fa-solid fa-caret-down"></i>
                    </button>
                </div>
                -->
            </div>
            <div class="stata-setting-item entries">
                Showing 1 to 20 of 100 entries
            </div>
            <div class="stata-setting-item">
                <div class="input-group input__min">
                    <select id="select_length_table" style="width:80px;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="80">80</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="input-group input__min">
                    <div class="input-horisontal-group">
                        <input type="text" name="" value="" placeholder="Search" maxlength="150">
                    </div>
                </div>
            </div>
        </div>

    

        <div class="scroll-icon for-mobile" style="margin-bottom:20px;">
            <i class="fa-light fa-arrow-left"></i>
            <i class="fa-light fa-hand-back-point-up fa-rotate-180"></i>
            <i class="fa-light fa-arrow-right"></i>
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
                            <td>
                                <div class="table-flex merch">
                                    <a href="#" onclick="loadMerchantData('{{ $link['merchant_key'] }}'); event.preventDefault();">
                                        {{ $link['merchant__name'] }} <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div class="table-flex"><a href="{{ $link['product_url'] }}" target="_blank">{{ $link['product_url'] }}</a></div>
                            </td>

                            <td>
                                <div class="table-flex copy">
                                    <a href="{{ $link['short_url'] }}" target="_blank">{{ $link['short_url'] }}</a>
                                    <button type="button" onclick="copyUrl(this, '{{ $link['short_url'] }}')"><i class="fa-solid fa-copy"></i></button>
                                </div>
                            </td>

                            <td class="center">
                                <div class="table-flex tags"><span>{{ $link['tag'] ?: '-' }}</span></div>
                            </td>

                            <td>
                                <div class="table-flex folder">
                                    <i class="fa-solid fa-folder-open"></i> <span>{{ $link['folder'] ?: '-' }}</span>
                                </div>
                            </td>

                            <td class="center note">
                                @if($link['note'])
                                    <span onclick="openNoteModal('{{ $link['id'] }}', this.textContent.trim())">{{ $link['note'] }}</span>
                                @else
                                    <button type="button" onclick="openNoteModal('{{ $link['id'] }}', '')"><i class="fa-solid fa-plus" style="font-size:10px;"></i> note</button>
                                @endif
                            </td>
                            <td class="data-created">{{ $link['created_at'] }}</td>
                            <td class="center clicks-count">
                                @if($link['clicks_count'] != 0)
                                    <button type="button" onclick="openDetailsModal('{{ $link['id'] }}', 'clicks')">{{ $link['clicks_count'] }}</button>
                                @else
                                    0
                                @endif
                            </td>
                            <td class="center purchases-count">
                                @if($link['purchases_count'] != 0)
                                    <button type="button" onclick="openDetailsModal('{{ $link['id'] }}', 'purchases')">{{ $link['purchases_count'] }}</button>
                                @else
                                    0
                                @endif
                            </td>
                            <td class="center">16.22%</td>
                            <td class="center pending-count">
                                {{-- @if($link['total_reward'] != 0)
                                    <button type="button">${{ $link['total_reward'] }}</button>
                                @else
                                    $0
                                @endif --}}
                                ${{ $link['total_reward'] }}
                            </td>
                            <td class="center">${{ $link['total_reward'] }}</td>
                            <td class="center">${{ $link['total_reward'] }}</td>
                            <td class="center trash">
                                <button type="button" onclick="openDeleteModal('{{ $link['id'] }}')"><i class="fa-solid fa-trash-can"></i></button>
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

        <div class="scroll-icon for-mobile" style="margin-top:20px;">
            <i class="fa-light fa-arrow-left"></i>
            <i class="fa-light fa-hand-back-point-up"></i>
            <i class="fa-light fa-arrow-right"></i>
        </div>

        <div class="pagination for-desktop" id="pagination"></div>

        <div class="mini-pagination for-mobile" id="mini-pagination">
            <button onclick="showPage(1)"><i class="fa-solid fa-angles-left"></i></button>
            <button onclick="showPage(currentPage - 1)"><i class="fa-solid fa-angle-left"></i></button>
            <div class="paginate-pages"><b>Page</b> <span id="mini-current">1</span> of <span id="mini-total">1</span></div>
            <button onclick="showPage(currentPage + 1)"><i class="fa-solid fa-angle-right"></i></button>
            <button onclick="showPage(totalPages)"><i class="fa-solid fa-angles-right"></i></button>
        </div>
           
    </div>  
</section>



<div id="note-modal-content" style="display:none;">
    <h3>Add note</h3>
    <div class="container-modal">
        <div class="input-group">
            <textarea id="note-textarea" rows="5" placeholder="Write a note..."></textarea>
        </div>
        <div class="btn-group">
            <button type="button" class="btn-solid gray" onclick="closeModal()">Cancel</button>
            <button type="button" class="btn-solid" onclick="saveNote()">Save</button>
        </div>
    </div>
</div>

<div id="merchant-loading-content" style="display:none;">
    Loading...
</div>

<div id="delete-modal-content" style="display:none;">
    <h3><i class="fa-solid fa-trash-can" style="color:#ff0000;"></i> Delete link</h3>
    <div class="container-modal">
        <p style="text-align:center;">Are you sure? This action cannot be undone and the link will be permanently deleted.</p>
        <div class="btn-group">
            <button type="button" class="btn-solid gray" onclick="closeModal()">Cancel</button>
            <button type="button" class="btn-solid red" onclick="confirmDelete()">Delete</button>
        </div>
    </div>
</div>


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
///////// ЭТО скрипт пагинации, потом свое сделаешь  
const selectLength = document.getElementById('select_length_table');

let perPage = parseInt(selectLength.value) || 10;
let currentPage = 1;

selectLength.addEventListener('change', function() {
    perPage = parseInt(this.value);
    currentPage = 1;
    showPage(1);
});

const table = document.getElementById('for-paginate-only');
const rows = Array.from(table.querySelectorAll('tbody tr'));
//const totalPages = Math.ceil(filteredRows.length / perPage);


function showPage(page) {
    currentPage = page;
    const start = (page - 1) * perPage;
    const end = start + perPage;

    const filteredRows = rows.filter(row => 
        row.dataset.filtered !== 'false' && 
        row.dataset.tagFiltered !== 'false'
    );

    filteredRows.forEach((row, index) => {
        row.style.display = (index >= start && index < end) ? '' : 'none';
    });

    rows.forEach(row => {
        if (row.dataset.filtered === 'false' || row.dataset.tagFiltered === 'false') {
            row.style.display = 'none';
        }
    });
    //// Total
    // Page totals
    let pageClicks = 0, pagePurchases = 0, pageReward = 0;
    filteredRows.forEach((row, index) => {
        if (index >= start && index < end) {
            pageClicks += parseInt(row.querySelector('.clicks-count')?.textContent) || 0;
            pagePurchases += parseInt(row.querySelector('.purchases-count')?.textContent) || 0;
            pageReward += parseFloat(row.querySelector('.pending-count')?.textContent.replace('$', '')) || 0;
        }
    });
    document.getElementById('page-clicks').textContent = pageClicks;
    document.getElementById('page-purchases').textContent = pagePurchases;
    document.getElementById('page-reward').textContent = '$' + pageReward.toFixed(2);
    //// end Total

    renderPagination();

}

function renderPagination() {
    const filteredRows = rows.filter(row => 
        row.dataset.filtered !== 'false' && 
        row.dataset.tagFiltered !== 'false'
    );
    const totalPages = Math.ceil(filteredRows.length / perPage);
    const pagination = document.getElementById('pagination');
    let html = '';

    html += `<button onclick="showPage(1)" ${currentPage === 1 ? 'disabled' : ''}><i class="fa-solid fa-angles-left"></i></button>`;
    html += `<button onclick="showPage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}><i class="fa-solid fa-angle-left"></i></button>`;

    for (let i = 1; i <= totalPages; i++) {
        html += `<span onclick="showPage(${i})" class="${i === currentPage ? 'active' : ''}">${i}</span>`;
    }

    html += `<button onclick="showPage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}><i class="fa-solid fa-angle-right"></i></button>`;
    html += `<button onclick="showPage(${totalPages})" ${currentPage === totalPages ? 'disabled' : ''}><i class="fa-solid fa-angles-right"></i></button>`;

    pagination.innerHTML = html;
    /// Mini pagination
    const miniEl = document.getElementById('mini-pagination');
    const miniButtons = miniEl.querySelectorAll('button');
    document.getElementById('mini-current').textContent = currentPage;
    document.getElementById('mini-total').textContent = totalPages;

    miniButtons[0].disabled = currentPage === 1;
    miniButtons[0].onclick = () => showPage(1);
    miniButtons[1].disabled = currentPage === 1;
    miniButtons[1].onclick = () => showPage(currentPage - 1);
    miniButtons[2].disabled = currentPage === totalPages;
    miniButtons[2].onclick = () => showPage(currentPage + 1);
    miniButtons[3].disabled = currentPage === totalPages;
    miniButtons[3].onclick = () => showPage(totalPages);
    /// End Mini pagination
}
showPage(1);
</script>


<script>
/// Отображение данных мерча в окне при клике на него   
function loadMerchantData(merchantKey) {
    openModal('merchant-loading-content', {
        className: 'modal-wide',
        onOpen: (content) => {
            content.innerHTML = 'Loading...';
            fetch('/views/data/api/merchant-info.php?key=' + merchantKey)
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

/////////  ЭТО скрипт выбора напки из folders
document.querySelectorAll('.folder-item').forEach(item => {
    item.addEventListener('click', function() {
        document.querySelectorAll('.folder-item').forEach(f => f.classList.remove('active'));
        this.classList.add('active');

        const folder = this.dataset.folder;

        rows.forEach(row => {
            const rowFolder = row.querySelector('.folder')?.textContent.trim() || '-';
            if (folder === 'all' || rowFolder === folder || (folder === 'No folder' && rowFolder === '-')) {
                row.dataset.filtered = 'true';
            } else {
                row.dataset.filtered = 'false';
            }
        });

        currentPage = 1;
        showPage(1);
    });
});  
////////// может удалим Открытие папок folders ----------------------------


////// Сортировка по папкам через select
document.getElementById('select_folder').addEventListener('change', function() {
    const folder = this.value;

    document.querySelectorAll('.folder-item').forEach(f => {
        f.classList.toggle('active', f.dataset.folder === folder);
    });

    rows.forEach(row => {
        if (folder === 'all') {
            delete row.dataset.filtered;
        } else {
            const rowFolder = row.querySelector('.folder')?.textContent.trim() || '-';
            if (rowFolder === folder || (folder === 'No folder' && rowFolder === '-')) {
                row.dataset.filtered = 'true';
            } else {
                row.dataset.filtered = 'false';
            }
        }
    });

    currentPage = 1;
    showPage(1);
});

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
    const isEdit = text.length > 0;
    openModal('note-modal-content', {
        onOpen: (content) => {
            content.querySelector('h3').innerHTML = isEdit ? 
            'Edit note' : 
            'Add note';
            const textarea = content.querySelector('#note-textarea');
            textarea.value = text;
            textarea.focus();
        }
    });
}

function saveNote() {
    const text = document.querySelector('.modal-content #note-textarea').value.trim();

    fetch('/views/data/api/save-note.php', {
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
            // Обновляем ячейку в таблице
            const row = document.querySelector(`tr[data-id="${currentNoteId}"]`);
            const noteCell = row.querySelector('.note');

            if (text) {
                noteCell.innerHTML = `<span onclick="openNoteModal('${currentNoteId}', this.textContent.trim())">${text}</span>`;
            } else {
                noteCell.innerHTML = `<button type="button" onclick="openNoteModal('${currentNoteId}', '')"><i class="fa-solid fa-plus" style="font-size:10px;"></i> note</button>`;
            }

            closeModal();
        } else {
            alert(data.error || 'Error saving note');
        }
    })
    .catch(() => {
        alert('Error saving note');
    });
}
/////// END замены текста в поле note

//// Открытие модалок для clics и далее
function openDetailsModal(id, type) {
    openModal('merchant-loading-content', {
        className: 'long',
        onOpen: (content) => {
            content.innerHTML = 'Loading...';
            fetch('/views/data/api/link-details.php?id=' + id + '&type=' + type)
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

////// Пагинация для модалки
function initModalPagination() {
    const table = document.getElementById('modal-details-table');
    const pagination = document.getElementById('modal-pagination');
    if (!table || !pagination) return;

    const rows = Array.from(table.children);
    const perPage = 10;
    let page = 1;

    function render() {
        const totalPages = Math.ceil(rows.length / perPage);
        const start = (page - 1) * perPage;
        const end = start + perPage;

        rows.forEach((row, i) => {
            row.style.display = (i >= start && i < end) ? '' : 'none';
        });

        const prevDisabled = page === 1 ? 'disabled' : '';
        const nextDisabled = page === totalPages ? 'disabled' : '';

        pagination.innerHTML = `
            <button ${prevDisabled} id="mp-prev"><i class="fa-solid fa-angle-left"></i></button>
            <div class="paginate-pages"><b>Page</b> ${page} of ${totalPages}</div>
            <button ${nextDisabled} id="mp-next"><i class="fa-solid fa-angle-right"></i></button>
        `;

        document.getElementById('mp-prev').addEventListener('click', () => { page--; render(); });
        document.getElementById('mp-next').addEventListener('click', () => { page++; render(); });
    }

    render();
}

////// Фильтр select по тегам
document.getElementById('select_tags').addEventListener('change', function() {
    const tag = this.value;

    rows.forEach(row => {
        if (tag === 'all') {
            delete row.dataset.tagFiltered;
        } else {
            const rowTag = row.querySelector('.tags span')?.textContent.trim() || '-';
            if (rowTag === tag || (tag === 'No tag' && rowTag === '-')) {
                row.dataset.tagFiltered = 'true';
            } else {
                row.dataset.tagFiltered = 'false';
            }
        }
    });

    currentPage = 1;
    showPage(1);
});


////// УДАЛЕНИЕ блока
let deleteId = null;

function openDeleteModal(id) {
    deleteId = id;
    openModal('delete-modal-content');
}

function confirmDelete() {
    const content = document.querySelector('.modal-content');
    content.innerHTML = `
        <div class="container-modal-сonfirm">
           <i class="fa-solid fa-check"></i>
           <p style="text-align:center;">Link has been successfully deleted</p>
           <div class="btn-group">
                <button type="button" class="btn-solid" onclick="closeDeleteAndRemoveRow()">OK</button>
            </div>
        </div>
    `;
}

function closeDeleteAndRemoveRow() {
    const row = document.querySelector(`tr[data-id="${deleteId}"]`);
    if (row) row.remove();
    deleteId = null;
    closeModal();
}
////// END УДАЛЕНИЕ блока

</script>






@endpush