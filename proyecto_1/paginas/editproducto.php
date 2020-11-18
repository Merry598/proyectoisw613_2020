<?php
include('functions.php');

$Clfunctions= new Functions();
session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}
    if($_REQUEST['id_producto']) {
        $producto = $Clfunctions->getProducto($_REQUEST['id_producto']);
}
// if editar producto
    if($_POST){
        if(isset($_POST['guardar'])){
            if ($filename = $Clfunctions->uploadPicture('picture')){
                $producto['id_productos'] = $_POST['id_producto'];
                $producto['sku'] = $_POST['sku'];
                $producto['nombre'] = $_POST['nombre'];
                $producto['descripcion'] = $_POST['descripcion'];
                $producto['imagen'] = $filename;
                $producto['id_categoria'] = $_POST['id_categorias'];
                $producto['stock'] = $_POST['stock'];
                $producto['precio'] = $_POST['precio'];
                $guardo = $Clfunctions->updateProductos($producto);
            }
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
<h1>Editar Producto</h1>
<div>
<form action="" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
<div class="form-group">
<input type="hidden" name="id_producto" value="<?php echo $producto['id_productos']?>" required>
<label class="sr-only" for="">SKU</label>
<input type="text" class="form-control" name="sku" value="<?php echo $producto['sku']?>" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Nombre</label>
<input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']?>" required>
</div>
</p>
<p>      
<div class="form-group">
<label class="sr-only" for="">Descripción</label>
<input type="text" class="form-control" name="descripcion"value="<?php echo $producto['descripcion']?>" required>
</div>
</p>
<p> 
<div class="form-group">
<label class="sr-only" for="">Profile Picture</label>
<input type="file" name="picture" id="picture" required>
</div>
</p> 
<p>
<div class="form-group">
<img src="<?php echo $producto['imagen']?>" alt="" width="100" height="100">
</div>
</p>     
<p>     
<select  id="id_categorias" name="id_categorias" class="input__text"  require>
<option value="" disabled selected >Select Categoria</option>
<?php
$categorias =$Clfunctions-> getCategorias();
$categoriasHtml = "";
foreach ($categorias as $categoria) {
    if($categoria['id_categorias'] == $producto['id_categoria']){
        $categoriasHtml .= "<option selected='true' name='{$categoria['id_categorias']}' value={$categoria['id_categorias']}> {$categoria['nombre']}</option>";
}else{
        $categoriasHtml .= "<option name='{$categoria['id_categorias']}' value={$categoria['id_categorias']}> {$categoria['nombre']} </option>";
    }
}
echo $categoriasHtml;
?>
</select>
<p>     
<div class="form-group">
<label for="">Stock</label>
<input type="number" min="0" name="stock" value="<?php echo $producto['stock']?>">
</div>
</p>
<p>    
<div class="form-group">
<label class="sr-only" for="">Precio</label>
<input type="text" class="form-control" name="precio" value="<?php echo $producto['precio']?>" required>
</div>
</p>
<p>      
<button type="submit" name="guardar" class="btn__primary">Guardar</button>
</form>
<button><a href="productos.php">Volver</a></button>
</div>
</body>
</html>