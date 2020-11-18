<?php
include 'functions.php';

$Clfunctions= new Functions();

session_start();
$user = $_SESSION['usuario'];
     if (!$user|| $user['Tipo'] ==="user") { 
          header('Location: ../index.php');
}
     if(isset($_POST['sku']) && isset($_POST['nombre']) &&  isset($_POST['descripcion'])  && isset($_POST['id_categorias']) && isset($_POST['stock']) && isset($_POST['precio'])) {
          // upload image
          $file_tmp = $_FILES["profilePic"]["tmp_name"];
          $target_dir = "../uploads/";
          $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
          move_uploaded_file($file_tmp,$target_file);
          echo $_POST['stock'];

$saved = $Clfunctions-> saveProductos($_POST,$target_file);
echo "paso";
     if($saved) {
          header('Location:createproduct.php?status=success');
} else {
          header('Location:createproduct.php?status=error');
}
}else{
          header('Location: createproduct.php?status=errorv');
}