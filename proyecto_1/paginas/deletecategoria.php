<?php 
include 'functions.php';

$Clfuncion= new Functions();
session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}

$id_categoria=$_REQUEST['id_categorias'];
    if(isset($id_categoria)){
        $cant=0;
        $encontros =  $Clfuncion->getProductoCategoria($id_categoria);

    foreach($encontros as $encontro){
        $cant+=1;
}
    if($cant<=1){
        $Clfuncion->deleteProductos($id_categoria);
    header('Location: categorias.php?status=succes');
}else{
    header('Location: categorias.php?status=incorre');
}       
}else{
    header('Location: categorias.php?status=errorid');
}
?>