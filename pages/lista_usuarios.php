<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                    <button data-toggle="modal" data-target="#neuvoUsuario" class="btn btn-sm btn-success">Nuevo usuario</button>
                    <?php } ?>

                </div>
                <div class="panel-body">
                    <div class="container">
                        <p>**Para editar un usuario, en la columna Editar seleccione la cacilla de verificación correspondiente al usuario a modificar** </p>
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Opciones</th>

                            </tr>
                        </thead>

                        <tbody id="tbody">
                            <?php 
                                $sql = "SELECT * FROM users order by id DESC";
                                $resultado = mysqli_query($enlace, $sql);
                                $num = 0;
                                while ($dado = mysqli_fetch_array($resultado)):
                                    $num += 1;
                                    ?>
                            <tr id="numRows">
                                <form role="form" method='POST' action="../modulos/editar_user.php?id=<?php echo $dado['id'] ?>">
                                    <td id="tdnumero" style="width: 3rem">
                                        <?php echo $num ?>
                                    </td>
                                    <td style="width: 3rem">
                                        <input onchange="cambiarCheck(<?php echo $num ?>)" id="check" type="checkbox">
                                    </td>
                                    <td style="width: 20rem">
                                        <input name="nombre" id="nombre" class="form-control" disabled type="text" value="<?php echo $dado['nombre'] ?>">
                                        
                                    </td>
                                    <td style="width: 20rem">
                                    <input name="username" id="username" class="form-control" disabled type="text" value="<?php echo $dado['username'] ?>">
                                    </td>
                                    <td style="width: 20rem">
                                        <input name="password" id="password" class="form-control" disabled type="text" value="<?php echo $dado['password'] ?>">
                                    </td>
                                    <td style="width: 20rem">
                                        <select name="admin" id="" class="form-control" disabled>
                                        <?php if($dado['privilegio'] == 0): ?>
                                            <option value="<?php echo $dado['privilegio'] ?>">NO</option>
                                            <option value="1">SI</option>
                                        <?php elseif($dado['privilegio'] == 1): ?> 
                                            <option value="<?php echo $dado['privilegio'] ?>">SI</option>
                                            <option value="0">NO</option>
                                        <?php endif; ?>
                                        </select>
                                    </td>

                                    <td style="width: 20rem">
                                        <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                                                <button name="editar_user" type='submit' class="hidden btn btn-xs btn-warning">Editar</button>
                                        <a class="btn btn-block btn-danger" data-toggle="modal" data-target="#myModal<?php echo $dado['id'] ?>">Eliminar</a>
                                        <?php } ?>

                                </form>
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
                                                        <form action="../modulos/eliminar_usuario.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
                                                            <button type="submit" name="delete_user" class="btn btn-danger">Eliminar</button>
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
                    <!-- Modal neuvo usuario -->
                    <div id="neuvoUsuario" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo Usuario</h4>
                                </div>
                                <form action="../modulos/agregar_usuario.php" method="POST">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <input name="nombre" class="form-control" type="text" placeholder="Nombre...">
                                            </div>
                                            <div class="form-group">
                                                <input name="username" class="form-control" type="text" placeholder="Usuario...">
                                            </div>
                                            <div class="form-group">
                                                <input name="password" class="form-control" type="text" placeholder="Contraseña...">
                                            </div>
                                            <div class="form-group">
                                                <input name="chk_admin" type="checkbox">
                                                <label class="form-check-label" for="defaultCheck1">Admin</label>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="agregar_user" class="btn btn-success">Agregar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>

