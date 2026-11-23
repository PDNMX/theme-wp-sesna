<?php
/**
 * Datos estáticos de Marco Normativo (page-marco-normativo.php).
 *
 * Catálogos de normatividad externa e interna de la SESNA. Se mantienen como
 * datos puros (título, tipo, etiqueta y URL) separados de la vista.
 *
 * @return array{externa: array<int, array<string,string>>, interna: array<int, array<string,string>>}
 */

if (!defined('ABSPATH')) {
	exit;
}

$externa = [
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
        'url'    => 'https://www.gob.mx/cms/uploads/attachment/file/455434/Acuerdo_por_el_que_se_modifica_el_art_culo_Segundo_Transitorio_del_Acuerdo_por_el_que_el_Comit_....pdf',
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

$interna = [
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
        'titulo' => 'Acuerdo mediante el cual se emiten los lineamientos relativos al control y registro de asistencia de las personas servidoras públicas adscritas a la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.',
        'tipo'   => 'Lineamientos',
        'etiqueta' => 'Lineamientos',
        'url'    => '/wp-content/uploads/2026/08/lineamientos_asistencia_DRHyO.pdf',
    ],
    [
        'titulo' => 'Políticas, Bases y Lineamientos en Materia de Adquisiciones, Arrendamientos de Bienes Muebles y Contratación de Servicios de Cualquier Naturaleza',
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
        'titulo' => 'Programa Institucional de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción 2025-2030.',
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
        'titulo' => 'Programa Anual de Desarrollo Archivístico (PADA) 2026.',
        'tipo'   => 'Programas, Planes y Guías',
        'etiqueta' => 'Programa',
        'url'    => '/wp-content/uploads/2026/08/PADA_2026.pdf',
    ],
];

return array(
    'externa' => $externa,
    'interna' => $interna,
);
