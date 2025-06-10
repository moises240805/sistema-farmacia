<?php

// llama al modelo conexion
require_once "ConexionModel.php";

class Autenticator extends Conexion {

    // atributos
    private $usuario_id;
    private $usuario_name;
    private $usuario_email;
    private $usuario_password;
    private $usuario_rol;

    // construcor
    public function __construct() {
        parent::__construct();
    }

    // metodo que me valida y asigna los datos del objeto recibido para la funcion registrar
    private function setUsuarioData($usuario_json) {

        // valida si el json es string y lo descompone
        if (is_string($usuario_json)) {

            // se almacena el contenido del json en la variable usuario
            $usuario = json_decode($usuario_json, true);
            
            // valida que el json cumpla con el formato requerido
            if ($usuario === null) {

                // retorna un arry con el mensaje y el status
                return ['status' => false, 'msj' => 'JSON invalido.'];
            }
        }

        // expreciones regulares y validaciones
        $expre_username = '/^[a-zA-Z0-9@_]+$/'; //para el usernmae
        $expre_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // para el email
        $expre_password = '/^(?=.*[A-Z])(?=.*\.)[a-zA-Z0-9.]{6,}$/'; // para el password
        $expre_numeric = '/^\d+$/'; // para los numeros

        // almacena el username en la variable para despues validar
        $username = trim($usuario['username'] ?? '');
        // valida el username si cumple con los requisitos
        if ($username === '' && !preg_match($expre_username, $username) && strlen($username) > 20 && strlen($username) < 5) {
            // retorna un arry de status con el mensaje en caso de error
            return ['status' => false, 'msj' => 'EL nombre de usuario es invalido debe tener minimo 5 y maximo 20 caracteres y debe tener un @ y/o un _  ej:@usuario_123 .'];
        }

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_name = $username;

        // almacena el email en la variable para despues validar
        $email = trim($usuario['email'] ?? '');
        // valida el email si cumple con los requisitos
        if ($email === '' && !preg_macth($expre_email, $email) && strlen($email) > 20 && strlen($email) < 5) {
            //retorna un arry de status con el mensaje en caso de error
            return ['status' => false, 'msj' => 'El email es invalido debe tener minimo 5 y maximo 25 caracteres y debe tener un @ y un .com  ej: example@email.com .'];
        }

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_email = $email;

        // almacena la password en la variable para despues validar
        $password = trim($usuario['password'] ?? '');
        // valida la password si cumple con todos los requisitos
        if ($password === '' && !preg_macth($expre_password, $password) && strlen($password) > 11 && strlen($password) < 6) {
            //retorna un arry de status con el mensaje en caso de error
            return['status' => false, 'msj' => 'La password es invalida debe tener minimo 6 y maximo 11 caracteres y debe tener un caracter mayuscula y un .  ej: Example12. .'];
        }

        // encripta la password una ves validada
        $password_hash = password_hash($password, PASSWORD_DEFAULT); 

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_password = $password_hash;

        // almacena el rol en la variable para despues validar
        $rol = trim($usuario['rol'] ?? '');
        // valida el rol si cumple con todos los requisitos
        if ($rol === '' && !preg_match($expre_numeric, $rol)) {
            //retorna un arry de status con el mensaje en caso de error 
            return['status' => true, 'msj' => 'El rol es invalido intentenlo de nuevo.'];
        }

        // asigna el valor en el atributo del objeto si todo salio bien
        $this->usuario_rol = $rol;

        // retorna true si todo fue validado y asignado correctamente
        return['status' => true, 'msj' => 'Datos validados y asignados correctamente.']; 
    }

    // metodo que me valida y asigna los datos del objeto recibido para la funcion iniciar session
    private function setUsuarioLoginData($usuario_json) {

        // valida si el json es string y lo descompone
        if (is_string($usuario_json)) {

            // se almacena el contenido del json en la variable usuario
            $usuario = json_decode($usuaio_json, true);
            
            // valida que el json cumpla con el formato requerido
            if ($usuario === null) {

                // retorna un arry con el mensaje y el status
                return ['status' => false, 'msj' => 'JSON invalido.'];
            }
        }

        // expreciones regulares y validaciones
        $expre_username = '/^[a-zA-Z0-9@_]+$/'; //para el usernmae
        $expre_password = '/^(?=.*[A-Z])(?=.*\.)[a-zA-Z0-9.]{6,}$/'; // para el password

        // almacena el username en la variable para despues validar
        $username = trim($usuario['username'] ?? '');
        // valida el username si cumple con los requisitos
        if ($username === '' && !preg_match($expre_username, $username) && strlen($username) > 20 && strlen($username) < 5) {
            // retorna un arry de status con el mensaje en caso de error
            return ['status' => false, 'msj' => 'EL nombre de usuario es invalido debe tener minimo 5 y maximo 20 caracteres y debe tener un @ y/o un _  ej:@usuario_123 .'];
        }

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_name = $username;

        // almacena la password en la variable para despues validar
        $password = trim($usuario['password'] ?? '');
        // valida la password si cumple con todos los requisitos
        if ($password === '' && !preg_macth($expre_password, $password) && strlen($password) > 11 && strlen($password) < 6) {
            //retorna un arry de status con el mensaje en caso de error
            return['status' => false, 'msj' => 'La password es invalida debe tener minimo 6 y maximo 11 caracteres y debe tener un caracter mayuscula y un .  ej: Example12. .'];
        }

        // encripta la password una ves validada
        $password_hash = password_hash($password, PASSWORD_DEFAULT); 

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_password = $password_hash;

        // retorna true si todo fue validado y asignado correctamente
        return['status' => true, 'msj' => 'Datos validados y asignados correctamente.'];
    }

