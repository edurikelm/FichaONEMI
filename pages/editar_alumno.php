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

<script src="../js/validarut.js"></script>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <a href="../pages/lista_alumno.php"><i class="atras fas fa-arrow-left"></i></a>
            <h1 class="page-header">Editar Alumno/a </h1><strong><?php echo $dado['id_alumno']?></strong></strong>
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
                        <form role="form" method="POST" action="../modulos/editar_alumno.php">
                        <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input name="rut" type="text" class="form-control" value="<?php echo $dado['rut'] ?>" oninput="checkRut(this)" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" value="<?php echo $dado['nombres'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control" value="<?php echo $dado['apellidos'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="fecha_nacimiento" type="date" class="form-control" value="<?php echo $dado['fecha_nacimiento'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $dado['direccion'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Previsión de salud</label>
                                    <select class="form-control" name="salud" required>
                                        <option value="<?php echo $dado['salud'] ?>" selected="selected"><?php echo $dado['salud'] ?></option>
                                        <option value="Isapre">Isapre</option>
                                        <option value="Fonasa">Fonasa</option>
                                        <option value="Capredena">Capredena</option>
                                        <option value="Subsidio familiar">Subsidio familiar</option>
                                        <option value="Prais">Prais</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Vive con</label>
                                    <select class="form-control" name="vive" required>
                                        <option value="<?php echo $dado['vive'] ?>"><?php echo $dado['vive'] ?></option>
                                        <option value="Madre y Padre">Madre y Padre</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Abuelos">Abuelos</option>
                                        <option value="Otro familiar">Otro familiar</option>
                                        <option value="Institución">Institución</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Institución Protección social</label>
                                    <select class="form-control" name="social" required>
                                        <option value="<?php echo $dado['social'] ?>"><?php echo $dado['social'] ?></option>
                                        <option value="SENAME">SENAME</option>
                                        <option value="CEPIJ">CEPIJ</option>
                                        <option value="Tribunales">Tribunales</option>
                                        <option value="COSAM">COSAM</option>
                                        <option value="OPCION">OPCION</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                
                                
                                                               
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                    <label for="">Apodrado 1</label>
                                    <input id="apodrado1" name="apodrado1" type="text" class="form-control" value="<?php echo $dado['apodrado1'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Apodrado 2</label>
                                    <input id="apodrado2" name="apodrado2" type="text" class="form-control" value="<?php echo $dado['apodrado2'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Fono/Contacto</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control" value="<?php echo $dado['telefono'] ?>" required>
                                </div>
                                <div class="form-group"> 
                                    <label for="">PIE</label>
                                    <select class="form-control" name="pie" required>
                                        <option value="<?php echo $dado['pie'] ?>"><?php echo $dado['pie'] ?></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Diagnostico</label>
                                    <input id="diagnostico" name="diagnostico" type="text" class="form-control" value="<?php echo $dado['diagnostico'] ?>" required>
                                    
                                </div>
                                
                                <div class="form-group"> 
                                    <label for="">Tipo de estudiante</label>
                                    <select class="form-control" name="tipo">
                                        <option value="<?php echo $dado['tipo'] ?>"><?php echo $dado['tipo'] ?></option>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="Extranjero">Extranjero</option>
                                        <option value="De la escuela">De la escuela</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Curso</label>
                                    <input id="curso" name="curso" type="text" class="form-control" value="<?php echo $dado['curso'] ?>">                                        
                                </div>
                                <div class="form-group"> 
                                    <label for="">Repitencia</label>
                                    <select class="form-control" name="repitencia">
                                        <option value="<?php echo $dado['repitencia'] ?>"><?php echo $dado['repitencia'] ?></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>                         
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="btn-editar" type ="submit" >Actualizar Alumno</button></div>
                            <div class="col-lg-6"></div>
                        </div>
                </form> 

                
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>

<script >
        $(document).ready(function(){
            var valor_sexo = $("#valor-sexo").text();
            var select_sexo =$("#select-sexo");
            if(valor_sexo=="MASCULINO"){
                select_sexo.val("1").attr("selected");
            }
            else{
                select_sexo.val("2").attr("selected");
            }
            
        });    
    </script>