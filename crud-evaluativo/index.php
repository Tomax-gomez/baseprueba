<?php
$hostDB = 'localhost';
$nombreDB = 'triaje';
$usuarioDB = 'root';
$contrasenyaDB = '';


$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM formulario;');
// Ejecuta consulta
$miConsulta->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicación de Futbol - CRUD PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid orange;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><a class="button" href="nuevo.php">Crear</a></p>
    <table>
        <tr>
            <th>nombre</th>
            <th>apellido</th>
            <th>grupo_sanguineo	</th>
            <th>tarjeta_de_identidad</th>
            <th>sexo</th>
            <th>motivo de la consulta</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['nombre']; ?></td>
           <td><?= $valor['apellido']; ?></td>
           <td><?= $valor['grupo_sanguineo']; ?></td>
           <td><?= $valor['tarjeta_de_identidad']; ?></td>
           <td><?= $valor['sexo']; ?></td>
           <td><?= $valor['motivo_de_la_consulta']; ?></td>
           <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
           <td><a class="button" href="modificar.php?equipo=<?= $valor['nombre'] ?>">Modificar</a></td>
           <td><a class="button" href="borrar.php?equipo=<?= $valor['apellido'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>