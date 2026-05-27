const navToggle = document.querySelector('.nav-toggle');
const topMenu = document.querySelector('.top-menu');
navToggle.addEventListener('click', function () {
    this.classList.toggle('active');
    topMenu.classList.toggle('show');
});

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
        openByDefault: '.is-open',
        
    },

    'foot-accordion': {
        breakpoint: 840,
        item:    '.foot-nav-block',
        trigger: '.foot-tit',
        content: '.ul-wrap',
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


  
