<?php
include 'conexion.php';

class Functions{
    function authenticate($usuario, $password){
        $conn = new Conexion();
        $sql = "SELECT * FROM usuario WHERE `usuario` = '$usuario' AND `password` = '$password'";
        $result = $conn->query($sql);

    if ($conn->connect_errno) {
        $conn->close();
        return false;
}
$conn->close();
return $result->fetch_array();
}

    function saveUser($usuario) {
        $conn= new Conexion();
        $sql = "INSERT INTO usuario( `usuario`, `nombre`, `apellidos`,`numero_telefono`, `email`, `dirrecion`,`password`, `tipo`)
        VALUES ('{$usuario['usuario']}','{$usuario['nombre']}','{$usuario['apellidos']}','{$usuario['numero_telefono']}','{$usuario['email']}','{$usuario['dirrecion']}','{$usuario['password']}','user')";
$conn->query($sql);
    if ($conn->connect_errno) {
        $conn->close();
        return false;
}
$conn->close();
return true;
}
//función para guardar las ventas DB
function saveVentas($id_usuario,$total,$fecha) {

    $conn =  new Conexion();
    $sql ="Insert into ventas(`id_usuario`,`total`,`fecha`)
     Values('{$id_usuario}','{$total}','{$fecha}')";
    $resultat = $conn->query($sql);
   if (!$resultat) {
     return false;
   } else {
    return $conn->insert_id; // function return el ID en vez de true.

   }
}
//Función guarda venta producto
function saveProductoVenta($id_venta,$id_producto,$cantidad,$precio,$subtotal) {

    $conn= new Conexion();
    $sql = "INSERT INTO `productos_venta`(`id_venta`, `id_producto`,`cantidad`, `precio`, `subtotal`) 
    VALUES ('{$id_venta}','{$id_producto}','{$cantidad}','{$precio}','{$subtotal}')";
$conn->query($sql);
if ($conn->connect_errno) {
    $conn->close();
    return false;
}
$conn->close();
return true;
}

//función actualizar inventario
function updateInventario($id_producto,$cantidad) {  
    $conn= new Conexion();

    $sql="UPDATE `productos` set `stock` = `stock` -'{$cantidad}' where `id_productos`={$id_producto}";
$conn->query($sql);
if ($conn->connect_errno) {
    $conn->close();
    return false;
}
$conn->close();
return true;
}

//funcion obtener clientes
function getClientes(){
$conn= new Conexion();

$sql = "SELECT * FROM usuario WHERE `tipo` = 'user'";
$result = $conn->query($sql);

if ($conn->connect_errno) {
$conn->close();
return [];
}
$conn->close();
return $result;
}

function getventaPedido($id_user){
    $conn =  new Conexion();
    $sql = "SELECT  v.fecha, v.total, p.cantidad,p.precio,ps.descripcion,ps.imagen
    FROM ventas v  
    INNER JOIN productos_venta p on v.id_venta =p.id_venta 
    INNER JOIN productos ps  on p.id_producto = ps.id_productos  WHERE id_usuario=$id_user";
$result = $conn->query($sql);

if ($conn->connect_errno) {
$conn->close();
return [];
}
$conn->close();
return $result;

}

function getProductos(){
$conn =  new Conexion();
$sql = "SELECT p.id_productos, p.sku, p.nombre, p.descripcion, p.imagen, p.id_categoria,c.nombre,p.stock, p.precio
from productos p INNER JOIN categorias c ON  p.id_categoria =c.id_categorias ";
$result = $conn->query($sql);

if ($conn->connect_errno) {
$conn->close();
return [];
}
$conn->close();
return $result;
}

function getIDProductos($id_categoria){
    $conn =  new Conexion();
    $sql = "SELECT p.id_productos, p.sku, p.nombre, p.descripcion, p.imagen, p.id_categoria,c.nombre,p.stock, p.precio
    from productos p INNER JOIN categorias c ON  p.id_categoria =c.id_categorias  WHERE p.id_categoria = $id_categoria";
    $result = $conn->query($sql);
    
    if ($conn->connect_errno) {
    $conn->close();
    return [];
    }
    $conn->close();
    return $result;
    }
    


function getProducto($id_producto){
    $conn =  new Conexion();
    $sql ="SELECT * FROM `productos` WHERE `id_productos` = $id_producto";
    $result = $conn->query($sql);

    if ($conn->connect_errno) {
        $conn->close();
        return [];
    }
    $conn->close();
    return $result->fetch_array();
}

function getCategoria($id_categoria){
    $conn =  new Conexion();
    $sql = "SELECT * FROM `categorias` WHERE `id_categorias` = $id_categoria";
    $result = $conn->query($sql);

        if ($conn->connect_errno) {
        $conn->close();
        return [];
    }
$conn->close();
return $result->fetch_array();
}

function getCategorias(){
    $conn =  new Conexion();
    $sql = "SELECT * FROM categorias";
    $result = $conn->query($sql);

        if ($conn->connect_errno) {
        $conn->close();
        return [];
}
$conn->close();
return $result;
}

function saveProductos($productos,$imagen ) {
    $conn =  new Conexion();
    $sql = "INSERT INTO productos( `sku`, `nombre`, `descripcion`, `imagen`, `id_categoria`, `stock`, `precio`)
    VALUES ('{$productos['sku']}','{$productos['nombre']}','{$productos['descripcion']}','$imagen','{$productos['id_categorias']}','{$productos['stock']}','{$productos['precio']}')";
    $conn->query($sql);

    if ($conn->connect_errno) {
        $conn->close();
        return false;
}
$conn->close();
return true;
}
    function updateProductos($productos) {
        $conn= new Conexion();
        $sql = "UPDATE `productos` set `sku` = '{$productos['sku']}' , `nombre` = '{$productos['nombre']}', `descripcion` = '{$productos['descripcion']}' , `imagen` = '{$productos['imagen']}', `id_categoria` = '{$productos['id_categoria']}', `stock` = '{$productos['stock']}', `precio` = '{$productos['precio']}'
        WHERE `id_productos` = {$productos['id_productos']}";
        $conn->query($sql);
            if ($conn->connect_errno) {
                $conn->close();
                return false;
            }
$conn->close();
return true;
}

