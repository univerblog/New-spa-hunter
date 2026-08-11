const navToggle = document.querySelector('.nav-toggle');
const topMenu = document.querySelector('.top-menu');
navToggle.addEventListener('click', function () {
    this.classList.toggle('active');
    topMenu.classList.toggle('show');
});

/* ============ THEME TOGGLE ============ */
(function(){
  var html = document.documentElement;
  var KEY = 'cpah-theme';

  function apply(t){
    if (t === 'light') html.setAttribute('data-theme','light');
    else html.removeAttribute('data-theme');
  }
  function toggle(){
    var next = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    apply(next);
    try { localStorage.setItem(KEY, next); } catch(e){}
  }
  function bind(){
    document.querySelectorAll('.theme-toggle').forEach(function(b){
      b.addEventListener('click', toggle);
    });
  }
  document.readyState === 'loading'
    ? document.addEventListener('DOMContentLoaded', bind)
    : bind();
})();

//// Закрываем мобильное меню при клике по якорям
document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.top-menu-list a');
    
    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth >= 1200) {return;}
            const href = this.getAttribute('href');
            
            if (!href || href === '#') {return;}
            
            if (href.startsWith('#')) {
                setTimeout(() => {
                    topMenu.classList.remove('show');
                    navToggle.classList.remove('active');
                }, 300);
            }
            // Если обычная ссылка - браузер сам перейдёт по ней
        });
    });
});

/// Блоки с функцией открытия
document.addEventListener('click', (e) => {
    const btn = e.target.closest('.dropdown-btn');
    const block = btn?.closest('.dropdown-block');

    // клик по кнопке — тогл текущего, закрыть остальные
    if (block) {
        document.querySelectorAll('.dropdown-block.is-open').forEach(el => {
            if (el !== block) el.classList.remove('is-open');
        });
        block.classList.toggle('is-open');
        return;
    }

    // клик вне дропдауна — закрыть всё, кроме того, внутри которого кликнули
    const inside = e.target.closest('.dropdown-block');
    document.querySelectorAll('.dropdown-block.is-open').forEach(el => {
        if (el !== inside) el.classList.remove('is-open');
    });
});

// Escape — закрыть все
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.querySelectorAll('.dropdown-block.is-open')
            .forEach(el => el.classList.remove('is-open'));
    }
});

// TABS
 function switchTab(i) {
    document.querySelectorAll('.tab-btn').forEach((b, idx) => b.classList.toggle('active', idx === i));
    document.querySelectorAll('.tab-panel').forEach((p, idx) => p.classList.toggle('active', idx === i));
 }



// =============================================
// ACCORDION
// =============================================

const ACCORDION_TYPES = {
    'mob-menu': {
        breakpoint: 1200,
        item:    '.nav-dropdown',
        trigger: 'button',
        content: '.nav-dropdown-menu',
        openByDefault: '.start-open',
    },

    'foot-accordion': {
        breakpoint: 840,
        item:    '.foot-nav-block',
        trigger: '.foot-tit',
        content: '.ul-wrap',
        openByDefault: '.start-open',
    },

    'faq': {
        item:    '.accordion-item',
        trigger: '.acc-title',
        content: '.acc-content',
        openFirst: true,
        icon: {
            rotate: 180, 
            closed: 'fa-plus',
            opened: 'fa-minus',
        },
    },
    'shops': {
        item:    '.shop-row',
        trigger: '.shop-btn',
        content: '.shop-details',
        
    },
};

// Дефолты — применяются если в типе не указано
const ACCORDION_DEFAULTS = {
    breakpoint:    null,    // null = работает всегда
    openClass:     'is-open',
    single:        false,   // закрывать соседей при открытии
    openFirst:     false,
    openByDefault: null,
    icon:          null,
};

// --- Ядро ---

