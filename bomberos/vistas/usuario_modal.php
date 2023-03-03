<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Usuarios</title>


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
                        <div class="card card-danger card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="../img/avatar1.png" class="profile-user-img img-fluid img-circle" alt="">
                                </div>
                                <div class="text-center mt-1">
                                    <button type="button" data-toggle="modal" data-target="#cambiophoto" class="btn btn-outline-dark btn-sm">Cambiar avatar</button>
                                </div>
                                <h3 id="nombre_us" class="profile-username text-center text-primary">Nombre</h3>
                                <p id="apellidos_us" class="text-center text-primary">Apellidos</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b class="text-primary">Edad</b><a id="edad" class="float-right">12</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="text-primary">DNI</b><a id="dni_us" class="float-right">12</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="text-primary">Tipo Usuario</b>
                                        <span id="us_tipo" class="float-right badge-danger">Administrador</span>
                                    </li>
                                    <button type="button" class="btn btn-block btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#cambiapass">Cambiar password</button>
                                </ul>
                            </div>
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Sobre mi</h3>
                            </div>
                            <div class="card-body">
                                <strong class="text-primary">
                                    <i class="fas fa-phone mr-1"></i>Telefono
                                </strong>
                                <p id="telefono_us" class="text-muted">099538678</p>
                                <strong class="text-primary">
                                    <i class="fas fa-map-marker-alt mr-1"></i>Residencia
                                </strong>
                                <p id="residencia_us" class="text-muted">0995386788</p>
                                <strong class="text-primary">
                                    <i class="fas fa-at mr-1"></i>Correo
                                </strong>
                                <p id="correo_us" class="text-muted">0995386788</p>
                                <strong class="text-primary">
                                    <i class="fas fa-smile-wink mr-1"></i>Sexo
                                </strong>
                                <p id="sexo_us" class="text-muted">0995386788</p>
                                <strong class="text-primary">
                                    <i class="fas fa-pencil-alt mr-1"></i>Información adicional
                                </strong>
                                <p id="adicional_us" class="text-muted">0995386788</p>
                                <button class="edit btn btn-block btn-outline-danger">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">click en el boton si desea editar</p>

                            </div>


                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Editar datos personales</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-success text-center" id="editado" style='display:none;'>
                                    <span><i class="fas fa-check m-1"></i>Editado</span>
                                </div>
                                <div class="alert alert-danger text-center" id="noeditado" style='display:none;'>
                                    <span><i class="fas fa-times m-1"></i>Edicion deshabilitado</span>
                                </div>
                                <form id='form-usuario' class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="telefono" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="residencia" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="correo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="sexo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="adicional" class="col-sm-2 col-form-label">Información adicional</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="" id="adicional" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-danger">Guardar</button>

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
    <?php require('../vistas/layout/footer.php') ?>