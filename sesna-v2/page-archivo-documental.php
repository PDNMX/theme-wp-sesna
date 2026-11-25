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

<?php get_footer(); ?>
