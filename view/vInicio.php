<article id="nav">
    <section id="conNav">
        <div id='tituloVista'>
            <p>
                Aplicacion Miguel 20-21
            </p>
        </div>
        <form id='bNav' name="logout" class="iNav" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input class="botonNav" type="submit" value="Cerrar Sesion" name="closeSession"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            <input class="botonNav" type="submit" value="Editar Perfil" name="editar"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            <input class="botonNav" type="submit" value="Borrar Cuenta" name="borrarCuenta"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
        </form>
    </section>
</article>
<article id="contenedor"> 
    <section class="inicio">
        <div id="datos">
            <h3> <?php echo "Bienvenido " . $descUsuario; ?></h3>
            <?php
            if ($numAccesos < 2) { //si el valor devuelta de la consulta es igual a 1 entonces sera su primer login
                echo "<h4>Es su primera conexión. Muchas gracias por confiar en nosotros.</h4>";
            } else { //en caso contrario mostrara el número de logeos que a echo ese usuario y cual fue su ultima fecha de logeo
                echo "<h4>Esta es su " . $numAccesos . " visita.</h4>";
                echo "<h4>Su ultima visita fue el " . date('d/m/Y H:i:s', $ultimaConexion) . ".</h4>";
            }
            ?>
        </div>
        <section id="applys">
            <div id="secPr">
                <p><img src="webroot/media/img/api.png"></p>
                <form  name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="sectionPr" type="submit" value="Rest" name="rest"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
                </form>

            </div>  
            <div id="secPr2">
                <p><img src="webroot/media/img/mantenimiento-web.png"></p>
                <form  name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="sectionPr" type="submit" value="M. Departamento" name="mantenimientoDep"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
                </form>
            </div>  
        </section>
    </section>
</article>

