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
    <section id="api">
        <article id="apod">

            <div id = "servicio-rest">
                <div class="formRest">
                    <?php if ($aServicioAPOD == null) {
                        ?>
                        <p>El servicio no esta disponible</p>
                        <?php
                    } else {
                        ?>
                        <p>Puedes seleccionar una fecha para ver su imagen</p>
                        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                            <p>
                                <input id="fecha" type = "date" name = "fecha" value = "<?php echo isset($_REQUEST['enviarAPOD']) ? $_REQUEST['fecha'] : date('Y-m-d') ?>">
                            </p>
                            <div class = "botones">
                                <input id='enviar' type = "submit" value = "Enviar" name = "enviarAPOD">
                            </div>
                        </form>
                    </div>
                    <p><?php echo $tituloEnCurso
                        ?></p>
                    <img src="<?php echo $imagenEnCurso ?>" width="100">
                    <p id="desNasa"><?php echo $descripcionEnCurso ?></p>
                    <?php
                }
                ?>
            </div>
        </article>
        <article id="geoloc">
            <div class="formRest">
                <p>IPGEOLOC: ipgeolocation</p>
                <p>Puedes ver a quien pertenece una ip y de donde es o bien saber cual es tu ip</p>
                <form id="formRegistro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="botones">
                         <input type="text" id='impIp' name="ip" value="<?php echo isset($_REQUEST['enviarIPGEOLOC']) ? $_REQUEST['ip'] : $ipGeoIp ?>">
                        <input type="submit" value="Buscar Ip" name="enviarIPGEOLOC">
                    </div>
                </form>
            </div>
            <div id="formRest">
                <p><span class='black'> Dirección Ip:</span> <?php echo $ipGeoIp ?></p>
                <p><span class='black'> País: </span><?php echo $ipGeoCountryName ?><img id='flag' src="<?php echo $ipGeoFlag ?>" width="100"></p>
                <p><span class='black'> Ciudad:</span> <?php echo $ipGeoCity ?>. <span class='black'> Empresa:</span> <?php echo $ipGeoIsp ?></p>
                <p></p>
            </div>
            </div>
        </article>
        <form id="formBack" class="none" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="botonSend">
                <input class="botonEnvio botonRest" type= "submit" value= "Volver" name= "volver"><!-- Si punsamos Cancelar mandaremos el valor de cancelar asignamos el valor login a la variable de session controladorEnCurso y redirecionara al login -->
            </div>
        </form>
    </section>
</article>