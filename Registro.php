<?php
// Incluye el archivo motor.php que contiene funciones y clases necesarias
require("libreria/motor.php");

// Aplica la plantilla definida en la clase Plantilla
Plantilla::aplicar();

// Crea una nueva instancia de la clase peleador
$peleador = new peleador();

// Verifica si se ha pasado un código por la URL
if (isset($_GET["codigo"])) {
    // Carga los datos del peleador con el código proporcionado
    $peleador = cargar_datos($_GET["codigo"]);

    // Si no se encuentra el peleador, muestra un mensaje de error y termina la ejecución
    if (!$peleador) {
        echo "<h1> ⚠️Lo sentimos</h1>";
        echo "<p>El participante no existe</p>";
        exit;
    }
}
?>

<!-- Título y mensaje de instrucciones -->
<h1> Registro de participante 👤 </h1>
<p> Por favor, ingrese los datos necesarios</p>

<!-- Enlace para volver al inicio -->
<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>

<!-- Formulario para guardar los datos del peleador -->
<form method="post" action="Guardar.php">
    <?php
    // Genera los campos de entrada para los datos del peleador
    echo the_input("id", "ID", $peleador->id, ["required" => "required"]);
    echo the_input("nombre", "Nombre", $peleador->nombre, ["required" => "required"]);
    echo the_input("apellido", "Apellido", $peleador->apellido, ["required" => "required"]);
    echo the_input("fecha_nacimiento", "Fecha de Nacimiento", $peleador->fecha_nacimiento, ["type" => "date"]);
    echo the_input("foto", "Foto", $peleador->foto, ["type" => "url"]);
    ?>
    <hr>
    <h3>Habilidades 💀</h3>

    <!-- Tabla para las habilidades del peleador -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Nivel</th>
                <td> <button type="button" onclick="AgregarHabilidad()">➕</button></td>
            </tr>
        </thead>
        <tbody id="tdhabilidades">
            <?php
            // Genera las filas de la tabla con las habilidades del peleador
            foreach ($peleador->habilidades as $habilidad) {
                echo "<tr>";
                echo "<td><input type='text' name='habilidades[nombre][]' value='{$habilidad->nombre}'></td>";
                echo "<td><input type='text' name='habilidades[tipo][]' value='{$habilidad->tipo}'></td>";
                echo "<td><input type='text' name='habilidades[nivel][]' value='{$habilidad->nivel}'></td>";
                echo "<td><button type='button' onclick='QuitarFila(this)'>❌</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Botón para enviar el formulario -->
    <div style="margin: 20px;">
        <input type="submit" class="boton" value="Guardar">
    </div>
</form>

<script>
    // Función para agregar una nueva fila de habilidad a la tabla
    function AgregarHabilidad() {
        var tr = document.createElement("tr");

        var td1 = document.createElement("td");
        var input1 = document.createElement("input");
        input1.type = "text";
        input1.name = "habilidades[nombre][]";
        td1.appendChild(input1);
        tr.appendChild(td1);

        var td2 = document.createElement("td");
        var input2 = document.createElement("input");
        input2.type = "text";
        input2.name = "habilidades[tipo][]";
        td2.appendChild(input2);
        tr.appendChild(td2);

        var td3 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.type = "text";
        input3.name = "habilidades[nivel][]";
        td3.appendChild(input3);
        tr.appendChild(td3);

        var td4 = document.createElement("td");
        var button = document.createElement("button");
        button.innerHTML = "❌";
        button.type = "button";
        button.setAttribute("onclick","QuitarFila(this)");
        td4.appendChild(button);
        tr.appendChild(td4);
        

        document.getElementById("tdhabilidades").appendChild(tr);
    }


    function QuitarFila(boton){
        if(confirm("¿Estás seguro de eliminar esta habilidad?")){
            boton.parentElement.parentElement.remove();
        }
    }


</script>