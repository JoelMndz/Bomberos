<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Nuevo Privilegio</title>

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
                                <h3 class="card-title fs-4">Ingreso Nuevo Privilegio</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <form class="row g-3">
                                                        <div class="col-md-12">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control">
                                                        </div>                                                       
                                                        <div class="col-md-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                                <label class="form-check-label" for="gridCheck">Estado</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="privilegio.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
                                                            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Registrar</button>
                                                            <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span> Cancelar</button>
                                                        </div>
                                                    </form>
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