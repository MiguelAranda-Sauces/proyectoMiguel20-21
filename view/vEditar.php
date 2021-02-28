<article id="nav">
    <section id="conNav">
        <div id='tituloVista'>
            <p>
                Aplicacion Miguel 20-21
            </p>
        </div>
        <form id='bNav' name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input class="botonNav" type="submit" value="Cambiar Password" name="pass"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            <input class="botonNav" type="submit" value="Cerrar Sesion" name="closeSession"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
        </form>
    </section>
</article>
<article id="contenedor"> 
    <section id="edit">
            <form class="descript" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
                <div class="campos">
                    <label class="labelTitle" for="usuario">Usuario: </label>
                    <input  class="inputText disble" type="text" name="usuario" readonly="readonly"
                            value="<?php echo $codUsuario ?>">
                </div>

                <div class="campos">
                    <label class="labelTitle" for="descripcion">Descripción: </label>
                    <input  class="inputText" type="text" name="descripcion" placeholder="Introduzca la descripción del usuario"
                            value="<?php echo isset($_REQUEST["descripcion"]) ? $aError["descripcion"] ? $descUsuario : $descUsuario : $descUsuario ?>">
                            <?php echo isset($aError["descripcion"]) ? "<span class='error'>" . "<br>" . $aError["descripcion"] . "</span>" : null ?>
                </div>

                <div class="campos">
                    <label class="labelTitle" for="ultimaConexion">Ultima Conexión: </label>
                    <input  class="inputText" type="text" name="ultimaConexion" disabled
                            value="<?php echo date('d/m/Y H:i:s', $ultimaConexion) ?>">          
                </div>

                <div class="campos">
                    <label class="labelTitle" for="numConexion">Número de Accesos: </label>
                    <input  class="inputText" type="text" name="numConexion" disabled
                            value="<?php echo $numAccesos ?>"> 
                </div>

                <div class="botonSend">
                    <input class="botonEnvio" type= "submit" value="Editar Perfil" name= "edit">
                    <input class="botonEnvio" type= "submit" value="Cancelar" name= "back">
                </div>
            </form>
    </section>
</article>