<body>
    <div id="cabecera">
        <div id="titulo">
            <h1>Registro</h1>
        </div>
        <div class="nav">
            <a href="../../../proyectoDWES/indexProyectoDWES.html" class="boton volver"><img class="icoBoton" src="webroot/media/img/volver-flecha-izquierda.png"><span class="texto">Volver</span></a>
        </div>
    </div>
    <div id="contenedor"> 
        <div id="form">
            <form class="descript" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
                <div class="campos">
                    <label class="labelTitle" for="usuario">Usuario: </label>
                    <input  class="inputText" type="text" name="usuario" placeholder="Introduzca el nombre del usuario"
                            value="<?php echo isset($_REQUEST["usuario"]) ? $aError["usuario"] ? null : $_REQUEST["usuario"] : null ?>"> <!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto y otro campo tenga error devolvera el valor insertado.) 2º(En caso de que tenga error el campo se borrara.). -->
                    <?php echo isset($aError["usuario"]) ? "<span class='error'>" . "<br>" . $aError["usuario"] . "</span>" : null ?><!-- Si la variable $aError esta inciaida devolvera el valor del error que contenga la variable en ese momento-->
                </div>
                <div class="campos">
                    <label class="labelTitle" for="descripcion">Descripción: </label>
                    <input  class="inputText" type="text" name="descripcion" placeholder="Introduzca la descripción del usuario"
                            value="<?php echo isset($_REQUEST["descripcion"]) ? $aError["descripcion"] ? null : $_REQUEST["descripcion"] : null ?>"><!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto y otro campo tenga error devolvera el valor insertado.) 2º(En caso de que tenga error el campo se borrara.). -->
                    <?php echo isset($aError["descripcion"]) ? "<span class='error'>" . "<br>" . $aError["descripcion"] . "</span>" : null ?><!-- Si la variable $aError esta inciaida devolvera el valor del error que contenga la variable en ese momento-->
                </div>

                <div class="campos">
                    <label class="labelTitle" for="password">Password: </label>
                    <input  class="inputText" type="password" name="password" 
                            value="<?php echo isset($_REQUEST["password"]) ? $aError["password"] ? null : $_REQUEST["password"] : null ?>"><!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto y otro campo tenga error devolvera el valor insertado.) 2º(En caso de que tenga error el campo se borrara.). -->
                    <?php echo isset($aError["password"]) ? "<span class='error'>" . "<br>" . $aError["password"] . "</span>" : null ?><!-- Si la variable $aError esta inciaida devolvera el valor del error que contenga la variable en ese momento-->
                </div>
                <div class="campos">
                    <label class="labelTitle" for="passwordComprobacion">Repite el Password: </label>
                    <input  class="inputText" type="password" name="passwordComprobacion"
                            value="<?php echo isset($_REQUEST["passwordComprobacion"]) ? $aError["passwordComprobacion"] ? null : $_REQUEST["passwordComprobacion"] : null ?>"><!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto y otro campo tenga error devolvera el valor insertado.) 2º(En caso de que tenga error el campo se borrara.). -->
                    <?php echo isset($aError["passwordComprobacion"]) ? "<span class='error'>" . "<br>" . $aError["passwordComprobacion"] . "</span>" : null ?><!-- Si la variable $aError esta inciaida devolvera el valor del error que contenga la variable en ese momento-->
                </div>
                <div class="botonSend">
                    <input class="botonEnvio" type= "submit" value= "Registrar" name= "addUser"><!-- Si punsamos Registrar mandaremos todos los valores del formulario -->
                    <input class="botonEnvio" type= "submit" value= "Cancelar" name= "cancelar"><!-- Si punsamos Cancelar mandaremos el valor de cancelar asignamos el valor login a la variable de session controladorEnCurso y redirecionara al login -->
                </div>
            </form>
        </div>
    </div>