<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');


if(isset($_GET['id'])): 
    $id = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM alumnos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 

?>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <a href="../pages/lista_alumno.php"><i class="atras fas fa-arrow-left"></i></a>
            <h1 class="page-header">Alumno <?php echo $dado['nombres']?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sus datos
                </div>
                <div class="panel-body">
                    <div class="row">
                
                        <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                        <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input disabled id="rut" name="rut" type="text" class="form-control" value="<?php echo $dado['rut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input disabled id="nombres" name="nombres" type="text" class="form-control" value="<?php echo $dado['nombres'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input disabled id="apellidos" name="apellidos" type="text" class="form-control" value="<?php echo $dado['apellidos'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input disabled id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" value="<?php echo $dado['fecha_nacimiento'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input disabled id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $dado['direccion'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Previsión de salud</label>
                                    <input disabled id="salud" name="salud" type="text" class="form-control" value="<?php echo $dado['salud'] ?>">
                                </div>
                                <div class="form-group"> 
                                    <label for="">Vive con</label>
                                    <input disabled id="vive" name="vive" type="text" class="form-control" value="<?php echo $dado['vive'] ?>">
                                </div>
                                <div class="form-group"> 
                                    <label for="">Institución Protección social</label>
                                    <input disabled id="social" name="social" type="text" class="form-control" value="<?php echo $dado['social'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Apodrado 1</label>
                                    <input disabled id="apodrado1" name="apodrado1" type="text" class="form-control" value="<?php echo $dado['apodrado1'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Apodrado 2</label>
                                    <input disabled id="apodrado2" name="apodrado2" type="text" class="form-control" value="<?php echo $dado['apodrado2'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fono/Contacto</label>
                                    <input disabled id="telefono" name="telefono" type="text" class="form-control" value="<?php echo $dado['telefono'] ?>">
                                </div>
                                <div class="form-group"> 
                                    <label for="">PIE</label>
                                    <input disabled id="pie" name="pie" type="text" class="form-control" value="<?php echo $dado['pie'] ?>">
                                </div>
                                <div class="form-group"> 
                                    <label for="">Diagnostico</label>
                                    <input disabled id="diagnostico" name="diagnostico" type="text" class="form-control" value="<?php echo $dado['diagnostico'] ?>">
                                </div>
                                
                                <div class="form-group"> 
                                    <label for="">Tipo de estudiante</label>
                                    <input disabled id="tipo" name="tipo" type="text" class="form-control" value="<?php echo $dado['tipo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Curso</label>
                                    <input disabled id="curso" name="curso" type="text" class="form-control" value="<?php echo $dado['curso'] ?>">                                        
                                </div>
                                <div class="form-group"> 
                                    <label for="">Repitencia</label>
                                    <input disabled id="repitencia" name="repitencia" type="text" class="form-control" value="<?php echo $dado['repitencia'] ?>">
                                </div>
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><a href="lista_alumno.php" class="btn btn-primary btn-lg btn-block " >Listado de Alumno</a></div>
                            <div class="col-lg-6"><a href="ver_ficha.php?id=<?php echo $dado['id'] ?>" class="btn btn-success btn-lg btn-block " >Ver fichas</a></div>

                        </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>
<script>
$(document).ready(function(){
    if(($('#contador').val())==0){
        $('#planilla').attr('disabled',true);
        $('#btn_planilla').attr('disabled',true);
    }
})
</script>