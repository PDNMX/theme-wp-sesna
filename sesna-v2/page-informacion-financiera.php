<?php
/**
 * Template Name: Información Financiera
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
                <li class="breadcrumb-item active" aria-current="page">Información Financiera</li>
            </ol>
        </div>
    </nav>

    <div class="container pt-4 pb-5">
        <?php get_template_part( 'template-parts/administracion-finanzas/informacion-financiera-contenido' ); ?>
    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
