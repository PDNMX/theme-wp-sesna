<?php
/**
 * Anexo Transversal Anticorrupción (ATA): sincronización y parseo de datos presupuestarios desde Google Sheets.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * ID del Google Sheet (con varias pestañas) que el equipo mantiene con los datos
 * del Anexo Transversal Anticorrupción (ATA) para la página de Presupuestación.
 */
define('SESNA_ATA_SHEET_ID', '1ThHOo2EQfDgqxODx-2GkrJsvbXz-hQIn');

/**
 * Descarga y parsea como CSV una pestaña (gid) del Google Sheet público del ATA,
 * con caché por transient. Devuelve un array de filas (incluye la fila de
 * encabezados) o false si falla.
 */
function sesna_obtener_csv_google_sheet($gid, $cache_key, $cache_duration = HOUR_IN_SECONDS) {
    $cached = get_transient($cache_key);
    if (false !== $cached) {
        return $cached;
    }

    $url = sprintf(
        'https://docs.google.com/spreadsheets/d/%s/export?format=csv&gid=%s',
        SESNA_ATA_SHEET_ID,
        rawurlencode($gid)
    );
    $response = wp_remote_get($url, array('timeout' => 10));

    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    if (empty($body)) {
        return false;
    }

    $lineas = array_filter(array_map('trim', explode("\n", $body)), 'strlen');
    $filas  = array();
    foreach ($lineas as $linea) {
        $filas[] = str_getcsv($linea);
    }

    if (count($filas) < 2) {
        return false;
    }

    set_transient($cache_key, $filas, $cache_duration);

    return $filas;
}

/**
 * Convierte un monto con formato "$3.315,74" (miles con punto, decimales con
 * coma) a float. Regresa null si no es un número válido.
 */
function sesna_parsear_monto_mx($texto) {
    $num = preg_replace('/[^0-9,.-]/', '', trim($texto));
    $num = str_replace('.', '', $num);
    $num = str_replace(',', '.', $num);
    return is_numeric($num) ? (float) $num : null;
}

/**
 * Convierte un porcentaje con formato "82,76%" a float (82.76). Regresa null
 * si no es un número válido.
 */
function sesna_parsear_porcentaje_mx($texto) {
    $num = str_replace('%', '', trim($texto));
    $num = str_replace(',', '.', $num);
    return is_numeric($num) ? (float) $num : null;
}

