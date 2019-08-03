<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');

$id_alumno = $_GET['id'];

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

                    <?php if($_SESSION['tipo']==1 || $_SESSION['tipo']==0) { ?>
                    <a href="agregar_ficha.php?id=<?php echo $dado['id'] ?>" class="btn btn-sm btn-success">Nueva
                        entrevista</a>

                    <?php } ?>

                </div>
                <div class="panel-body">
              
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

        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>