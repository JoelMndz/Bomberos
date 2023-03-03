<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Usuario</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Modal ver usuario -->
<div class="modal fade" id="verinspeccion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Datos de Usuario</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="container">
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Fecha:</div>
                            <div class="col-8">12/12/2022</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Contribuyente:</div>
                            <div class="col-8">Juan Brito</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Local:</div>
                            <div class="col-8">Variedad JR</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Telefono:</div>
                            <div class="col-8">0984962345</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Tipo de Local:</div>
                            <div class="col-8">Local</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar usuario -->
<div class="modal fade" id="editarinspeccion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Editar Solicitud</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
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
                        <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span>Actualizar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal""><span class=" fa fa-times"></span> Cerrar</button>
                    </div>
                </form>
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
                                <h3 class="card-title fs-4">Módulo de Inspecciones</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="row align-items-center grid">
                                            <div class="col-auto">
                                                <a href="inspeccion_nuevo.php" class="btn btn-outline-danger btn-bottom-right "><span class="fa fa-plus"></span>Nueva Inspección</a>
                                            </div>
                                            <div class="col-auto">
                                                <label class="col-form-label">Mostar</label>
                                            </div>
                                            <div class="col-auto">
                                                <select name="datatable-responsive_length" aria-controls="datatable-responsive" class="form-control input-sm">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <label class="col-form-label">Registros</label>
                                            </div>
                                            <div class="col-auto ">
                                                <label class="col-form-label">Busqueda</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-responsive">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;" width="100%" cellspacing="0">

                                            <thead class="">
                                                <tr>
                                                    <th scope="col">Cod</th>
                                                    <th scope="col">Fecha:</th>
                                                    <th scope="col">Señor /a:</th>
                                                    <th scope="col">Propietario de:</th>
                                                    <th scope="col">Dirección</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>12/01/2023</td>
                                                    <td>Juan Brito</td>
                                                    <td>Variedades JR</td>
                                                    <td>Local</td>
                                                    <td>Pendiente</td>
                                                    <td>
                                                        <a href="#" title="Ver Tipo" class="btn btn-dark btn-xs" data-bs-toggle="modal" data-bs-target="#verinspeccion"><i class="fa fa-search-plus"></i></a>
                                                        <a href="#" title="Editar" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarinspeccion"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" title="Eliminar" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item"><a class="page-link text-danger" href="#">Anterior</a></li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center text-danger">
                                        © <span class="current-year"></span>
                                        <a id="scroll-top" href="#" class="go-top">
                                            <i class="fa fa-angle-up text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require('../vistas/layout/footer.php') ?>