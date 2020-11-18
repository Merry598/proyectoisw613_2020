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

$Clfuncion = new Functions();

if (isset($_REQUEST['buscar'])) {
    $id_categoria = $_POST['id_categoria'];
    echo $id_categoria;
}
?>
<?php
require 'layout.php';
?>
<h1>Bienvenido <?php echo $user['nombre'] . " " . $user['apellidos']; ?> </h1>

<div class="compra">
<p><a href="verpedipro.php" class="btn btn-sm btn-primary">Ver Pedido</a></p>
    <h5><a href="cart.php">Carrito de Compras</a></h5>
</div>
<script>
function cargaridCategoria(id){
    document.getElementById('id_categoria').value=id ;

}
</script>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="form">
<ul>

    <li>Catalogo</li>
    <?php

    $categorias = $Clfuncion->getCategorias();
    $categoriasHtml = "";
    foreach ($categorias as $categoria) {
        $categoriasHtml .= "<li><button name='nom_categoria' type='submit' onclick='cargaridCategoria(".$categoria['id_categorias'].")'>{$categoria['nombre']}</button></li>";
    } 
    echo $categoriasHtml;
    ?>

</ul>
<input type="hidden" id="id_categoria" name="id_categoria" value=""><div class="container">

<?php
    if($_SERVER[ "REQUEST_METHOD" ] == "POST"){
        if(isset($_POST['nom_categoria'])){
            $id_categoria=$_POST['id_categoria'];
            $productos = $Clfuncion->getIDProductos($id_categoria);
            if($productos==null){
                echo "<h2>La categoria seleccionada no tiene prodcutos</h2>";
            }else{
                foreach ($productos as $product) {
                    echo "<div class='containerprodcuto'>";
                    echo "<h3>".$product['nombre']."</h3>";
                    echo "<img src=".$product['imagen']."  width='100px'>";
                    echo "<p>".$product['descripcion']."</p>";
                    echo "<p>Precio: ".$product['precio']."</p>";
                    echo "<p>Stock: ".$product['stock']."</p>";
                    echo "<button><a href='verpedido.php?id_producto=".$product['id_productos']."'>VER</a></button>";
                }
            }
        }    
    }
?>
<a href=""></a>
</div>
</form>
</div>
</body>
</html>