<?php
/**
 * Template Name: Transparencia - Datos Personales
 */

get_header();

// Obtener los documentos de la función dinámica que creamos
$documentos = sesna_get_datos_personales_docs();

?>

<div class="page-transparencia-datos front-page-bg pb--40">
    <!-- Breadcrumb -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>" class="ruta__a">Transparencia</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Datos Personales</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Datos Personales</h1>
                    <p class="sh1r color--neutro600 mb--0">
                        Consulta los avisos de privacidad y otros documentos importantes respecto al tratamiento de los datos personales en posesión de la SESNA.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenedor Principal -->
    <div class="contenedor">

        <div class="tx-comite-tab-content">
            <!-- Filtros -->
            <div class="reticulaGrid__12 mb--32 align-items-end">
                <div class="columna__12 columna__6--md columna__3--lg">
                    <label for="filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
                    <div class="tx-select-wrap">
                        <select id="filter-anio" class="tx-comite-select tx-comite-filter-control">
                            <option value="Todos">Todos</option>
                            <?php
                            $anios_doc = array_unique(array_column($documentos, 'anio'));
                            rsort($anios_doc);
                            foreach($anios_doc as $a): ?>
                                <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="columna__12 columna__6--md columna__4--lg">
                    <label for="filter-tipo" class="b1sb dblock color--neutro800 mb--8">Tipo de documento</label>
                    <div class="tx-select-wrap">
                        <select id="filter-tipo" class="tx-comite-select tx-comite-filter-control">
                            <option value="Todos">Todos</option>
                            <?php 
                            $tipos_doc = array_unique(array_column($documentos, 'tipo'));
                            sort($tipos_doc);
                            foreach($tipos_doc as $t): ?>
                                <option value="<?= esc_attr($t) ?>"><?= esc_html($t) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <!-- Lista de Documentos -->
            <div class="reticulaGrid__12">
                <div class="columna__12">
                    <div class="tx-comite-card-list" id="documentos-list-container">
                        <?php foreach ($documentos as $doc): ?>
                        <!-- Card — SND UI Kit (Cards *: 12022:57247 / 37597:51336) -->
                        <div class="tx-comite-card tx-sesion-card" data-anio="<?= esc_attr($doc['anio']) ?>" data-tipo="<?= esc_attr($doc['tipo']) ?>">

                            <!-- Date Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh0b color--neutro600 mb--0 tx-comite-card-year"><?= esc_html($doc['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($doc['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Categoría:</span> <?= esc_html($doc['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['enlace']) ?>" data-pdf-title="<?= esc_attr($doc['titulo']) ?>">
                                    <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                    Consultar
                                    <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                </button>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Ver más Documentos -->
            <div class="reticulaGrid__12">
                <div class="columna__12">
                    <div class="texto--centro mt--32" id="documentos-load-more-container">
                        <button type="button" id="documentos-btn-more" class="boton__fantasma">
                            Ver más documentos <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering and pagination
    const filterAnio = document.getElementById('filter-anio');
    const filterTipo = document.getElementById('filter-tipo');
    const cards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const btnMore = document.getElementById('documentos-btn-more');
    const loadMoreContainer = document.getElementById('documentos-load-more-container');
    let visibleLimit = 5;

    function applyFilters() {
        const anio = filterAnio ? filterAnio.value : 'Todos';
        const tipo = filterTipo ? filterTipo.value : 'Todos';
        
        let visibleCount = 0;
        let totalMatched = 0;

        cards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio');
            const cardTipo = card.getAttribute('data-tipo');
            
            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todos' || cardTipo === tipo;

            if (matchAnio && matchTipo) {
                if (totalMatched < visibleLimit) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (totalMatched > visibleLimit && loadMoreContainer) {
            loadMoreContainer.style.display = 'block';
        } else if (loadMoreContainer) {
            loadMoreContainer.style.display = 'none';
        }
    }

    if(filterAnio) filterAnio.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    if(filterTipo) filterTipo.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    
    if(btnMore) {
        btnMore.addEventListener('click', function(e) {
            e.preventDefault();
            visibleLimit += 5;
            applyFilters();
        });
    }

    applyFilters();
});
</script>

<?php get_footer(); ?>