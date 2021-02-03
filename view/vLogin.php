<article id="nav">
    <section id="conNav">
        <div id='tituloVista'>
            <p>
                Aplicacion Miguel 20-21
            </p>
        </div>
        <form id='bNav' name="registro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input class="botonNav" type="submit" value="Registrarse" name="registro"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
        </form>
    </section>
</article>
<article id="contenedor"> 
    <section id="login">
        <form class="descript" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
            <div class="campos">
                <label class="labelTitle" for="usuario">Usuario: </label><br>
                <input  class="inputText" type="text" name="usuario" placeholder="Introduzca el nombre del usuario">
            </div>
            <div class="campos">
                <label class="labelTitle" for="password">Password: </label><br>
                <input  class="inputText" type="password" name="password" placeholder="Introduzca su password">
                <?php echo isset($aError["password"]) || isset($aError["usuario"]) ? "<span class='error'>" . "<br>Error de credenciales</span>" : null ?><!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto entrara en el programa.) 2º(En caso de que tenga error alguno de los campos siempre devolvera Error de credenciales y se borraran los campos.). -->

            </div>
            <div class="botonSend">
                <input class="botonEnvio" type="submit" value="Entrar" name="login"><!-- Si punsamos Login mandaremos todos los valores del formulario al metodo de validar usuario-->
                <input class="botonEnvio" type="submit" value="Cancelar" name="cancelar"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            </div>
        </form>

    </section>
</article>
