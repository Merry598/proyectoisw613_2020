<?php
include 'functions.php';

session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}
$Clfuncion= new Functions();

$message = "";
    if(!empty($_REQUEST['status'])) {
        switch($_REQUEST['status']) {
            case 'success':
                $message = 'Categoria Guardada Exitosamente';
            break;
            case 'errord':
                $message = 'Faltan Datos';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">

<title>Categorias</title>
</head>
<body>
<div class="container">
</div>
<h1>Categorias</h1>
<div>
<form action="insertcategoria.php" method="POST" class="form-inline" role="form">
<p>
<div class="form-group">
<label class="sr-only" for="">Nombre</label>
<input type="text" class="form-control" id="" name="nombre" placeholder="Nombre" required>
</div>
</p>
<p>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
<button type="" class="btn btn-primary"><a href="categorias.php">volver</a></button>
<p></p>
<div class="msg">
<?php echo $message; ?>
</body>
</html>