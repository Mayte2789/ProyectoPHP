<?php

if(isset($_GET["IdEstudiante"])){

	$item = "IdEstudiante";
	$valor = $_GET["IdEstudiante"];

	$usuario = ControladorEstudiante::ctrSeleccionarRegistroEstudiante($item, $valor);

}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["Nombre"]; ?>" placeholder="Escriba su nombre" id="Nombre" name="actualizarEstudiante">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="email" class="form-control" value="<?php echo $usuario["Correo"]; ?>" placeholder="Escriba su email" id="Correo" name="actualizarEstudiante">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-phone"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["Telefono"]; ?>" placeholder="Escriba el telefono" id="Telefono" name="actualizarEstudiante">
			

			</div>

		</div>
        <div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-calendar"></i>
					</span>
				</div>

				<input type="calendar" class="form-control" value="<?php echo $usuario["FechaIngreso"]; ?>" placeholder="Escriba la fecha de Ingreso" id="FechaIngreso" name="actualizarEstudiante">

			</div>
			
		</div>

		<?php

		$actualizar = ControladorEstudiante::ctrActualizarEstudiante();

		if($actualizar == "ok"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El Estudiante ha sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=inicioEstudiante";

				},3000);

			</script>

			';

		}

		?>
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>