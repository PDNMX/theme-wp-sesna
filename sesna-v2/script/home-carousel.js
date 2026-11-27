/**
 * Carrusel de la página de inicio (front-page.php).
 *
 * Incluye navegación anterior/siguiente, indicadores circulares, control de pausa/reproducción
 * (WCAG 2.2.2), soporte swipe táctil y tooltip flotante para diapositivas con enlace.
 */
document.addEventListener('DOMContentLoaded', function () {
    var wrapper = document.querySelector('#homeCarousel');
    if (!wrapper) return;

    var track = wrapper.querySelector('.sesna-carousel-track');
    var slides = Array.from(wrapper.querySelectorAll('.sesna-carousel-slide'));
    var dots = Array.from(wrapper.querySelectorAll('.sesna-carousel-dot'));
    var prevBtn = wrapper.querySelector('.sesna-carousel-btn--prev');
    var nextBtn = wrapper.querySelector('.sesna-carousel-btn--next');
    var pauseBtn = document.getElementById('sesnaCarouselPauseBtn');
    var pauseIcon = pauseBtn ? pauseBtn.querySelector('.sesna-carousel-pause-icon') : null;
    var playIcon = pauseBtn ? pauseBtn.querySelector('.sesna-carousel-play-icon') : null;

    if (!track || slides.length <= 1) return;

    var currentIndex = 0;
    var timer = null;
    var INTERVAL = 5000;
    var isManuallyPaused = false;
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function updatePauseButtonUI() {
        if (!pauseBtn) return;
        pauseBtn.setAttribute('aria-pressed', isManuallyPaused ? 'true' : 'false');
        pauseBtn.setAttribute('aria-label', isManuallyPaused ? 'Reanudar animación del carrusel' : 'Pausar animación del carrusel');
        if (pauseIcon) pauseIcon.classList.toggle('muestra--ninguno', isManuallyPaused);
        if (playIcon) playIcon.classList.toggle('muestra--ninguno', !isManuallyPaused);
    }

    function goToSlide(index) {
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }

        track.style.transform = 'translate3d(-' + (index * 100) + '%, 0, 0)';

        slides.forEach(function (slide, idx) {
            var isActive = (idx === index);
            slide.classList.toggle('is-active', isActive);
            var link = slide.querySelector('.sesna-carousel-slide-link');
            if (link) {
                link.setAttribute('tabindex', isActive ? '0' : '-1');
            }
            if (isActive) {
                slide.removeAttribute('aria-hidden');
            } else {
                slide.setAttribute('aria-hidden', 'true');
            }
        });

        dots.forEach(function (dot, idx) {
            var isActive = (idx === index);
            dot.classList.toggle('is-active', isActive);
            dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        currentIndex = index;
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    function startAutoPlay() {
        if (prefersReducedMotion || isManuallyPaused) return;
        stopAutoPlay();
        timer = setInterval(nextSlide, INTERVAL);
    }

    function stopAutoPlay() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    // Botón de Pausa / Reproducción manual (WCAG 2.2.2)
    if (pauseBtn) {
        if (prefersReducedMotion) {
            isManuallyPaused = true;
            updatePauseButtonUI();
        }
        pauseBtn.addEventListener('click', function () {
            isManuallyPaused = !isManuallyPaused;
            updatePauseButtonUI();
            if (isManuallyPaused) {
                stopAutoPlay();
            } else {
                startAutoPlay();
            }
        });
    }

    // Botones de navegación
    if (nextBtn) nextBtn.addEventListener('click', function () { nextSlide(); startAutoPlay(); });
    if (prevBtn) prevBtn.addEventListener('click', function () { prevSlide(); startAutoPlay(); });

    // Indicadores (dots)
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var target = parseInt(dot.getAttribute('data-target-index'), 10);
            if (!isNaN(target)) {
                goToSlide(target);
                startAutoPlay();
            }
        });
    });

    // Soporte táctil / swipe móvil
    var touchStartX = 0;
    var touchCurrentX = 0;
    var isSwiping = false;
    var hasSwiped = false;

    wrapper.addEventListener('touchstart', function (e) {
        if (e.touches.length === 1) {
            touchStartX = e.touches[0].clientX;
            touchCurrentX = touchStartX;
            isSwiping = true;
            hasSwiped = false;
            stopAutoPlay();
        }
    }, { passive: true });

    wrapper.addEventListener('touchmove', function (e) {
        if (!isSwiping || e.touches.length !== 1) return;
        touchCurrentX = e.touches[0].clientX;
        if (Math.abs(touchStartX - touchCurrentX) > 10) {
            hasSwiped = true;
        }
    }, { passive: true });

    wrapper.addEventListener('touchend', function () {
        if (!isSwiping) return;
        isSwiping = false;
        var diffX = touchStartX - touchCurrentX;
        if (Math.abs(diffX) > 40) {
            if (diffX > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
        startAutoPlay();
    });

    // Cancelar apertura accidental de enlaces si el gesto fue un swipe
    wrapper.querySelectorAll('.sesna-carousel-slide-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            if (hasSwiped) {
                e.preventDefault();
                e.stopPropagation();
                hasSwiped = false;
            }
        });
    });

    // Teclado
    wrapper.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            startAutoPlay();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            startAutoPlay();
        }
    });

    // Accesibilidad: pausar temporalmente al enfocar o pasar el ratón (si no fue pausado manualmente)
    wrapper.addEventListener('mouseenter', stopAutoPlay);
    wrapper.addEventListener('mouseleave', function () {
        startAutoPlay();
        if (tooltip) tooltip.classList.remove('is-visible');
    });
    wrapper.addEventListener('focusin', stopAutoPlay);
    wrapper.addEventListener('focusout', function () {
        startAutoPlay();
    });

    // Tooltip flotante interactivo para slides con URL
    var tooltip = wrapper.querySelector('#sesnaCarouselTooltip');
    var isPointerFine = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    if (tooltip && isPointerFine) {
        wrapper.addEventListener('mousemove', function (e) {
            var activeSlide = slides[currentIndex];
            var link = activeSlide ? activeSlide.querySelector('.sesna-carousel-slide-link') : null;
            var onControls = e.target.closest('.sesna-carousel-btn, .sesna-carousel-controls');

            if (link && !onControls) {
                var rect = wrapper.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;

                var clampedX = Math.max(50, Math.min(x, rect.width - 50));
                var clampedY = Math.max(30, y);

                tooltip.style.left = clampedX + 'px';
                tooltip.style.top = clampedY + 'px';
                tooltip.classList.add('is-visible');
            } else {
                tooltip.classList.remove('is-visible');
            }
        });

        wrapper.addEventListener('mouseleave', function () {
            tooltip.classList.remove('is-visible');
        });
    }

    // Pausar si la pestaña no está visible
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            stopAutoPlay();
        } else {
            startAutoPlay();
        }
    });

    // Iniciar auto-play
    startAutoPlay();
});
