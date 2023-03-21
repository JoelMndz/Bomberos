<?php
//Logica
if(isset($_POST["observacion"])){
  $curl = curl_init();
  $url = 'http://localhost:5000/api/inspeccion/'.$_GET['id'];
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  if ($httpCode != 200) {
      $error = json_decode($response);
  }else{
      header("Location: ./inspeccion.php");
      return;
  }
}

?>
<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Inspeccion</title>

<!-- Main Sidebar Container -->
<?php require('../vistas/layout/nav.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="mt-2">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title fs-4">Cambiar estado solicitud</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <div class="modal-body">
                                                        <form action="inspeccion_estado.php?id=<?=$_GET['id']?>" method="post" class="row g-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="input-group">
                                                                                <label class="form-label p-1">Observacion:</label>
                                                                                <input name="observacion" type="text" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="form-label p-1">Estado:</label>
                                                                        <select class="form-select" name="aprobacion" required>
                                                                        <option value="">Escoja un estado</option>
                                                                          <option value="apr">Aprobado</option>
                                                                          <option value="rec">Rechazado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <a href="inspeccion.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span>Regresar</a>
                                                                <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span>Guardar</button>
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