function accordionInit(rootSelector, userConfig) {
    const cfg = { ...ACCORDION_DEFAULTS, ...userConfig };
    const roots = document.querySelectorAll(rootSelector);

    roots.forEach(root => {
        const openFirst = root.dataset.openFirst === 'false' ? false : cfg.openFirst;
        const isActive = () => !cfg.breakpoint || window.innerWidth < cfg.breakpoint;

        const items = root.querySelectorAll(cfg.item);

        items.forEach(item => {
            const trigger = item.querySelector(cfg.trigger);
            const content = item.querySelector(cfg.content);
            if (!trigger || !content) return;

            const shouldBeOpen =
                (cfg.openByDefault && item.querySelector(cfg.openByDefault)) ||
                (openFirst && item === items[0]);

            if (shouldBeOpen && isActive()) {
                accordionOpen(item, content, cfg);
            }

            trigger.addEventListener('click', e => {
                if (!isActive()) return;

                const link = e.target.closest('a');
                if (link && link.getAttribute('href') && link.getAttribute('href') !== '#') return;

                e.preventDefault();
                e.stopPropagation();

                const isOpen = item.classList.contains(cfg.openClass);

                if (cfg.single) {
                    items.forEach(other => {
                        if (other !== item) {
                            const otherContent = other.querySelector(cfg.content);
                            if (otherContent) accordionClose(other, otherContent, cfg);
                        }
                    });
                }

                isOpen
                    ? accordionClose(item, content, cfg)
                    : accordionOpen(item, content, cfg);
            });
        });

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                items.forEach(item => {
                    const content = item.querySelector(cfg.content);
                    if (!content) return;

                    if (!isActive()) {
                        content.style.maxHeight = null;
                        item.classList.remove(cfg.openClass);
                        return;
                    }

                    if (item.classList.contains(cfg.openClass)) {
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            }, 150);
        });
    });
}

function accordionOpen(item, content, cfg) {
    item.classList.add(cfg.openClass);
    content.style.maxHeight = content.scrollHeight + 'px';

    if (cfg.icon) accordionSwapIcon(item, cfg.icon, true);
}

function accordionClose(item, content, cfg) {
    item.classList.remove(cfg.openClass);
    content.style.maxHeight = null;

    if (cfg.icon) accordionSwapIcon(item, cfg.icon, false);
}

function accordionSwapIcon(item, icon, isOpening) {
    if (!icon.closed || !icon.opened) return;

    const iconEl = item.querySelector('i, svg');
    if (!iconEl) return;

    if (isOpening) {
        iconEl.classList.remove(icon.closed);
        iconEl.classList.add(icon.opened);
    } else {
        iconEl.classList.remove(icon.opened);
        iconEl.classList.add(icon.closed);
    }
}

// --- Инициализация всех типов ---

document.addEventListener('DOMContentLoaded', () => {
    Object.entries(ACCORDION_TYPES).forEach(([dataKey, config]) => {
        accordionInit(`[data-${dataKey}]`, config);
    });
});


