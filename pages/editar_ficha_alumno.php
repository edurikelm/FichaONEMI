<?php
include('includes/interfaz.php');
include('../configs/conexion_db.php');

if(isset($_GET['ficha_numero'], $_GET['id_alumno'])): 
    $numFicha = mysqli_escape_string($enlace, $_GET['ficha_numero']);
    $id = mysqli_escape_string($enlace, $_GET['id_alumno']);
    $sql = "SELECT fa.id_alumno, fa.numFicha, fa.entrevistador, fa.entrevistado, fa.otro_entrevistador, fa.motivo, fa.acuerdos, fa.observaciones, fa.situacion_actual, fa.fecha_entrevista, hora_entrevista, a.nombres, a.apellidos FROM ficha_alumno fa INNER JOIN alumnos a ON fa.id_alumno = a.id WHERE id_alumno = '$id' AND numFicha= '$numFicha' ";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif;
$numFicha = $_GET['ficha_numero'];
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <a href="../pages/ver_ficha.php?id=<?php echo $id?>"><i class="atras fas fa-arrow-left"></i></a>
            <h2 class="text-center page-header">Editar entrevista N°<strong><?php echo $numFicha ?></strong> del alumno 
                <strong>
                    <?php echo $dado['nombres']?>
                    <?php echo $dado['apellidos']?>
                </strong>
            </h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingreso de datos
                </div>
                <div class="panel-body">
                    <div class="row">
                    <form id="limpiar" name="form_ficha" role="form" method="POST"
                            action="../modulos/editar_ficha.php">
                            <div class="form-group">
                                <input name="numero" type="text" style="width: 80px" class="form-control hidden"
                                    value=" <?php print_r($id) ?> ">
                                <input name="ficha_numero" type="text" style="width: 80px" class="form-control hidden"
                                    value=" <?php echo $numFicha ?> ">
                                <select name="bucle_ficha" id="bucle_ficha" hidden>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                    <label for="">Entrevistador/es</label>
                                    <input name="entrevistador" type="text" class="form-control" value="<?php echo $dado['entrevistador']?>">
                                </div>
                                <div class="form-group">
                                    <fieldset>
                                        <label>Agregar otro (Opcional)</label>
                                    </fieldset>
                                    <div id="input1" class="clonedInput">
                                        <select name="nombre1" id="nombre1" class="form-control" >
                                            <option value="" selected="selected"> -- Seleccione -- </option>
                                            <option value="Maria Paz Sepúlveda">Maria Paz Sepúlveda</option>
                                            <option value="Cecilia Castro">Cecilia Castro</option>
                                            <option value="Gladys Mayorga">Gladys Mayorga</option>
                                            <option value="Inspectoría">Inspectoría</option>
                                        </select>
                                        <br>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="">Otro entrevistador (Opcional)</label>
                                    <input name="otro_entrevistador" type="text" class="form-control" value="<?php echo $dado['otro_entrevistador']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Entrevistado/a</label>
                                    <input name="entrevistado" type="text" class="form-control" value="<?php echo $dado['entrevistado']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Motivo</label>
                                    <input name="motivo" type="text" class="form-control" value="<?php echo $dado['motivo']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Situación Actual</label>
                                    <select name="actual" class="form-control" required>
                                        <option value="<?php echo $dado['situacion_actual']?>" selected="selected"><?php echo $dado['situacion_actual']?></option>
                                        <option value="Cerrado">Cerrado</option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Seguimiento">Seguimiento</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Fecha</label>
                                            <input name="fecha_entrevista" type="date" class="form-control" value="<?php echo $dado['fecha_entrevista']?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Hora</label>
                                            <input name="hora_entrevista" type="time" class="form-control" value="<?php echo $dado['hora_entrevista']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Acuerdos/Compromisos</label>
                                    <textarea name="acuerdos" id="acuerdos" class="form-control" cols="30" rows="5"
                                        required><?php echo $dado['acuerdos']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Observaciones</label>
                                    <textarea name="observaciones" id="obs" class="form-control" cols="30" rows="5"
                                        required><?php echo $dado['observaciones']?></textarea>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary btn-lg btn-block " id="send" name="enviar"
                                                type="submit">Ingesar
                                                Entrevista
                                            </button></div>
                                        <div class="col-lg-6"></div>
                                        <div class="col-lg-6">
                                            <input type="button" class="btn btn-lg btn-block btn-danger"
                                                value="Limpiar campos" onclick="Limpiar();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/cierre-interfaz.php'); ?>
<script type="text/javascript">
    function Limpiar() {
        var t = document.getElementById("limpiar").getElementsByTagName("input");
        for (var i = 0; i < t.length; i++) {
            t[i].value = "";
        }
    }

    $(function () {
        $('#datetimepicker1').datetimepicker();
        
    });
    var select = document.getElement(".nombre1")
    
</script>