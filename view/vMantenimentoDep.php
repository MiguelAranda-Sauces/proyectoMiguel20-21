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
    <section id="mantenimientoDepar">
        <article id="departamentos">
            <form id="formMantenimiento" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="botonSend">
                    <label class="labelTitle" for="descripDepartamento">Descripción del Departamento:</label>
                    <input  class="inputText" type="text" name="descripDepartamento" placeholder="Introduzca la descripción del departamento." value="<?php echo isset($_SESSION["BuscarDepartamento"]) ? $aError["descripcion"] ? null : null : $_SESSION["BusquedaDepartamentos"] ?>"> <!--Si hemos pulsado el boton de registro devolvera : 1º(En caso de que sea correcto y otro campo tenga error devolvera el valor insertado.) 2º(En caso de que tenga error el campo se borrara.). -->
                    <input class="botonEnvio botonRest" type= "submit" value= "Buscar" name="buscar">
                    <input class="botonEnvio botonRest" type= "submit" value= "Añadir" name="add">
                    <br><span id="erUsuario" class='error'>  <?php echo isset($aError["descripcion"]) ? $aError["descripcion"] : null ?></span>
                </div>
            </form>
            <div id="table">
                <div class="formulario">
                    <table class="tablaResult">
                        <tbody>
                            <tr>
                                <th>Codigo departamento</th>
                                <th>Nombre departamento</th>
                                <th>Fecha baja</th>
                                <th>Volumen de negocio</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                           
                            if (count($aDepartamentos) > 0) {
                                foreach ($aDepartamentos as $departamento => $oDepartamento) {
                                    ?>
                                    <tr>
                                        <td><?php echo $oDepartamento->codDepartamento; ?></td>
                                        <td><?php echo $oDepartamento->descDepartamento; ?></td>
                                        <td><?php echo $oDepartamento->fechaBajaDepartamento; ?></td>
                                        <td><?php echo $oDepartamento->volumenDeNegocio; ?></td>
                                        <td>
                                            <form id="botoness" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                <div class="botonSend">
                                                    <button  name="editar" type="submit" value="<?php echo $oDepartamento->codDepartamento; ?>"> <img src="webroot/media/img/editar.png"  alt="editarDep" ></button>
                                                    <button name="ver" type="submit" value="<?php echo $oDepartamento->codDepartamento; ?>"> <img src="webroot/media/img/ojo.png"  alt="ver" ></button>
                                                    <button name="borrar" type="submit" value="<?php echo $oDepartamento->codDepartamento; ?>" > <img src="webroot/media/img/eliminar.png"  alt="editarDep" ></button>
                                                    <?php if ($oDepartamento->fechaBajaDepartamento == null) { ?>
                                                        <button name="baja" type="submit" value="<?php echo $oDepartamento->codDepartamento; ?>"> <img src="webroot/media/img/apagado.png"  alt="editarDep" ></button>
                                                    <?php } else { ?>
                                                        <button name="alta" type="submit" value="<?php echo $oDepartamento->codDepartamento; ?>"> <img src="webroot/media/img/encendido.png"  alt="editarDep" ></button>

                                                    <?php } ?>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?> <tr>
                                    <td id="errorTd">No se ha encontrado ningun departamento con esa descripción de departamento</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <p id="totaRegistros">La tabla contiene: <?php echo count($aDepartamentos) ?> registros.</p>
                </div>
                <!--<div id ="botonesInferior">
                    <a id ="primera"><img class="ico" src="img/backward.png"></a>
                    <a id ="anterior"><img class="ico" src="img/back.png"></a>
                    <a id ="siguiente"><img class="ico" src="img/next.png"></a>
                    <a id ="ultima"><img class="ico" src="img/forward.png"></a>
                </div>-->


            </div>
        </article>
        <form id="formBack" name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="botonSend">
                <input class="botonEnvio botonRest" type= "submit" value= "Volver" name= "volver"><!-- Si punsamos Cancelar mandaremos el valor de cancelar asignamos el valor login a la variable de session controladorEnCurso y redirecionara al login -->
            </div>
        </form>
    </section>

</article>