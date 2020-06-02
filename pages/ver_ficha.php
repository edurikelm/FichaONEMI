<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');

$id_alumno = $_GET['id'];
$current_year = date('Y');

if(isset($_GET['id'])): 
    $id = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM alumnos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 

// Total entrevistas por alumno
$query2 = "SELECT id_ficha, id_alumno FROM ficha_alumno WHERE id_alumno = $id_alumno";
$consulta2 = mysqli_query($enlace, $query2);
$num_filas2 = mysqli_num_rows($consulta2);

//Años
$query14 = "SELECT DISTINCT YEAR(fecha) fecha FROM ficha_alumno";
$consulta14 = mysqli_query($enlace, $query14);


?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="../pages/lista_alumno.php"><i class="atras fas fa-arrow-left"></i></a>
            <h1 class="page-header">Fichas de <strong>
                    <?php echo $dado['nombres']?>
                    <?php echo $dado['apellidos']?></strong>
            </h1>
            <h3>Total Entrevistas: <?php echo $num_filas2?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <form class="form-inline">

                    <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                    <a href="agregar_ficha.php?id=<?php echo $dado['id'] ?>" class="btn btn-sm btn-success">Nueva
                        entrevista</a>
                    <?php } ?>
                
                    <select class="form-control" name="" id="">
                        <option value="">Hola</option>
                    <?php while($dato = mysqli_fetch_array($consulta14)): ?>
                        <option value=""><?php echo $dato['fecha'] ?></option>
                    <?php endwhile; ?>
                    </select>
                </form>

                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col" hidden>idalumno</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Situacion Actual</th>
                                <th scope="col">Entrevistador/es</th>
                                <th scope="col">Entrevistado/a</th>
                                <th scope="col">Detalle</th>
                                <th scope="col" hidden>Motivo</th>
                                <th scope="col" hidden>Acuerdos/Compromisos</th>
                                <th scope="col" hidden>Observaciones</th>
                                <?php if($_SESSION['tipo']==1) { ?>
                                <th scope="col">Opciones</th>
                                <?php } ?>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT id_ficha, numFicha, id_alumno, fecha, date_format(fecha_entrevista, '%d/%m/%Y') AS fecha_entrevista, hora_entrevista, entrevistador,otro_entrevistador,entrevistado, motivo, situacion_actual, acuerdos, observaciones FROM ficha_alumno WHERE YEAR(fecha) = $current_year AND id_alumno = $id" ;
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $dado['numFicha'] ?>
                                </td>
                                <td hidden>
                                    <?php echo $dado['id_alumno'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['fecha_entrevista'] ?>
                                </td>
                                <td>
                                    <?php
                                        // if($dado['situacion_actual'] === 'En proceso'){

                                        //     echo '<button class="btn btn-block btn-warning" data-toggle="modal" data-target="#modalActual' . $dado['id_ficha'] . '">En proceso</button>';

                                        // } elseif ($dado['situacion_actual'] === 'Pendiente') {

                                        //     echo '<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalActual' . $dado['id_ficha'] . '">Pendiente</button>';

                                        // }elseif ($dado['situacion_actual'] === 'Cerrado') {

                                        //     echo '<button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalActual' . $dado['id_ficha'] . '">Cerrado</button>';

                                        // }elseif ($dado['situacion_actual'] === 'Seguimiento') {

                                        //     echo '<button class="btn btn-block btn-info" data-toggle="modal" data-target="#modalActual' . $dado['id_ficha'] . '">Seguimiento</button>';

                                        // }

                                        if($dado['situacion_actual'] === 'En proceso'){

                                            echo '<button class="btn btn-block btn-warning">En proceso</button>';

                                        } elseif ($dado['situacion_actual'] === 'Pendiente') {

                                            echo '<button class="btn btn-block btn-primary">Pendiente</button>';

                                        }elseif ($dado['situacion_actual'] === 'Cerrado') {

                                            echo '<button class="btn btn-block btn-success">Cerrado</button>';

                                        }elseif ($dado['situacion_actual'] === 'Seguimiento') {

                                            echo '<button class="btn btn-block btn-info">Seguimiento</button>';

                                        }
                                         
                                    ?>
                                </td>
                                <td>
                                    <?php echo $dado['entrevistador'].', '.$dado['otro_entrevistador'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['entrevistado'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-block btn-xs btn-primary" data-toggle="modal"
                                        data-target="#modalDetalle<?php echo $dado['id_ficha'] ?>">Ver</a>
                                    <a href="mpdfprueba.php?ficha_numero=<?php echo $dado['numFicha']?>&id_alumno=<?php echo $dado['id_alumno'] ?>" class="btn btn-block btn-xs btn-info">Generar PDF</a>
                                </td>
                                <td hidden>
                                    <?php echo $dado['motivo'] ?>
                                </td>
                                <td hidden>
                                    <?php echo $dado['acuerdos'] ?>
                                </td>
                                <td hidden>
                                    <?php echo $dado['observaciones'] ?>
                                </td>

                                <?php if($_SESSION['tipo']==1) { ?>
                                <td>
                                    <a href="editar_ficha_alumno.php?ficha_numero=<?php echo $dado['numFicha']?>&id_alumno=<?php echo $dado['id_alumno']?>"
                                        class="btn btn-xs btn-block btn-warning">Editar</a>
                                    <a class="btn btn-xs btn-block btn-danger" data-toggle="modal"
                                        data-target="#myModal<?php echo $dado['id_ficha'] ?>">Eliminar</a>
                                    <?php } ?>

                                    <!-- Modal -->
                                    <div id="myModal<?php echo $dado['id_ficha'] ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal opciones-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Eliminar registro</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Esta seguro de que quiere eliminar este registro?</p>
                                                </div>
                                                <div class="modal-footer">

                                                    <form action="../modulos/eliminar_ficha.php" method="POST">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $dado['id_ficha'] ?>">
                                                        <input type="hidden" name="id_alumno"
                                                            value="<?php echo $_GET['id'] ?>">
                                                        <button type="submit" name="btn-delete"
                                                            class="btn btn-danger">Eliminar</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Modal Detalle -->
                                    <div id="modalDetalle<?php echo $dado['id_ficha'] ?>" class="modal fade"
                                        role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal opciones-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Detalle de entrevista</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Motívo:</h5>
                                                    <ul>
                                                        <li>
                                                            <p><?php echo $dado['motivo'] ?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Acuerdos:</h5>
                                                    <ul>
                                                        <li>
                                                            <p><?php echo $dado['acuerdos'] ?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Observaciones:</h5>
                                                    <ul>
                                                        <li>
                                                            <p><?php echo $dado['observaciones'] ?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Salir</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Modal boton situación actual -->
                                    <div id="modalActual<?php echo $dado['id_ficha'] ?>" class="modal fade"
                                        role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal opciones-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Cambiar situación actual de esta entrevista
                                                    </h4>
                                                </div>
                                                <form action="../modulos/actualizar_situacion_actual.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Seleccione una opción: </label>
                                                            <select name="actual" class="form-control" required>
                                                                <option value="<?php echo $dado['situacion_actual']?>"
                                                                    selected="selected">
                                                                    <?php echo $dado['situacion_actual']?></option>
                                                                <option value="Cerrado">Cerrado</option>
                                                                <option value="En proceso">En proceso</option>
                                                                <option value="Pendiente">Pendiente</option>
                                                                <option value="Seguimiento">Seguimiento</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $dado['id_ficha'] ?>">
                                                        <input type="hidden" name="id_alumno"
                                                            value="<?php echo $_GET['id'] ?>">
                                                        <button type="submit" name="btn_actualizar_actual"
                                                            class="btn btn-primary">Actualizar</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>

<!-- Enumeracion de la tabla -->
<script>
    $(document).ready( function () {
        $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });

} );

</script>