<?php
// comprobamos si recibimos los datos del post//
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //capturamos las variables//
    $nombre = isset($_POST['nombre']) ? $_REQUEST['nombre'] :null;
    $apellido = isset($_POST['apellido']) ? $_REQUEST['apellido'] :null;
    $grupo_sanguineo = isset($_POST['grupo_sanguineo']) ? $_REQUEST['grupo_sanguineo'] :null;
    $tarjeta_de_identidad = isset($_POST['tarjeta_de_identidad']) ? $_REQUEST['tarjeta_de_identidad'] :null;
    $sexo = isset($_POST['sexo']) ? $_REQUEST['sexo'] :null;
    $motivo_de_la_consulta = isset($_POST['motivo_de_la_consulta']) ? $_REQUEST['motivo_de_la_consulta'] :null;
    //variables de conexion//
    $hostDB = 'localhost';
$nombreDB = 'triaje';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);


//preparar la consulta //

$miInsert  = $miPDO->prepare('INSERT INTO formulario (nombre, apellido, grupo_sanguineo, tarjeta_de_identidad, sexo, ,motivo_de_la_consulta) values :nombre, :apellido, :grupo_sanguineo, :tarjeta_de_identidad, :sexo, :motivo_de_la_consulta');

//EJECUTAR LA CONSULTA//

$miInsert->execute(
    array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'grupo_sanguineo' => $grupo_sanguineo,
        'tarjeta_de_identidad' => $tarjeta_de_identidad,
        'sexo' => $sexo,
        'motivo_de_la_consulta' => $motivo_de_la_consulta,
        )
    );

    //redireccionamos hacia index.php

    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro Equipo</title>
</head>
<body>
    <form action="" method="POST"
        <p>
            <label>nombre</label>
            <input id="nombre" type="text" name="nombre">
        </p>
        <p>
            <label>apellido</label>
            <input id="apellido" type="text" name="apellido">
        </p>
        <p>
            <label>grupo_sanguineo</label>
            <input id="grupo_sanguineo" type="text" name="grupo_sanguineo">
        </p>
        <p>
            <label>tarjeta_de_identidad</label>
            <input id="tarjeta_de_identidad" type="text" name="tarjeta_de_identidad">
        </p>
        <p>
            <label>sexo</label>
            <input id="sexo" type="text" name="sexo">
        </p>
        <p>
            <input type="submit" value="guardar">
        </p>

    </form>
</body>
</html>