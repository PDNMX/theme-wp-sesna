/**
 * derechos-humanos.js
 * Modal dinámica para Campañas de Sensibilización (CPT: dh_campania)
 *
 * LÓGICA DE LAYOUT:
 * ─────────────────────────────────────────────────────────────────
 * CASO A — Solo texto (sin imagen ni video):
 *   └─ col-12: ícono + título + texto
 *
 * CASO B — Solo una imagen (thumbnail), sin video ni galería:
 *   ├─ col-lg-6 IZQUIERDA: ícono + título + texto
 *   └─ col-lg-6 DERECHA:   imagen (como "Infografía")
 *
 * CASO C — Video + múltiples imágenes (galería):
 *   ├─ col-lg-6 IZQUIERDA: ícono + título + texto + "Video" label + player
 *   └─ col-lg-6 DERECHA:   thumbnail ("Infografía") + galería grid ("Evidencias")
 *
 * CASO D — Solo video, sin imágenes:
 *   ├─ col-lg-6 IZQUIERDA: ícono + título + texto
 *   └─ col-lg-6 DERECHA:   player de video
 *
 * CASO E — Solo galería múltiple, sin video:
 *   ├─ col-lg-6 IZQUIERDA: ícono + título + texto
 *   └─ col-lg-6 DERECHA:   thumbnail ("Infografía") + galería grid
 *
 * En todos los casos, el banner informativo inferior se muestra si existe.
 */
