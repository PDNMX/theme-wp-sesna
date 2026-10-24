<?php
/**
 * Template Name: Contrataciones y Adquisiciones
 *
 * @package sesna
 */

get_header();
?>

<div class="front-page-bg">

    <!-- Breadcrumb -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/acciones-y-programas/' ) ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/acciones-y-programas/administracion-y-finanzas/' ) ); ?>" class="ruta__a">Administración y Finanzas</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Contrataciones y Adquisiciones</span>
                </li>
            </ul>
        </div>
    </nav>

    <div class="contenedor py--48">
        <?php get_template_part( 'template-parts/administracion-finanzas/contrataciones-contenido' ); ?>
    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('pna-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.pna-chart-card, .pna-reveal').forEach(function(el) {
        observer.observe(el);
    });

    document.querySelectorAll('.cf-year-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.getElementById(this.dataset.cfToggle);
            var chevron = this.querySelector('.cf-year-chevron');
            if (!target) return;
            var abierto = target.classList.toggle('muestra--ninguno');
            chevron.classList.toggle('snd-chevron--down', !abierto);
            chevron.classList.toggle('snd-chevron--right', abierto);
        });
    });

    document.querySelectorAll('.cf-search-input').forEach(function (input) {
        input.addEventListener('input', function () {
            var scope = this.closest('.cf-search-scope') || document;
            var query = this.value.trim().toLowerCase();
            var rows = scope.querySelectorAll('.cf-doc-row');

            if (!query) {
                rows.forEach(function (r) { r.classList.remove('muestra--ninguno'); });
                scope.querySelectorAll('.cf-year-docs').forEach(function (g) {
                    var open = g.dataset.cfDefaultOpen === 'true';
                    g.classList.toggle('muestra--ninguno', !open);
                    var toggle = scope.querySelector('[data-cf-toggle="' + g.id + '"] .cf-year-chevron');
                    if (toggle) {
                        toggle.classList.toggle('snd-chevron--down', open);
                        toggle.classList.toggle('snd-chevron--right', !open);
                    }
                });
                return;
            }

            rows.forEach(function (r) {
                var match = (r.dataset.cfSearch || '').indexOf(query) !== -1;
                r.classList.toggle('muestra--ninguno', !match);
            });
            scope.querySelectorAll('.cf-year-docs').forEach(function (g) {
                var anyVisible = g.querySelector('.cf-doc-row:not(.muestra--ninguno)') !== null;
                g.classList.toggle('muestra--ninguno', !anyVisible);
            });
        });
    });
});
</script>

<?php get_footer(); ?>
