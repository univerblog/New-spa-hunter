////// Подсветка активного пункта в левом меню по скроллу
const navLinks = document.querySelectorAll('.legal-left-nav a');
const navSections = Array.from(navLinks).map(a => document.getElementById(a.hash.slice(1)));
let spyLock = 0;

function legalSpy() {
    if (Date.now() < spyLock) return;
    const y = window.scrollY + 130;
    let current = 0;
    navSections.forEach((sec, i) => { if (sec && sec.offsetTop <= y) current = i; });
    navLinks.forEach((a, i) => a.classList.toggle('active', i === current));
    navLinks[current].scrollIntoView({ block: 'nearest' });
}

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        spyLock = Date.now() + 800;
        navLinks.forEach(a => a.classList.toggle('active', a === link));
        link.scrollIntoView({ block: 'nearest' });
    });
});

window.addEventListener('scroll', legalSpy, { passive: true });
legalSpy();
////// Меню без своего скролла не перехватывает колесо
const legalNav = document.querySelector('.legal-left-nav');
if (legalNav) legalNav.style.overscrollBehavior = legalNav.scrollHeight > legalNav.clientHeight ? 'contain' : 'auto';