<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Alumnos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                    <a href="agregar_alumno.php" class="btn btn-sm btn-success">Nuevo alumno</a>
                    <?php } ?>

                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Situación</th>
                                <th scope="col">Fichas</th>
                                <th scope="col">Opciones</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT * FROM alumnos order by id DESC";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):

                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <?php echo $dado['rut'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nombres'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['apellidos'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['curso'] ?>
                                </td>
                                <td class="text-center">
                                <?php 
                                    $curren_year = date('Y');
                                    $id = $dado['id'];
                                    $sql2 = "SELECT situacion_actual FROM ficha_alumno WHERE YEAR(fecha) = $curren_year AND id_alumno = $id order by id_ficha DESC LIMIT 1";
                                    $resultado2 = mysqli_query($enlace, $sql2);
                                    $dado2 = mysqli_fetch_array($resultado2);
                                    $situacion = $dado2['situacion_actual'];
                                ?>
                                    
                                    <?php 
                                        
                                        if($situacion === "Cerrado"){

                                            echo '<span class="label label-success">'.$dado2['situacion_actual'].'</span>';

                                        }elseif($situacion === "Seguimiento"){

                                            echo '<span class="label label-info">'.$dado2['situacion_actual'].'</span>';

                                        }elseif($situacion === "En proceso"){

                                            echo '<span class="label label-warning">'.$dado2['situacion_actual'].'</span>';

                                        }elseif($situacion === "Pendiente"){

                                            echo '<span class="label label-primary">'.$dado2['situacion_actual'].'</span>';
                                        }
                                        
                                    ?> 
                                </td>
                                <td>
                                    <a href="ver_ficha.php?id=<?php echo $dado['id'] ?>" type="submit" name="objetivo" class="btn btn-xs btn-primary">Ver fichas</i></a>                                    
                                </td>
                                <td>
                                    <a href="ver_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-info">Ver</a>

                                    <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                                    <a href="editar_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-warning">Editar</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $dado['id'] ?>">Eliminar</a>
                                    <?php } ?>

                                    <!-- Modal -->
                                    <div id="myModal<?php echo $dado['id'] ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Eliminar registro</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Esta seguro de que quiere eliminar este registro?</p>
                                                </div>
                                                <div class="modal-footer">

                                                    <form action="../modulos/eliminar_alumno.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
                                                        <button type="submit" name="btn-delete" class="btn btn-danger">Eliminar</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>

<!-- Enumeracion de la tabla -->
<script>
    $(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>