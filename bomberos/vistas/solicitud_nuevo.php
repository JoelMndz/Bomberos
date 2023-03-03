<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Nueva Solicitud</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="mt-2">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Ingreso Nueva Solicitud</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <div class="modal-body">
                                                        <form class="row g-3">
                                                            <div class="input-group">
                                                                <label for="" class="">Fecha:</label>
                                                                <label for="" class="">Azogues,</label>
                                                                <input type="text" class="form-control" id="" disabled>
                                                            </div>
                                                            <div class="card">
                                                                <h5>
                                                                    Contribuyente
                                                                </h5>
                                                                <div class="card-body">
                                                                    <label for="inputEmail4" class="form-label p-0">Número de Identificación</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                                        <button type="" name="" id="btn-submit" class="btn btn-outline-danger"> ...</button>
                                                                    </div>
                                                                    <div class="">
                                                                        <label for="inputPassword4" class="form-label">Nombres y Apellidos</label>
                                                                        <input type="text" class="form-control" id="" disabled>
                                                                    </div>
                                                                    <div class=""><br>
                                                                        <div class="input-group">
                                                                            <select id="inputCity" class="form-select">
                                                                                <option selected>Elige...</option>
                                                                                <option>Calzado Juana</option>
                                                                            </select>
                                                                            <button type="" name="" id="btn-submit" class="btn btn-outline-danger">Nuevo Local</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="inputEmail4" class="form-label p-0">Tipo de Inspección</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control">
                                                                    <button type="" name="" id="btn-submit" class="btn btn-outline-danger"> ...</button>
                                                                </div>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <a href="solicitud.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span>Regresar</a>
                                                                <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span>Guardar</button>
                                                                <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span>Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
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