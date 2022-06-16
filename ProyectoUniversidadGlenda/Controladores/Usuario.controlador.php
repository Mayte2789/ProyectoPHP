<?php

class ControladorFormularios{

	/*=============================================
	Registro 
	=============================================*/

	static public function ctrRegistro(){

		if(isset($_POST["registroNombre"])){

			$tabla = "usuario";

			$datos = array("nombre" => $_POST["registroNombre"],
				           "email" => $_POST["registroEmail"],
				           "password" => $_POST["registroPassword"]);

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;

		}

	}

	/*=============================================
	Seleccionar Registros 
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor){

		$tabla = "usuario";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Ingreso 
	=============================================*/

	public function ctrIngreso(){

		if(isset($_POST["ingresoEmail"])){

			$tabla = "usuario";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if($respuesta["email"] === $_POST["ingresoEmail"] && $respuesta["password"] === $_POST["ingresoPassword"]){

				$_SESSION["validarIngresoUsuario"] = "ok";

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicioUsuario";

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

	}

	/*=============================================
	Actualizar 
	=============================================*/
	static public function ctrActualizarRegistro(){

		if(isset($_POST["actualizarNombre"])){

			if($_POST["actualizarPassword"] != ""){			

				$password = $_POST["actualizarPassword"];

			}else{

				$password = $_POST["passwordActual"];
			}

			$tabla = "usuario";

			$datos = array("id" => $_POST["idUsuario"],
							"nombre" => $_POST["actualizarNombre"],
				           "email" => $_POST["actualizarEmail"],
				           "password" => $password);

			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			return $respuesta;

		}


	}

	/*=============================================
	Eliminar Registro 
	=============================================*/
	public function ctrEliminarRegistro(){

		if(isset($_POST["eliminarRegistro"])){

			$tabla = "usuario";
			$valor = $_POST["eliminarRegistro"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicioUsuario";

				</script>';

			}

		}

	}


}