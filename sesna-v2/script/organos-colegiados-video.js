/**
 * Modal de video de YouTube de las sesiones de Órganos Colegiados.
 *
 * Extraído de page-organos-colegiados.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
document.addEventListener('DOMContentLoaded', function () {
    var videoModalEl = document.getElementById('oc-video-modal');
    if (!videoModalEl) return;
    var iframe = document.getElementById('oc-video-iframe');
    var title = document.getElementById('oc-video-modal-label');

    // Manejar apertura tanto por show.bs.modal como por clic directo
    document.addEventListener('click', function(e) {
        var trigger = e.target.closest('[data-video-id]');
        if (!trigger) return;
        var targetAttr = trigger.getAttribute('data-modal-target');
        if (targetAttr && targetAttr !== '#oc-video-modal') return;

        e.preventDefault();
        var videoId = trigger.getAttribute('data-video-id') || '';
        var videoTitle = trigger.getAttribute('data-video-title') || 'Ver sesión';
        if (title) title.textContent = videoTitle;
        if (iframe && videoId) {
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        }
        if (window.sndModal) {
            window.sndModal.show(videoModalEl, trigger);
        }
    });

    videoModalEl.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        if (!trigger) return;
        var videoId = trigger.getAttribute('data-video-id') || '';
        var videoTitle = trigger.getAttribute('data-video-title') || 'Ver sesión';
        if (title) title.textContent = videoTitle;
        if (iframe && videoId) {
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        }
    });

    videoModalEl.addEventListener('hidden.bs.modal', function () {
        if (iframe) iframe.src = '';
        if (title) title.textContent = 'Ver sesión';
    });
});
