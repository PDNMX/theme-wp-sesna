<?php
/**
 * Template part para la sección "Entradas por Categoría" (Prensa / Noticias y Actividades)
 * Obtiene dinámicamente todas las categorías de WordPress (wp-admin).
 * Cualquier categoría nueva agregada en WordPress se pinta automáticamente.
 *
 * @param string $args['active_familia'] Slug de categoría a pre-seleccionar (opcional).
 *                                       Si se omite, muestra todas las notas más recientes ('todas').
 */
$sna_familias = sna_get_familias_tematicas();

$sna_requested_cat = '';
if (!empty($args['active_familia']) && isset($sna_familias[$args['active_familia']])) {
    $sna_requested_cat = $args['active_familia'];
} elseif (!empty($_GET['categoria'])) {
    $get_cat = sanitize_title(wp_unslash($_GET['categoria']));
    if (isset($sna_familias[$get_cat])) {
        $sna_requested_cat = $get_cat;
    }
}

$sna_active_familia = $sna_requested_cat !== '' ? $sna_requested_cat : 'todas';

$sna_initial_visible_cats = 12;
$sna_familias_keys        = array_keys($sna_familias);
$sna_active_index         = $sna_active_familia !== 'todas' ? array_search($sna_active_familia, $sna_familias_keys, true) : false;
$sna_extra_expanded       = ($sna_active_index !== false && $sna_active_index >= $sna_initial_visible_cats);

