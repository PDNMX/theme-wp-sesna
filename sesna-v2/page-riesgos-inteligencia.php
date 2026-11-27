<?php
/**
 * Template Name: Riesgos e Inteligencia
 *
 * @package sesna
 */

get_header(); ?>

<div class="page-riesgos-inteligencia front-page-bg">

    <!-- Breadcrumb -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Acciones y Programas', 'url' => home_url('/acciones-y-programas/') ),
            array( 'label' => 'Riesgos e Inteligencia Anticorrupción' ),
        ),
    ) ); ?>

    <!-- Hero Banner -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Riesgos e <br>Inteligencia Anticorrupción</h1>
                    <p class="sh1r texto--justify">
                        Elaboramos propuestas de metodologías,herramnientas y estudios especializados en materia de análisis, gestión y mitigación de riesgos de corrupción.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__6--lg muestra--ninguno muestra--flex--md align-items-center justify-content-flex-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('Riegos e Inteligencia Encabezado.png') ); ?>"
                         alt="Riesgos e Inteligencia Anticorrupción"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Documentos Section -->
    <section class="contenedor mb--48">
        <h2 class="h2b patria color--pguinda600 mb--8">Documentos</h2>

        <!-- Texto descriptivo -->
        <p class="sh1r color--neutro600 mb--0">
            Consulta los estudios, análisis y herramientas desarrolladas.
        </p>

        <div class="reticulaGrid__12 pt--24">
            <!-- Card 1 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-contrataciones" class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/dgria/contrataciones.png' ); ?>" alt="" width="80" height="80" class="mb--24">
                    <h3 class="sh1b mb--16">Contrataciones públicas</h3>
                    <p class="b1r texto--justify">Estudios y propuestas metodológicas orientadas a identificar riesgos de corrupción y fortalecer la integridad en los procesos de contratación pública.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-conflicto" class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/dgria/conflicto_de_interes.png' ); ?>" alt="" width="80" height="80" class="mb--24">
                    <h3 class="sh1b mb--16">Conflicto de interés</h3>
                    <p class="b1r texto--justify">Documentos técnicos para la prevención, detección y atención de conflictos de interés.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-verificacion" class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/dgria/verificacion_patrimonial.png' ); ?>" alt="" width="80" height="80" class="mb--24">
                    <h3 class="sh1b mb--16">Verificación patrimonial</h3>
                    <p class="b1r texto--justify">Documentos técnicos y herramientas que facilitan el proceso de verificación patrimonial.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 4 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-deporte" class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/dgria/deporte.png' ); ?>" alt="" width="80" height="80" class="mb--24">
                    <h3 class="sh1b mb--16">Deporte</h3>
                    <p class="b1r texto--justify">Herramientas y guías para fortalecer la integridad en el el sector deportivo.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
        </div>
    </section>

    <!-- Filtro por subsección (chips) de "Recursos metodológicos" -->
    <style>
        .cp-subsec-filtros {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        /* Enlace externo (no es un documento descargable) dentro de una subsección */
        .cp-subsec-enlace {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px 20px;
            padding: 18px 24px;
            border: 1px solid var(--pguinda600);
            border-radius: 8px;
            background: rgba(155, 34, 71, 0.06);
        }
        .cp-subsec-enlace__icono {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            background: var(--pguinda600);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .cp-subsec-enlace__texto {
            flex: 1;
            min-width: 200px;
        }
        .cp-subsec-enlace__titulo {
            margin: 0;
        }
    </style>

    <!-- CONTENEDORES DINÁMICOS -->
    <div id="dinamic-content-wrapper" class="contenedor mt--48 mb--48 pt--24 borde--superior" style="display: none; scroll-margin-top: 100px;">

        <div id="sec-contrataciones" class="dinamic-section" style="display: none;">
            <!-- Texto descriptivo -->
            <div class="fila">
                <div class="columna__12 posicion--relativa z--1">
                    <h2 class="h2b patria color--pguinda600">Contrataciones públicas</h2>
                    <p class="sh1r mb--16 texto--justify">Las contrataciones públicas involucran distintas etapas, actividades y actores, por lo que es necesario contar con mecanismos para dar seguimiento e identificar posibles riesgos de corrupción. Para contribuir a estos objetivos, se han elaborado los siguientes análisis y propuestas metodológicas:</p>
                </div>
            </div>

            <!-- ── Recursos disponibles ──────────────────────────────── -->
            <section class="py--24 pb--48">

                <!-- Encabezado de sección -->
                <div class="mb--24">
                    <h2 class="h2b patria color--pguinda600 mb--0">Recursos disponibles</h2>
                </div>

                <!-- Lista de documentos -->
                <div class="cp-docs-lista">

                    <?php
                    $recursos_contrataciones = sesna_get_recursos_por_seccion('contrataciones');
                    foreach ( $recursos_contrataciones as $recurso ) :
                        sesna_render_recurso_card( $recurso );
                    endforeach;
                    ?>

                </div><!-- /.cp-docs-lista -->

            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb--48">
                <div class="cp-nota__inner fondo--azul100">
                    <?= sesna_render_snd_svg_icon('snd-information', 'icono--20 cp-nota__icono color--azul500') ?>
                    <p class="cp-nota__texto b1r color--azul500 mb--0">Estos recursos forman parte del trabajo técnico de la SESNA para fortalecer la integridad en los procesos de contratación pública y prevenir riesgos de corrupción.</p>
                </div>
            </div>
        </div>

        <div id="sec-verificacion" class="dinamic-section" style="display: none;">
            <!-- Texto descriptivo -->
            <div class="fila">
                <div class="columna__12 posicion--relativa z--1">
                    <h2 class="h2b patria color--pguinda600">Verificación patrimonial</h2>
                    <p class="sh1r mb--16 texto--justify">Es una actividad central para identificar posibles inconsistencias en las declaraciones patrimoniales de las personas servidoras públicas y prevenir riesgos de corrupción. Para llevar a cabo la verificación se necesita contar con información confiable y herramientas que permitan analizar las declaraciones.</p>
                    <p class="sh1r mb--16 texto--justify">Con el propósito de apoyar a algunas de estas tareas, se han desarrollado los siguientes estudios, análisis y herramientas:</p>
                </div>
            </div>

            <!-- ── Recursos metodológicos ─────────────────────────────── -->
            <section class="py--24 pb--48">

                <div class="mb--24">
                    <h2 class="h2b patria color--pguinda600 mb--0">Recursos metodológicos</h2>
                </div>

                <?php
                $recursos_verificacion     = sesna_get_recursos_por_seccion('verificacion');
                $subsecciones_verificacion = array();
                foreach ( $recursos_verificacion as $recurso ) {
                    $nombre_subseccion = get_post_meta( $recurso->ID, '_sesna_recurso_subseccion', true );
                    if ( ! empty( $nombre_subseccion ) && ! in_array( $nombre_subseccion, $subsecciones_verificacion, true ) ) {
                        $subsecciones_verificacion[] = $nombre_subseccion;
                    }
                }
                ?>

                <!-- Filtro por subsección (Píldoras SND v1.0.0) -->
                <?php if ( ! empty( $subsecciones_verificacion ) ) : ?>
                <div class="pildora__grupo cp-subsec-filtros" id="vp-metodologicos-filtros" role="group" aria-label="Filtrar por subsección">
                    <?php foreach ( $subsecciones_verificacion as $indice => $nombre_subseccion ) : ?>
                    <button type="button" class="pildora cp-subsec-chip<?php echo $indice === 0 ? ' is-active' : ''; ?>" aria-pressed="<?php echo $indice === 0 ? 'true' : 'false'; ?>" data-filter="<?php echo esc_attr( $nombre_subseccion ); ?>"><?php echo esc_html( $nombre_subseccion ); ?></button>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="cp-docs-lista" id="vp-metodologicos-lista">

                    <?php foreach ( $recursos_verificacion as $recurso ) :
                        sesna_render_recurso_card( $recurso );
                        if ( $recurso->ID === 12299 ) : ?>
                    <!-- Enlace externo (no es un documento): herramienta ALEA -->
                    <div class="cp-subsec-enlace" data-subseccion="ALEA, Muestreo Aleatorio Simple">
                        <div class="cp-subsec-enlace__icono">
                            <?= sesna_render_snd_svg_icon('snd-launch', 'icono--24') ?>
                        </div>
                        <div class="cp-subsec-enlace__texto">
                            <span class="insignia-borde insignia-guinda mb--4">Herramienta</span>
                            <p class="cp-subsec-enlace__titulo b1sb color--neutro800">ALEA, Muestreo Aleatorio Simple</p>
                        </div>
                        <a href="https://alea.sesna.gob.mx" class="boton__primario" target="_blank" title="El enlace abre en ventana nueva" rel="noopener">
                            <?= sesna_render_snd_svg_icon('snd-launch', 'icono--16') ?> Visitar sitio
                        </a>
                    </div>
                        <?php endif;
                    endforeach; ?>
                </div>

            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb--48">
                <div class="cp-nota__inner fondo--azul100">
                    <?= sesna_render_snd_svg_icon('snd-information', 'icono--20 cp-nota__icono color--azul500') ?>
                    <p class="cp-nota__texto b1r color--azul500 mb--0">Esta herramienta y los documentos asociados forman parte del trabajo técnico de la SESNA para fortalecer la integridad en el servicio público y prevenir riesgos de corrupción.</p>
                </div>
            </div>
        </div>

        <?php
        $recursos_conflicto = sesna_get_recursos_por_seccion('conflicto');
        ?>
        <div id="sec-conflicto" class="dinamic-section" style="display: none;">
            <!-- Texto descriptivo -->
            <div class="fila">
                <div class="columna__12 posicion--relativa z--1">
                    <h2 class="h2b patria color--pguinda600">Conflicto de interés</h2>
                    <p class="sh1r mb--16 texto--justify">El conflicto de interés consiste en aquellas situaciones en las que el criterio de las personas servidoras públicas está influenciado por intereses particulares y, por lo tanto, hay una posibilidad de que su desempeño sea imparcial.</p>
                </div>
            </div>

            <?php if ( ! empty( $recursos_conflicto ) ) : ?>
            <section class="py--24 pb--48">

                <div class="mb--24">
                    <h2 class="h2b patria color--pguinda600 mb--0">Recursos disponibles</h2>
                </div>

                <div class="cp-docs-lista">
                    <?php foreach ( $recursos_conflicto as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                </div>

            </section>
            <?php else : ?>
            <div class="texto--centro py--48">
                <?= sesna_render_snd_svg_icon('snd-settings', 'icono--48 color--neutro600 mb--24') ?>
                <h3 class="sh0b color--neutro800">Contenido en construcción</h3>
                <p class="b1r color--neutro600">Los recursos para Conflicto de interés estarán disponibles próximamente.</p>
            </div>
            <?php endif; ?>
        </div>

        <?php
        $recursos_deporte = sesna_get_recursos_por_seccion('deporte');
        ?>
        <div id="sec-deporte" class="dinamic-section" style="display: none;">
            <?php if ( ! empty( $recursos_deporte ) ) : ?>
            <section class="py--24 pb--48">

                <div class="mb--24">
                    <h2 class="h2b patria color--pguinda600 mb--0">Recursos disponibles</h2>
                </div>

                <div class="cp-docs-lista">
                    <?php foreach ( $recursos_deporte as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                </div>

            </section>
            <?php else : ?>
            <div class="texto--centro py--48">
                <?= sesna_render_snd_svg_icon('snd-settings', 'icono--48 color--neutro600 mb--24') ?>
                <h3 class="sh0b color--neutro800">Contenido en construcción</h3>
                <p class="b1r color--neutro600">Los recursos para Deporte estarán disponibles próximamente.</p>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <!-- JAVASCRIPT PARA PESTAÑAS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.sna-tab-trigger');
        const sections = document.querySelectorAll('.dinamic-section');
        const wrapper = document.getElementById('dinamic-content-wrapper');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();

                // Remover active de todas las tarjetas (opcional para estilo visual)
                triggers.forEach(t => t.style.boxShadow = '');
                this.style.boxShadow = '0 0 0 2px rgba(155, 34, 66, 1)'; // Estilo activo guinda

                // Ocultar todas las secciones
                sections.forEach(sec => sec.style.display = 'none');

                // Mostrar wrapper principal
                wrapper.style.display = 'block';

                // Mostrar sección seleccionada
                const targetId = this.getAttribute('data-target');
                const targetSec = document.querySelector(targetId);
                if (targetSec) {
                    targetSec.style.display = 'block';

                    // Hacer scroll suave hacia el contenido
                    wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Filtro por subsección (chips) de "Recursos metodológicos"
        const filtros = document.getElementById('vp-metodologicos-filtros');
        const lista = document.getElementById('vp-metodologicos-lista');
        if (filtros && lista) {
            const chips = filtros.querySelectorAll('.cp-subsec-chip');
            const items = lista.querySelectorAll('[data-subseccion]');

            const aplicarFiltro = (filtro) => {
                items.forEach(item => {
                    const coincide = !filtro || item.getAttribute('data-subseccion') === filtro;
                    item.style.display = coincide ? '' : 'none';
                });
            };

            chips.forEach(chip => {
                chip.addEventListener('click', function() {
                    const yaActivo = this.classList.contains('is-active');
                    chips.forEach(c => {
                        c.classList.remove('is-active');
                        c.setAttribute('aria-pressed', 'false');
                    });

                    // Clic sobre la píldora ya activa = quitar filtro (mostrar todos)
                    const filtro = yaActivo ? '' : this.getAttribute('data-filter');
                    if (!yaActivo) {
                        this.classList.add('is-active');
                        this.setAttribute('aria-pressed', 'true');
                    }

                    // Sincronizar aria-pressed después del listener delegado de snd.js en document
                    setTimeout(() => {
                        chips.forEach(c => {
                            c.setAttribute('aria-pressed', c.classList.contains('is-active') ? 'true' : 'false');
                        });
                    }, 0);

                    aplicarFiltro(filtro);
                });
            });

            // Estado inicial: el primer chip viene marcado "is-active" desde PHP,
            // así que por default solo se ve esa subsección (ej. "ALEA").
            const chipActivoInicial = filtros.querySelector('.cp-subsec-chip.is-active');
            if (chipActivoInicial) {
                aplicarFiltro(chipActivoInicial.getAttribute('data-filter'));
            }
        }
    });
    </script>

</div>

<?php get_template_part('template-parts/visor-pdf'); ?>

<?php get_footer(); ?>
