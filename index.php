<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title>
</head>

<body>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Empresas</title>
    </head>

    <body>
    <?php
        $servername = "localhost:3306";
        $user = "root";
        $pwd = "";

        $conn = new mysqli($servername, $user, $pwd);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE dbempresas";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully with the name dbempresas";
        } else {
        }

        $conn->close();
        $conn = new mysqli($servername, $user, $pwd, 'dbempresas');

        $sql = "CREATE TABLE empresas (
            nombre_empresa CHAR(100) NOT NULL,
            nit_empresa INT NOT NULL,
            telefono_empresa BIGINT NOT NULL,
            direccion_empresa CHAR(100) NOT NULL,
            ubicacion_empresa CHAR(100) NOT NULL,
            CONSTRAINT PRIMARY KEY ( nit_empresa )
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully with the name empresas";
        } else {
        }

        $sql = "CREATE TABLE clientes (
            nombre_cliente CHAR(100) NOT NULL,
            apellido_cliente CHAR(100) NOT NULL,
            identificacion_cliente BIGINT NOT NULL,
            telefono_cliente BIGINT NOT NULL,
            direccion_cliente CHAR(100) NOT NULL,
            pais_cliente CHAR(100) NOT NULL,
            idioma_cliente CHAR(100) NOT NULL,
            moneda_cliente CHAR(100) NOT NULL,
            forma_pago_cliente CHAR(100) NOT NULL,
            empresa_id INT NOT NULL,
            CONSTRAINT PRIMARY KEY ( identificacion_cliente ),
            INDEX par_ind (empresa_id),
            FOREIGN KEY (empresa_id) REFERENCES empresas(nit_empresa) ON DELETE CASCADE
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully with the name clientes";
        } else {
            
        }
        
    ?>
        <div>
            <div class="row">
                <div class="container">
                    <h1>CRUD de Empresas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" onclick="showForm()">Crear
                                Empresa / Insertar Cliente</button>
                        </div>
                    </div>
                    <div id="enterprise" class="card">
                        <div class="card-body">
                            <form action="empresas.php" method="POST">
                                <div class="form-group">
                                    <label for="nameForm">Nombre</label>
                                    <input type="text" name="nombreEmp" class="form-control" id="formControlName" placeholder="nombre"
                                        required>
                                    <br>
                                    <label for="nitForm">NIT</label>
                                    <input type="number" name="nitEmp" class="form-control" id="formControlNIT" placeholder="NIT"
                                        required>
                                    <br>
                                    <label for="telForm">Telefono</label>
                                    <input type="number" name="telEmp" class="form-control" id="formControlTelefono"
                                        placeholder="numero de telefono" required>
                                    <br>
                                    <label for="dirForm">Direccion</label>
                                    <input type="text" name="dirEmp" class="form-control" id="formControlDir" placeholder="direccion"
                                        required>
                                    <br>
                                    <label for="ubForm">Ubicacion</label>
                                    <input type="text" name="ubEmp" class="form-control" id="formControlUb" placeholder="Ubicacion"
                                        required>
                                    <br>
                                    <input type="submit" value="Enviar" class="btn btn-block btn-success" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="customer" class="card d-none">
                        <div class="card-body">
                            <form action="clientes.php" method="POST">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombreCli" class="form-control" id="formControlName" placeholder="Nombre" required>
                                    <br>
                                    <label>Apellido</label>
                                    <input type="text" name="apellidoCli" class="form-control" id="formControlAp" placeholder="Apellido" required>
                                    <br>
                                    <label>Identificacion</label>
                                    <input type="number" name="identificacionCli" class="form-control" id="formControlId" placeholder="Identificacion" required>
                                    <br>
                                    <label>Telefono</label>
                                    <input type="number" name="telefonoCli" class="form-control" id="formControlTel" placeholder="Telefono" required>
                                    <br>
                                    <label>Direccion</label>
                                    <input type="text" name="dirCli" class="form-control" id="formControlDirecc" placeholder="Direccion" required>
                                    <br>
                                    <label>Pais</label>
                                    <input type="text" name="paisCli" class="form-control" id="formControlPais" placeholder="Pais" required>
                                    <br>
                                    <label>Idioma</label>
                                    <select class="form-control" id="idiomaSelect" name="idioma">
                                        <option>Español</option>
                                        <option>Ingles</option>
                                        <option>Aleman</option>
                                        <option>Chino</option>
                                        <option>Otro</option>
                                    </select>
                                    <label>Moneda</label>
                                    <input type="text" name="monedaCli" class="form-control" id="formControlMoneda" placeholder="Moneda" required>
                                    <br>
                                    <label>Forma de pago</label>
                                    <select class="form-control" id="idiomaSelect" name="pago">
                                        <option>Deposito</option>
                                        <option>Tarjeta de credito</option>
                                        <option>Tarjeta Debito</option>
                                    </select>
                                    <br>
                                    <label>NIT Empresa</label>
                                    <select class="fomr-control" id="empresaSelect" name="empres">
                                    <?php
                                        $sql = "SELECT nit_empresa FROM empresas";
                                        if (!$result = $conn->query($sql)) {
                                            echo "Error al consultar base de datos.";
                                            echo "Error: " . $conn->error . "\n"; 
                                        }

                                        while ($empresas = $result->fetch_assoc()) {
                                            echo "<option>".$empresas['nit_empresa']."</option>\n";
                                        }
                                    ?>
                                    </select>
                                    <br>
                                    <br>
                                    <input type="submit" value="Enviar" class="btn btn-block btn-success" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            Empresas
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">NIT</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Ubicacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT nombre_empresa, nit_empresa, telefono_empresa, direccion_empresa, ubicacion_empresa FROM empresas";
                                        if (!$result = $conn->query($sql)) {
                                            echo "Error al consultar base de datos.";
                                            echo "Error: " . $conn->error . "\n";
                                        }

                                        while($empresas = $result->fetch_assoc()) {
                                            echo "<tr>\n";
                                            echo "<td>".$empresas['nombre_empresa']."</td>\n";
                                            echo "<td>".$empresas['nit_empresa']."</td>\n";
                                            echo "<td>".$empresas['telefono_empresa']."</td>\n";
                                            echo "<td>".$empresas['direccion_empresa']."</td>\n";
                                            echo "<td>".$empresas['ubicacion_empresa']."</td>\n";
                                            echo "</tr>\n";
                                        }
                                        $result->free();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Clientes
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Identificacion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Pais</th>
                                    <th scope="col">Idioma</th>
                                    <th scope="col">Moneda</th>
                                    <th scope="col">Metodo de Pago</th>
                                    <th scope="col">NIT Empresa</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT nombre_cliente, apellido_cliente, identificacion_cliente, telefono_cliente, direccion_cliente, pais_cliente, idioma_cliente, moneda_cliente, forma_pago_cliente, empresa_id FROM clientes";
                                        if (!$result = $conn->query($sql)) {
                                            echo "Error al consultar base de datos.";
                                            echo "Error: " . $conn->error . "\n";
                                        }

                                        while($clientes = $result->fetch_assoc()) {
                                            echo "<tr>\n";
                                            echo "<td>".$clientes['nombre_cliente']."</td>\n";
                                            echo "<td>".$clientes['apellido_cliente']."</td>\n";
                                            echo "<td>".$clientes['identificacion_cliente']."</td>\n";
                                            echo "<td>".$clientes['telefono_cliente']."</td>\n";
                                            echo "<td>".$clientes['direccion_cliente']."</td>\n";
                                            echo "<td>".$clientes['pais_cliente']."</td>\n";
                                            echo "<td>".$clientes['idioma_cliente']."</td>\n";
                                            echo "<td>".$clientes['moneda_cliente']."</td>\n";
                                            echo "<td>".$clientes['forma_pago_cliente']."</td>\n";
                                            echo "<td>".$clientes['empresa_id']."</td>\n";
                                            echo "</tr>\n";
                                        }
                                        $result->free();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
            $conn->close();
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script>
            let btn = true
            function showForm() {
                if (btn === true) {
                    document.getElementById('enterprise').className = "card d-block"
                    document.getElementById('customer').className = "card d-none"
                    btn = false
                } else {
                    document.getElementById('enterprise').className = "card d-none"
                    document.getElementById('customer').className = "card d-block"
                    btn = true
                }
            }
        </script>
    

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>

    </html>
</body>

</html>