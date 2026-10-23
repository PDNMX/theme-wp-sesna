<?php
/**
 * Template Name: Marco Normativo
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();

$normatividad_externa = [
    [
        'titulo' => 'Constitución Política de los Estados Unidos Mexicanos',
        'tipo'   => 'Constitución Política de los Estados Unidos Mexicanos',
        'etiqueta' => 'Constitución',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/cpeum.htm',
    ],
    [
        'titulo' => 'Pacto Internacional de Derechos Civiles y Políticos',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.ohchr.org/es/instruments-mechanisms/instruments/international-covenant-civil-and-political-rights',
    ],
    [
        'titulo' => 'Pacto Internacional de Derechos Económicos, Sociales y Culturales',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.ordenjuridico.gob.mx/TratInt/Derechos%20Humanos/D50.pdf',
    ],
    [
        'titulo' => 'Convención Americana sobre Derechos Humanos',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.cndh.org.mx/sites/default/files/doc/Programas/TrataPersonas/MarcoNormativoTrata/InsInternacionales/Regionales/Convencion_ADH.pdf',
    ],
    [
        'titulo' => 'Convención Interamericana Contra la Corrupción (OEA)',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.oas.org/es/sla/ddi/docs/tratados_multilaterales_interamericanos_b-58_contra_corrupcion.pdf',
    ],
    [
        'titulo' => 'Convención para Combatir el Cohecho de Servidores Públicos Extranjeros en Transacciones Comerciales Internacionales',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.oecd.org/content/dam/oecd/es/publications/reports/2011/03/convention-on-combating-bribery-of-foreign-public-officials-in-international-business-transactions_037f7856/24d80d2c-es.pdf',
    ],
    [
        'titulo' => 'Convención de las Naciones Unidas contra la Corrupción',
        'tipo'   => 'Tratados Internacionales',
        'etiqueta' => 'Tratado',
        'url'    => 'https://www.unodc.org/pdf/corruption/publications_unodc_convention-s.pdf',
    ],
    [
        'titulo' => 'Ley General de Responsabilidades Administrativas',
        'tipo'   => 'Leyes Generales',
        'etiqueta' => 'Ley General',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgra.htm',
    ],
    [
        'titulo' => 'Ley General del Sistema Nacional Anticorrupción',
        'tipo'   => 'Leyes Generales',
        'etiqueta' => 'Ley General',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgsna.htm',
    ],
    [
        'titulo' => 'Ley General de Archivos.',
        'tipo'   => 'Leyes Generales',
        'etiqueta' => 'Ley General',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lga.htm',
    ],
    [
        'titulo' => 'Ley Orgánica de la Administración Pública Federal',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/loapf.htm',
    ],
    [
        'titulo' => 'Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/laassp.htm',
    ],
    [
        'titulo' => 'Ley Federal de Procedimiento Administrativo',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lfpa.htm',
    ],
    [
        'titulo' => 'Ley Federal de Procedimiento Contencioso Administrativo',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lfpca.htm',
    ],
    [
        'titulo' => 'Ley Federal de las Entidades Paraestatales',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lfep.htm',
    ],
    [
        'titulo' => 'Ley de Fiscalización y Rendición de Cuentas de la Federación',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lfrcf.htm',
    ],
    [
        'titulo' => 'Ley de Amparo, Reglamentaria de los artículos 103 y 107 de la Constitución Política de los Estados Unidos Mexicanos',
        'tipo'   => 'Leyes Federales',
        'etiqueta' => 'Ley Federal',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lamp.htm',
    ],
    [
        'titulo' => 'Código Penal Federal',
        'tipo'   => 'Códigos Federales',
        'etiqueta' => 'Código',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/ref/cpf.htm',
    ],
    [
        'titulo' => 'Reglamento de la Ley Federal de las Entidades Paraestatales',
        'tipo'   => 'Reglamentos',
        'etiqueta' => 'Reglamento',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LFEP.pdf',
    ],
    [
        'titulo' => 'Reglamento de la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público',
        'tipo'   => 'Reglamentos',
        'etiqueta' => 'Reglamento',
        'url'    => 'https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LAASSP.pdf',
    ],
    [
        'titulo' => 'Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la Política Nacional Anticorrupción',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => '/wp-content/uploads/2020/03/7.-ACUERDO-MEDIANTE-EL-CUAL-EL-COMITÉ-COORDINADOR-DEL-SISTEMA-NACIONAL-ANTICORRUPCIÓN.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer que los formatos de declaración de situación patrimonial y de intereses son técnicamente operables con el Sistema de Evolución Patrimonial y de Declaración de Intereses de la Plataforma Digital Nacional, así como el inicio de la obligación de los servidores públicos de presentar sus respectivas declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => '/wp-content/uploads/2025/01/211.-ACUERDO.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que se modifican los Anexos Primero y Segundo del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/496436/ACUERDO_POR_EL_QUE_SE_MODIFICAN_LOS_ANEXOS_PRIMERO_Y_SEGUNDO_DEL_ACUERDO_POR....pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que se modifica el artículo Segundo Transitorio del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.seseabc.gob.mx/doctos/dof_23092019_formatos_SP.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => '/wp-content/uploads/2019/08/144.dgaj_.acuerdo_cc_sna_formato_declaraciones.pdf.pdf',
    ],
    [
        'titulo' => 'Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Implementación y Operación de la Plataforma Digital Nacional y las Bases para el Funcionamiento de la Plataforma Digital Nacional.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/403489/Implementacion_y_Operacion_de_la_PDN_y_las_Bases_para_el_Funcionamiento_de_la_PDN_completo.pdf',
    ],
    [
        'titulo' => 'Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Identificación y Transparencia del Beneficiario Final en México y aprueba los Principios para la Identificación y Transparencia del Beneficiario Final para el Combate a la Corrupción en México.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/429768/Acuerdo_mediante_el_cual_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_emite_el_An_lisis_para_la_Identificaci_n_y_....pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la difusión y da a conocer el Protocolo para prevenir, detectar, investigar, perseguir y sancionar el Cohecho Internacional en cualquiera de sus modalidades',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/429770/Acuerdo_por_el_que_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_aprueba_la_difusi_n_y_da_a....pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción designa los días 9 de cada mes como el Día por la Integridad',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/404145/ACUERDO_CC_SESNA_designa_los_dias_9_de_cada_mes_como_el_Dia_por_la_Integridad.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que se dan a conocer los Lineamientos para la emisión del Código de Ética a que se refiere el artículo 16 de la Ley General de Responsabilidades Administrativas',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/483383/2019-08-06_acuerdo_codigo_etica.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer la obligación de presentar las declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/398332/ACUERDO_por_el_que_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_da_a_conocer_la_obligaci_n_de_presentar_las_declaraciones_de_situaci_n_patrimonial...pdf',
    ],
    [
        'titulo' => 'Lineamientos para la incorporación de la información al sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.',
        'tipo'   => 'Lineamientos, Códigos y Reglas de Integridad',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2024/04/0323.-LINEAMIENTOS.pdf',
    ],
    [
        'titulo' => 'Código de Ética e Integridad para un Buen Gobierno en la Administración Pública Federal.',
        'tipo'   => 'Lineamientos, Códigos y Reglas de Integridad',
        'etiqueta' => 'Código',
        'url'    => '/wp-content/uploads/2026/01/380.-CODIGO.pdf',
    ],
    [
        'titulo' => 'Reglas de Integridad para el Ejercicio de la Función Pública',
        'tipo'   => 'Lineamientos, Códigos y Reglas de Integridad',
        'etiqueta' => 'Reglas',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/167646/Reglas-Integridad.pdf',
    ],
    [
        'titulo' => 'Declaratoria de inicio de funciones del sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.',
        'tipo'   => 'Declaratoria',
        'etiqueta' => 'Declaratoria',
        'url'    => '/wp-content/uploads/2024/10/09.-DECLARATORIA.pdf',
    ],
    [
        'titulo' => 'Política Nacional Anticorrupción',
        'tipo'   => 'Políticas',
        'etiqueta' => 'Política',
        'url'    => 'https://www.dof.gob.mx/2020/SESNA/PNA.pdf',
    ],
    [
        'titulo' => 'Protocolo para la prevención, atención y sanción del hostigamiento sexual y acoso sexual',
        'tipo'   => 'Protocolos',
        'etiqueta' => 'Protocolo',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/619797/Protocolo_para_la_prevenci_n__atenci_n_y_sanci_n_del_hostigamiento_sexual_y_acoso_sexual.pdf',
    ],
];

$normatividad_interna = [
    [
        'titulo' => 'Estatuto Orgánico de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Estatuto',
        'etiqueta' => 'Estatuto',
        'url'    => '/wp-content/uploads/2019/06/10.-Estatuto-Organico-de-la-SESNA.pdf',
    ],
    [
        'titulo' => 'Reglas para la Celebración de las Reuniones Nacionales de los Secretarios Técnicos de las Secretarías Ejecutivas de los Sistemas Anticorrupción',
        'tipo'   => 'Reglas',
        'etiqueta' => 'Reglas',
        'url'    => 'https://sesaemm.gob.mx/documentos/sc01/06_marco_juridico/05_Reglamentos/Reglamentos_13.pdf',
    ],
    [
        'titulo' => 'Acuerdo por el que el Órgano de Gobierno de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción aprueba la celebración de sesiones a distancia',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => '/wp-content/uploads/2020/12/Acuerdo-OG-SESNA-Aprobacion-Celebracion-Sesiones-Distancia-DOF_12Oct2020.pdf',
    ],
    [
        'titulo' => 'Acuerdo mediante el cual el Sistema Nacional Anticorrupción refrenda los Lineamientos para la emisión del Código de Ética.',
        'tipo'   => 'Acuerdos',
        'etiqueta' => 'Acuerdo',
        'url'    => '/wp-content/uploads/2024/04/0326.-ACUERDO.pdf',
    ],
    [
        'titulo' => 'Lineamientos que regulan las sesiones del Comité Coordinador del Sistema Nacional Anticorrupción',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2024/05/lineamientos-sesiones-CC-SNA-2024.pdf',
    ],
    [
        'titulo' => 'Lineamientos que regulan el procedimiento para que el Comité de Participación Ciudadana acceda a la información que genere el Sistema Nacional Anticorrupción',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2019/12/LINEAMIENTOS-QUE-REGULAN-EL-PROCEDIMIENTO-01Oct2019.pdf',
    ],
    [
        'titulo' => 'Lineamientos que regulan las sesiones de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2022/03/Lineamientos_Sesiones_CE_SESNA_09Jun2020-07Mar2022.pdf',
    ],
    [
        'titulo' => 'Lineamientos que regulan la Generación de Insumos Técnicos de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción para el Comité Coordinador del Sistema Nacional Anticorrupción',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2021/07/44.-LINEAMIENTOS....pdf',
    ],
    [
        'titulo' => 'Lineamientos relativos al control y registro de asistencia de las personas servidoras públicas adscritas a la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2026/08/lineamientos_asistencia_DRHyO.pdf',
    ],
    [
        'titulo' => 'Políticas, Bases y Lineamientos en Materia de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Políticas',
        'etiqueta' => 'Política',
        'url'    => '/wp-content/uploads/2021/02/9.-POLITICAS....pdf',
    ],
    [
        'titulo' => 'Manual de Integración y Funcionamiento del Subcomité Revisor de Convocatorias para Adquisiciones, Arrendamientos y Prestación de Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Manuales',
        'etiqueta' => 'Manual',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/389674/5.1_Manual_Subcomite-RUBRICADO.pdf',
    ],
    [
        'titulo' => 'Manual de Integración y Funcionamiento del Comité de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Manuales',
        'etiqueta' => 'Manual',
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/318479/MANUAL_DE_INTEGRACI_N_Y_FUNCIONAMIENTO_DEL_COMT__DE_ADQUISICIONES__ARRENDAMIENTOS_Y_SERVICIOS_DE_LA_SECRETARIA_EJECUTIVA_DEL_SISTEMA_NACIONAL_ANTICORRUPCI_N__-_RUBRICADO.pdf',
    ],
    [
        'titulo' => 'Manual de Organización General de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción',
        'tipo'   => 'Manuales',
        'etiqueta' => 'Manual',
        'url'    => '/wp-content/uploads/2026/01/379.-MANUAL.pdf',
    ],
    [
        'titulo' => 'Programa Institucional 2025-2030 de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.',
        'tipo'   => 'Programas, Planes y Guías',
        'etiqueta' => 'Programa',
        'url'    => '/wp-content/uploads/2025/10/371-PROGRAMA.pdf',
    ],
    [
        'titulo' => 'Guía Básica para realizar Eventos Accesibles de la SESNA',
        'tipo'   => 'Programas, Planes y Guías',
        'etiqueta' => 'Guía',
        'url'    => '/wp-content/uploads/2022/05/Guia-Basica-Eventos-Accesibles-12May2022.pdf',
    ],
    [
        'titulo' => 'Plan Anual de Desarrollo Archivístico (PADA) 2026.',
        'tipo'   => 'Programas, Planes y Guías',
        'etiqueta' => 'Plan',
        'url'    => '/wp-content/uploads/2026/08/PADA_2026.pdf',
    ],
];
?>

<div class="page-marco-normativo front-page-bg pb--40">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a">
                        <i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Marco Normativo</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero" aria-label="Encabezado de Marco Normativo">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Marco Normativo</h1>
                    <p class="sh1r color--neutro600 mb--0">
                        Sustenta y regula las atribuciones, funciones y actividades de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, así como las disposiciones jurídicas que orientan su actuación y participación en el cumplimiento de los objetivos del Sistema Nacional Anticorrupción.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__6--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/Marco_normativo_Encabezado.png' ); ?>"
                         alt="Marco Normativo"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="contenedor">

        <div class="tx-comite-panel" id="normatividad-section">
            <!-- Tabs — SND UI Kit (Tabs 01 / State: 618:2598 / 1562:3995 / 16460:870) integradas en el panel padre -->
            <div class="tx-comite-tabs-container tx-comite-tabs-container--underline ocn-tabs-nav mb--24">
                <ul class="ul--limpio tx-comite-tabs" role="tablist" aria-label="Secciones de Marco Normativo">
                    <li role="presentation">
                        <button type="button" id="tab-norm-ext" data-target="norm-ext" class="tx-comite-tab js-tab-link active" role="tab" aria-selected="true" aria-controls="normatividad-externa-container" tabindex="0">
                            Normatividad externa
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-norm-int" data-target="norm-int" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="normatividad-interna-container" tabindex="-1">
                            Normatividad interna
                        </button>
                    </li>
                </ul>
            </div>

            <!-- TABPANEL 1: NORMATIVIDAD EXTERNA -->
            <div id="normatividad-externa-container" class="tx-comite-tab-pane" role="tabpanel" aria-labelledby="tab-norm-ext">

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4" id="normatividad-externa-title">Normatividad externa</h2>
                        <p class="b1r color--neutro600 mb--0" id="normatividad-externa-count" aria-live="polite">
                            Mostrando <?= min(5, count($normatividad_externa)) ?> de <?= count($normatividad_externa) ?> documentos
                        </p>
                    </div>
                    <button type="button" id="normatividad-externa-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                        Limpiar filtros
                    </button>
                </div>

                <!-- Filtros Normatividad Externa (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <label for="filter-tipo-ext" class="b1sb dblock color--neutro800 mb--8">Tipo de documento</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-ext" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $tipos_ext = array_unique(array_filter(array_column($normatividad_externa, 'tipo')));
                                foreach ($tipos_ext as $te) : ?>
                                    <option value="<?= esc_attr($te) ?>"><?= esc_html($te) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__8--lg">
                        <label for="search-doc-ext" class="b1sb dblock color--neutro800 mb--8">Buscar documento</label>
                        <form class="search-container" role="search" id="form-search-ext" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                <input type="search" id="search-doc-ext" name="q" placeholder="Nombre, palabra clave, tipo de documento..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de Tarjetas Normatividad Externa -->
                <div class="tx-comite-card-list" id="normatividad-externa-body">
                    <?php foreach ($normatividad_externa as $doc) :
                        $busqueda_ext = trim($doc['titulo'] . ' ' . $doc['tipo'] . ' ' . $doc['etiqueta']);
                    ?>
                        <div class="tx-comite-card tx-norm-ext-card" data-tipo="<?= esc_attr($doc['tipo']) ?>" data-doc-search="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_ext, 'UTF-8') : strtolower($busqueda_ext) ) ?>">

                            <!-- Type Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh1b color--neutro600 mb--0 texto--centro"><?= esc_html($doc['etiqueta']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($doc['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Tipo de documento:</span> <?= esc_html($doc['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <a rel="noopener" href="<?= esc_attr($doc['url']) ?>" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                    Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Estado vacío Externa — 4.16 Mensajes informativos (Informativo) -->
                <div class="aviso aviso--info mt--16 muestra--ninguno" id="normatividad-externa-empty" role="status" aria-live="polite">
                    <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                    <div class="aviso__cont">
                        <div class="aviso__txt">
                            <p class="b1r color--azul500 mb--0">No se encontraron documentos que coincidan con los filtros seleccionados.</p>
                        </div>
                    </div>
                </div>

                <!-- VER MÁS BTN (EXTERNA) -->
                <div class="texto--centro mt--32" id="normatividad-externa-vermas-wrap">
                    <button type="button" class="boton__fantasma" id="normatividad-externa-vermas-btn">
                        Ver más documentos <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                    </button>
                </div>

            </div>

            <!-- TABPANEL 2: NORMATIVIDAD INTERNA -->
            <div id="normatividad-interna-container" class="tx-comite-tab-pane muestra--ninguno" role="tabpanel" aria-labelledby="tab-norm-int">

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4" id="normatividad-interna-title">Normatividad interna</h2>
                        <p class="b1r color--neutro600 mb--0" id="normatividad-interna-count" aria-live="polite">
                            Mostrando <?= min(5, count($normatividad_interna)) ?> de <?= count($normatividad_interna) ?> documentos
                        </p>
                    </div>
                    <button type="button" id="normatividad-interna-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                        Limpiar filtros
                    </button>
                </div>

                <!-- Filtros Normatividad Interna (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <label for="filter-tipo-int" class="b1sb dblock color--neutro800 mb--8">Tipo de documento</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-int" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $tipos_int = array_unique(array_filter(array_column($normatividad_interna, 'tipo')));
                                foreach ($tipos_int as $ti) : ?>
                                    <option value="<?= esc_attr($ti) ?>"><?= esc_html($ti) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__8--lg">
                        <label for="search-doc-int" class="b1sb dblock color--neutro800 mb--8">Buscar documento</label>
                        <form class="search-container" role="search" id="form-search-int" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                <input type="search" id="search-doc-int" name="q" placeholder="Nombre, palabra clave, tipo de documento..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de Tarjetas Normatividad Interna -->
                <div class="tx-comite-card-list" id="normatividad-interna-body">
                    <?php foreach ($normatividad_interna as $doc) :
                        $busqueda_int = trim($doc['titulo'] . ' ' . $doc['tipo'] . ' ' . $doc['etiqueta']);
                    ?>
                        <div class="tx-comite-card tx-norm-int-card" data-tipo="<?= esc_attr($doc['tipo']) ?>" data-doc-search="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_int, 'UTF-8') : strtolower($busqueda_int) ) ?>">

                            <!-- Type Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh1b color--neutro600 mb--0 texto--centro"><?= esc_html($doc['etiqueta']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($doc['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Tipo de documento:</span> <?= esc_html($doc['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['url']) ?>" data-pdf-title="<?= esc_attr($doc['titulo']) ?>">
                                    <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                    Consultar
                                    <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                </button>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Estado vacío Interna — 4.16 Mensajes informativos (Informativo) -->
                <div class="aviso aviso--info mt--16 muestra--ninguno" id="normatividad-interna-empty" role="status" aria-live="polite">
                    <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                    <div class="aviso__cont">
                        <div class="aviso__txt">
                            <p class="b1r color--azul500 mb--0">No se encontraron documentos que coincidan con los filtros seleccionados.</p>
                        </div>
                    </div>
                </div>

                <!-- VER MÁS BTN (INTERNA) -->
                <div class="texto--centro mt--32" id="normatividad-interna-vermas-wrap">
                    <button type="button" class="boton__fantasma" id="normatividad-interna-vermas-btn">
                        Ver más documentos <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script src="<?php echo get_template_directory_uri(); ?>/script/marco-normativo.js?v=3"></script>

<?php get_footer(); ?>
