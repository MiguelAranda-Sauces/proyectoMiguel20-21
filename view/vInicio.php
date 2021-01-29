<!-- Generamos El contenido de la pagina de inicio en html-->

<div id="cabecera">
    <div id="titulo">
        <h1>Inicio</h1>
    </div>
    <div class="nav">
        <a href="../../proyectoDWES/indexProyectoDWES.html" class="boton volver"><img class="icoBoton" src="webroot/media/img/volver-flecha-izquierda.png"><span class="texto">Volver</span></a>
        <br><form id="close" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="botonEnvio rest" type="submit" name='rest' value="rest" >Rest</button>
        </form>
    </div>
</div>
<div id="contenedor"> 
    <div id="datos">
        <h3> <?php echo "Bienvenido " . $descUsuario; ?></h3>
        <?php
        if ($numAccesos == 1) { //si el valor devuelta de la consulta es igual a 1 entonces sera su primer login
            echo "<h4>Es su primera conexión. Muchas gracias por confiar en nosotros.</h4>";
        } else { //en caso contrario mostrara el número de logeos que a echo ese usuario y cual fue su ultima fecha de logeo
            echo "<h4>Esta es su " . $numAccesos . " conexión.</h4>";
            echo "<h4>Su ultima conexión fue el " . date('d/m/Y H:i:s', $ultimaConexion) . ".</h4>";
        }
        ?>
        <div class="botones">
            <form  name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="botonEnvio" type="submit" name='closeSession' value="Cerrar Sesion" >Cerrar Sesion</button>
                <button class="botonEnvio" type="submit" name='editar' value="Editar Perfil" >Editar Perfil</button>
                <button class="botonEnvio" type="submit" name='borrarCuenta' value="Borrar Cuenta" >Borrar Cuenta</button>

            </form>
            <!--<a href="../../proyectoTema5.html"><button class="botonEnvio">Volver</button></a>
            <a href="detalles.php"><button class="botonEnvio">Detalles Servidor</button></a>-->

        </div>    
    </div>
</div>

