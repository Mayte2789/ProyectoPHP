<?php

require_once "conexion.php";

class ModeloEstudiante{

	/*=============================================
	Ingresar Estudiante
	=============================================*/

	static public function mdlIngresarEstudiante($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre,Correo,Telefono ,FechaIngreso) VALUES (:Nombre,:Correo,:Telefono,:FechaIngreso)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaIngreso", $datos["FechaIngreso"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Seleccionar Registro
	=============================================*/

	static public function mdlSeleccionarRegistro($tabla, $item, $valor){
//esta parte es la que falla para levantar la tabla de estudiantes
		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdEstudiante ");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item ORDER BY IdEstudiante ");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Actualizar Estudiante
	=============================================*/

	static public function mdlActualizarEstudiante($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre=:Nombre, Correo=:Correo, Telefono=:Telefono,FechaIngreso=:FechaIngreso WHERE IdEstudiante = :IdEstudiante");

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":FechaIngreso", $datos["FechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":IdEstudiante", $datos["IdEstudiante"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Eliminar Estudiante
	=============================================*/
	static public function mdlEliminarEstudiante($tabla, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdEstudiante = :IdEstudiante");

		$stmt->bindParam(":IdEstudiante", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	



}