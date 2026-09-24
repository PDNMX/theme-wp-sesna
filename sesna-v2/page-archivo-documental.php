<?php
/**
 * Template Name: Archivo Documental
 *
 * @package sesna
 */

get_header();
?>

<div class="front-page-bg">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url( '/acciones-y-programas/' ) ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url( '/acciones-y-programas/administracion-y-finanzas/' ) ); ?>">Administración y Finanzas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Archivo Documental</li>
            </ol>
        </div>
    </nav>

    <div class="container pt-4 pb-5">
        <?php get_template_part( 'template-parts/administracion-finanzas/archivo-documental-contenido' ); ?>
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

    document.querySelectorAll('.cf-search-input').forEach(function (input) {
        input.addEventListener('input', function () {
            var scope = this.closest('.cf-search-scope') || document;
            var query = this.value.trim().toLowerCase();
            var rows = scope.querySelectorAll('.cf-doc-row');
            rows.forEach(function (r) {
                var match = (r.dataset.cfSearch || '').indexOf(query) !== -1;
                r.classList.toggle('d-none', !match);
            });
        });
    });
});
</script>

<?php get_footer(); ?>
