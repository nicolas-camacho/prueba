<?php
    $servername = "localhost:3306";
    $user = "root";
    $pwd = "";

    $conn = new mysqli($servername, $user, $pwd, 'dbempresas');

    $nombreEmpresa = $_POST['nombreEmp'];
    $nitEmpresa = $_POST['nitEmp'];
    $telefonoEmpresa = $_POST['telEmp'];
    $direccionEmpresa = $_POST['dirEmp'];
    $ubicacionEmpresa = $_POST['ubEmp'];

    $enviar = "INSERT INTO empresas (nombre_empresa, nit_empresa, telefono_empresa, direccion_empresa, ubicacion_empresa) VALUES ('$nombreEmpresa', $nitEmpresa, $telefonoEmpresa, '$direccionEmpresa', '$ubicacionEmpresa')";

    if ($conn->query($enviar) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: ". $conn->error;
    }
?>