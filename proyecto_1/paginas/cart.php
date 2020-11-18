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

  if(isset($_SESSION['carrito'])){
    //si existe buscamos si ya estaba agregado ese producto
    if(isset($_GET['id'])){
      $arreglo =$_SESSION['carrito'];
      $encontro=false;
      $numero = 0;
      for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['Id'] == $_GET['id']){
          $encontro=true;
          $numero=$i;
        }
      }
      if($encontro == true){
        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
        $_SESSION['carrito']=$arreglo;
      }else{
        //no estaba el registro
        $nombre ="";
        $precio= "";
        $imagen="";
        $imagen="";
        $stock = "";

        $fila = $Clfunctions->getProducto($_GET['id']);
  
        $nombre=$fila['nombre'];
        $precio = $fila['precio'];
        $imagen = $fila['imagen'];
      
        $stock = $fila['stock'];
        $arregloNuevo= array(
                    'Id'=> $_GET['id'],
                    'Nombre'=> $nombre,
                    'Precio'=>$precio,
                    'Imagen'=> $imagen,
                    'Cantidad' => 1,
                    'Stock' =>  $stock
        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carrito']=$arreglo;
      }
    }
  }else{
    //creamos la variable de sesion
    if(isset($_GET['id'])){
      $nombre ="";
      $precio= "";
      $imagen="";
      $stock = "";
      $fila = $Clfunctions->getProducto($_GET['id']);
        
      $nombre=$fila['nombre'];
      $precio = $fila['precio'];
      $imagen = $fila['imagen'];
      $stock =  $fila['stock'];
      $arreglo[] = array(
                  'Id'=> $_GET['id'],
                  'Nombre'=> $nombre,
                  'Precio'=>$precio,
                  'Imagen'=> $imagen,
                  'Cantidad' => 1,
                  'Cantidad' => $stock
      );
      $_SESSION['carrito']=$arreglo;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/style.css">
    
  </head>
  <body>
  <a href="dashboarduser.php">Home</a>
  <div class="site-wrap">

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                  $total = 0;
                  if(isset($_SESSION['carrito'])){ 
                    $arregloCarrito =$_SESSION['carrito'];
                    for($i=0;$i<count($arregloCarrito);$i++){
                      $total= $total + ( $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'] );
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td>$<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad" 
                            data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>"
                            data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"
                            data-stock="<?php echo $arregloCarrito[$i]['Stock']; ?>"
                            value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" 
                            placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">
                      $<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id'];?>">X</a></td>
                  </tr>
                  
                  <?php } } ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total del Carrito</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total;?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total;?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Comprar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>             
  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>
  <script>
    $(document).ready(function(){
      $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);
        $.ajax({
          method:'POST',
          url:'eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
        boton.parent('td').parent('tr').remove();
        });
      });
      $(".txtCantidad").keyup(function(){
        var cantidad = $(this).val();
        var precio = $(this).data('precio');
        var id =  $(this).data('id');

        incrementar(cantidad,precio,id);
      
      });
      $(".btnIncrementar").click(function(){
        var precio = $(this).parent('div').parent('div').find('input').data('precio');
        var id = $(this).parent('div').parent('div').find('input').data('id');
        var cantidad = $(this).parent('div').parent('div').find('input').val();
      
        incrementar(cantidad,precio,id);
      });
      function incrementar(cantidad, precio, id){
          
        var mult = parseFloat(cantidad)* parseFloat(precio);

        $(".cant"+id).text("$"+mult);
        $.ajax({
          method:'POST',
          url:'actualizar.php',
          data:{
            id:id,
            cantidad:cantidad
          }
        }).done(function(respuesta){
        
        });
      }
    });
  </script>
    
  </body>
</html>