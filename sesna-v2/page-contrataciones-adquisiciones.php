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
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Acciones y Programas', 'url' => home_url( '/acciones-y-programas/' ) ),
            array( 'label' => 'Administración y Finanzas', 'url' => home_url( '/acciones-y-programas/administracion-y-finanzas/' ) ),
            array( 'label' => 'Contrataciones y Adquisiciones' ),
        ),
    ) ); ?>

    <div class="contenedor py--48">
        <?php get_template_part( 'template-parts/administracion-finanzas/contrataciones-contenido' ); ?>
    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
