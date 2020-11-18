<?php
include 'functions.php';

session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}

$Clfuncion= new Functions();

?>
<title>Categorias</title>
</head>
<body>
<?php
require 'layout.php';
?>

<h1>categorias</h1>
<div class="container">
<button><a href="createcategoria.php">Nueva Categoria</a></button>
<button><a href="dashboard.php">Volver</a></button>
</div>

<div class="">  
<table >
<tbody>
    <tr class="head">
    <td>Nombre</td>
    <td>Actions</td>
    <td>Actions</td>
</tr>

<?php
$categorias = $Clfuncion-> getCategorias();
$categoriasHtml = "";
    foreach ($categorias as $categoria) {
        $categoriasHtml .= "<td>{$categoria['nombre']}</td> <td> <a class='btn__update' href='editcategoria.php?id_categoria=".$categoria['id_categorias']."'>Actualizar</a></td><td> <a class='btn__delete' href='deletecategoria.php?id_categorias=".$categoria['id_categorias']."'>Eliminar</a></td></tr>";
    }
echo $categoriasHtml;
?>

</tbody>
</table>
</div>
</body>
</html>