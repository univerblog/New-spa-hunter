<div class="modal-wrapper" id="doc-backdrop">
    <div class="modal-window doc-modal-window">
        <div class="doc-bar">
            <button type="button" class="btn min" data-doc-pdf><i class="fa-regular fa-download"></i>Скачать PDF</button>
            <div class="close" data-doc-close><i class="fa-regular fa-xmark"></i></div>
        </div>
        <div class="doc-page" data-doc-page>
            {{-- JS вставит документ --}}
        </div>
    </div>
</div>

@push('scripts')
<script>
(function(){
    var backdrop = document.getElementById('doc-backdrop');
    if (!backdrop) return;
    var page = backdrop.querySelector('[data-doc-page]');

    function openDoc(doc){
        var rows = (doc.rows || []).map(function(r){
            return '<tr><th>' + r[0] + '</th><td>' + r[1] + '</td></tr>';
        }).join('');
        page.innerHTML =
            '<div class="doc-brand"><span class="doc-m">CPA</span>Hunter</div>' +
            '<h1>' + doc.title + '</h1>' +
            (doc.sub  ? '<div class="doc-muted">' + doc.sub + '</div>' : '') +
            '<table>' + rows + '</table>' +
            (doc.foot ? '<div class="doc-foot">' + doc.foot + '</div>' : '');

        backdrop.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeDoc(){
        backdrop.classList.remove('open');
        document.body.style.overflow = '';
        page.innerHTML = '';
    }

    // открыть по клику на [data-doc]
    document.addEventListener('click', function(e){
        var btn = e.target.closest('[data-doc]');
        if (btn) { try { openDoc(JSON.parse(btn.dataset.doc)); } catch(err){} return; }

        // закрыть: крестик или клик по фону
        if (e.target.closest('[data-doc-close]') || e.target === backdrop) closeDoc();
    });

    // Escape
    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' && backdrop.classList.contains('open')) closeDoc();
    });
})();

// Скачать PDF → печать (юзер сохраняет в PDF через диалог печати)
document.addEventListener('click', function(e){
    if (!e.target.closest('[data-doc-pdf]')) return;
    document.body.classList.add('doc-printing');
    window.print();
    setTimeout(function(){ document.body.classList.remove('doc-printing'); }, 700);
});
</script>
@endpush