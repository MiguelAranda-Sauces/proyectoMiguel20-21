<div id="cabecera">
    <div id="titulo">
        <h1>Borrar Cuenta</h1>
    </div>
    <div class="nav">

        <form id="close" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="botonEnvio" type="submit" name='back' value="Volver" ><img class="icoBoton" src="webroot/media/img/volver-flecha-izquierda.png">Volver</button>
        </form>
    </div>
</div>
<div id="contenedor"> 
    <div id="form">
        <form class="descript borrar" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
            <label>¿Esta seguro de que quiere borrar su cuenta?</label>

            <div class="botonSend">
                <input class="botonEnvio" type= "submit" value="Borrar Cuenta" name= "borrar">
                <input class="botonEnvio" type= "submit" value="Cancelar" name= "back">
                <!--<a class="botonEnvio" href="cambiarPassword.php">Cambiar Password</a>-->

            </div>
        </form>
    </div>
</div>