/* ============ UNIVERSAL SELECT ============ */
(function(){
  var current = null;          // селект, открытый прямо сейчас
  var lastNav = 0;             // метка времени для троттлинга стрелок
  var downX = 0, downY = 0;    // старт касания (тап vs скролл)

  /* Закрыть открытый селект: снять .open и подсветку, увести фокус */
  function close(){
    if(!current) return;
    var root = current;
    current = null;
    root.classList.remove('open');
    root.querySelectorAll('.select-option.active').forEach(function(o){ o.classList.remove('active'); });
    var f = root.querySelector('input, textarea');
    if(f) f.blur();
  }

  /* Открыть селект (предварительно закрыв прежний) */
  function open(root){
    if(current && current !== root) close();
    root.classList.add('open');
    current = root;
  }

  /* Совпадение по началу слова: режем текст на слова и ищем префикс */
  function wordStarts(text, q){
    var words = text.toLowerCase().split(/\s+/);
    for(var i = 0; i < words.length; i++){
      if(words[i].indexOf(q) === 0) return true;
    }
    return false;
  }

  /* Инициализация одного селекта: тип триггера, фильтр, выбор, обработчики */
  function init(root){
    if(root.dataset.selectReady) return;      // защита от повторной инициализации
    root.dataset.selectReady = '1';

    var trigger = root.querySelector('.select-trigger');
    if(!trigger) return;

    var field = trigger.matches('input, textarea')      // поле: сам триггер-инпут…
              ? trigger
              : trigger.querySelector('input, textarea'); // …либо инпут внутри обёртки
    var remote = root.hasAttribute('data-remote');

    // статичные части панели — кэшируем один раз (пункты внутри списка читаем живьём)
    var list        = root.querySelector('.select-list');
    var addBtn      = root.querySelector('.select-add');
    var hintEl      = root.querySelector('.select-hint');
    var emptyEl     = root.querySelector('.select-empty');
    var valueEl     = root.querySelector('.select-value');
    var searchInput = root.querySelector('.select-search input');
    var closeTimer;

    /* Фильтр списка по вводу: прячем неподходящие, рулим add/hint/empty (один проход) */
    function filter(raw){
      var q  = (raw || '').trim();
      var ql = q.toLowerCase();
      if(!ql && !addBtn && !hintEl && list && !list.querySelector('.select-option[hidden]')) return;
      var opts = list ? list.querySelectorAll('.select-option') : [];
      var total = opts.length, listVisible = 0, exact = false;

      opts.forEach(function(opt){
        var txt  = opt.textContent;
        var dv   = (opt.getAttribute('data-value') || '').toLowerCase();
        var show = !ql || wordStarts(txt, ql) || dv.indexOf(ql) === 0 || dv.replace('+', '').indexOf(ql.replace('+', '')) === 0;   // совпадение по тексту, по домену или по коду без +
        opt.hidden = !show;
        if(show) listVisible++;
        if(txt.trim().toLowerCase() === ql) exact = true;
      });

      if(addBtn){
        var showAdd = !!q && !exact;                 // есть ввод И нет точного совпадения
        addBtn.hidden = !showAdd;
        var term = addBtn.querySelector('.select-add-term');
        if(showAdd && term) term.textContent = q;
      }
      if(hintEl)  hintEl.hidden  = total > 0;                              // список пуст → подсказка видна
      if(emptyEl) emptyEl.hidden = !(q && listVisible === 0 && total > 0); // пункты есть, но ввод не нашёл
    }

    /* Выбор пункта (или создание нового через «Добавить») */
    function choose(opt){
      var isAdd = opt.classList.contains('select-add');
      var label, value, nameEl = null;

      if(isAdd){
        label = value = (field && field.value || '').trim();
        if(!label) return;
        var b = document.createElement('button');    // материализуем новый пункт в списке
        b.type = 'button';
        b.className = 'select-option';
        b.setAttribute('data-value', value);
        b.textContent = label;
        list.appendChild(b);
        opt = b;                                      // дальше — как обычный пункт
      } else {
        nameEl = opt.querySelector('.select-option-name, .select-option-txt');
        label = (nameEl || opt).textContent.trim();
        value = opt.getAttribute('data-value');
      }

      if(valueEl){
        if(nameEl) valueEl.innerHTML  = nameEl.innerHTML;   // обёртка есть → переносим разметку (с <b>)
        else       valueEl.textContent = label;             // как было
      }
      if(field)   field.value = remote ? value : label;   // ссылка → домен, остальное → подпись

      if(!remote){                                         // у remote галочку не ставим
        root.querySelectorAll('.select-option').forEach(function(o){ o.classList.remove('is-selected'); });
        opt.classList.add('is-selected');
      }

      root.dispatchEvent(new CustomEvent('select:change', {
        detail: { value: value, label: label, option: opt, added: isAdd }, bubbles: true
      }));

      clearTimeout(closeTimer);
      if(!remote && !isAdd){
        closeTimer = setTimeout(function(){ if(current === root) close(); }, 340);  // дать увидеть галочку
      } else {
        close();   // add и remote — сразу, иначе новый пункт «прыгает»
      }
    }

    /* --- открытие + ввод по типу триггера --- */
    if(field){
      if(!remote){
        // папка/тег: открываем по фокусу
        field.addEventListener('focus', function(){
          open(root);
          var sel = root.querySelector('.select-option.is-selected');
          var selLabel = '';
          if(sel){
            var n = sel.querySelector('.select-option-name');
            selLabel = (n ? n.textContent : sel.textContent).trim();
          }
          var committed = sel && selLabel === field.value.trim();   // в поле — выбранное?
          filter(committed ? '' : field.value);                     // выбранное → всё; черновик → фильтр
          if(!matchMedia('(pointer: coarse)').matches) field.select(); // выделять текст только на ПК
        });
        field.addEventListener('input', function(){
          if(field.value.trim() === ''){                            // стёр всё → сбросить выбор
            root.querySelectorAll('.select-option').forEach(function(o){ o.classList.remove('is-selected'); });
            root.dispatchEvent(new CustomEvent('select:change', {
              detail: { value: '', label: '', option: null, cleared: true }, bubbles: true
            }));
          }
          filter(field.value);
        });
      } else {
        // ссылка: панель только при вводе/возврате с текстом, не на пустой фокус
        field.addEventListener('focus', function(){
          var q = field.value.trim();
          if(!q) return;
          filter(q);
          if(root.querySelector('.select-list .select-option:not([hidden])')) open(root);
        });
        field.addEventListener('input', function(){
          var q = field.value.trim();
          if(!q){ close(); return; }
          filter(q);
          root.querySelector('.select-list .select-option:not([hidden])') ? open(root) : close();
        });
      }
      field.addEventListener('blur', function(){ close(); });
      } else {
          // кнопка-триггер: тоггл
          trigger.addEventListener('click', function(){
              if(root.classList.contains('open')){ close(); }
              else {
                open(root);
                if(searchInput) searchInput.value = '';
                filter('');
                if(searchInput && !matchMedia('(pointer: coarse)').matches) searchInput.focus();
              }
          });
        }
    if(searchInput){
      searchInput.addEventListener('input', function(){ filter(searchInput.value); });
    }

    // тап по пункту не должен блюрить поле раньше клика
    root.addEventListener('mousedown', function(e){
      if(e.target.closest('.select-option')) e.preventDefault();
    });

    // выбор пункта (делегирование — ловит и впрыснутые JS-ом)
    root.addEventListener('click', function(e){
      var opt = e.target.closest('.select-option');
      if(!opt || !root.contains(opt) || opt.hidden) return;
      choose(opt);
    });
  }

  /* Видимые пункты списка (для навигации стрелками) */
  function visibleOpts(root){
    return Array.prototype.slice.call(root.querySelectorAll('.select-list .select-option'))
                .filter(function(o){ return !o.hidden; });
  }

  /* Сдвиг подсветки .active по списку с зацикливанием */
  function move(root, dir){
    var opts = visibleOpts(root);
    if(!opts.length) return;
    var cur = root.querySelector('.select-list .select-option.active');
    var i = opts.indexOf(cur);
    i = (i === -1) ? (dir > 0 ? 0 : opts.length - 1) : i + dir;
    if(i < 0) i = opts.length - 1;
    if(i >= opts.length) i = 0;
    root.querySelectorAll('.select-option.active').forEach(function(o){ o.classList.remove('active'); });
    opts[i].classList.add('active');
    opts[i].scrollIntoView({ block: 'nearest' });
  }

  /* Клавиатура (только при открытой панели): ↑↓ — навигация (троттл), Enter — выбрать, Esc — закрыть */
  document.addEventListener('keydown', function(e){
    if(!current) return;
    var root = current;
    if(e.key === 'ArrowDown' || e.key === 'ArrowUp'){
      e.preventDefault();
      var now = Date.now();
      if(e.repeat && now - lastNav < 120) return;   // зажатие — не чаще раза в 120мс
      lastNav = now;
      move(root, e.key === 'ArrowDown' ? 1 : -1);
    }
    else if(e.key === 'Enter'){
      var a = root.querySelector('.select-list .select-option.active');
      if(a){ e.preventDefault(); a.click(); }        // выбрать подсвеченный (через choose)
    }
    else if(e.key === 'Escape'){ e.preventDefault(); close(); }
  });

  /* Закрытие по тапу вне (отличаем тап от скролла по сдвигу пальца) */
  document.addEventListener('pointerdown', function(e){ downX = e.clientX; downY = e.clientY; });
  document.addEventListener('pointerup', function(e){
    if(!current) return;
    var moved = Math.abs(e.clientX - downX) > 10 || Math.abs(e.clientY - downY) > 10;
    if(!moved && !current.contains(e.target)) close();
  });

  function boot(){ document.querySelectorAll('[data-select]').forEach(init); }
  document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', boot) : boot();
  window.initSelects = boot;
})();
/////////////////////// 

/* ===== Копирование в буфер ===== */
document.addEventListener('click', function(e){
    var btn = e.target.closest('[data-copy]');
    if (!btn) return;

    // ищем источник, поднимаясь от кнопки вверх
    var el = btn.parentElement, src = null;
    while (el && !src) { src = el.querySelector('input, textarea, [data-copy-text]'); el = el.parentElement; }
    if (!src) return;

    navigator.clipboard.writeText((src.value !== undefined ? src.value : src.textContent).trim());

    var i = btn.querySelector('i');
    if (!i) return;
    var cls = i.className;
    i.className = 'fa-regular fa-check';
    btn.classList.add('copied');
    setTimeout(function(){ i.className = cls; btn.classList.remove('copied'); }, 1700);
});

/* ===== Тумблеры ===== */
document.addEventListener('click', function(e){
    var t = e.target.closest('[data-toggle]');
    if (t) t.classList.toggle('on');
});
  
