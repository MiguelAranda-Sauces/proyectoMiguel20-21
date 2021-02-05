<article id="nav">
    <section id="conNav">
        <div id='tituloVista'>
            <p>
                Aplicacion Miguel 20-21
            </p>
        </div>
        <form id='bNav' name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input class="botonNav" type="submit" value="Cerrar Sesion" name="closeSession"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
        </form>
    </section>
</article>
<article id="contenedor"> 
    <section id="borrar">
            <form class="descript borrar" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
                <label>¿Esta seguro de que quiere borrar su cuenta?</label>
                <div class="botonSend">
                    <input class="botonEnvio" type= "submit" value="Borrar Cuenta" name= "borrar">
                    <input class="botonEnvio" type= "submit" value="Cancelar" name= "back">
                </div>
            </form>
    </section>
</article>