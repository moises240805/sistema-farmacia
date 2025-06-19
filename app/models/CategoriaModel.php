<?php
// llama al modelo conexion
require_once "ConexionModel.php";

// se difine la clase
class Categoria extends Conexion {

    // Atributos
    private $categoria_id;
    private $categoria_nombre;

    // construcor
    public function __construct() {
        parent::__construct();
    }

    // GETTERS
    //getters para el id
    private function getCategoriaID() {
        
        // retorna el id a utilizar
        return $this->categoria_id;
    }

    // getters para el nombre
    private function getCategoriaNombre() {

        // retorna el nombre a utilizar
        return $this->categoria_nombre;
    }

    // SETTERS
    //setters para el id
    private function setCategoriaID() {
        
    }

        //setters para el nombre
    private function setCategoriaNombre() {
        
    }
    //setters para el nombre y id
    private function setCategoriaData() {

    }

    // Esta se encarga de procesar los action indiferentemente cual sea llama la funcion de 
    // validacio y luego al metodo correspondiente al action
    // donde primero recibe el action como primer parametro que son los de agregar etc.. 
    // y el objeto json como segundo parametro para las validaciones y asiganciones al objeto 
    public function manejarAccion($action, $categoria_json ){

        // maneja el action y carga la funcion correspondiente a la action
        switch($action){

            case 'agregar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setCategoriaNombre($categoria_json);
                
                // valida si el status es true o false
                if (!$validacion['status']) {
                
                    // retorna el status con el mensaje
                    return $validacion;
                }
                
                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Guardar_Categoria();

            // termina el script    
            break;

            case 'obtener':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setCategoriaID($categoria_json);
                
                // valida si el status es true o false
                if (!$validacion['status']) {
                
                    // retorna el status con el mensaje
                    return $validacion;
                }
                
                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Obtener_Categoria();

            // termina el script    
            break;

            case 'modificar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setCategoriaData($categoria_json);
                
                // valida si el status es true o false
                if (!$validacion['status']) {
                
                    // retorna el status con el mensaje
                    return $validacion;
                }
                
                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Actualizar_Categoria();

            // termina el script    
            break;

            case 'eliminar':

                // almacena el status de la respuesta de la funcion de validacion
                $validacion = $this->setCategoriaID($categoria_json);
                
                // valida si el status es true o false
                if (!$validacion['status']) {
                
                    // retorna el status con el mensaje
                    return $validacion;
                }
                
                // llama la funcion si todo sale bien y retorna el resultado
                return $this->Eliminar_Categoria();

            // termina el script    
            break;

            case 'consultar':

                // llama la funcion y retorna los datos
                return $this->Mostrar_Categoria();

            // termina el script
            break;

            default:

                // retorna un mensaje de error en caso de no existir la accion
                return['status' => false, 'msj' => 'Accion Invalida.'];

            // termina el script
            break;
        }
    }

    // funcion para iniciar session un usuario
    private function Mostrar_Categoria() {

        // la conxecion es null por defecto
        $this->closeConnection();

        // para manejo de errores
        try {
            
            // llamo la funcion y creo la conexion
            $conn = $this->getConnection();

            // consulta el usuario que inicia session
            $query = "SELECT *
                        FROM categorias
                        WHERE status = 1"; //valida el estado del usuario si esta activo

            // prepar la sentencia 
            $stmt = $conn->prepare($query);

            // ejecuta la sentencia
            $stmt->execute(); 

             // se valida si se ejecuto la sentencia y si es true
            if ($stmt->rowCount() > 0) {

                // almacena los datos extraidos de la base de datos 
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                //retorna el status con el mensaje y los datos de usuario
                return['status' => true, 'msj' => 'Categorias encontradas con exito.', 'data' => $data];
            }
            else {

                // reti=rona un status de error con un mensaje 
                return['status' => false, 'msj' => 'Categorias no encontradas o inactivas'];
            }

        } catch (PDOException $e) {
            
            // retorna mensaje de error del exception del pdo
            return['status' => false, 'msj' => 'Error en la consulta' . $e->getMessage()];
        }
        finally {

            // finaliza la fincion cerrando la conexion a la bd
            $this->closeConnection();
        }
    }
}


?>