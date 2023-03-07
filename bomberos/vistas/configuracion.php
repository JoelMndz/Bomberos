<!-- LOGICA -->
<?php
    if (isset($_POST['nombreEmpresa'])) {
        $curl = curl_init();
        $url = 'http://localhost:5000/api/informacion/'.$_GET['id'];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
    }

    $curl = curl_init();
    $url = 'http://localhost:5000/api/informacion';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpCode == 200){
        $informacion = json_decode($response);
    }
?>

<?php include_once('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Configuración</title>


<!-- Main Sidebar Container -->
<?php include_once('../vistas/layout/nav.php') ?>

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
                        <input type="email" class="form-control" id="inputEmail4">
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
                    <div class="col-md-4">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Sobre la Empresa</h3>
                            </div>
                            <div class="row pt-2">
                                <div class="col-sm-6">
                                    <div class="text-center">
                                        <img src="../img/avatar1.png" class="profile-user-img img-fluid img-circle" alt="">
                                    </div>
                                    <div class="text-center mt-1">
                                        <button type="button" data-toggle="modal" data-target="#cambiophoto" class="btn btn-outline-dark btn-sm">Cambiar avatar</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-center">
                                        <img src="../img/avatar1.png" class="profile-user-img img-fluid img-circle" alt="">
                                    </div>
                                    <div class="text-center mt-1">
                                        <button type="button" data-toggle="modal" data-target="#cambiophoto" class="btn btn-outline-dark btn-sm">Cambiar avatar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <strong class="text-primary">
                                    <i class="fas fa-phone mr-1"></i>Nombre de la Empresa
                                </strong>
                                <p id="telefono_us" class="text-muted"><?=$informacion->nombre_empresa?></p>
                                <strong class="text-primary">
                                    <i class="fas fa-map-marker-alt mr-1"></i>Departamento
                                </strong>
                                <p id="residencia_us" class="text-muted"><?=$informacion->nombre_departamento?></p>
                                <strong class="text-primary">
                                    <i class="fas fa-at mr-1"></i>Representante
                                </strong>
                                <p id="correo_us" class="text-muted"><?=$informacion->nombre_coronel?></p>
                                <strong class="text-primary">
                                    <i class="fas fa-phone mr-1"></i>Teléfono
                                </strong>
                                <p id="sexo_us" class="text-muted"><?=$informacion->telefono?></p>
                                <strong class="text-primary">
                                    <i class="fas fa-pencil-alt mr-1"></i>Página Web
                                </strong>
                                <p id="adicional_us" class="text-muted"><a class="text-muted text-decoration-none" href="https://bomberosazogues.gob.ec">
                                    <?=$informacion->pagina_web?>
                                </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Editar datos de la Empresa</h3>
                            </div>
                            <div class="card-body">
                                <form id='form-usuario' class="form-horizontal" method="POST" action="configuracion.php?id=<?=$informacion->id?>">
                                    <div class="form-group row ">
                                        <label for="nombreEmpresa" class="col-sm-4 col-form-label">Nombre de la Empresa</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control" value="<?=$informacion->nombre_empresa?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombreDepartamento" class="col-sm-4 col-form-label">Departamento</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nombreDepartamento" name="nombreDepartamento" class="form-control" value="<?=$informacion->nombre_departamento?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombreCoronel" class="col-sm-4 col-form-label">Representante</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nombreCoronel" name="nombreCoronel" value="<?=$informacion->nombre_coronel?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="telefono" name="telefono" value="<?=$informacion->telefono?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paginaWeb" class="col-sm-4 col-form-label">Página Web</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="paginaWeb" class="form-control" name="paginaWeb" value="<?=$informacion->pagina_web?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-4 col-sm-8 float-right">
                                            <button type="submit" class="btn btn-block btn-outline-danger">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Cuidado con ingresar datos erroneos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once('../vistas/layout/footer.php') ?>