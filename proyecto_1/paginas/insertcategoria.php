<?php
include 'functions.php';

$Clfunctions= new Functions();

session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}
    if(isset($_POST['nombre'])) {
        $saved = $Clfunctions-> saveCategorias($_POST);

    if($saved) {
        header('Location:createcategoria.php?status=success');
} else {
        header('Location:createcategoria.php?status=error');
}
}