$sna_years = sna_get_entradas_years();
$sna_meses = [
	1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
	5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
	9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
];
?>
<!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
<nav class="ruta__cont" aria-label="Ruta de navegación">
    <div class="contenedor">
        <ul class="ruta__lista">
            <li class="ruta__li">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="ruta__a">
                    <i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio
                </a>
            </li>
            <li class="ruta__li">
                <span class="ruta__a" aria-current="page">Noticias y actividades</span>
            </li>
        </ul>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="sesna-page-hero">
    <div class="contenedor">
        <div class="reticulaGrid__12 align-items-center">
            <div class="columna__12 posicion--relativa z--1">
                <h1 class="h1b patria color--pguinda600">Noticias y Actividades</h1>
                <p class="sh1r color--neutro600 mb--0">Visualiza las notas más recientes o selecciona la categoría de tu preferencia.</p>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="sna-entradas-section" data-active-familia="<?php echo esc_attr($sna_active_familia); ?>">
    <div class="contenedor pt--20 pb--64">

        <!-- PANEL DE FILTROS SND v1.1.0 (4.11 Panel de filtros + 4.1 Barra de búsqueda + Select/Dropatom + ChipAccion) -->
        <div class="tx-comite-panel mb--32" role="search" aria-label="Filtrar noticias y actividades">

            <!-- Fila 1: Buscador interno SND + Año + Mes (filtrado automático) -->
            <div class="reticulaGrid__12 align-items-end sna-entradas-filters">
                <div class="columna__12 columna__12--md columna__6--lg">
                    <label for="sna-entradas-search" class="b1sb dblock color--neutro800 mb--8">Buscar noticia o actividad</label>
                    <form class="search-container" role="search" id="form-sna-entradas-search" action="javascript:void(0);">
                        <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control" id="sna-entradas-search-box">
                            <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                            <input type="search" id="sna-entradas-search" name="s" placeholder="Buscar por palabra clave..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                        </div>
                    </form>
                </div>

                <div class="columna__12 columna__6--md columna__3--lg">
                    <label for="sna-entradas-filter-year" class="b1sb dblock color--neutro800 mb--8">Año</label>
                    <div class="tx-select-wrap">
                        <select id="sna-entradas-filter-year" class="tx-comite-select tx-comite-filter-control sna-entradas-filter-select">
                            <option value="">Todos</option>
                            <?php foreach ($sna_years as $year) : ?>
                                <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="columna__12 columna__6--md columna__3--lg">
                    <label for="sna-entradas-filter-month" class="b1sb dblock color--neutro800 mb--8">Mes</label>
                    <div class="tx-select-wrap">
                        <select id="sna-entradas-filter-month" class="tx-comite-select tx-comite-filter-control sna-entradas-filter-select">
                            <option value="">Todos</option>
                            <?php foreach ($sna_meses as $num => $nombre) : ?>
                                <option value="<?php echo esc_attr($num); ?>"><?php echo esc_html($nombre); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <!-- Divisor horizontal -->
            <hr class="sna-entradas-panel-divider" />

            <!-- Fila 2: Categorías dinámicas de WordPress — Select / Dropatom en Móvil (< 640px) y ChipAccion en Tablet/Desktop (>= 640px) -->
            <div class="sna-entradas-topics-header mb--12">
                <label for="sna-entradas-filter-topic" class="b1sb color--neutro800 mb--0">Categorías</label>
                <button type="button" id="sna-entradas-filter-clear" class="boton__fantasma sna-entradas-filter-clear" style="<?php echo $sna_active_familia !== 'todas' ? '' : 'display:none;'; ?>">
                    Limpiar filtros <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Selector móvil de Categorías (< 640px, sin numeración) -->
            <div class="tx-select-wrap sna-entradas-topic-select-wrap muestra--flex muestra--ninguno--md">
                <select id="sna-entradas-filter-topic" class="tx-comite-select tx-comite-filter-control sna-entradas-filter-select">
                    <option value="todas"<?php selected($sna_active_familia === 'todas'); ?>>Todas las categorías</option>
                    <?php foreach ($sna_familias as $key => $familia) : ?>
                        <option value="<?php echo esc_attr($key); ?>"<?php selected($key === $sna_active_familia); ?>>
                            <?php echo esc_html($familia['label']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
            </div>

            <!-- Chips de Categorías en Tablet/Desktop (>= 640px) -->
            <div class="sna-entradas-tabs-desktop muestra--ninguno muestra--bloque--md" role="region" aria-label="Categorías de entradas">
                <div class="sna-entradas-tabs" id="sna-entradas-tabs">
                    <?php
                    $idx = 0;
                    foreach ($sna_familias as $key => $familia) :
                        $idx++;
                        $is_extra  = ($idx > $sna_initial_visible_cats);
                        $count     = sna_get_familia_post_count($key);
                        $is_active = ($key === $sna_active_familia);
                        $extra_cls = $is_extra ? ' sna-entradas-tab--extra' . ($sna_extra_expanded ? '' : ' muestra--ninguno') : '';
                    ?>
                        <button type="button"
                                class="sna-entradas-tab<?php echo $is_active ? ' active' : ''; ?><?php echo $extra_cls; ?>"
                                id="tab-<?php echo esc_attr($key); ?>"
                                aria-pressed="<?php echo $is_active ? 'true' : 'false'; ?>"
                                data-familia="<?php echo esc_attr($key); ?>">
                            <span class="sna-entradas-tab-label"><?php echo esc_html($familia['label']); ?></span>
                            <span class="sna-entradas-tab-count"><?php echo (int) $count; ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <?php if (count($sna_familias) > $sna_initial_visible_cats) : ?>
                    <div class="texto--centro sna-entradas-toggle-wrap">
                        <button type="button"
                                id="sna-entradas-toggle-cats"
                                class="boton__fantasma"
                                aria-expanded="<?php echo $sna_extra_expanded ? 'true' : 'false'; ?>"
                                aria-controls="sna-entradas-tabs">
                            <span id="sna-entradas-toggle-cats-text"><?php echo $sna_extra_expanded ? 'Ver menos categorías' : 'Ver todas las categorías'; ?></span>
                            <i class="snd__icono <?php echo $sna_extra_expanded ? 'snd-chevron--up' : 'snd-chevron--down'; ?> icono--20" id="sna-entradas-toggle-cats-icon" aria-hidden="true"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- PANEL DE RESULTADOS -->
        <div class="reticulaGrid__12 sna-entradas-panel active"
             id="sna-entradas-results"
             role="region"
             aria-live="polite"
             data-familia="<?php echo esc_attr($sna_active_familia); ?>"
             data-page="0"
             data-loaded="0">
        </div>

        <!-- BOTÓN DE CARGA PROGRESIVA (4.2 Botones — .boton__fantasma) -->
        <div class="reticulaGrid__12">
            <div class="columna__12">
                <div class="texto--centro mt--32">
                    <button type="button" id="sna-entradas-load-more" class="boton__fantasma sna-entradas-load-more-btn" style="display:none;">
                        Ver más noticias <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>
