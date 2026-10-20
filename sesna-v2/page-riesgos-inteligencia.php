<?php
/**
 * Template Name: Riesgos e Inteligencia
 *
 * @package sesna
 */

get_header(); ?>

<div class="page-riesgos-inteligencia front-page-bg" style="min-height: 100vh;">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="snd__icono snd-home icono--16" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Riesgos e Inteligencia Anticorrupción</li>
            </ol>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Riesgos e <br>Inteligencia Anticorrupción</h1>
                    <p class="sh1r">
                        Se identifican y analizan riesgos de corrupción para generar herramientas y acciones de prevención en sectores prioritarios.
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
        <div class="mb--24">
            <h2 class="h2b patria color--pguinda600 mb--0">Documentos</h2>
        </div>

        <!-- Texto descriptivo -->
        <div class="b1r color--neutro600 mb--24">
            Consulta análisis y documentos técnicos elaborados para la identificación y prevención de riesgos de corrupción.
        </div>

        <div class="reticulaGrid__12 pt--24">
            <!-- Card 1 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-contrataciones" class="sna-noticias-card radio--4 alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <div class="icon-bg-circle mb--24">
                        <i class="snd__icono snd-portfolio icono--24" aria-hidden="true"></i>
                    </div>
                    <h3 class="sh1b mb--16">Contrataciones<br>públicas</h3>
                    <p class="b1r mb--24">Análisis, estudios y propuestas metodológicas sobre riesgos en contrataciones públicas.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-conflicto" class="sna-noticias-card radio--4 alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <div class="icon-bg-circle mb--24">
                        <i class="snd__icono snd-group icono--24" aria-hidden="true"></i>
                    </div>
                    <h3 class="sh1b mb--16">Conflicto<br>de interés</h3>
                    <p class="b1r mb--24">Diagnósticos y documentos técnicos para la prevención y gestión de conflictos de interés.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-verificacion" class="sna-noticias-card radio--4 alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <div class="icon-bg-circle mb--24">
                        <i class="snd__icono snd-security icono--24" aria-hidden="true"></i>
                    </div>
                    <h3 class="sh1b mb--16">Verificación<br>patrimonial</h3>
                    <p class="b1r mb--24">Documentos y propuestas técnicas para fortalecer mecanismos de verificación patrimonial.</p>
                    <div class="mt--auto texto--derecha--md ancho--100"><span class="sh1b muestra--flex-linea align-items-center color--pguinda600">Consultar</span></div>
                </a>
            </div>
            <!-- Card 4 -->
            <div class="columna__12 columna__6--md columna__3--lg">
                <a href="javascript:void(0)" data-target="#sec-deporte" class="sna-noticias-card radio--4 alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger">
                    <div class="icon-bg-circle mb--24">
                        <i class="snd__icono snd-chart--bar icono--24" aria-hidden="true"></i>
                    </div>
                    <h3 class="sh1b mb--16">Deporte</h3>
                    <p class="b1r mb--24">Guías y herramientas para la prevención de riesgos de corrupción e integridad en el sector deporte.</p>
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
        .cp-subsec-chip {
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid var(--color-burgundi);
            background: #fff;
            color: var(--color-burgundi);
            cursor: pointer;
            transition: background-color .2s ease, color .2s ease;
        }
        .cp-subsec-chip:hover {
            background: rgba(157, 36, 73, 0.08);
        }
        .cp-subsec-chip.is-active {
            background: var(--color-burgundi);
            border-color: var(--color-burgundi);
            color: #fff;
        }

        /* Enlace externo (no es un documento descargable) dentro de una subsección */
        .cp-subsec-enlace {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px 20px;
            padding: 18px 24px;
            border: 1px solid var(--color-teal);
            border-radius: 8px;
            background: rgba(30, 91, 79, 0.06);
        }
        .cp-subsec-enlace__icono {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            background: var(--color-teal);
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
        .cp-subsec-enlace__badge {
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
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
                    <p class="sh1r mb--16 texto--justify">El macroproceso de contrataciones públicas no es sencillo, ya que en él intervienen múltiples subprocesos y actividades específicas. En ese sentido, la implementación de actividades de mejora y control deben estar presentes en múltiples aristas del procedimiento, para asegurar un cambio integral, que permita fortalecerlos, con el fin de mejorar la calidad del gasto, promover la competencia y estimular la transparencia.</p>
                    <p class="sh1r mb--0">Para contribuir con lo anterior se han elaborado los siguientes recursos:</p>
                </div>
            </div>

            <!-- ── Recursos disponibles ──────────────────────────────── -->
            <section class="py--24 pb--48">
                <div class="contenedor">

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

                </div>
            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb--48">
                <div class="contenedor">
                    <div class="cp-nota__inner fondo--azul100">
                        <i class="snd__icono snd-information icono--20 cp-nota__icono color--azul500" aria-hidden="true"></i>
                        <p class="cp-nota__texto b1r color--azul500 mb--0">Estos recursos forman parte del trabajo técnico de la SESNA para fortalecer la integridad en los procesos de contratación pública y prevenir riesgos de corrupción.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="sec-verificacion" class="dinamic-section" style="display: none;">
            <!-- ── Recursos metodológicos ─────────────────────────────── -->
            <section class="py--24 pb--48">
                <div class="contenedor">

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

                    <!-- Filtro por subsección -->
                    <?php if ( ! empty( $subsecciones_verificacion ) ) : ?>
                    <div class="cp-subsec-filtros" id="vp-metodologicos-filtros">
                        <?php foreach ( $subsecciones_verificacion as $indice => $nombre_subseccion ) : ?>
                        <button type="button" class="cp-subsec-chip sdsb<?php echo $indice === 0 ? ' is-active' : ''; ?>" data-filter="<?php echo esc_attr( $nombre_subseccion ); ?>"><?php echo esc_html( $nombre_subseccion ); ?></button>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="cp-docs-lista" id="vp-metodologicos-lista">

                        <!-- Enlace externo (no es un documento): herramienta ALEA -->
                        <div class="cp-subsec-enlace" data-subseccion="ALEA, Muestreo Aleatorio Simple">
                            <div class="cp-subsec-enlace__icono">
                                <i class="snd__icono snd-launch icono--24" aria-hidden="true"></i>
                            </div>
                            <div class="cp-subsec-enlace__texto">
                                <span class="cp-subsec-enlace__badge xsdsb color--pverde500">Enlace externo</span>
                                <p class="cp-subsec-enlace__titulo b1sb color--neutro800">ALEA, Muestreo Aleatorio Simple</p>
                            </div>
                            <a href="https://alea.sesna.gob.mx" class="boton__primario" target="_blank" title="El enlace abre en ventana nueva" rel="noopener">
                                Visitar sitio <i class="snd__icono snd-launch icono--16 ml--4" aria-hidden="true"></i>
                            </a>
                        </div>

                        <?php foreach ( $recursos_verificacion as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb--48">
                <div class="contenedor">
                    <div class="cp-nota__inner fondo--azul100">
                        <i class="snd__icono snd-information icono--20 cp-nota__icono color--azul500" aria-hidden="true"></i>
                        <p class="cp-nota__texto b1r color--azul500 mb--0">Esta herramienta y los documentos asociados forman parte del trabajo técnico de la SESNA para fortalecer la integridad en el servicio público y prevenir riesgos de corrupción.</p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $recursos_conflicto = sesna_get_recursos_por_seccion('conflicto');
        ?>
        <div id="sec-conflicto" class="dinamic-section" style="display: none;">
            <?php if ( ! empty( $recursos_conflicto ) ) : ?>
            <section class="py--24 pb--48">
                <div class="contenedor">

                    <div class="mb--24">
                                <h2 class="h2b patria color--pguinda600 mb--0">Recursos disponibles</h2>
                    </div>

                    <div class="cp-docs-lista">
                        <?php foreach ( $recursos_conflicto as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>
            <?php else : ?>
            <div class="texto--centro py--48">
                <i class="snd__icono snd-settings icono--48 color--neutro600 mb--24" aria-hidden="true"></i>
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
                <div class="contenedor">

                    <div class="mb--24">
                                <h2 class="h2b patria color--pguinda600 mb--0">Recursos disponibles</h2>
                    </div>

                    <div class="cp-docs-lista">
                        <?php foreach ( $recursos_deporte as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>
            <?php else : ?>
            <div class="texto--centro py--48">
                <i class="snd__icono snd-settings icono--48 color--neutro600 mb--24" aria-hidden="true"></i>
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
                    chips.forEach(c => c.classList.remove('is-active'));

                    // Clic sobre el chip ya activo = quitar filtro (mostrar todos)
                    const filtro = yaActivo ? '' : this.getAttribute('data-filter');
                    if (!yaActivo) {
                        this.classList.add('is-active');
                    }

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

<?php get_footer(); ?>
