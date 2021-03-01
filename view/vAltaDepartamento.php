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
    <section id="registro">
        <form class="descript" action= "<?php echo $_SERVER["PHP_SELF"] ?>" method= "POST">
            <div class="campos">
                <label class="labelTitle" for="codDep">Codigo Departamento: </label>
                <input id="codDep"  class="inputText" type="text" name="codDep" placeholder="Introduzca el codigo de departamento"
                       value="<?php echo isset($_REQUEST["codDep"]) ? $aError["codDep"] ? null : $_REQUEST["codDep"] : null ?>"> 
                <br><span class='error'>  <?php echo isset($aError["codDep"]) ? $aError["codDep"] : null ?></span> 
            </div>
            <div class="campos">
                <label class="labelTitle" for="nDep">Nombre departamento: </label>
                <input id="nDep" class="inputText" type="text" name="nDep" placeholder="Introduzca nombre del departamento"
                       value="<?php echo isset($_REQUEST["nDep"]) ? $aError["nDep"] ? null : $_REQUEST["nDep"] : null ?>">
                <span  class='error'> <br>  <?php echo isset($aError["nDep"]) ? $aError["nDep"] : null ?></span> 
            </div>
            <div class="campos">
                <label class="labelTitle" for="vNegocio">Volumen de negocio: </label>
                <input id="vNegocio" class="inputText" type="text" name="vNegocio" placeholder="Inserte el volumen de negocio"
                       value="<?php echo isset($_REQUEST["vNegocio"]) ? $aError["vNegocio"] ? null : $_REQUEST["vNegocio"] : null ?>">
                <span  class='error'> <br> <?php echo isset($aError["vNegocio"]) ? $aError["vNegocio"] : null ?></span>
            </div>
            <div id="addep" class="botonSend">
                <input class="botonEnvio" type= "submit" value= "Alta Departamento" name= "addDep">
                <input class="botonEnvio" type= "submit" value= "Cancelar" name= "cancelar"> 
            </div>
        </form>
    </section>
</article>