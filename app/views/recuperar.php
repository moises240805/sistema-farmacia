<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/login.css">
    <?php 
    require_once "components/links.php";
    require_once "components/alerts.php";
    ?>
<<<<<<< HEAD
    <title>farmacia : Enviar Email</title>
=======
    <title>farmacia : recuperar</title>
>>>>>>> d51b19c324e5445128d270269f3af8f9a680865d
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
<<<<<<< HEAD
                                        <h1 class="h4 text-gray-900 mb-4">Enviar Email de Recuperación</h1>
                                    </div>
                                    <form class="formulario user" onsubmit="return formulario_validaciones()" action="index.php?url=autenticator&action=recuperar" method="post">
=======
                                        <h1 class="h4 text-gray-900 mb-4">Recuperar Usuario</h1>
                                    </div>
                                    <form class="formulario user" onsubmit="return formulario_validaciones()" action="index.php?url=autenticator&action=ingresar" method="post">
>>>>>>> d51b19c324e5445128d270269f3af8f9a680865d
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <span class="input-group-text" id="basic-addon1"
                                                    ><i class="fa fa-user"></i></span
                                                    >
                                                    <input
                                                    type="text"
                                                    class="form-control"
<<<<<<< HEAD
                                                    placeholder="Username@example.com"
                                                    aria-label="Email"
                                                    aria-describedby="basic-addon1"
                                                    name='email' id='email' 
                                                    oninput="email_validacion()"
                                                    required
                                                    />
                                                <span id="icono-validacionEmail" class="input-icon"></span>
                                                <span id="errorEmail" class="error-messege"></span>
=======
                                                    placeholder="Ingrese su Username"
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
                                                <input class="form-control form-control-user input_pw" type="password" name="password" id="password" placeholder="Ingrese su nueva password" required oninput="password_validacion()">
                                                <span id="icono-validacionPW" class="input-icon"></span>
                                                <span id="errorPW" class="error-messege"></span>
                                            </div>
                                        <div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                 <span class="input-group-text" id="basic-addon1"
                                                    ><i class="fa fa-lock"></i></span
                                                    >
                                                <input class="form-control form-control-user input_pw" type="password" name="password" id="password" placeholder="Confirmar password" required oninput="password_validacion_confirm()">
                                                <span id="icono-validacionPW" class="input-icon"></span>
                                                <span id="errorPW" class="error-messege"></span>
>>>>>>> d51b19c324e5445128d270269f3af8f9a680865d
                                            </div>
                                        </div>
                                        <center>
                                            <a class='btn btn-link' href="index.php?url=autenticator&action=login">Iniciar Session</a>
                                        </center>
                                        <br>
<<<<<<< HEAD
                                        <button class="btn btn-outline-primary btn-block btn-round iniciar_seccion" type="submit">ENVIAR EMAIL</button>
=======
                                        <button class="btn btn-outline-primary btn-block btn-round iniciar_seccion" type="submit">RECUPERAR</button>
>>>>>>> d51b19c324e5445128d270269f3af8f9a680865d
                                    </form>
                                    <br>
                                    <center>
                                        <a class='btn btn-link' href="index.php?url=autenticator&action=register">No tienes cuenta crea una?.</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
            </div>                        
        </div>
    </div>
    <script src="assets/js/validaciones/recuperar_validaciones.js"></script>
    <?php require_once "components/scripts.php"; ?>
=======
            </div>
        </div>
    </div>
    <script src="assets/js/validaciones/login_validaciones.js"></script>
>>>>>>> d51b19c324e5445128d270269f3af8f9a680865d
</body>
</html>