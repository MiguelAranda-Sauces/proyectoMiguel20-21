<body>
    <div id="cabecera">
        <div id="titulo">
            <h1>Rest</h1>
        </div>
        <div class="nav">

        </div>
    </div>
    <div id="contenedor"> 
        <div id="form" class="rest">
            <section class="cuerpo">
                <p id="titulo-rest">Uso de API REST</p>
                <article id="apod">
                    <div class="formRest">

                        <p>APOD: Atronomy Picture of the Day</p>
                        <?php if ($aServicioAPOD == null) {
                            ?>
                            <p>El servicio no esta disponible</p>
                            <?php
                        } else {
                            ?>

                            <p>Puedes seleccionar una fecha para ver su imagen</p>
                            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                                <p>
                                    <input type = "date" name = "fecha" value = "<?php echo isset($_REQUEST['enviarAPOD']) ? $_REQUEST['fecha'] : date('Y-m-d') ?>">
                                </p>
                                <div class = "botones">
                                    <input type = "submit" value = "Enviar" name = "enviarAPOD">
                                </div>
                            </form>
                        </div>
                        <div id = "servicio-rest">
                            <p><?php echo $tituloEnCurso
                            ?></p>
                            <img src="<?php echo $imagenEnCurso ?>" width="100">
                            <p><?php echo $descripcionEnCurso ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </article>
                <article id="geoloc">
                    <div class="formRest">
                        <p>IPGEOLOC: ipgeolocation</p>
                        <p>Puedes ver a quien pertenece una ip y de donde es o bien saber cual es tu ip</p>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <p>
                                <input type="text" name="ip" value="<?php echo isset($_REQUEST['enviarIPGEOLOC']) ? $_REQUEST['ip'] : $ipGeoIp ?>">
                            </p>
                            <div class="botones">
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
            </section>
            <form id="formBack" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="botonSend">
                    <input class="botonEnvio botonRest" type= "submit" value= "Volver" name= "volver"><!-- Si punsamos Cancelar mandaremos el valor de cancelar asignamos el valor login a la variable de session controladorEnCurso y redirecionara al login -->
                </div>
            </form>
        </div>
    </div>