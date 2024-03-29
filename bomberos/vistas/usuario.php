<!-- LOGICA --->
<?php
    if(isset($_GET['id'])){
        echo $_GET['id'];
        $curl = curl_init();
        $url = 'http://localhost:5000/api/usuario/'.$_GET["id"];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec($curl);
        curl_close($curl);
    }
?>

<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Usuario</title>

<!-- Main Sidebar Container -->
<?php 
    require('../vistas/layout/nav.php');
?>

<!-- Modal ver usuario -->
<div class="modal fade" id="verusuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Datos de Usuario</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar usuario -->
<div class="modal fade" id="editarusuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger fs-3" id="modalTitle">Editar Usuario</h5>
                <button type="button" class="btn btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Nombre</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Apellido</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Dirección</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Rol</label>
                        <select id="inputCity" class="form-select">
                            <option selected>Elige...</option>
                            <option>Azogues</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Rango</label>
                        <select id="inputState" class="form-select">
                            <option selected>Elige...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Estado
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
                                <h3 class="card-title fs-4">Módulo Usuario</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="row align-items-center grid">
                                            <div class="col-auto">
                                                <a href="usuario_nuevo.php" class="btn btn-outline-danger btn-bottom-right "><span class="fa fa-plus"></span>Nuevo Usuario</a>
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
                                                <a href="../reporte_usuarios.php" target="_blank" class="btn btn-outline-danger btn-bottom-right ">Imprimir PDF</a>
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
                                                    <th scope="col">Cédula</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Apellido</th>
                                                    <th scope="col">Dirección</th>
                                                    <th scope="col">Telefono</th>
                                                    <th scope="col">Correo</th>
                                                    <th scope="col">Rol</th>
                                                    <th scope="col">Rango</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Consumo de API - Usuarios -->
                                            <?php
                                                $curl = curl_init();
                                                $url = 'http://localhost:5000/api/usuario';
                                                curl_setopt($curl, CURLOPT_URL, $url);
                                                curl_setopt($curl, CURLOPT_HTTPGET, true);
                                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                $response = curl_exec($curl);
                                                $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                                if ($httpCode == 200) {
                                                    $data = json_decode($response);    
                                                    foreach ($data as $key => $value) {
                                                        echo "<tr>";
                                                        echo "<td>".$value->id."</td>";
                                                        echo "<td>".$value->identificacion."</td>";
                                                        echo "<td>".$value->nombre."</td>";
                                                        echo "<td>".$value->apellidos."</td>";
                                                        echo "<td>".$value->direccion."</td>";
                                                        echo "<td>".$value->telefono."</td>";
                                                        echo "<td>".$value->email."</td>";
                                                        echo "<td>".$value->nombre_rol."</td>";
                                                        echo "<td>".$value->nombre_rango."</td>";
                                                        $value->estado == 1 ? $estado = "Habilitado" : $estado = "Deshabilitado";
                                                        echo "<td>".$estado."</td>";
                                                        echo "<td>";
                                                        echo "<a href='#' title='Editar' class='btn btn-primary btn-xs' data-bs-toggle='modal' data-bs-target='#editarusuario'><i class='fa fa-pencil'></i></a>";
                                                        echo "<a href='usuario.php?id=".$value->id."' title='Eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "Error, no se pudieron obtener los datos";
                                                }
                                                curl_close($curl);
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php /* 
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
                                */?>
                                <div class="cadr-footer">
                                    <div class="text-center text-danger">
                                        © <span class="current-year"></span>
                                        <a id="scroll-top" class="go-top">
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