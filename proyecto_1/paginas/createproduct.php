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
        $message = 'Producto Guardado Exitosamente';
      break;
      case 'error':
        $message = 'El Producto No Se Guardo';
      break;
      case 'errorv':
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

<h1>Productos</h1>
<div>
<form action="insertProduct.php" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
<div class="form-group">
<label class="sr-only" for="">SKU</label>
<input type="text" class="form-control" name="sku" placeholder="sku" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="nombre" required>
</div>
</p>
<p>      
<div class="form-group">
<label class="sr-only" for="">Descripción</label>
<input type="text" class="form-control" name="descripcion" placeholder="descripcion" required>
</div>
</p>
<p> 
<div class="form-group">
<label class="sr-only" for="">Profile Picture</label>
<input type="file" class="form-control" name="profilePic" id="profilePic" required>
</div>
</p>      
<p>     
<select  id="id_categorias" name="id_categorias" class="input__text"  required>
<option value="" disabled selected >Select Categoria</option>
<?php
$categorias =$Clfuncion-> getCategorias();
$categoriasHtml = "";
foreach ($categorias as $categoria) {
  if($categoria['id_categorias'] == $categoria['id_categorias']){
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
<input type="number" min="0" name="stock">
</div>
</p>
<p>    
<div class="form-group">
<label class="sr-only" for="">Precio</label>
<input type="text" class="form-control" name="precio" placeholder="precio">
</div>
</p>
<p>      
<input type="submit" class="btn btn-primary" value="Submit"></input>
</form>
<button><a href="productos.php">Volver</a></button>
</div>
<div class="msg">
<?php echo $message; ?>
</div>
</body>
</html>