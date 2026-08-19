<?php
/**
 * Template Name: PNA - Presupuestación
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna page-pna-presupuestacion">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/') ); ?>">Política Nacional Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Presupuestación</li>
            </ol>
        </div>
    </nav>

    <!-- BLOQUE 1: Hero -->
    <section class="pt-4 pb-5">
        <div class="container">
            <div class="row g-4 align-items-start justify-content-between">

                <!-- Columna Izquierda -->
                <div class="col-lg-7 col-xl-7">
                    <h2 class="fw-bold font-patria text-burgundi mb-3">Presupuestación</h2>
                    <p class="text-muted mb-4">
                        Conoce más sobre el Anexo Transversal 30 del Presupuesto de Egresos de la Federación, el cual agrupa los recursos públicos destinados a la prevención, detección, investigación y sanción de hechos de corrupción.
                    </p>
                    <p class="text-muted mb-0">
                        Este Anexo Transversal identifica a los responsables y los montos de recursos públicos ejecutados a dichas tareas, permitiendo dar seguimiento al gasto anticorrupción a nivel federal.
                    </p>
                </div>

                <!-- Columna Derecha: Ícono representativo -->
                <div class="col-lg-5 col-xl-5 d-flex justify-content-lg-end justify-content-center align-items-center mt-5 mt-lg-0">
                    <i class="bi bi-pie-chart-fill" style="font-size: 220px; color: #72588F; opacity: 0.15;"></i>
                </div>

            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
