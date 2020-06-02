<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="text-align:center"> 
                <h1>Bienvenido <?php echo $_SESSION['user_nombre'] ?> </h1>
                <img src="../assets/img/colegio.jpg" alt="" class="colegio">

            </div>
        </div>
    </div>
</div>
<?php include('includes/cierre-interfaz.php'); ?>


