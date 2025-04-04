<?php

// Se incluye el archivo 'motor.php' que contiene las funciones necesarias para la aplicación
require('libreria/motor.php');

// Se aplica la plantilla de la página
plantilla::aplicar();

// Se obtienen los registros de los peleadores
$datos = lista_Dregistro();

// Se inicializa un array para contar la cantidad de peleadores por signo zodiacal
$signos = [
    "aries" => 0,
    "tauro" => 0,
    "geminis" => 0,
    "cancer" => 0,
    "leo" => 0,
    "virgo" => 0,
    "libra" => 0,
    "escorpio" => 0,
    "sagitario" => 0,
    "capricornio" => 0,
    "acuario" => 0,
];

// *Inicializar variables para evitar errores y calcular estadísticas*
$totalHabilidades = 0; // Contador de habilidades totales
$totalEdad = 0; // Suma total de las edades de los peleadores
$totalParticipantes = count($datos); // Número total de peleadores registrados
$totalPoder = 0; // Suma total del nivel de poder de las habilidades
$totalHabilidadesConPoder = 0; // Contador de habilidades con nivel de poder
$habilidadMasPoderosa = null; // Variable para almacenar la habilidad con mayor poder
$habilidadMenosPoderosa = null; // Variable para almacenar la habilidad con menor poder
$nivelMax = PHP_INT_MIN; // Inicialización del nivel máximo con el valor más bajo posible
$nivelMin = PHP_INT_MAX; // Inicialización del nivel mínimo con el valor más alto posible

// Se recorren los peleadores para calcular estadísticas
foreach ($datos as $peleador) {
    
    // Se obtiene el signo zodiacal y se convierte a minúsculas para evitar errores
    $signo = strtolower(trim($peleador->signos_zodiacal()));

    // Se incrementa el contador del signo zodiacal si existe en el array
    if (isset($signos[$signo])) {
        $signos[$signo]++;
    } else {
        echo " 🕵🏿 Signo desconocido: {$signo}<br>"; // Se muestra una advertencia si el signo no está en la lista
    }

    // *Contar habilidades del peleador*
    if (isset($peleador->habilidades) && is_array($peleador->habilidades)) {
        $totalHabilidades += count($peleador->habilidades);
    }

    // *Sumar la edad de los peleadores*
    $totalEdad += $peleador->edad();

    // *Sumar el nivel de poder de cada habilidad del peleador*
    if (isset($peleador->habilidades) && is_array($peleador->habilidades)) {
        foreach ($peleador->habilidades as $habilidad) {
            if (isset($habilidad->nivel)) {
                $totalPoder += $habilidad->nivel;
                $totalHabilidadesConPoder++;
            }
        }
    }

    // *Determinar la habilidad más poderosa y la menos poderosa*
    if (isset($peleador->habilidades) && is_array($peleador->habilidades)) {
        foreach ($peleador->habilidades as $habilidad) {
            if (isset($habilidad->nivel)) {
                // Se actualiza la habilidad más poderosa si el nivel es mayor que el actual
                if ($habilidad->nivel > $nivelMax) {
                    $nivelMax = $habilidad->nivel;
                    $habilidadMasPoderosa = $habilidad->nombre;
                }

                // Se actualiza la habilidad menos poderosa si el nivel es menor que el actual
                if ($habilidad->nivel < $nivelMin) {
                    $nivelMin = $habilidad->nivel;
                    $habilidadMenosPoderosa = $habilidad->nombre;
                }
            }
        }
    }
}

// *Calcular promedios*
$habilidadesPorGuerrero = ($totalParticipantes > 0) ? round($totalHabilidades / $totalParticipantes, 2) : 0;
$edadPromedio = ($totalParticipantes > 0) ? round($totalEdad / $totalParticipantes, 2) : 0;
$poderPromedio = ($totalHabilidadesConPoder > 0) ? round($totalPoder / $totalHabilidadesConPoder, 2) : 0;

?>

<!-- Estilos CSS para la tabla de estadísticas -->
<style>
    #tablasuperior td {
        text-align: center; /* Centrar el contenido de las celdas */
    }
</style>

<!-- Título principal de la página -->
<h1 class="title">Tabla de Estadísticas 📊</h1>

<!-- Botón de regreso a la página principal -->
<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>

<!-- Tabla con estadísticas generales -->
<table style="width:100%; font-size: 14px;" id="tablasuperior">
    <tr>
        <td>
            <h1><?= count($datos) ?></h1>
            Participantes 👤👤
        </td>
        <td>
            <h1><?= $totalHabilidades ?></h1>
            Habilidades⚡
        </td>
        <td>
            <h1><?= $habilidadesPorGuerrero ?></h1>
            H X Guerrero 🤼‍♂️
        </td>
        <td>
            <h1><?= $edadPromedio ?></h1>
            Edad Promedio ⌛
        </td>
        <td>
            <h1><?= $poderPromedio ?></h1>
            Nivel de Poder Promedio 💪🏿
        </td>
        <td>
            <h1><?= $habilidadMasPoderosa ?? "N/A" ?></h1>
            Habilidad Más Poderosa 🤯⚡
        </td>
        <td>
            <h1><?= $habilidadMenosPoderosa ?? "N/A" ?></h1>
            Habilidad Menos Poderosa 💀
        </td>
    </tr>
</table>

<!-- Sección de signos zodiacales -->
<h2>Signos Zodiacales</h2>

<!-- Tabla con la cantidad de peleadores por cada signo zodiacal -->
<table>
    <thead>
        <tr>
            <th>Signo</th> <!-- Nombre del signo zodiacal -->
            <th>Cantidad</th> <!-- Número de peleadores con ese signo -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Se recorren los signos zodiacales y se imprimen en la tabla
        foreach ($signos as $signo => $cantidad) {
            echo "
                    <tr>
                        <td>{$signo}</td> 
                        <td>{$cantidad}</td> 
                    </tr>
                ";
        }
        ?>
    </tbody>
</table>