<?php 
include 'functions.php';

$Clfuncion= new Functions();
session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}

/***
* sirve para eliminar el producto 
*/
$id_producto=$_REQUEST['id_producto'];
    if(isset($id_producto)){

        $Clfuncion->deleteProductos($id_producto);
    header('Location: productos.php?status=succes');
}else{
    header('Location: productos.php?status=errorid');
}
?>