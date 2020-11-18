<?php
include('functions.php');

$Clfunctions= new Functions();

session_start();
$user = $_SESSION['usuario'];
        if (!$user|| $user['Tipo'] ==="user") { 
                header('Location: ../index.php');
}
        if($_REQUEST['id_categoria']) {
                $categoria = $Clfunctions->getCategoria($_REQUEST['id_categoria']);
}
        // if editing
        if($_POST){
                if(isset($_POST['guardar'])){
                        $categoria['id_categoria'] = $_POST['id_categoria'];
                        $categoria['nombre'] = $_POST['nombre'];
                        $guardo = $Clfunctions->updateCategorias($categoria);
                }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<title>Document</title>
</head>
<body>
<div class="container">
<div class="msg">
</div>
<h1>Editar Categoria</h1>
<form method="POST" class="form-inline" role="form" enctype="multipart/form-data">
<input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categorias']?>"required>
<div class="form-group">
<label class="sr-only" for="">Full Name</label>
<input type="text" class="form-control" id="" name="nombre" placeholder="Nombre" value="<?php echo $categoria['nombre'] ?>" required>
</div>
<button type="submit" name="guardar" class="btn__primary">Guardar</button>
</form>
<p></p>
<button type="submit"  class="btn__primary"><a href="categorias.php">Volver</a></button>
</div>
</body>
</html>