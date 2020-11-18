<?php
include 'functions.php';

session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}
$message = "";
    if(!empty($_REQUEST['status'])) {
        switch($_REQUEST['status']) {
            case 'errorid':
                $message = 'Producto Agregado Exitosamente';
            break;
            case 'incorre':
                $message = 'El Producto No Ha Sido Agregado';
            break;
            case 'succes':
                $message = 'Se Ha borrado El Producto';
            break;

        }
    }
    
$Clfuncion= new Functions();

?>

<title>Productos</title>
</head>
<body>
<?php
require 'layout.php';
?>

<h1>Productos</h1>

<div class="container">
<button><a href="createproduct.php">Nuevo Producto</a></button>
<button><a href="dashboard.php">Volver</a></button>
</div>
<div class="msg">
<?php echo $message; ?>
<div class="">  
<table >
<tbody>
<tr class="head"> 
<td>SKU</td>
<td>Nombre</td>
<td >Descripcion</td>
<td >Imagenes</td>
<td >Categoria</td>
<td >Stock</td>
<td >Precio</td>
<td>Actions</td>
<td>Actions</td>
</tr>
<?php
$products = $Clfuncion-> getProductos();
$productsHtml = "";
    foreach ($products as $product) {
        $productsHtml .= "<td>{$product['sku']}</td><td>{$product['nombre']}</td><td>{$product['descripcion']}</td><td><img src='{$product['imagen']}' width='200' height='200'> </td><td>{$product['nombre']}</td><td>{$product['stock']}</td><td>{$product['precio']}</td><td> <a class='btn__update'' href='editproducto.php?id_producto=".$product['id_productos']."'>Actualizar</a></td><td> <a class='btn__delete' href='deleteproducto.php?id_producto=".$product['id_productos']."'>Eliminar</a></td></tr>";
}
echo $productsHtml;
?>
</tbody>
</table>
</div>
</body>
</html>