<?php
include 'functions.php';

$Clfunctions= new Functions();


if($_REQUEST['id_categoria']) {
    $id_categoria=$_REQUEST['id_categoria'];
    $productos = $Clfunctions-> getCategorias($id_categoria);

    header("Location:dashboarduser.php?productos=.$productos");

}

