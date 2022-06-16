<div class="d-flex justify-content-center text-center">

<form class="p-5 bg-light" method="post">

    <div class="form-group">
        <label for="Nombre">Nombre:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="nombre" name="registroNombre">

        </div>
        
    </div>

    <div class="form-group">

        <label for="Correo">Correo electrónico:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>

            <input type="email" class="form-control" id="Correo" name="registroCorreo">
        
        </div>
        
    </div>

    <div class="form-group">
        <label for="pwd">Telefono:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-phone"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="Telefono" name="registroTelefono">

        </div>

    </div>
    <div class="form-group">

        <label for="Correo">Fecha de Ingreso:</label>

        <div class="input-group">
            
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </span>
            </div>

            <input type="text" class="form-control" id="FechaIngreso" name="registroFechaIngreso">
        
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

    $registro = ControladorEstudiante::CtrIngresarEstudiante();

    if($registro == "ok"){

        echo '<script>

            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href );

            }

        </script>';

        echo '<div class="alert alert-success">El Estudiante ha sido registrado con exito</div>';
    
    }

    ?>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

</div>