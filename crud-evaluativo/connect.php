    <?php

    //variables de conexion
    $serverName='localhost';
    $database='triaje';
    $userName='root';
    $password='';

    //crearm la conexion
    $conn= mysqli_connect($serverName, $userName, $password, $database);

    //check a la conexion

    if(!$conn ){
        die("Error de Conexion" .'sqli_connect_error'());
    }
    echo"Conexion Exitosa";
    mysqli_close($conn);

    ?>