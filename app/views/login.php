<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/login.css">
    <?php 
    require_once "components/links.php";
    require_once "components/alerts.php";
    ?>
    <title>farmacia : login</title>
</head>
<body style='
  background-image: url(assets/img/farmacia_fondo.jpg);
  background-size: cover;
  background-position: center;
'>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 ">Bienvenido</h1>
                                <img class="logo" src="assets/img/kaiadmin/icon.png" alt="logo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="divider-vertical"></div>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                    </div>
                                    <form class="formulario user" onsubmit="return formulario_validaciones()" action="index.php?url=autenticator&action=ingresar" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <span class="input-group-text" id="basic-addon1"
                                                    ><i class="fa fa-user"></i></span
                                                    >
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Username"
                                                    aria-label="Username"
                                                    aria-describedby="basic-addon1"
                                                    name='username' id='username' required
                                                    oninput="username_validacion()"
                                                    >
                                                <span id="icono-validacionUsername" class="input-icon"></span>
                                                <span id="errorUsername" class="error-messege"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <span class="input-group-text" id="basic-addon1"
                                                    ><i class="fa fa-lock"></i></span
                                                    >
                                                <input class="form-control form-control-user input_pw" type="password" name="password" id="password" placeholder="password" required oninput="password_validacion()">
                                                <span id="icono-validacionPW" class="input-icon"></span>
                                                <span id="errorPW" class="error-messege"></span>
                                            </div>
                                        </div>
                                        <center>
                                            <a href="index.php?url=autenticator&action=recuperar">No te recuerdas de tu password?.</a>
                                        </center>
                                        <br>
                                        <button class="btn btn-primary btn-user btn-block iniciar_seccion" type="submit">INGRESAR</button>
                                    </form>
                                    <br>
                                    <center>
                                        <a href="index.php?url=autenticator&action=register">No tienes cuenta crea una?.</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/validaciones/login_validaciones.js"></script>
</body>
</html>