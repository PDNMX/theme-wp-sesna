<?php
/**
 * Template part para la sección "Entradas por Familia Temática"
 * Explora dinámicamente todas las entradas del sitio, agrupadas
 * en familias editoriales construidas sobre las categorías de WordPress.
 *
 * @param string $args['active_familia'] Clave de familia a pre-seleccionar (opcional).
 *                                       Si se omite, se usa la primera familia.
 */
$sna_familias  = sna_get_familias_tematicas();
$sna_first_key = array_key_first($sna_familias);

// Familia activa: viene de $args (archive.php) o es la primera por defecto
$sna_active_familia = (isset($args['active_familia']) && isset($sna_familias[$args['active_familia']]))
    ? $args['active_familia']
    : $sna_first_key;

$sna_years = sna_get_entradas_years();
$sna_meses = [
	1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
	5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
	9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
];
?>
<div class="contenedor">
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url(home_url('/')); ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Noticias y Actividades</li>
        </ol>
    </nav>
</div>

<section class="pt-5 pb-5 sna-entradas-section" data-active-familia="<?php echo esc_attr($sna_active_familia); ?>">
    <div class="contenedor mt-4 mb-5 pb-4">
        <div class="fila justify-content-center mb-5">
            <div class="columna__8--md text-center">
                <h2 class="fw-bold font-patria sna-section-title sesna-section-heading">Noticias y <span class="text-burgundi">Actividades</span></h2>
                <p class="text-muted">Recorre el contenido de la SESNA organizado por tema de interés.</p>
            </div>
        </div>

        <div class="sna-entradas-filters" role="search" aria-label="Filtrar por fecha">
            <div class="sna-entradas-filter-field">
                <label for="sna-entradas-filter-year">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg> Año
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
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/></svg> Mes
                </label>
                <select id="sna-entradas-filter-month" class="sna-entradas-filter-select">
                    <option value="">Todos</option>
                    <?php foreach ($sna_meses as $num => $nombre) : ?>
                        <option value="<?php echo esc_attr($num); ?>"><?php echo esc_html($nombre); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="button" id="sna-entradas-filter-apply" class="sna-entradas-filter-apply">
                Aplicar filtro <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="ms-1"><path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/></svg>
            </button>

            <button type="button" id="sna-entradas-filter-clear" class="sna-entradas-filter-clear" style="display:none;">
                Quitar filtros <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="ms-1"><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/></svg>
            </button>
        </div>

        <div class="sna-entradas-tabs" role="tablist" aria-label="Familias temáticas">
            <?php foreach ($sna_familias as $key => $familia) :
                $count    = sna_get_familia_post_count($key);
                $is_first = ($key === $sna_active_familia);
            ?>
                <button type="button"
                        class="sna-entradas-tab<?php echo $is_first ? ' active' : ''; ?>"
                        id="tab-<?php echo esc_attr($key); ?>"
                        role="tab"
                        aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                        aria-controls="panel-<?php echo esc_attr($key); ?>"
                        data-familia="<?php echo esc_attr($key); ?>">
                    <span class="sna-entradas-tab-icon" aria-hidden="true"><?php echo $familia['icon']; ?></span>
                    <span class="sna-entradas-tab-label"><?php echo esc_html($familia['label']); ?></span>
                    <span class="sna-entradas-tab-count"><?php echo (int) $count; ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($sna_familias as $key => $familia) :
            $is_first = ($key === $sna_active_familia);
        ?>
            <div class="fila gap--24 justify-content-center sna-entradas-panel<?php echo $is_first ? ' active' : ''; ?>"
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
                Cargar más <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="ms-2"><path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.97-.7 2.8l1.46 1.46C19.54 15.03 20 13.57 20 12c0-4.42-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6 0-1.01.25-1.97.7-2.8L5.24 7.74C4.46 8.97 4 10.43 4 12c0 4.42 3.58 8 8 8v3l4-4-4-4v3z"/></svg>
            </button>
        </div>
    </div>
</section>
