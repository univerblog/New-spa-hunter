<div class="modal-wrapper">
    <div class="modal-window">
        <div class="close"><i class="fa-regular fa-xmark"></i></div>
        <div class="modal-content"></div>
    </div>
</div>


@push('scripts')
<script>
   // Функции открытия/закрытия модального окна
function openModal(elementId, options = {}) {
    const modalWrapper = document.querySelector('.modal-wrapper');
    const modalContent = document.querySelector('.modal-content');
    const elementToShow = document.getElementById(elementId);

    if (!elementToShow) {
        console.error(`Element with id "${elementId}" not found`);
        return;
    }

    modalContent.innerHTML = elementToShow.innerHTML;
    modalWrapper.style.display = 'flex';
    document.body.style.overflow = 'hidden';

    // Доп. класс для модалки (wide, small и т.д.)
    if (options.className) {
        document.querySelector('.modal-window').className = 'modal-window ' + options.className;
    }
    // Callback после открытия
    if (typeof options.onOpen === 'function') {
        options.onOpen(modalContent);
    }
}

function closeModal() {
    const modalWrapper = document.querySelector('.modal-wrapper');
    modalWrapper.style.display = 'none';
    document.body.style.overflow = 'auto';
    document.querySelector('.modal-window').className = 'modal-window';
}

// Закрытие по клику на крестик
document.querySelector('.modal-window .close').addEventListener('click', closeModal);

// Закрытие по клику вне модалки (на затемнённую область)
document.querySelector('.modal-wrapper').addEventListener('click', function(e) {
  if (e.target === this) { // Если кликнули именно на .modal-wrapper, а не на его детей
    closeModal();
  }
});

</script>

@endpush