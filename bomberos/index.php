<?php
    session_start();
    if(isset($_POST["email"])){
        $curl = curl_init();
        $url = 'http://localhost:5000/api/auth/login';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode == 200) {
            $_SESSION["user"] = json_decode($response);
            header("Location: ./vistas/usuario.php");
            return;
        }else{
            $_SESSION["error"] = "Credenciales incorrectas!";
        }
        
    }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Sistema de Permisos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style_login.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body">
    <main>
        <div class="container ">
            <section class="min-vh-100 d-flex align-items-center py-6">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 mt-2 col-md-6 d-flex flex-column align-items-center">
                            <div class="card mb-4">

                                <div class="text-center  justify-content-center py-2">
                                    <a href="index.php" class="text-muted text-decoration-none">
                                        <img class="img-responsive" src="img/escudo_sin.png" width="150" alt="">
                                        <h3 class="d-lg-block letra">Bomberos de Azogues</h3>
                                    </a>
                                </div><!-- End Logo -->
                                <div class="card-body">
                                    <div class="pt-2 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4 letra">¡Bienvenido!</h5>
                                        <p class="text-center small">Ingrese correo y contraseña para
                                            iniciar sesión</p>
                                    </div>
                                    <?php if(isset($_SESSION['error'])){ ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['error']?></strong> 
                                        </div>
                                    <?php unset($_SESSION['error']); }?>
                                    <form class="row g-2 " method="post" action="index.php">
                                        <div class="col-12">
                                            <label for="email" class="form-label">Correo</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-user">
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <a class="text-muted text-decoration-none" href="pages-register.html">¿Olvidaste tu contraseña?</a>
                                            <input type="password" name="password" class="form-control form-control-user" >
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="inicio text-white" type="submit">Iniciar
                                                Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            Realizado por <a href="#" class="text-muted text-decoration-none">Ismael Andres Pérez &
                                Marco Vinicio Pérez </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
    <!-- Template Main JS File -->
    <script src="js/login.js"></script>
</body>

</html>