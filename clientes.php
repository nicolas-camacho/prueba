<?php
    $servername = "localhost:3306";
    $user = "root";
    $pwd = "";

    $conn = new mysqli($servername, $user, $pwd, 'dbempresas');

    $nombreCliente = $_POST['nombreCli'];
    $apellidoCliente = $_POST['apellidoCli'];
    $identificacionCliente = $_POST['identificacionCli'];
    $telefonoCliente = $_POST['telefonoCli'];
    $direccionCliente = $_POST['dirCli'];
    $paisCliente = $_POST['paisCli'];
    $idiomaCliente = $_POST['idioma'];
    $monedaCliente = $_POST['monedaCli'];
    $pagoCliente = $_POST['pago'];
    $empresaCliente = $_POST['empres'];

    $enviar = "INSERT INTO clientes (nombre_cliente, apellido_cliente, identificacion_cliente, telefono_cliente, direccion_cliente, pais_cliente, idioma_cliente, moneda_cliente, forma_pago_cliente, empresa_id) VALUES ('$nombreCliente', '$apellidoCliente', $identificacionCliente, $telefonoCliente, '$direccionCliente', '$paisCliente', '$idiomaCliente', '$monedaCliente', '$pagoCliente', $empresaCliente)";
                                
    if ($conn->query($enviar) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: ". $conn->error;
    }
?>