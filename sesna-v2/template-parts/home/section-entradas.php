<?php
/**
 * Template part para la sección "Entradas por Familia Temática"
 * Explora dinámicamente todas las entradas del sitio, agrupadas
 * en familias editoriales construidas sobre las categorías de WordPress.
 */
$sna_familias = sna_get_familias_tematicas();
$sna_first_key = array_key_first($sna_familias);
$sna_years = sna_get_entradas_years();
$sna_meses = [
	1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
	5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
	9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
];
?>
<section class="pt-5 pb-5 sna-entradas-section">
    <div class="container">
        <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Noticias y Actividades</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4 mb-5 pb-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="fw-bold font-patria sna-section-title sesna-section-heading">Noticias y <span class="text-burgundi">Actividades</span></h2>
                <p class="text-muted">Recorre el contenido de la SESNA organizado por tema de interés.</p>
            </div>
        </div>

        <div class="sna-entradas-filters" role="search" aria-label="Filtrar por fecha">
            <div class="sna-entradas-filter-field">
                <label for="sna-entradas-filter-year">
                    <i class="bi bi-calendar3" aria-hidden="true"></i> Año
                </label>
                <select id="sna-entradas-filter-year" class="sna-entradas-filter-select">
                    <option value="">Todos</option>
                    <?php foreach ($sna_years as $year) : ?>
                        <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="sna-entradas-filter-field">
                <label for="sna-entradas-filter-month">
                    <i class="bi bi-calendar-month" aria-hidden="true"></i> Mes
                </label>
                <select id="sna-entradas-filter-month" class="sna-entradas-filter-select">
                    <option value="">Todos</option>
                    <?php foreach ($sna_meses as $num => $nombre) : ?>
                        <option value="<?php echo esc_attr($num); ?>"><?php echo esc_html($nombre); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="button" id="sna-entradas-filter-apply" class="sna-entradas-filter-apply">
                Aplicar filtro <i class="bi bi-funnel ms-1"></i>
            </button>

            <button type="button" id="sna-entradas-filter-clear" class="sna-entradas-filter-clear" style="display:none;">
                Quitar filtros <i class="bi bi-x-circle ms-1"></i>
            </button>
        </div>

        <div class="sna-entradas-tabs" role="tablist" aria-label="Familias temáticas">
            <?php foreach ($sna_familias as $key => $familia) :
                $count    = sna_get_familia_post_count($key);
                $is_first = ($key === $sna_first_key);
            ?>
                <button type="button"
                        class="sna-entradas-tab<?php echo $is_first ? ' active' : ''; ?>"
                        id="tab-<?php echo esc_attr($key); ?>"
                        role="tab"
                        aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                        aria-controls="panel-<?php echo esc_attr($key); ?>"
                        data-familia="<?php echo esc_attr($key); ?>">
                    <i class="bi <?php echo esc_attr($familia['icon']); ?>" aria-hidden="true"></i>
                    <span class="sna-entradas-tab-label"><?php echo esc_html($familia['label']); ?></span>
                    <span class="sna-entradas-tab-count"><?php echo (int) $count; ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($sna_familias as $key => $familia) :
            $is_first = ($key === $sna_first_key);
        ?>
            <div class="row g-4 justify-content-center sna-entradas-panel<?php echo $is_first ? ' active' : ''; ?>"
                 id="panel-<?php echo esc_attr($key); ?>"
                 role="tabpanel"
                 aria-labelledby="tab-<?php echo esc_attr($key); ?>"
                 data-familia="<?php echo esc_attr($key); ?>"
                 data-page="0"
                 data-loaded="0">
            </div>
        <?php endforeach; ?>

        <div class="text-center mt-4">
            <button type="button" id="sna-entradas-load-more" class="sna-entradas-load-more-btn" style="display:none;">
                Cargar más <i class="bi bi-arrow-clockwise ms-2"></i>
            </button>
        </div>
    </div>
</section>
