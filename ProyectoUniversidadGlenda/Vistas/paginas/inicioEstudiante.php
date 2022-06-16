<?php


$usuarios = ControladorEstudiante::ctrSeleccionarRegistroEstudiante(null, null);


?>



<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Telefono</th>
            <th>FechaIngreso</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

	<?php foreach ($usuarios as $key => $value): ?>

		<tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo $value["Nombre"]; ?></td>
			<td><?php echo $value["Correo"]; ?></td>
			<td><?php echo $value["Telefono"]; ?></td>
            <td><?php echo $value["FechaIngreso"]; ?></td>
			<td>

			<div class="btn-group">

				<div class="px-1">
				
				<a href="index.php?pagina=editarEstudiante&IdEstudiante=<?php echo $value["IdEstudiante"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

				</div>

				<form method="post">

					<input type="hidden" value="<?php echo $value["IdEstudiante"]; ?>" name="eliminarEstudiante">
					
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

					<?php

						$eliminar = new ControladorEstudiante();
						$eliminar -> ctrEliminarEstudiante();

					?>

				</form>			

			</div>
				

			</td>
		</tr>
		
	<?php endforeach ?>	
	
	</tbody>
</table>