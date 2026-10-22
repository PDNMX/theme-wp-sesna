<?php
/**
 * Template Name: Transparencia - Normativa
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();

$normatividad_externa = [
    [
        'titulo' => 'Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados.',
        'tipo'   => 'Ley',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgpdppso.htm'
    ],
    [
        'titulo' => 'Ley General de Transparencia y Acceso a la Información Pública.',
        'tipo'   => 'Ley',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgtaip.htm'
    ],
    [
        'titulo' => 'Ley General de Archivo.',
        'tipo'   => 'Ley',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lga.htm'
    ]
];
?>

<div class="page-transparencia-normatividad front-page-bg pb--40">

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
                    <span class="ruta__a" aria-current="page">Normativa</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero" aria-label="Encabezado de Normativa">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Normativa</h1>
                    <p class="sh1r color--neutro600 mb--0">
                        Consulta la información en materia de transparencia: leyes, lineamientos y demás disposiciones que rigen el acceso a la información pública.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Listado de Normativa -->
    <section class="tx-normativa">
        <div class="contenedor">

            <!-- Card Principal: Tabla de Normativa en Materia de Transparencia -->
            <div class="reticulaGrid__12 mb--32">
                <div class="columna__12">
                    <div class="tx-normativa-card">

                        <!-- Encabezado de la Card -->
                        <div class="tx-normativa-card__header mb--24">
                            <div class="tx-normativa-card__icon" aria-hidden="true">
                                <i class="snd__icono snd-security icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h2 class="h4b patria color--pguinda600 mb--4">Normativa en materia de transparencia</h2>
                                <p class="b1r color--neutro600 mb--0">Consulta la normativa aplicable en materia de transparencia, acceso a la información, protección de datos personales y gestión documental.</p>
                            </div>
                        </div>

                        <!-- Tabla SND v1.1.0 (4.11 Tabla, Figma 12022:54768 / 9083:41328) -->
                        <div class="tx-table-responsive">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Tipo de documento</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($normatividad_externa as $doc) : ?>
                                        <tr>
                                            <td>
                                                <span class="b1sb color--neutro800"><?= esc_html($doc['titulo']) ?></span>
                                            </td>
                                            <td>
                                                <span class="b1r color--neutro700"><?= esc_html($doc['tipo']) ?></span>
                                            </td>
                                            <td>
                                                <a href="<?= esc_url($doc['url']) ?>" target="_blank" rel="noopener" title="El enlace abre en ventana nueva" class="boton__fantasma" aria-label="Consultar <?= esc_attr($doc['titulo']) ?>">
                                                    Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Card de Redirección: Marco Normativo -->
            <div class="reticulaGrid__12">
                <div class="columna__12">
                    <div class="tx-normativa-card tx-normativa-card--cta">
                        <div class="tx-normativa-card__header">
                            <div class="tx-normativa-card__icon" aria-hidden="true">
                                <i class="snd__icono snd-building icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h2 class="sh1b color--neutro800 mb--4">¿Deseas consultar más normativa?</h2>
                                <p class="b1r color--neutro600 mb--0">Visita la sección de Órganos Colegiados y Normativa de la SESNA.</p>
                            </div>
                        </div>
                        <a href="<?= esc_url( home_url('/marco-normativo/') ) ?>" class="boton__secundario">
                            Marco Normativo <i class="snd__icono snd-arrow--right icono--20" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<?php get_footer(); ?>
