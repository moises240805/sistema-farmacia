<?php
    //llama al modelo
    require_once 'app/models/AutenticatorModel.php';
    require_once 'components/utils.php';

    //zona horaria
    date_default_timezone_set('America/Caracas');

    // se almacena la action o la peticion http 
    //$action = '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    // indiferentemente sea la action el switch llama la funcion correspondiente
    switch ($action) {

        case 'registrar':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                Registrar();
            }
        break;

        case 'register':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                Register_Views();
            }
        break;

        case 'ingresar':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                Iniciar_Sesion();
            }
        break;

        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                Login_Views();
            }
        break;

        case 'recuperar':
            if ($_SERVER['REQUEST?METHOD'] == 'POST') {
                Recuperar();
            }
        break;

        case 'ajustes':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                Recuperar_Views();
            }
        break;

        case 'obtener':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                Obtener();
            }
        break;

        case 'cerrar':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                Cerrar_Session();
            }
        break;

        default:
            Login_Views();
        break;
    }

    // funcion para registrar un nuevo usuario para el sistema
    function Registrar() {

        // crea el objeto
        $modelo = new Autenticator();

        //obtiene los valores y lo sinatiza
        $username = filter_var($_POST['username'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        // valida si todo los los campos esta vacios
        if (empty($username) && empty($email) && empty($password)) {
            setError('Todos los campos no pueden ser enviados vacios.');
            header('Location: index.php?url=autenticator&action=register');
            exit();
        }

        // se arma el objeto json del usuario
        $usuario_json = json_encode([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'rol' => '3'
        ]);

        try {

            // lla ma la funcion que maneja las acciones en el modelo donde pasa como 
            // primer para metro la accion y luego el objeto usuario_json
            $resultado = $modelo->manejarAccion('agregar', $usuario_json);

            // valida si exixtes el staus del resultado y si es true 
            if (isset($resultado['status']) && $resultado['status'] === true) {

                // usa el mensaje dinamico del modelo
                setSuccess($resultado['msj']);
            }
            else {
                
                // Error: usa mensaje dinamico o generico
                $mensajeError = $resultado['msj'] ?? 'Error al registrar...';
                setError($mensajeError);

                //redirect
                header('Location: index.php?url=autenticator&action=register');
            }
        }
        catch (Exception $e) {

            //mensaje del exception de pdo
            error_log('Error al registrar...' . $e->getMessage());
            setError('Error en operacion.');
        }

        //redirect
        header('Location: index.php?url=autenticator&action=login');
        exit();
    }

    // funcion para iniciar session en el sistema
    function Iniciar_Sesion() {

        // crea el objeto
        $modelo = new Autenticator();

        //obtiene y sinatiza los datos
        $username = filter_var($_POST['username'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var($_POST['password'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        // valida si los campos no estan vacios
        if (empty($username) || empty($password)) {

            setError("Todos los campos no pueden ser enviados vacios.");
            header("Location: index.php?url=atenticator?action=login");
            exit();
        }

        // se arma el json del usuario
        $usuario_json = json_encode([
            'username' => $username,
            'password' => $password
        ]);

        // obtiene los datos del usuario del modelo
        $resultado = $modelo->manejarAccion('ingresar',$usuario_json);

        // valida si el resulatdo es true
        if ($resultado['status']) {

            // almacena los datos del usuario 
            $usuario = $resultado['data'];

            // verifica la password utilizando password_verify
            if (password_verify($password, $usuario['usuario_password'])) {

                // se asegura que la session este iniciada
                if (session_status() === PHP_SESSION_NONE) {

                    // se inicializa la session
                    session_start();
                }

                // se inicializa la variables de session
                $_SESSION['s_usuario'] = [
                    'usuario_id' => $usuario['usuario_id'],
                    'usuario_nombre' => $usuario['usuario_nombre'],
                    'usuario_email' => $usuario['usuario_email'],
                    'usuario_rol_id' => $usuario['usuario_rol_id'],
                    'usuario_nombre_rol' => $usuario['rol_nombre'],
                ];

                // mensaje de bienvenida
                setSuccess("Bienvenido!. Usuario autenticado correctamente.");

                // redirect
                header("Location: index.php?url=dashboard");
                
                // termina el script una vez redereccionado el usuario
                exit();
            }
            else {
                
                //mensaje de error en autenticacion
                setError("Datos incorrectos intentelo de nuevo.");

                // redirect
                header("Location: index.php?url=autenticator?action=login");

                // termina el script
                exit();
            }
        }
        else {

            // mensaje de error en consulta de usuario
            setError("Usuario no encontrado intentelo de nuevo o cree una cuenta.");

            // redirect
            header("Location: index.php?url=autenticator?action=login");

            //termina el script
            exit();
        }
    }

    // funcion para cerrar session de un usuario
    function Cerrar_Session() {

        // inicializa la session
        session_start();

        // destruye la session
        session_destroy();

        // redirect
        header('location:index.php');
        
        // termina el script
        exit();
    }

    // funcion que llama la vista de registrar usuario
    function Register_Views() {
        require_once 'app/views/register.php';
    }

    // funcion que llama la vista de iniciar session usuario
    function Login_Views() {
        require_once 'app/views/login.php';
    }

    // funcion que llama la vista de recuperar usuario
    function Recuperar_Views() {
        require_once 'app/views/recuperar.php';
    }
?>