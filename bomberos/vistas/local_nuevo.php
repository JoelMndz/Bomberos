<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Nuevo Local | Sistema de Permisos</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Modal cambio de password -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="mt-2">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Ingreso Nuevo Local</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <form class="row g-3">
                                                        <div class="col-md-4">
                                                            <label for="inputEmail4" class="form-label">Dueño del local</label>
                                                            <input type="email" class="form-control" id="inputEmail4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputEmail4" class="form-label">Nombre</label>
                                                            <input type="email" class="form-control" id="inputEmail4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputState" class="form-label">Parroquia</label>
                                                            <select id="inputState" class="form-select">
                                                                <option selected>Elige...</option>
                                                                <option>Azogues</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPassword4" class="form-label">N° de Casa</label>
                                                            <input type="password" class="form-control" id="inputPassword4">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="inputAddress2" class="form-label">Calle Principal</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="inputAddress2" class="form-label">Calle Secundaria</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputZip" class="form-label">Referencias</label>
                                                            <input type="text" class="form-control" id="inputZip">
                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="local.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
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