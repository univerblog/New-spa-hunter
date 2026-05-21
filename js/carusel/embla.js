const addDotBtnsWithClickHandlers = (emblaApi, dotsNode) => {
  // Проверяем существование контейнера для точек
  if (!dotsNode) {
    return () => {}; // Возвращаем пустую функцию
  }

  let dotNodes = [];

  const addDotBtnsAndClickHandlers = () => {
    dotsNode.innerHTML = emblaApi
      .scrollSnapList()
      .map(() => '<button class="embla__dot" type="button"></button>')
      .join('');

    dotNodes = Array.from(dotsNode.querySelectorAll('.embla__dot'));
    dotNodes.forEach((dotNode, index) => {
      dotNode.addEventListener('click', () => emblaApi.scrollTo(index), false);
    });
  };

  const toggleDotBtnsActive = () => {
    const previous = emblaApi.previousScrollSnap();
    const selected = emblaApi.selectedScrollSnap();
    
    if (dotNodes[previous]) {
      dotNodes[previous].classList.remove('embla__dot--selected');
    }
    if (dotNodes[selected]) {
      dotNodes[selected].classList.add('embla__dot--selected');
    }
  };

  emblaApi
    .on('init', addDotBtnsAndClickHandlers)
    .on('reInit', addDotBtnsAndClickHandlers)
    .on('init', toggleDotBtnsActive)
    .on('reInit', toggleDotBtnsActive)
    .on('select', toggleDotBtnsActive);

  return () => {
    dotsNode.innerHTML = '';
  };
};

const addPrevNextBtnsClickHandlers = (emblaApi, prevBtn, nextBtn) => {
  // Проверяем существование кнопок
  if (!prevBtn || !nextBtn) {
    return;
  }

  const scrollPrev = () => emblaApi.scrollPrev();
  const scrollNext = () => emblaApi.scrollNext();
  
  prevBtn.addEventListener('click', scrollPrev, false);
  nextBtn.addEventListener('click', scrollNext, false);

  const togglePrevNextBtnsState = () => {
    if (emblaApi.canScrollPrev()) {
      prevBtn.removeAttribute('disabled');
    } else {
      prevBtn.setAttribute('disabled', 'disabled');
    }
    if (emblaApi.canScrollNext()) {
      nextBtn.removeAttribute('disabled');
    } else {
      nextBtn.setAttribute('disabled', 'disabled');
    }
  };

  emblaApi
    .on('select', togglePrevNextBtnsState)
    .on('init', togglePrevNextBtnsState)
    .on('reInit', togglePrevNextBtnsState);

  return () => {
    prevBtn.removeAttribute('disabled');
    nextBtn.removeAttribute('disabled');
  };
};

// Инициализация
document.addEventListener('DOMContentLoaded', () => {
  const emblaNodes = document.querySelectorAll('.embla');
  
  if (!emblaNodes.length) {
    return;
  }

  emblaNodes.forEach((emblaNode) => {
    const viewportNode = emblaNode.querySelector('.embla__viewport');
    
    if (!viewportNode) {
      console.error('Embla viewport not found');
      return;
    }

    const OPTIONS = {
      align: 'start',
      loop: false,
      active: true
    };
    const emblaApi = EmblaCarousel(viewportNode, OPTIONS);

    // Точки внутри текущей карусели
    const dotsNode = emblaNode.querySelector('.embla__dots');
    if (dotsNode) {
      const removeDotBtnsAndClickHandlers = addDotBtnsWithClickHandlers(
        emblaApi,
        dotsNode
      );
      emblaApi.on('destroy', removeDotBtnsAndClickHandlers);
    }

    // Кнопки внутри текущей карусели
    const prevBtn = emblaNode.querySelector('.embla__button--prev');
    const nextBtn = emblaNode.querySelector('.embla__button--next');
    if (prevBtn && nextBtn) {
      const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
        emblaApi,
        prevBtn,
        nextBtn
      );
      emblaApi.on('destroy', removePrevNextBtnsClickHandlers);
    }
  });
});

