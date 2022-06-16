<?php

class ControladorEstudiante{

	/*=============================================
	Estudiante
	=============================================*/

	static public function CtrIngresarEstudiante(){

		if(isset($_POST["registroNombre"])){

			$tabla = "estudiante";

			$datos = array("Nombre" => $_POST["registroNombre"],
				           "Correo" => $_POST["registroCorreo"],
				           "Telefono" => $_POST["registroTelefono"],
                           "FechaIngreso" => $_POST["registroFechaIngreso"]);

			$respuesta = ModeloEstudiante::mdlIngresarEstudiante($tabla, $datos);

			return $respuesta;

		}

	}

	/*=============================================
	Seleccionar Registros Estudiante
	=============================================*/

	static public function ctrSeleccionarRegistroEstudiante($item, $valor){

		$tabla = "estudiante";

		$respuesta = ModeloEstudiante::mdlSeleccionarRegistro($tabla, $item, $valor);

		return $respuesta;

	}


/*	public function ctrIngresoEstudiante(){

		if(isset($_POST["ingresoEmail"])){

			$tabla = "estudiante";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloEstudiante::mdlSeleccionarRegistros($tabla, $item, $valor);

			if($respuesta["email"] === $_POST["ingresoEmail"] && $respuesta["password"] === $_POST["ingresoPassword"]){

				$_SESSION["validarIngresoUsuario"] = "ok";

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicioEstudiante";

				</script>';

			}else{


				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

				</script>';

				echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
			}
			
			

		}

	}*/

	
	

	/*=============================================
	Actualizar Registro Estudiante
	=============================================*/
	static public function ctrActualizarEstudiante(){

		if(isset($_POST["actualizarEstudiante"])){	
          $tabla = "estudiante";

			$datos = array( "IdEstudiante"=> $_POST["IdEstudiante"],
							"Nombre" => $_POST["actualizarNombre"],
				           "Correo" => $_POST["actualizarCorreo"],
				           "Telefono" =>$_POST["actualizarTelefono"],
                           "FechaIngreso"=> $_POST["actualizarFechaIngreso"]);

			$respuesta = ModeloEstudiante::mdlActualizarEstudiante($tabla, $datos);

			return $respuesta;

		


	}
}

	/*=============================================
	Eliminar Estudiante
	=============================================*/
	public function ctrEliminarEstudiante(){

		if(isset($_POST["eliminarEstudiante"])){

			$tabla = "estudiante";
			$valor = $_POST["eliminarEstudiante"];

			$respuesta = ModeloEstudiante::mdlEliminarEstudiante($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicioEstudiante";

				</script>';

			}

		}

	}
	



}