    // metodo que me valida y asigna los datos del objeto recibido para la funcion recuperar
    private function setUsuarioUpdateData($usuario_json) {

         // valida si el json es string y lo descompone
        if (is_string($usuario_json)) {

            // se almacena el contenido del json en la variable usuario
            $usuario = json_decode($usuaio_json, true);
            
            // valida que el json cumpla con el formato requerido
            if ($usuario === null) {

                // retorna un arry con el mensaje y el status
                return ['status' => false, 'msj' => 'JSON invalido.'];
            }
        }

        // expreciones regulares y validaciones
        $expre_username = '/^[a-zA-Z0-9@_]+$/'; //para el usernmae
        $expre_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // para el email
        $expre_password = '/^(?=.*[A-Z])(?=.*\.)[a-zA-Z0-9.]{6,}$/'; // para el password
        $expre_numeric = '/^\d+$/'; // para los numeros

        // almacena el username en la variable para despues validar
        $username = trim($usuario['username'] ?? '');
        // valida el username si cumple con los requisitos
        if ($username === '' && !preg_match($expre_username, $username) && strlen($username) > 20 && strlen($username) < 5) {
            // retorna un arry de status con el mensaje en caso de error
            return ['status' => false, 'msj' => 'EL nombre de usuario es invalido debe tener minimo 5 y maximo 20 caracteres y debe tener un @ y/o un _  ej:@usuario_123 .'];
        }

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_name = $username;

        // almacena el email en la variable para despues validar
        $email = trim($usuario['email'] ?? '');
        // valida el email si cumple con los requisitos
        if ($email === '' && !preg_macth($expre_email, $email) && strlen($email) > 20 && strlen($email) < 5) {
            //retorna un arry de status con el mensaje en caso de error
            return ['status' => false, 'msj' => 'El email es invalido debe tener minimo 5 y maximo 25 caracteres y debe tener un @ y un .com  ej: example@email.com .'];
        }

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_email = $email;

        // almacena la password en la variable para despues validar
        $password = trim($usuario['password'] ?? '');
        // valida la password si cumple con todos los requisitos
        if ($password === '' && !preg_macth($expre_password, $password) && strlen($password) > 11 && strlen($password) < 6) {
            //retorna un arry de status con el mensaje en caso de error
            return['status' => false, 'msj' => 'La password es invalida debe tener minimo 6 y maximo 11 caracteres y debe tener un caracter mayuscula y un .  ej: Example12. .'];
        }


        // encripta la password una ves validada
        $password_hash = password_hash($password, PASSWORD_DEFAULT); 

        // asigna el valor al atributo del objeto si todo salio bien
        $this->usuario_password = $password_hash;

        // almacena el id en la variable para despues validar
        $id = trim($usuario['id'] ?? '');
        // valida el rol si cumple con todos los requisitos
        if ($id === '' && !preg_match($expre_numeric, $id)) {
            //retorna un arry de status con el mensaje en caso de error 
            return['status' => true, 'msj' => 'El id es invalido intentenlo de nuevo.'];
        }

        // asigna el valor en el atributo del objeto si todo salio bien
        $this->usuario_id = $id;

        // retorna true si todo fue validado y asignado correctamente
        return['status' => true, 'msj' => 'Datos validados y asignados correctamente.']; 
    }

    // metodo que me valida y asigna los datos del objeto recibido para la funcion obtener
    private function setUsuarioID($usuario_json) {

         // valida si el json es string y lo descompone
        if (is_string($usuario_json)) {

            // se almacena el contenido del json en la variable usuario
            $usuario = json_decode($usuaio_json, true);
            
            // valida que el json cumpla con el formato requerido
            if ($usuario === null) {

                // retorna un arry con el mensaje y el status
                return ['status' => false, 'msj' => 'JSON invalido.'];
            }
        }

        $expre_numeric = '/^\d+$/'; // para los numeros

        // almacena el id en la variable para despues validar
        $id = trim($usuario['id'] ?? '');
        // valida el rol si cumple con todos los requisitos
        if ($id === '' && !preg_match($expre_numeric, $id)) {
            //retorna un arry de status con el mensaje en caso de error 
            return['status' => true, 'msj' => 'El id es invalido intentenlo de nuevo.'];
        }

        // asigna el valor en el atributo del objeto si todo salio bien
        $this->usuario_id = $id;

        // retorna true si todo fue validado y asignado correctamente
        return['status' => true, 'msj' => 'Datos validados y asignados correctamente.']; 
    }

