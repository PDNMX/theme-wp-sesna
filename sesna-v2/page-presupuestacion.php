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

    <!-- BLOQUE 2: Documentos del Anexo Transversal Anticorrupción -->
    <?php
    $ata_metodologia        = sesna_get_ata_docs( 'metodologia' );
    $ata_informe_asignacion = sesna_get_ata_docs( 'informe_asignacion' );
    $ata_base_datos         = sesna_get_ata_docs( 'base_datos' );
    $ata_informe_ejecucion  = sesna_get_ata_docs( 'informe_ejecucion' );
    ?>
    <section class="pb-5">
        <div class="container">
            <div class="card border rounded-4 shadow-sm p-4 p-md-5" style="border-color: #E9ECEF !important;">

                <!-- Encabezado -->
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="icon-bg-circle flex-shrink-0" style="background-color: #F9F0F3;">
                        <i class="bi bi-file-earmark-text" style="color: #611232;"></i>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold font-patria mb-0" style="color: #611232;">1. Documentos del Anexo Transversal Anticorrupción</h2>
                    </div>
                </div>
                <p class="text-muted mb-4 ms-1" style="font-size: 15px;">Consulta y descarga los documentos metodológicos, informes y bases de datos disponibles.</p>
                <div class="cp-recursos__linea mb-4"></div>

                <!-- 4 columnas de documentos -->
                <?php
                $ata_columnas = array(
                    array(
                        'tipo'  => 'metodologia',
                        'docs'  => $ata_metodologia,
                        'icono' => 'bi-book',
                        'titulo'=> 'Metodología',
                    ),
                    array(
                        'tipo'  => 'informe_asignacion',
                        'docs'  => $ata_informe_asignacion,
                        'icono' => 'bi-bar-chart',
                        'titulo'=> 'Informe de asignación',
                    ),
                    array(
                        'tipo'  => 'base_datos',
                        'docs'  => $ata_base_datos,
                        'icono' => 'bi-database',
                        'titulo'=> 'Base de datos',
                    ),
                    array(
                        'tipo'  => 'informe_ejecucion',
                        'docs'  => $ata_informe_ejecucion,
                        'icono' => 'bi-clock-history',
                        'titulo'=> 'Informe de Ejecución y Seguimiento',
                    ),
                );
                ?>
                <div class="row g-4">
                    <?php foreach ( $ata_columnas as $col ) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: #F9F0F3;">
                                    <i class="bi <?php echo esc_attr( $col['icono'] ); ?>" style="color: #611232;"></i>
                                </div>
                                <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232;"><?php echo esc_html( $col['titulo'] ); ?></h3>
                            </div>
                            <div class="d-flex flex-column flex-grow-1">
                                <?php if ( empty( $col['docs'] ) ) : ?>
                                    <p class="text-muted font-noto-sans" style="font-size: 14px;">Próximamente.</p>
                                <?php else : ?>
                                    <?php foreach ( $col['docs'] as $doc ) : ?>
                                    <a href="<?php echo esc_url( $doc['url'] ); ?>"
                                       target="_blank" rel="noopener"
                                       class="d-flex align-items-start gap-2 py-2 border-bottom text-decoration-none text-dark pna-doc-item">
                                        <i class="bi bi-download flex-shrink-0 mt-1" style="color: #611232;"></i>
                                        <span class="font-noto-sans" style="font-size: 14px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                    </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.card -->
        </div>
    </section>

</div>

<?php get_footer(); ?>
