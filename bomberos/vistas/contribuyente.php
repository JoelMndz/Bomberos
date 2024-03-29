<?php
$data = [];
$url = 'http://localhost:5000/api/contribuyente';
if (isset($_POST['filtro'])) {
    $url = $url . '?filtro=' . $_POST['filtro'];
}

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPGET, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
if ($httpCode == 200) {
    $data = json_decode($response);
}
?>

<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Contribuyente | Sistema de Permisos</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Modal ver usuario -->
<div class="modal fade" id="vercontribuyente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Datos de Contribuyente</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="container">
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">CI o RUC:</div>
                            <div class="col-8">0301803383</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Nombres:</div>
                            <div class="col-8">Carlos</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Apellidos:</div>
                            <div class="col-8">Alvarez</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">F. Nac:</div>
                            <div class="col-8">0984962345</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Dirección:</div>
                            <div class="col-8">Administrador</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Teléfono:</div>
                            <div class="col-8">09632157852</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Correo:</div>
                            <div class="col-8">ejemplo@gmail.com</div>
                        </div>
                        <div class="row border border-danger p-1 m-2 rounded">
                            <div class="col-4">Discapacidad:</div>
                            <div class="col-8">No</div>
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
<div class="modal fade" id="editarcontribuyente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Editar Contribuyente</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Nombres</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Apellidos</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Dirección</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="">
                    </div>

                    <div class="col-md-4">
                        <label id="disabledTextInput" for="inputZip" class="form-label">Correo</label>
                        <input id="" type="text" class="form-control" id="inputZip" disabled>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Discapacidad
                            </label>
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
                                <h3 class="card-title fs-4">Módulo Contribuyente</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="row align-items-center grid">
                                            <div class="col-auto">
                                                <a href="contribuyente_nuevo.php" class="btn btn-outline-danger btn-bottom-right "><span class="fa fa-plus"></span>Nuevo Contribuyente</a>
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

                                            <form method="post" class="col-auto row">
                                                <div class="col-auto">
                                                    <input class="form-control col-auto" type="text" name="filtro" placeholder="Nombre o apellido">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-outline-danger">Buscar</button>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="../reporte_contribuyente.php" target="_blank" class="btn btn-outline-danger btn-bottom-right ">Imprimir PDF</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;" width="100%" cellspacing="0">

                                            <thead class="">
                                                <tr>
                                                    <th scope="col">id</th>
                                                    <th scope="col">CI o RUC</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">F. Nac</th>
                                                    <th scope="col">Dirección</th>
                                                    <th scope="col">Telefono</th>
                                                    <th scope="col">Correo</th>
                                                    <th scope="col">Dis</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Cargar Contribuyentes-->
                                                <?php
                                                foreach ($data as $key => $value) {
                                                    echo "<tr>";
                                                    echo "<th>" . $value->id . "</th>";
                                                    echo "<td>" . $value->identificacion . "</td>";
                                                    echo "<td>" . $value->nombre . "</td>";
                                                    echo "<td>" . $value->apellidos . "</td>";
                                                    echo "<td>" . date('d/m/Y', strtotime($value->fecha_nacimiento)) . "</td>";
                                                    echo "<td>" . $value->direccion . "</td>";
                                                    echo "<td>" . $value->telefono . "</td>";
                                                    echo "<td>" . $value->email . "</td>";
                                                    echo "<td>" . $value->discapacidad . "</td>";
                                                    $value->estado == 1 ? $estado = "Habilitado" : $estado = "Deshabilitado";
                                                    echo "<td>" . $estado . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='#' title='Editar' class='btn btn-primary btn-xs' data-bs-toggle='modal' data-bs-target='#editarcontribuyente'><i class='fa fa-pencil'></i></a>";
                                                    echo "<a href='contribuyente.php?id=" . $value->id . "' title='Eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
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