    // GETTERS

    // para el id
    private function getID() {

        // retorna el id
        return $this->usuario_id;
    }

    // para el username
    private function getUsername() {

        // retorna el username
        return $this->usuario_name;
    }

    // para el email
    private function getEmail() {

        // retorna el email
        return $this->usuario_email;
    }

    // para el password
    private function getPassword() {

        //retorna el password
        return $this->usuario_password;
    }

    // para el rol
    private function getRol() {

        //retorna el rol
        return $this->usuario_rol;
    }

    // Esta se encarga de procesar los action indiferentemente cual sea llama la funcion de 
    // validacio y luego al metodo correspondiente al action
    // donde primero recibe el action como primer parametro que son los de agregar etc.. 
    // y el objeto json como segundo parametro para las validaciones y asiganciones al objeto 
    public function manejarAccion($action, $usuario_json) {

        switch($action) {

            case 'agregar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setUsuarioData($usuario_json);
                
                // valida si el status es true o false
                if (!$validacion['status']) {
                
                    // retorna el status con el mensaje
                    return $validacion;
                }
                
                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Registrar_Usuario();

            // termina el script    
            break;

            case 'ingresar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setUsuarioLoginData($usuario_json);

                // valida si el status es true o false
                if (!$validacion['status']) {

                    //retorna el status con el mensaje
                    return $validacion;
                }

                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Iniciar_Session();

            // termina el script
            break;

            case 'recuperar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setUsuarioUpdateData($usuario_json);

                //valida si el status es true o false
                if (!$validacion['status']) {

                    //retorna el status con el mensaje
                    return $validacion;
                }

                // llama la funcion si todo sale bien y retorna el resultado 
                return $this->Recuperar_Usuario();

            // termina el script
            break;

            case 'obtener':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setUsuarioID($usuario_json);

                // valida si el status es true o false
                if (!$validacion['status']) {

                    //retorna el status con el mensaje
                    return $validacion;
                }

                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Obtener_Usuario();

            // termina el script
            break;
        }
    }

    //METODOS

    // metodo para regisrar un usuario 
    private function Registrar_Usuario() {

        // la conexion es null por defecto
        $this->closeConnection();

        // para el manejo de errores
        try {

            // llamo y la funcion y creo la conexion
            $conn = $this->getConnection();

            // consulta si existe el usuario
            $query = "SELECT * FROM usuarios WHERE usuario_nombre = :usuario_name";
            
            // prepara la sentencia sql
            $stmt = $conn->prepare($query);

            // vincula los parametros
            $stmt->bindValue(':usuario_name', $this->getUsername());

            // ejecuta la sentecia
            $stmt->execute();

            // valida si se ejecuto y si existe el usuario
            if ($stmt->rowCount() == 0) {

                // inserta un nuevo usuario
                $query = "INSERT INTO usuarios (usuario_nombre, usuario_email, usuario_password, usuario_rol_id)
                                        VALUES (:usuario_name, :usuario_email, :usuario_password, :usuario_rol)";
                
                // prepara la sentencia sql
                $stmt = $conn->prepare($query);

                // vincula los parametros con las variables
                $stmt->bindValue(':usuario_name', $this->getUsername());
                $stmt->bindValue(':usuario_email', $this->getEmail());
                $stmt->bindValue(':usuario_password', $this->getPassword());
                $stmt->bindValue(':usuario_rol', $this->getRol());
        
                // valida si se ejecuto la sentencia y si es true
                if ($stmt->execute()) {

                    //retorna el status true con el mensaje
                    return['status' => true, 'msj' => 'Usuario registrado correctamente Ahora Inicie session en el sistema.'];
                }
                else {

                    // retorna el status false con el mensaje 
                    return['status' => false, 'msj' => 'Error al regisrar el usuario intentelo de nuevo.']; 
                }
            }
            else {

                // retorna el status false con el mensaje
                return['status' => false, 'msj' => 'Error el usuario ya esxiste'];
            }
        }
        catch(PDOException $e) {

            // retorna mensaje de error del exception del pdo
            return['status' => false, 'msj' => 'Error en la consulta' . $e->getMessage()];
        }
        finally {

            // finaliza la funcion cerrando la conexion a la bd
            $this->closeConnection();
        }
    }

    // funcion para iniciar session
    private function Iniciar_Session() {

    }
}
?>