(function () {
    'use strict';

    /* ── Helpers ────────────────────────────────────────────────── */

    function escHtml(str) {
        return String(str)
            .replace(/&/g, '&amp;').replace(/"/g, '&quot;')
            .replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    /** Detecta YouTube/Vimeo y retorna URL embed. null si es video local. */
    function getEmbedUrl(url) {
        if (!url) return null;
        var yt = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/);
        if (yt) return 'https://www.youtube.com/embed/' + yt[1] + '?enablejsapi=1';
        var vm = url.match(/vimeo\.com\/(\d+)/);
        if (vm) return 'https://player.vimeo.com/video/' + vm[1] + '?api=1';
        return null;
    }

    /** Verdadero solo si hay una URL de video utilizable (ignora vacíos y "#"). */
    function hasUsableVideo(videoUrl) {
        return !!videoUrl && videoUrl !== '#';
    }

    /** Construye el bloque de video (iframe o <video>) */
    function buildVideoBlock(videoUrl) {
        var embedUrl = getEmbedUrl(videoUrl);
        var html = '<div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm w-100">';
        if (embedUrl) {
            html += '<iframe id="dh-modal-iframe" src="' + escHtml(embedUrl) + '"' +
                ' title="Video campaña" frameborder="0"' +
                ' allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        } else {
            // preload="metadata" mejora la compatibilidad entre navegadores
            // (evita descargar el archivo completo solo para mostrar controles).
            html += '<video id="dh-modal-video" controls preload="metadata" class="w-100 h-100" style="object-fit:cover;">' +
                '<source src="' + escHtml(videoUrl) + '" type="video/mp4">' +
                'Tu navegador no soporta la reproducción de este video.</video>';
        }
        html += '</div>';
        return html;
    }

    /** Construye el grid de evidencias (2 o 3 columnas según cantidad) */
    function buildGaleriaGrid(galeria, color) {
        if (!galeria || galeria.length === 0) return '';
        var cols = galeria.length <= 2 ? 'col-6' : 'col-4';
        var html = '<div class="row g-2 mt-1">';
        for (var i = 0; i < galeria.length; i++) {
            html += '<div class="' + cols + '">' +
                '<div class="rounded-2 overflow-hidden" style="height:110px;">' +
                '<img src="' + escHtml(galeria[i].url) + '" data-lb-full="' + escHtml(galeria[i].full) + '" class="w-100 h-100 dh-lb-img" style="object-fit:cover; cursor:zoom-in;" alt="Evidencia ' + (i + 1) + '">' +
                '</div></div>';
        }
        html += '</div>';
        return html;
    }

    /* ── Constructor principal del modal body ───────────────────── */
    function buildModalContent(data) {
        var titulo    = data.titulo    || '';
        var icono     = data.icono     || 'bi-star';
        var color     = data.color     || '#9d2449';
        var contenido = data.contenido || '';
        var infografia= data.infografia|| [];
        var galeria   = data.galeria   || [];
        var videoUrl  = data.video     || '';
        var banner    = data.banner    || '';

        var hasInfo   = infografia.length > 0;
        var hasVideo  = hasUsableVideo(videoUrl);
        var hasGal    = galeria.length > 0;

        /* ─ Determinar caso ──────────────────────────────────────── */
        // CASO A: sin medios
        var soloTexto = !hasInfo && !hasVideo && !hasGal;
        // CASO B: solo una imagen (infografia), sin video ni galería
        var soloImagen = hasInfo && !hasVideo && !hasGal;
        // CASO C/E: tiene imágenes + puede tener video → layout 2 cols, video en izquierda
        var mediaComplejo = (hasInfo || hasGal) && (hasVideo || hasGal);
        // CASO D: solo video sin imágenes
        var soloVideo = hasVideo && !hasInfo && !hasGal;

        /* ─ Bloque de texto base (siempre presente en izquierda) ── */
        var leftCols = soloTexto ? 'col-12' : 'col-lg-6';

        var textoHtml =
            '<div class="mb-2" style="height:48px; display:flex; align-items:center;">' +
                '<i class="bi ' + escHtml(icono) + '" style="font-size:2.5rem; line-height:1; color:' + escHtml(color) + ';"></i>' +
            '</div>' +
            '<h3 class="fw-bold mb-3 sna-programas-title" style="color:' + escHtml(color) + ';">' + escHtml(titulo) + '</h3>' +
            '<div style="width:30px; height:3px; background-color:' + escHtml(color) + '; margin-bottom:1.5rem;"></div>' +
            '<div class="text-muted fw-light dh-modal-contenido">' + contenido + '</div>';

        var leftHtml, rightHtml;

        if (soloTexto) {
            /* ── CASO A ── */
            leftHtml  = '<div class="col-12 d-flex flex-column justify-content-start">' + textoHtml + '</div>';
            rightHtml = '';

        } else if (soloImagen) {
            /* ── CASO B: texto izq / imagen der ── */
            leftHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' + textoHtml + '</div>';
            rightHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' +
                    '<div style="height:48px; width:100%;" class="mb-2"></div>' +
                    '<p class="fw-semibold text-muted mb-2" style="font-size:0.82rem; letter-spacing:.05em; text-transform:uppercase;">Infografía</p>';
            for (var i = 0; i < infografia.length; i++) {
                rightHtml +=
                    '<div class="w-100 rounded-3 overflow-hidden shadow-sm mb-3">' +
                        '<img src="' + escHtml(infografia[i].url) + '" data-lb-full="' + escHtml(infografia[i].full) + '" alt="' + escHtml(titulo) + '"' +
                        ' class="w-100 h-100 dh-lb-img" style="object-fit:cover; max-height:380px; cursor:zoom-in;">' +
                    '</div>';
            }
            rightHtml += '</div>';

        } else if (soloVideo) {
            /* ── CASO D: texto izq / video der ── */
            leftHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' + textoHtml + '</div>';
            rightHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' + 
                    '<div style="height:48px; width:100%;" class="mb-2"></div>' +
                    buildVideoBlock(videoUrl) + 
                '</div>';

        } else {
            /* ── CASO C / E: texto+video izq / imágenes der ── */
            var videoSection = '';
            if (hasVideo) {
                videoSection =
                    '<p class="fw-semibold text-muted mb-2 mt-3" style="font-size:0.82rem; letter-spacing:.05em; text-transform:uppercase;">Video</p>' +
                    buildVideoBlock(videoUrl);
            }
            leftHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' +
                    textoHtml + videoSection +
                '</div>';

            // Columna derecha: thumbnail como Infografía + galería como Evidencias
            var rightInner = '';
            if (hasInfo || hasGal) {
                // Spacer para alinear con el título
                rightInner += '<div style="height:48px; width:100%;" class="mb-2"></div>';
            }
            if (hasInfo) {
                rightInner +=
                    '<p class="fw-semibold text-muted mb-2" style="font-size:0.82rem; letter-spacing:.05em; text-transform:uppercase;">Infografía</p>';
                for (var j = 0; j < infografia.length; j++) {
                    rightInner +=
                        '<div class="rounded-3 overflow-hidden shadow-sm mb-3" style="max-height:350px;">' +
                            '<img src="' + escHtml(infografia[j].url) + '" data-lb-full="' + escHtml(infografia[j].full) + '" alt="Infografía ' + escHtml(titulo) + '"' +
                            ' class="w-100 h-100 dh-lb-img" style="object-fit:contain; cursor:zoom-in;">' +
                        '</div>';
                }
            }
            if (hasGal) {
                rightInner +=
                    '<p class="fw-semibold text-muted mb-0 mt-3" style="font-size:0.82rem; letter-spacing:.05em; text-transform:uppercase;">Evidencias de la campaña</p>' +
                    buildGaleriaGrid(galeria, color);
            }
            rightHtml =
                '<div class="col-lg-6 d-flex flex-column justify-content-start">' + rightInner + '</div>';
        }

        /* ─ Banner inferior ──────────────────────────────────────── */
        var bannerHtml = '';
        if (banner && banner.trim().length > 0) {
            bannerHtml =
                '<div class="mt-4 p-3 rounded-3 d-flex align-items-start align-items-md-center gap-3"' +
                '     style="background-color:#fcf4f5; border:1px solid rgba(157,36,73,0.1);">' +
                    '<i class="bi bi-box2-heart flex-shrink-0 mt-1 mt-md-0"' +
                    '   style="font-size:1.5rem; color:' + escHtml(color) + ';"></i>' +
                    '<p class="mb-0 text-muted fw-light">' + escHtml(banner) + '</p>' +
                '</div>';
        }

        return '<div class="row g-4 align-items-stretch">' + leftHtml + rightHtml + '</div>' + bannerHtml;
    }

    /* ── Listener: abrir modal ──────────────────────────────────── */
    document.addEventListener('click', function (e) {
        var trigger = e.target.closest('.dh-campania-trigger');
        if (!trigger) return;

        var galeria = [];
        try { galeria = JSON.parse(trigger.getAttribute('data-galeria') || '[]'); }
        catch (err) { galeria = []; }

        var infografia = [];
        try { infografia = JSON.parse(trigger.getAttribute('data-infografia') || '[]'); }
        catch (err) { infografia = []; }

        // Retrocompatibilidad: Si no hay infografías explícitas pero hay thumbnail
        if (infografia.length === 0 && trigger.getAttribute('data-thumbnail')) {
            infografia = [{
                url: trigger.getAttribute('data-thumbnail'),
                full: trigger.getAttribute('data-thumbnail-full') || trigger.getAttribute('data-thumbnail')
            }];
        }

        var modalBody = document.getElementById('dh-modal-body');
        if (!modalBody) return;

        modalBody.innerHTML = buildModalContent({
            titulo:    trigger.getAttribute('data-titulo')    || '',
            icono:     trigger.getAttribute('data-icono')     || 'bi-star',
            color:     trigger.getAttribute('data-color')     || '#9d2449',
            contenido: trigger.getAttribute('data-contenido') || '',
            infografia: infografia,
            galeria:   galeria,
            video:     trigger.getAttribute('data-video')     || '',
            banner:    trigger.getAttribute('data-banner')    || ''
        });
    });

    /* ── Listener: limpiar al cerrar modal ──────────────────────── */
    document.addEventListener('hidden.bs.modal', function (e) {
        if (!e.target || e.target.id !== 'modal-campania') return;

        // Detener video local
        var video = document.getElementById('dh-modal-video');
        if (video) { video.pause(); video.currentTime = 0; }

        // Detener iframe (YouTube/Vimeo) reponiendo src
        var iframe = document.getElementById('dh-modal-iframe');
        if (iframe) { var s = iframe.src; iframe.src = ''; iframe.src = s; }

        // Resetear body a spinner
        var modalBody = document.getElementById('dh-modal-body');
        if (modalBody) {
            modalBody.innerHTML =
                '<div class="d-flex justify-content-center align-items-center" style="min-height:200px;">' +
                    '<div class="spinner-border text-secondary" role="status">' +
                        '<span class="visually-hidden">Cargando...</span>' +
                    '</div>' +
                '</div>';
        }
    });

})();

/* ═══════════════════════════════════════════════════════════════
   LIGHTBOX — Visor de imágenes de galería
   Se activa al hacer clic en cualquier imagen dentro de #dh-modal-body
   con la clase .dh-lb-img (añadida dinámicamente por buildGaleriaGrid)
   ═══════════════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var lb         = document.getElementById('dh-lightbox');
    var lbOverlay  = document.getElementById('dh-lightbox__overlay');
    var lbImg      = document.getElementById('dh-lightbox__img');
    var lbCounter  = document.getElementById('dh-lightbox__counter');
    var lbClose    = document.getElementById('dh-lightbox__close');
    var lbPrev     = document.getElementById('dh-lightbox__prev');
    var lbNext     = document.getElementById('dh-lightbox__next');

    if (!lb) return;

    var images  = [];   // URLs de imágenes de la galería actual
    var current = 0;    // Índice actual

    function show(idx) {
        if (!images.length) return;
        current = (idx + images.length) % images.length;
        lbImg.style.opacity = '0';
        lbImg.src = images[current];
        lbImg.onload = function () { lbImg.style.opacity = '1'; };
        lbCounter.textContent = (current + 1) + ' / ' + images.length;
        // Ocultar prev/next si solo hay una imagen
        lbPrev.style.display = images.length > 1 ? 'flex' : 'none';
        lbNext.style.display = images.length > 1 ? 'flex' : 'none';
    }

    function open(imgs, startIdx) {
        images  = imgs;
        lb.style.display = 'block';
        document.body.style.overflow = 'hidden';
        show(startIdx || 0);
    }

    function close() {
        lb.style.display = 'none';
        document.body.style.overflow = '';
        lbImg.src = '';
        images = [];
    }

    // Delegación de clic: escucha imágenes con clase dh-lb-img dentro del modal body
    document.addEventListener('click', function (e) {
        var imgEl = e.target.closest('.dh-lb-img');
        if (!imgEl) return;

        // Recoger todas las imágenes del mismo contenedor
        var container = document.getElementById('dh-modal-body');
        if (!container) return;
        var allImgs = Array.from(container.querySelectorAll('.dh-lb-img'));
        var srcs    = allImgs.map(function (i) { return i.getAttribute('data-lb-full') || i.src; });
        var idx     = allImgs.indexOf(imgEl);

        open(srcs, idx);
        e.stopPropagation(); // No disparar el trigger de la tarjeta
    });

    // Botones del lightbox
    lbClose.addEventListener('click', close);
    lbOverlay.addEventListener('click', close);
    lbPrev.addEventListener('click', function () { show(current - 1); });
    lbNext.addEventListener('click', function () { show(current + 1); });

    // Teclado
    document.addEventListener('keydown', function (e) {
        if (lb.style.display === 'none') return;
        if (e.key === 'Escape')     close();
        if (e.key === 'ArrowLeft')  show(current - 1);
        if (e.key === 'ArrowRight') show(current + 1);
    });

    // Swipe táctil
    var touchStartX = 0;
    lb.addEventListener('touchstart', function (e) { touchStartX = e.touches[0].clientX; }, { passive: true });
    lb.addEventListener('touchend', function (e) {
        var dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 50) dx < 0 ? show(current + 1) : show(current - 1);
    });

})();
