<!-- LOGICA -->
<?php
    if(isset($_POST["nombre"])){
        $curl = curl_init();
        $url = 'http://localhost:5000/api/usuario';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode != 200) {
            echo "Error, no se pudieron guardar los datos";
        }else{
            header("Location: ./usuario.php");
            return;
        }
    }
?>

<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Nuevo Usuario</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Modal cambio de password -->
<div class="modal fade" id="cambiapass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Modal title</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Dirección 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Ciudad</label>
                        <select id="inputCity" class="form-select">
                            <option selected>Elige...</option>
                            <option>Azogues</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Estado</label>
                        <select id="inputState" class="form-select">
                            <option selected>Elige...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Código postal</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Verifícame
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="mt-2">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Ingreso Nuevo Usuario</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">

                                                    <form class="row g-3" method="POST">
                                                        <div class="col-md-4">
                                                            <label for="identificacion" class="form-label">Cédula</label>
                                                            <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="apellidos" class="form-label">Apellido</label>
                                                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="telefono" class="form-label">Telefono</label>
                                                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="direccion" class="form-label">Dirección</label>
                                                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                                                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="email" class="form-label">Correo</label>
                                                            <input type="email" class="form-control" id="email" name="email" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="password" class="form-label">Contraseña</label>
                                                            <input type="password" class="form-control" id="password" name="password" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputCity" class="form-label">Rol</label>
                                                            <select id="idRol" class="form-select" name="idRol" required>
                                                                <?php
                                                                $curl = curl_init();
                                                                $url = 'http://localhost:5000/api/rol';
                                                                curl_setopt($curl, CURLOPT_URL, $url);
                                                                curl_setopt($curl, CURLOPT_HTTPGET, true);
                                                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                                $response = curl_exec($curl);
                                                                $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                                                if ($httpCode == 200) {
                                                                    $data = json_decode($response);    
                                                                    foreach ($data as $key => $value) {
                                                                        echo "<option value='".$value->id."'>".$value->descripcion."</option>";
                                                                    }
                                                                } else {
                                                                    echo "Error, no se pudieron obtener los datos";
                                                                }
                                                                curl_close($curl);
                                                                ?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="idRango" class="form-label">Rango</label>
                                                            <select id="idRango" name="idRango" class="form-select" required>
                                                                <?php
                                                                $curl = curl_init();
                                                                $url = 'http://localhost:5000/api/rango';
                                                                curl_setopt($curl, CURLOPT_URL, $url);
                                                                curl_setopt($curl, CURLOPT_HTTPGET, true);
                                                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                                $response = curl_exec($curl);
                                                                $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                                                if ($httpCode == 200) {
                                                                    $data = json_decode($response);    
                                                                    foreach ($data as $key => $value) {
                                                                        echo "<option value='".$value->id."'>".$value->descripcion."</option>";
                                                                    }
                                                                } else {
                                                                    echo "Error, no se pudieron obtener los datos";
                                                                }
                                                                curl_close($curl);
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="usuario.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
                                                            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Registrar</button>
                                                            <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span> Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="panel-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require('../vistas/layout/footer.php') ?>