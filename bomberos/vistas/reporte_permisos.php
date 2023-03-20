<?php
$error = null;
if (isset($_POST["nombre"])) {
    $curl = curl_init();
    $url = 'http://localhost:5000/api/contribuyente';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpCode != 200) {
        $error = json_decode($response);
    } else {
        header("Location: ./contribuyente.php");
        return;
    }
}
?>

<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Nuevo Contribuyente | Sistema de Permisos</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="mt-2">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Reportes de </h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <?php if ($error) { ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong><?= $error->message ?></strong>
                                                        </div>
                                                    <?php } ?>
                                                    <form class="row g-3" method="POST">
                                                        <div class="col-md-12">
                                                            <input type="radio" name="gender" value="masculino"> Masculino
                                                            <input type="radio" class="in-line" name="gender" value="femenino"> Femenino
                                                            <input type="radio" name="gender" value="otros"> Otros
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nombre" class="form-label">Desde</label>
                                                            <input type="date" class="form-control" id="desde" name="desde" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="apellidos" class="form-label">Hasta</label>
                                                            <input type="date" class="form-control" id="hasta" name="hasta" required>
                                                        </div>
                                                        <div class="col-md-4">                                                            
                                                            <a href="contribuyente.php" class="form-control btn btn-primary">Regresar</a>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="telefono" class="form-label">Telefono</label>
                                                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="direccion" class="form-label">Dirección</label>
                                                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                                                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="email" class="form-label">Correo</label>
                                                            <input type="email" class="form-control" id="email" name="email" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="discapacidad" class="form-label">Discapacidad</label>
                                                            <select type="text" class="form-control" id="discapacidad" name="discapacidad" required>
                                                                <option value="no">No</option>
                                                                <option value="si">Si</option>
                                                            </select>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="contribuyente.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
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