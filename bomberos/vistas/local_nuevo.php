<?php 
require('../vistas/layout/header.php');

$error = null;
$contribuyentes = [];
$parroquias = [];
$contribuyente = null;

if(isset($_POST['buscar'])){
    $curl = curl_init();
    $url = 'http://localhost:5000/api/contribuyente/'.$_POST['identificacion'];
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpCode == 200){
        $contribuyente = json_decode($response);
    }
}
if(isset($_POST["guardar"])){
    $curl = curl_init();
    $url = 'http://localhost:5000/api/local';
    $_POST["idContribuyente"] = $_GET["idContribuyente"];
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpCode == 200) {
        header("Location: ./local.php");
        return;
    }else{
        $error = json_decode($response);    
    }
}

$curl = curl_init();
$url = 'http://localhost:5000/api/parroquia';
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPGET, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
if ($httpCode == 200) {
    $parroquias = json_decode($response);    
}



?>

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
                                                    <?php if($error){ ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong><?= $error->message?></strong> 
                                                        </div>
                                                    <?php }?>
                                                    <form class="row g-3" method="post" action="local_nuevo.php<?= $contribuyente ? '?idContribuyente='.$contribuyente->id:''?>">
                                                        <?php 
                                                            if(!$contribuyente){
                                                        ?>
                                                        <div class="col-md-4">
                                                            <label for="identificaion"  class="form-label p-0">Buscar por la identificación</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="identificacion" <?php echo (!$contribuyente ? 'required':'') ?>>
                                                                <input type="submit" name="buscar" class="btn btn-outline-danger"></input>
                                                            </div>
                                                        </div>
                                                        <?php } else{?>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Contribuyente</label>
                                                            <input type="text" class="form-control" id="" value="<?= $contribuyente ? $contribuyente->nombre.' '.$contribuyente->apellidos: '' ?>" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" name="nombre" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputState" class="form-label">Parroquia</label>
                                                            <select class="form-select" name="idParroquia" required>
                                                                <?php foreach ($parroquias as $key => $value) { ?>
                                                                    <option value="<?=$value->id?>"><?= $value->descripcion?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="numeroCasa" class="form-label">N° de Casa</label>
                                                            <input type="text" class="form-control" name="numeroCasa" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="callePrincipal" class="form-label">Calle Principal</label>
                                                            <input type="text" class="form-control" name="callePrincipal" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="calleSecundaria" class="form-label">Calle Secundaria</label>
                                                            <input type="text" class="form-control" name="calleSecundaria" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="referencia" class="form-label">Referencias</label>
                                                            <input type="text" class="form-control" name="referencia" required>
                                                        </div>
                                                        <?php }?>
                                                        <div class="panel-footer">
                                                            <a href="local.php" class="btn btn-dark"><span class="fa fa-mail-reply "></span> Regresar</a>
                                                            <?php 
                                                                if($contribuyente){
                                                            ?>
                                                            <button type="submit" name="guardar" id="btn-submit" value="Guardar" class="btn btn-primary"><span class="fa fa-save"></span>Guardar</button>
                                                            <?php } ?>
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