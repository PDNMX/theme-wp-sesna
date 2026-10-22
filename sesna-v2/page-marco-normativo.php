<?php
/**
 * Template Name: Marco Normativo
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();
?>

<div class="page-marco-normativo front-page-bg">

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
    <div class="contenedor pt--20 pb--64">

        <!-- TABS HORIZONTALES SND (Tabs 2 — Figma 1562:4021 / 16460:3792) -->
        <div class="reticulaGrid__12 mb--32">
            <div class="columna__12">
                <div class="tx-comite-tabs-container ocn-tabs-nav">
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
            </div>
        </div>

        <!-- CARD PRINCIPAL: BUSCADOR + TABLAS DE NORMATIVIDAD -->
        <div class="reticulaGrid__12">
            <div class="columna__12">
                <div class="tx-normativa-card content-section" id="normatividad-section">

                    <!-- Buscador SND v1.1.0 (4.1 Barra de búsqueda — Variante sección interna) -->
                    <div class="reticulaGrid__12 align-items-end mb--24">
                        <div class="columna__12 columna__6--md columna__6--lg">
                            <label for="search-doc" class="b1sb dblock color--neutro800 mb--8">Buscar documento</label>
                            <form class="search-container" role="search" id="form-search-doc" action="javascript:void(0);">
                                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                    <input type="search" id="search-doc" name="q" placeholder="Nombre, palabra clave, año, etc." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- TABPANEL 1: NORMATIVIDAD EXTERNA -->
                    <div id="normatividad-externa-container" role="tabpanel" aria-labelledby="tab-norm-ext">
                        <h2 class="h4b patria color--pguinda600 mb--16" id="normatividad-externa-title">Normatividad externa</h2>
                        <div class="tx-table-responsive" id="normatividad-externa-table-wrap">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Tipo de documento</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="normatividad-externa-body">
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Constitución Política de los Estados Unidos Mexicanos</span></td>
                                        <td><span class="b1r color--neutro700">Constitución Política de los Estados Unidos Mexicanos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/cpeum.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Pacto Internacional de Derechos Civiles y Políticos</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.ohchr.org/es/instruments-mechanisms/instruments/international-covenant-civil-and-political-rights" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Pacto Internacional de Derechos Económicos, Sociales y Culturales</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.ordenjuridico.gob.mx/TratInt/Derechos%20Humanos/D50.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Convención Americana sobre Derechos Humanos</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.cndh.org.mx/sites/default/files/doc/Programas/TrataPersonas/MarcoNormativoTrata/InsInternacionales/Regionales/Convencion_ADH.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Convención Interamericana Contra la Corrupción (OEA)</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.oas.org/es/sla/ddi/docs/tratados_multilaterales_interamericanos_b-58_contra_corrupcion.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Convención para Combatir el Cohecho de Servidores Públicos Extranjeros en Transacciones Comerciales Internacionales</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.oecd.org/content/dam/oecd/es/publications/reports/2011/03/convention-on-combating-bribery-of-foreign-public-officials-in-international-business-transactions_037f7856/24d80d2c-es.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Convención de las Naciones Unidas contra la Corrupción</span></td>
                                        <td><span class="b1r color--neutro700">Tratados Internacionales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.unodc.org/pdf/corruption/publications_unodc_convention-s.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley General de Responsabilidades Administrativas</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Generales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgra.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley General del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Generales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgsna.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley General de Archivos.</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Generales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lga.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley Orgánica de la Administración Pública Federal</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/loapf.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/laassp.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley Federal de Procedimiento Administrativo</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfpa.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley Federal de Procedimiento Contencioso Administrativo</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfpca.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley Federal de las Entidades Paraestatales</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfep.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley de Fiscalización y Rendición de Cuentas de la Federación</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfrcf.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Ley de Amparo, Reglamentaria de los artículos 103 y 107 de la Constitución Política de los Estados Unidos Mexicanos</span></td>
                                        <td><span class="b1r color--neutro700">Leyes Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/lamp.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Código Penal Federal</span></td>
                                        <td><span class="b1r color--neutro700">Códigos Federales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/ref/cpf.htm" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Reglamento de la Ley Federal de las Entidades Paraestatales</span></td>
                                        <td><span class="b1r color--neutro700">Reglamentos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LFEP.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Reglamento de la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público</span></td>
                                        <td><span class="b1r color--neutro700">Reglamentos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LAASSP.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la Política Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2020/03/7.-ACUERDO-MEDIANTE-EL-CUAL-EL-COMITÉ-COORDINADOR-DEL-SISTEMA-NACIONAL-ANTICORRUPCIÓN.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer que los formatos de declaración de situación patrimonial y de intereses son técnicamente operables con el Sistema de Evolución Patrimonial y de Declaración de Intereses de la Plataforma Digital Nacional, así como el inicio de la obligación de los servidores públicos de presentar sus respectivas declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2025/01/211.-ACUERDO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que se modifican los Anexos Primero y Segundo del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/496436/ACUERDO_POR_EL_QUE_SE_MODIFICAN_LOS_ANEXOS_PRIMERO_Y_SEGUNDO_DEL_ACUERDO_POR....pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que se modifica el artículo Segundo Transitorio del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.seseabc.gob.mx/doctos/dof_23092019_formatos_SP.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2019/08/144.dgaj_.acuerdo_cc_sna_formato_declaraciones.pdf.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Implementación y Operación de la Plataforma Digital Nacional y las Bases para el Funcionamiento de la Plataforma Digital Nacional.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/403489/Implementacion_y_Operacion_de_la_PDN_y_las_Bases_para_el_Funcionamiento_de_la_PDN_completo.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Identificación y Transparencia del Beneficiario Final en México y aprueba los Principios para la Identificación y Transparencia del Beneficiario Final para el Combate a la Corrupción en México.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/429768/Acuerdo_mediante_el_cual_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_emite_el_An_lisis_para_la_Identificaci_n_y_....pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la difusión y da a conocer el Protocolo para prevenir, detectar, investigar, perseguir y sancionar el Cohecho Internacional en cualquiera de sus modalidades</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/429770/Acuerdo_por_el_que_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_aprueba_la_difusi_n_y_da_a....pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción designa los días 9 de cada mes como el Día por la Integridad</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/404145/ACUERDO_CC_SESNA_designa_los_dias_9_de_cada_mes_como_el_Dia_por_la_Integridad.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que se dan a conocer los Lineamientos para la emisión del Código de Ética a que se refiere el artículo 16 de la Ley General de Responsabilidades Administrativas</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/483383/2019-08-06_acuerdo_codigo_etica.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer la obligación de presentar las declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/398332/ACUERDO_por_el_que_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_da_a_conocer_la_obligaci_n_de_presentar_las_declaraciones_de_situaci_n_patrimonial...pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos para la incorporación de la información al sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos, Códigos y Reglas de Integridad</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2024/04/0323.-LINEAMIENTOS.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Código de Ética e Integridad para un Buen Gobierno en la Administración Pública Federal.</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos, Códigos y Reglas de Integridad</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2026/01/380.-CODIGO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Reglas de Integridad para el Ejercicio de la Función Pública</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos, Códigos y Reglas de Integridad</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/167646/Reglas-Integridad.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Declaratoria de inicio de funciones del sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.</span></td>
                                        <td><span class="b1r color--neutro700">Declaratoria</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2024/10/09.-DECLARATORIA.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Política Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Políticas</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.dof.gob.mx/2020/SESNA/PNA.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Protocolo para la prevención, atención y sanción del hostigamiento sexual y acoso sexual</span></td>
                                        <td><span class="b1r color--neutro700">Protocolos</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/619797/Protocolo_para_la_prevenci_n__atenci_n_y_sanci_n_del_hostigamiento_sexual_y_acoso_sexual.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="b1r color--neutro600 mb--0 muestra--ninguno" id="normatividad-externa-empty">No se encontraron documentos que coincidan con la búsqueda.</p>

                        <!-- VER MÁS BTN (EXTERNA) — SND v1.1.0 (4.2 Botones .boton__fantasma) -->
                        <div class="reticulaGrid__12" id="normatividad-externa-vermas-wrap">
                            <div class="columna__12">
                                <div class="texto--centro mt--32">
                                    <button type="button" class="boton__fantasma" id="normatividad-externa-vermas-btn">
                                        Ver más documentos <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TABPANEL 2: NORMATIVIDAD INTERNA -->
                    <div id="normatividad-interna-container" class="muestra--ninguno" role="tabpanel" aria-labelledby="tab-norm-int">
                        <h2 class="h4b patria color--pguinda600 mb--16" id="normatividad-interna-title">Normatividad interna</h2>
                        <div class="tx-table-responsive" id="normatividad-interna-table-wrap">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Tipo de documento</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="normatividad-interna-body">
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Estatuto Orgánico de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Estatuto</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2019/06/10.-Estatuto-Organico-de-la-SESNA.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Reglas para la Celebración de las Reuniones Nacionales de los Secretarios Técnicos de las Secretarías Ejecutivas de los Sistemas Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Reglas</span></td>
                                        <td>
                                            <a rel="noopener" href="https://sesaemm.gob.mx/documentos/sc01/06_marco_juridico/05_Reglamentos/Reglamentos_13.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo por el que el Órgano de Gobierno de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción aprueba la celebración de sesiones a distancia</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2020/12/Acuerdo-OG-SESNA-Aprobacion-Celebracion-Sesiones-Distancia-DOF_12Oct2020.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Acuerdo mediante el cual el Sistema Nacional Anticorrupción refrenda los Lineamientos para la emisión del Código de Ética.</span></td>
                                        <td><span class="b1r color--neutro700">Acuerdos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2024/04/0326.-ACUERDO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos que regulan las sesiones del Comité Coordinador del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2024/05/lineamientos-sesiones-CC-SNA-2024.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos que regulan el procedimiento para que el Comité de Participación Ciudadana acceda a la información que genere el Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2019/12/LINEAMIENTOS-QUE-REGULAN-EL-PROCEDIMIENTO-01Oct2019.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos que regulan las sesiones de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2022/03/Lineamientos_Sesiones_CE_SESNA_09Jun2020-07Mar2022.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos que regulan la Generación de Insumos Técnicos de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción para el Comité Coordinador del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2021/07/44.-LINEAMIENTOS....pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Lineamientos relativos al control y registro de asistencia de las personas servidoras públicas adscritas a la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</span></td>
                                        <td><span class="b1r color--neutro700">Lineamientos</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2026/08/lineamientos_asistencia_DRHyO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Políticas, Bases y Lineamientos en Materia de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Políticas</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2021/02/9.-POLITICAS....pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Manual de Integración y Funcionamiento del Subcomité Revisor de Convocatorias para Adquisiciones, Arrendamientos y Prestación de Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Manuales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/389674/5.1_Manual_Subcomite-RUBRICADO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Manual de Integración y Funcionamiento del Comité de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Manuales</span></td>
                                        <td>
                                            <a rel="noopener" href="https://www.gob.mx/cms/uploads/attachment/file/318479/MANUAL_DE_INTEGRACI_N_Y_FUNCIONAMIENTO_DEL_COMT__DE_ADQUISICIONES__ARRENDAMIENTOS_Y_SERVICIOS_DE_LA_SECRETARIA_EJECUTIVA_DEL_SISTEMA_NACIONAL_ANTICORRUPCI_N__-_RUBRICADO.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Manual de Organización General de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span></td>
                                        <td><span class="b1r color--neutro700">Manuales</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2026/01/379.-MANUAL.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Programa Institucional 2025-2030 de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</span></td>
                                        <td><span class="b1r color--neutro700">Programas, Planes y Guías</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2025/10/371-PROGRAMA.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Guía Básica para realizar Eventos Accesibles de la SESNA</span></td>
                                        <td><span class="b1r color--neutro700">Programas, Planes y Guías</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2022/05/Guia-Basica-Eventos-Accesibles-12May2022.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="b1sb color--neutro800">Plan Anual de Desarrollo Archivístico (PADA) 2026.</span></td>
                                        <td><span class="b1r color--neutro700">Programas, Planes y Guías</span></td>
                                        <td>
                                            <a rel="noopener" href="/wp-content/uploads/2026/08/PADA_2026.pdf" target="_blank" title="El enlace abre en ventana nueva" class="boton__fantasma">
                                                Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="b1r color--neutro600 mb--0 muestra--ninguno" id="normatividad-interna-empty">No se encontraron documentos que coincidan con la búsqueda.</p>

                        <!-- VER MÁS BTN (INTERNA) — SND v1.1.0 (4.2 Botones .boton__fantasma) -->
                        <div class="reticulaGrid__12" id="normatividad-interna-vermas-wrap">
                            <div class="columna__12">
                                <div class="texto--centro mt--32">
                                    <button type="button" class="boton__fantasma" id="normatividad-interna-vermas-btn">
                                        Ver más documentos <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script src="<?php echo get_template_directory_uri(); ?>/script/marco-normativo.js?v=2"></script>

<?php get_footer(); ?>
