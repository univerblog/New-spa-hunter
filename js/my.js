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

///////

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
        // Активен ли аккордеон при текущей ширине
        const isActive = () => !cfg.breakpoint || window.innerWidth < cfg.breakpoint;

        const items = root.querySelectorAll(cfg.item);

        items.forEach(item => {
            const trigger = item.querySelector(cfg.trigger);
            const content = item.querySelector(cfg.content);
            if (!trigger || !content) return;

            // Открыть указанные по умолчанию
            const shouldBeOpen =
                (cfg.openByDefault && item.querySelector(cfg.openByDefault)) ||
                (cfg.openFirst && item === items[0]);

            if (shouldBeOpen && isActive()) {
                accordionOpen(item, content, cfg);
            }

            // Клик по триггеру
            trigger.addEventListener('click', e => {
                if (!isActive()) return;

                // Реальная ссылка — пропускаем
                const link = e.target.closest('a');
                if (link && link.getAttribute('href') && link.getAttribute('href') !== '#') return;

                e.preventDefault();
                e.stopPropagation();

                const isOpen = item.classList.contains(cfg.openClass);

                if (cfg.single) {
                    // Закрыть всех соседей
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

        // Пересчёт высоты при resize для открытых items
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                items.forEach(item => {
                    const content = item.querySelector(cfg.content);
                    if (!content) return;

                    if (!isActive()) {
                        // Перешли на десктоп — сбрасываем инлайн-стиль
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
  var current = null;
  var lastNav = 0;
  var downX = 0, downY = 0;

  function close(){
    if(!current) return;
    var root = current;
    current = null;
    root.classList.remove('open');
    root.querySelectorAll('.select-option.active').forEach(function(o){ o.classList.remove('active'); });
    var f = root.querySelector('input, textarea');
    if(f) f.blur();
  }
  
  function open(root){
    if(current && current !== root) close();
    root.classList.add('open');
    current = root;
  }

  function wordStarts(text, q){
    var words = text.toLowerCase().split(/\s+/);
    for(var i = 0; i < words.length; i++){
        if(words[i].indexOf(q) === 0) return true;   
    }
    return false;
  }

  function init(root){
    var trigger = root.querySelector('.select-trigger');
    if(!trigger) return;
    var field = trigger.matches('input, textarea')
              ? trigger
              : trigger.querySelector('input, textarea');
    var searchInput = root.querySelector('.select-search input');
    var remote = root.hasAttribute('data-remote');
    var closeTimer;

    function filter(raw){
        var q  = (raw || '').trim();
        var ql = q.toLowerCase();
        var listVisible = 0;

        root.querySelectorAll('.select-list .select-option').forEach(function(opt){
            var show = !ql || wordStarts(opt.textContent, ql);
            opt.hidden = !show;
            if(show) listVisible++;
        });

        var add = root.querySelector('.select-add');
        if(add){
            var exact = false;
            root.querySelectorAll('.select-list .select-option').forEach(function(opt){
            if(opt.textContent.trim().toLowerCase() === ql) exact = true;
            });
            var showAdd = !!q && !exact;
            add.hidden = !showAdd;
            var term = add.querySelector('.select-add-term');
            if(showAdd && term) term.textContent = q;
        }

        var total = root.querySelectorAll('.select-list .select-option').length;

        var hint = root.querySelector('.select-hint');
        if(hint) hint.hidden = total > 0;                     // список пуст → подсказка видна всегда (и при вводе)                   // список пуст и ничего не введено

        var empty = root.querySelector('.select-empty');
        if(empty) empty.hidden = !(q && listVisible === 0 && total > 0);  // пункты есть, но ввод не нашёл
    }

   function choose(opt){
        var isAdd = opt.classList.contains('select-add');
        var label, value;

        if(isAdd){
            label = value = (field && field.value || '').trim();
            if(!label) return;
            var list = root.querySelector('.select-list');           // создаём реальный пункт
            var b = document.createElement('button');
            b.type = 'button';
            b.className = 'select-option';
            b.setAttribute('data-value', value);
            b.textContent = label;
            list.appendChild(b);
            opt = b;                                                  // дальше как обычный пункт
        } else {
            var nameEl = opt.querySelector('.select-option-name');
            label = (nameEl || opt).textContent.trim();
            value = opt.getAttribute('data-value');
        }

        var valueEl = root.querySelector('.select-value');
        if(valueEl) valueEl.textContent = label;
        if(field) field.value = remote ? value : label;  

        if(!remote){
            root.querySelectorAll('.select-option').forEach(function(o){ o.classList.remove('is-selected'); });
            opt.classList.add('is-selected');                         // галочка теперь на нужном
        }

        root.dispatchEvent(new CustomEvent('select:change', {
            detail: { value: value, label: label, option: opt, added: isAdd }, bubbles: true
        }));

        clearTimeout(closeTimer);
        if(!remote && !isAdd){
            closeTimer = setTimeout(function(){ if(current === root) close(); }, 340);
        } else {
            close();   // add и remote — закрываем сразу, иначе новый пункт «прыгает»
        }
    }

    // открытие + ввод
    if(field){
      if(!remote){

        field.addEventListener('focus', function(){
            open(root);

            var sel = root.querySelector('.select-option.is-selected');
            var selLabel = '';
            if(sel){
                var n = sel.querySelector('.select-option-name');
                selLabel = (n ? n.textContent : sel.textContent).trim();
            }
            var committed = sel && selLabel === field.value.trim();   // в поле — выбранное?

            filter(committed ? '' : field.value);   // выбранное → показать все; черновик → отфильтровать
            if(!matchMedia('(pointer: coarse)').matches) field.select();
        });

        field.addEventListener('input', function(){
            if(field.value.trim() === ''){
                root.querySelectorAll('.select-option').forEach(function(o){ o.classList.remove('is-selected'); });
                root.dispatchEvent(new CustomEvent('select:change', {
                detail: { value: '', label: '', option: null, cleared: true }, bubbles: true
                }));
            }
            filter(field.value);
        });
      } else {
        field.addEventListener('focus', function(){
            var q = field.value.trim();
            if(!q) return;                                       // пусто — панели нет
            filter(q);
            if(root.querySelector('.select-list .select-option:not([hidden])')) open(root);
        });
        field.addEventListener('input', function(){
            var q = field.value.trim();
            if(!q){ close(); return; }
            filter(q);
            root.querySelector('.select-list .select-option:not([hidden])')
            ? open(root)
            : close();
        });
    }
      field.addEventListener('blur', function(){ close(); });
    } else {
      trigger.addEventListener('click', function(){
        if(root.classList.contains('open')){ close(); }
        else {
          open(root);
          if(searchInput) searchInput.value = '';
          filter('');
          //if(searchInput) searchInput.focus(); // при открытии data-search ставим курсов в поиск
        }
      });
    }
    if(searchInput){
      searchInput.addEventListener('input', function(){ filter(searchInput.value); });
    }

    // тап по пункту не блюрит поле/поиск
    root.addEventListener('mousedown', function(e){
      if(e.target.closest('.select-option')) e.preventDefault();
    });

    // выбор
    root.addEventListener('click', function(e){
      var opt = e.target.closest('.select-option');
      if(!opt || !root.contains(opt) || opt.hidden) return;
      choose(opt);
    });

  }

  function visibleOpts(root){
     return Array.prototype.slice.call(root.querySelectorAll('.select-list .select-option'))
              .filter(function(o){ return !o.hidden; });
  }
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

    document.addEventListener('keydown', function(e){
        if(!current) return;                                  // работает только при открытой панели
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
            if(a){ e.preventDefault(); a.click(); }             // выбрать подсвеченный (через choose)
        }
        else if(e.key === 'Escape'){ e.preventDefault(); close(); }
    });

  document.addEventListener('pointerdown', function(e){ downX = e.clientX; downY = e.clientY; });
  document.addEventListener('pointerup', function(e){
    if(!current) return;
    var moved = Math.abs(e.clientX - downX) > 10 || Math.abs(e.clientY - downY) > 10;
    if(!moved && !current.contains(e.target)) close();
  });

  function boot(){ document.querySelectorAll('[data-select]').forEach(init); }
  document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', boot) : boot();
})();
/////////////////////// 
  
