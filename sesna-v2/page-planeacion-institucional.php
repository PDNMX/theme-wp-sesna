<?php
/**
 * Template Name: Planeación Institucional
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna front-page-bg">

    <!-- Breadcrumb -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/administracion-y-finanzas/') ); ?>" class="ruta__a">Administración y Finanzas</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Planeación Institucional</span>
                </li>
            </ul>
        </div>
    </nav>

    <div class="contenedor py--48">
        <?php get_template_part( 'template-parts/administracion-finanzas/planeacion-institucional-contenido' ); ?>
    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
