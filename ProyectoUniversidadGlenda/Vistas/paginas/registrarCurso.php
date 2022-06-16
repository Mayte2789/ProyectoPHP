<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<label for="nombre">Agregar Curso:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<!--<i class="fa-thin fa-book"></i>-->
					</span>
				</div>

				<input type="text" class="form-control" id="nombre" name="agregarCurso">

			</div>
			
		</div>

		<div class="form-group">

			<label for="email">Agregar Descripcion:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<!--<i class="fas fa-envelope"></i>-->
					</span>
				</div>

				<input type="text" class="form-control" id="email" name="agregarDesc">
			
			</div>
			
		</div>

		<?php 

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
		=============================================*/
		
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
		=============================================*/

		$agregarCurso = ControladorCurso::ctrAgregarCurso();

		if($agregarCurso == "ok"){

			echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-success">El curso se ha agregado</div>';
		
		}

		?>
		
		<button type="submit" class="btn btn-primary">Agregar</button>

	</form>

</div>
