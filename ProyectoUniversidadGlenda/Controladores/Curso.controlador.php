<?php 

    
    Class ControladorCurso{

        /*==== Registro Curso ====*/
        static public function ctrAgregarCurso(){

            if(isset($_POST["agregarCurso"])){
    
                $tabla = "curso";
    
                $datos = array("nombre" => $_POST["agregarCurso"],
                               "descripcion" => $_POST["agregarDesc"]);
    
                $respuesta = CursoModelo::mdlAgregarCurso($tabla, $datos);
    
                return $respuesta;
    
            }
    
        }

        /*==== Seleccionar curso ====*/

        static public function ctrSeleccionarCurso($item, $valor){

            $tabla = "curso";
    
            $respuesta = CursoModelo::mdlSeleccionarCurso($tabla, $item, $valor);
    
            return $respuesta;
    
        }

    }
    


