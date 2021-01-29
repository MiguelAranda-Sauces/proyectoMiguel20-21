<body>
    <div id="cabecera">
        <div id="titulo">
            <h1>Editar Pefil</h1>
        </div>
        <div class="nav">

            <form id="close" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                 <button class="botonEnvio" type="submit" name='back' value="Volver" ><img class="icoBoton" src="webroot/media/img/volver-flecha-izquierda.png">Volver</button>
                <!--<button class="botonEnvio" type="submit" name='closeSession' value="Cerrar Sesion" >Cerrar Sesion</button>-->
            </form>
        </div>
    </div>
    <div id="contenedor"> 
        <div id="form">
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
                    <input class="botonEnvio" type= "submit" value="cambioPass" name= "Cambiar Password">
                </div>
            </form>
        </div>
    </div>
</body>