    function deleteProductos($id_productos){
        $conn= new Conexion();
        $sql = "DELETE FROM `productos` WHERE `id_productos`  = $id_productos";
        $result = $conn->query($sql);

    if ($conn->connect_errno) {
        $conn->close();
        return [];
    }
$conn->close();
return $result;
}
    
    function updateCategorias($categoria) {
        $conn= new Conexion();
        $sql = "UPDATE `categorias` set `nombre` = '{$categoria['nombre']}' 
        WHERE `id_categorias` = {$categoria['id_categoria']}";
        $conn->query($sql);

        if ($conn->connect_errno) {
            $conn->close();
            return false;
        }
$conn->close();
return true;
}

    function saveCategorias($categoria ) {
        $conn =  new Conexion();
        $sql = "INSERT INTO categorias( `nombre`)
        VALUES ('{$categoria['nombre']}')";
        $conn->query($sql);

        if ($conn->connect_errno) {
            $conn->close();
            return false;
        }
$conn->close();
return true;
}

    function deletCategorias($id_categorias){
        $conn= new Conexion();
        $sql = "DELETE FROM `categorias` WHERE `id_categorias`  = $id_categorias";
        $result = $conn->query($sql);

        if ($conn->connect_errno) {
            $conn->close();
            return [];
        }
$conn->close();
return $result;
}

function getProductoCategoria($id_categoria){
    $conn =  new Conexion();
    $sql = "SELECT * FROM `productos` WHERE `id_categoria` = $id_categoria";
    $result = $conn->query($sql);

    if ($conn->connect_errno) {
    $conn->close();
    return [];
    }
    $conn->close();
    return $result;
}

    function uploadPicture($inputName){
        $fileObject = $_FILES[$inputName];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($fileObject["name"]);
        $uploadOk = 0;
            if (move_uploaded_file($fileObject["tmp_name"], $target_file)) {
                return $target_file;
    } else {
                return false;
            }
        }
}
