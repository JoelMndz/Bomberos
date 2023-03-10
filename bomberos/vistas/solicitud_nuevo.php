<?php
    session_start();
    $tipoInspecciones = [];
    $locales = [];
    $contribuyente = null;

    if(isset($_POST["buscar"])){
        $curl = curl_init();
        $url = 'http://localhost:5000/api/contribuyente/buscar-locales/'.$_POST['identificacion'];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if($httpCode == 200){
            $contribuyente = json_decode($response);
            $locales = $contribuyente->locales;
        }
    }

    if(isset($_GET["id"])){
        $curl = curl_init();
        $url = 'http://localhost:5000/api/solicitud';
        $_POST["idUsuario"] = $_SESSION["user"]->id;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        header("Location: ./solicitud.php");
        return;
    }


    $curl = curl_init();
    $url = 'http://localhost:5000/api/tipo-inspeccion';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpCode == 200) {
        $tipoInspecciones = json_decode($response);    
    }
?>

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
                                                        <form  action="solicitud_nuevo.php<?php echo $contribuyente ? '?id='.$contribuyente->id:''?>" class="row g-3" method="post">
                                                            <div class="card">
                                                                <h5>
                                                                    Contribuyente
                                                                </h5>
                                                                <div class="card-body">
                                                                    <label for="identificaion"  class="form-label p-0">Número de Identificación</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="identificacion" <?php echo (!$contribuyente ? 'required':'') ?>>
                                                                        <input type="submit" name="buscar" class="btn btn-outline-danger"></input>
                                                                    </div>
                                                                    <div class="">
                                                                        <label for="inputPassword4" class="form-label">Nombres y Apellidos</label>
                                                                        <input type="text" class="form-control" id="" value="<?= $contribuyente ? $contribuyente->contribuyente: '' ?>" disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="idLocal" class="form-label">Locales</label>
                                                                        <select name="idLocal" class="form-select" <?php echo ($contribuyente ? 'required':'') ?>>
                                                                            <?php foreach ($locales as $key => $value) { ?>
                                                                            <option value="<?= $value->id_local ?>"><?= $value->local?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="idTipoInspeccion" class="form-label">Tipo de inspección</label>
                                                                        <select name="idTipoInspeccion" class="form-select" required>
                                                                            <?php foreach ($tipoInspecciones as $key => $value) { ?>
                                                                            <option value="<?= $value->id ?>"><?= $value->descripcion?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <a href="solicitud.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span>Regresar</a>
                                                                        <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span>Guardar</button>
                                                                        <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span>Cancelar</button>
                                                                    </div>
                                                                </div>
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