/**
 * Datos de "Evolución presupuestal" (pestaña "Año,Monto"). Si la hoja no está
 * disponible, regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_presupuesto_ata() {
    $filas = sesna_obtener_csv_google_sheet('1894395896', 'sesna_ata_presupuesto_csv');

    $respaldo = array(
        'anios'  => array('2021', '2022', '2023', '2024', '2025', '2026'),
        'montos' => array(3315.74, 3532.04, 6711.38, 9109.09, 7939.30, 9599.12),
    );

    if (false === $filas) {
        return $respaldo;
    }

    array_shift($filas); // encabezado: Año,Monto en millones de pesos

    $anios  = array();
    $montos = array();
    foreach ($filas as $fila) {
        if (count($fila) < 2) {
            continue;
        }
        $anio  = trim($fila[0]);
        $monto = sesna_parsear_monto_mx($fila[1]);

        if ('' === $anio || null === $monto) {
            continue;
        }

        $anios[]  = $anio;
        $montos[] = $monto;
    }

    return empty($anios) ? $respaldo : array('anios' => $anios, 'montos' => $montos);
}

/**
 * Datos de "Instituciones participantes por año" (pestaña con matriz
 * Institución x Año, valor "Participó" o vacío). Regresa la lista de
 * instituciones por año y el total por año. Si la hoja no está disponible,
 * regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_instituciones_ata() {
    $filas = sesna_obtener_csv_google_sheet('792763780', 'sesna_ata_instituciones_csv');

    $respaldo = array(
        'por_anio' => array(
            '2021' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
            '2022' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
            '2023' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','CONAMER','CONACYT','SRE','INMUJERES','AGN'),
            '2024' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
            '2025' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
            '2026' => array('SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','INMUJERES','SE','TDJ','SECIHTI','Cultura','Defensa Nacional','SEDATU','FGR','SEGOB','SCT','ISSSTE','IMSS','INPI','Marina','Medio Ambiente','Órgano de Administración Judicial','Salud','IMSS Bienestar','STPS','Tribunales Agrarios','SECTUR'),
        ),
        'totales' => array('2021' => 9, '2022' => 9, '2023' => 17, '2024' => 17, '2025' => 17, '2026' => 29),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Institución,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $por_anio = array_fill_keys($anios, array());
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $institucion = trim($fila[0]);
        foreach ($anios as $i => $anio) {
            $valor = isset($fila[$i + 1]) ? trim($fila[$i + 1]) : '';
            if ('' !== $valor) {
                $por_anio[$anio][] = $institucion;
            }
        }
    }

    $totales = array();
    foreach ($por_anio as $anio => $lista) {
        $totales[$anio] = count($lista);
    }

    return empty($por_anio) ? $respaldo : array('por_anio' => $por_anio, 'totales' => $totales);
}

/**
 * Datos de "Alineación porcentual por Capítulo de Clasificación del Gasto"
 * (pestaña con filas 1000-6000 y columnas de años, valores en %). Si la hoja
 * no está disponible, regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_capitulos_ata() {
    $filas = sesna_obtener_csv_google_sheet('1416393738', 'sesna_ata_capitulos_csv');

    $respaldo = array(
        'anios'  => array('2021', '2022', '2023', '2024', '2025', '2026'),
        'datos'  => array(
            '1000' => array(82.76, 85.14, 85.15, 87.74, 89.29, 89.14),
            '2000' => array(0.72, 0.50, 0.56, 0.52, 0.65, 0.88),
            '3000' => array(16.30, 14.15, 13.55, 11.42, 9.79, 9.68),
            '4000' => array(0.18, 0.18, 0.67, 0.27, 0.21, 0.28),
            '5000' => array(0.04, 0.03, 0.03, 0.02, 0.03, 0.02),
            '6000' => array(0.00, 0.00, 0.04, 0.03, 0.04, 0.00),
        ),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Capítulo/Año ,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $datos = array();
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $capitulo  = trim($fila[0]);
        $valores   = array();
        foreach ($anios as $i => $anio) {
            $pct = isset($fila[$i + 1]) ? sesna_parsear_porcentaje_mx($fila[$i + 1]) : null;
            $valores[] = null !== $pct ? $pct : 0;
        }
        $datos[$capitulo] = $valores;
    }

    return empty($datos) ? $respaldo : array('anios' => $anios, 'datos' => $datos);
}

/**
 * Datos de "Monto de presupuesto asignado por Eje-Objetivo" (pestaña con filas
 * Eje 1-4 y columnas de años, valores en pesos). Si la hoja no está disponible,
 * regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_ejes_ata() {
    $filas = sesna_obtener_csv_google_sheet('694836072', 'sesna_ata_ejes_csv');

    $respaldo = array(
        'anios' => array('2021', '2022', '2023', '2024', '2025'),
        'datos' => array(
            'Eje 1' => array(2483.70, 2659.53, 1939.50, 2276.25, 1918.83),
            'Eje 2' => array(693.49, 737.84, 4498.88, 5015.50, 4410.60),
            'Eje 3' => array(56.67, 47.57, 185.29, 684.09, 476.32),
            'Eje 4' => array(81.88, 87.10, 87.70, 1133.25, 1133.54),
        ),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Eje/Año,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $datos = array();
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $eje     = trim($fila[0]);
        $valores = array();
        foreach ($anios as $i => $anio) {
            $monto     = isset($fila[$i + 1]) ? sesna_parsear_monto_mx($fila[$i + 1]) : null;
            $valores[] = null !== $monto ? $monto : 0;
        }
        $datos[$eje] = $valores;
    }

    return empty($datos) ? $respaldo : array('anios' => $anios, 'datos' => $datos);
}
