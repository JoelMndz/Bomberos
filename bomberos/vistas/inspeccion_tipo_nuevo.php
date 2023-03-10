<?php
    $error = null;
    if(isset($_POST["descripcion"])){
        $curl = curl_init();
        $url = 'http://localhost:5000/api/tipo-inspeccion';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode == 200) {
            header("Location: ./inspeccion_tipo.php");
            return;
        }else{
            $error = json_decode($response);    
        }
    }
?>

<?php require('../vistas/layout/header.php') ?>

<!-- /.navbar -->
<title>Sistema de Permisos | Nuevo Tipo de Inspección</title>

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
                                <h3 class="card-title fs-4">Ingreso Nuevo Tipo de Inspección</h3>
                            </div>
                            <div class="card-body">
                                <section class="wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-border panel-warning widget-s-1">
                                                <div class="panel-body">
                                                    <?php if($error){ ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong><?= $error->message?></strong> 
                                                        </div>
                                                    <?php }?>
                                                    <form class="row g-3" method="post">
                                                        <div class="col-md-12">
                                                            <label class="form-label" for="descripcion">Nombre</label>
                                                            <input type="text" class="form-control" name="descripcion" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label" for="valor">Valor</label>
                                                            <input type="number" class="form-control" name="valor" step="0.01" required>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <a href="inspeccion_tipo.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
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