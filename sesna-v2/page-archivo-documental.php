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
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Acciones y Programas', 'url' => home_url( '/acciones-y-programas/' ) ),
            array( 'label' => 'Administración y Finanzas', 'url' => home_url( '/acciones-y-programas/administracion-y-finanzas/' ) ),
            array( 'label' => 'Archivo Documental' ),
        ),
    ) ); ?>

    <div class="contenedor py--48">
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
                r.classList.toggle('muestra--ninguno', !match);
            });
        });
    });
});
</script>

<?php get_footer(); ?>
