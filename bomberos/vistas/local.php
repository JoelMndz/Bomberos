<?php 
require('../vistas/layout/header.php');

if(isset($_GET['id'])){
    $curl = curl_init();
    $url = 'http://localhost:5000/api/local/'.$_GET['id'];
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
  }

?>

<!-- /.navbar -->
<title>Local | Sistema de Permisos</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Modal ver usuario -->
<div class="modal fade" id="verlocal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Datos de Local</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="container">
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Dueño del local:</div>
                            <div class="col-8">Felix Arturo</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Nombre del Local:</div>
                            <div class="col-8">El Baratón</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Apellidos:</div>
                            <div class="col-8">Alvarez</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Parroquia:</div>
                            <div class="col-8">Azogues</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">N° de casa:</div>
                            <div class="col-8">199-199</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Calle Principal:</div>
                            <div class="col-8">Bolivar</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Calle Secundaria:</div>
                            <div class="col-8">Azuay</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Referencias:</div>
                            <div class="col-8">Cinco Esquinas</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Estado:</div>
                            <div class="col-8">Activo</div>
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
<div class="modal fade" id="editarlocal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Editar Contribuyente</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
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
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Referencias</label>
                        <input type="text" class="form-control" id="inputZip">
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
                                <h3 class="card-title fs-4">Módulo de Local</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="row align-items-center grid">
                                            <div class="col-auto">
                                                <a href="local_nuevo.php" class="btn btn-outline-danger btn-bottom-right "><span class="fa fa-plus"></span>Nuevo Local</a>
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
                                            <div class="col-auto">
                                                <a href="../reporte_local.php" target="_blank" class="btn btn-outline-danger btn-bottom-right ">Imprimir PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;" width="100%" cellspacing="0">

                                            <thead class="">
                                                <tr>
                                                    <th scope="col">id</th>
                                                    <th scope="col">Dueño</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Parroquia</th>
                                                    <th scope="col">N° Casa</th>
                                                    <th scope="col">C. Principal</th>
                                                    <th scope="col">C. Secundaria</th>
                                                    <th scope="col">Referencias</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $curl = curl_init();
                                                    $url = 'http://localhost:5000/api/local';
                                                    curl_setopt($curl, CURLOPT_URL, $url);
                                                    curl_setopt($curl, CURLOPT_HTTPGET, true);
                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                    $response = curl_exec($curl);
                                                    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                                    curl_close($curl);
                                                    if ($httpCode == 200) {
                                                        $data = json_decode($response);    
                                                        foreach ($data as $key => $value) {
                                                ?>
                                                <tr>
                                                    <th><?= $value->id?></th>
                                                    <td><?= $value->nombre_contribuyente?></td>
                                                    <td><?= $value->nombre?></td>
                                                    <td><?= $value->nombre_parroquia?></td>
                                                    <td><?= $value->numero_casa?></td>
                                                    <td><?= $value->calle_principal?></td>
                                                    <td><?= $value->calle_secundaria?></td>
                                                    <td><?= $value->referencia?></td>
                                                    <td>
                                                        <a href="#" title="Ver Tipo" class="btn btn-dark btn-xs" data-bs-toggle="modal" data-bs-target="#vertipoinspeccion"><i class="fa fa-search-plus"></i></a>
                                                        <a href="#" title="Editar" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editartipoinspeccion"><i class="fa fa-pencil"></i></a>
                                                        <a href="local.php?id=<?=$value->id?>" title="Eliminar" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cadr-footer">
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