<?php
// Incluye el archivo motor.php que contiene funciones y clases necesarias
require("libreria/motor.php");

// Aplica la plantilla definida en la clase Plantilla
Plantilla::aplicar();
?>

<!-- Título del torneo -->
<h1>¡🤜🏿Bienvenido al torneo de la fuerza🔥!</h1>
<!-- Descripción del torneo -->
<p>¡Hola! ¿Estás listo para demostrar tu poder? ¡Entonces inscríbete en nuestro torneo! 💪🏿</p>
<p>Participantes Registrados 📝</p>

<!-- Enlaces para registrar participantes y ver estadísticas -->
<div class="text-registro">
    <a href="Registro.php" class="boton">Registrar Participante📋</a>
    <a href="panel.php" class="boton"> Estadisticas 📊</a>
</div>

<!-- Tabla para mostrar la lista de participantes -->
<table>
    <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Detalles</th>
        <th>Habilidades</th>
    </tr>
    <tbody>
        <?php
        // Obtiene la lista de registros de participantes
        $datos = lista_Dregistro();
        
        // Recorre cada participante y genera una fila en la tabla
        foreach ($datos as $peleador) {
            echo "
            <tr>
                <td><img src='{$peleador->foto}' alt='{$peleador->nombre}' width='90'></td>
                <td>{$peleador->nombre} {$peleador->apellido}</td>
                <td>{$peleador->edad()}</td>
                <td>{$peleador->signos_zodiacal()}</td>
                <td>{$peleador->n_habilidades()}</td>
                <td><a href='registro.php?codigo={$peleador->id}'>Ver Detalles</a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>