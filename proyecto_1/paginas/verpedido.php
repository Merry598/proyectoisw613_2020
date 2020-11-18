<?php
include 'functions.php';
session_start();
$user = $_SESSION['usuario'];
if ($user) {
    if (!$user || $user['Tipo'] == "admin") {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}

$Clfunctions = new Functions();

if($_REQUEST['id_producto']) {
    $producto = $Clfunctions->getProducto($_REQUEST['id_producto']);
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
    <link rel="stylesheet" href="../css/style.css">
<title>Document</title>
</head>
<body>
<div class="container">
<div class="msg">
</div>
<h1>Producto</h1>
<div>
<div class="form-group">
<input type="hidden" name="id_producto" value="<?php echo $producto['id_productos']?>" required>
<label for="">SKU: <?php echo $producto['sku']?> </label>
</div>
</p>
<p>
<div class="form-group">
<label for="">Nombre: <?php echo $producto['nombre']?> </label>
</div>
</p>
<p>      
<div class="form-group">
<label for="">Nombre: <?php echo $producto['descripcion']?> </label>
</div>
</p>
<p> 
<p>
<div class="form-group">
<img src="<?php echo $producto['imagen']?>" alt="" width="100" height="100">
</div>
</p>     
<p>     
<p>     
<div class="form-group">
<label for="">Stock</label>
<input type="number" min="0"  max="<?php echo $producto['stock']?>" name="stock" value="<?php echo $producto['stock']?>">
</div>
</p>
<p>    
<div class="form-group">
<label for="">Nombre: <?php echo $producto['precio']?> </label>
</div>
</p>
<p>      
<p><a href="cart.php?id=<?php echo  $producto['id_productos']; ?>" class="buy-now btn btn-sm btn-primary">Agregar al Carrito</a></p>
<p><a href="dashboarduser.php" class="buy-now btn btn-sm btn-primary">Volver</a></p>
</div>
</body>
</html>