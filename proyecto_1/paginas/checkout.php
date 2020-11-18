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

if(!isset($_SESSION['carrito'])){
  header('Location: dashboard.php');
}
$arreglo  = $_SESSION['carrito'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/css/style.css">

</head>
<body>

<a href="dashboarduser.php">Home</a>
  <div class="site-wrap">
    
    <form action="thankyou.php" method="post">
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">   
          </div>
          </div>
              <div class="form-group">
                  <div class="py-2">
                  <div class="form-group">
            </div>
            </div>
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Su Orden</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                      <tbody>
                      <?php
                        $total = 0; 
                        for($i=0;$i<count($arreglo);$i++){
                          $total = ($total) + ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']); 
                      ?>
                        <tr>
                          <td>$<?php echo $arreglo[$i]['Nombre'];?> </td>
                          <td>$<?php echo  number_format($arreglo[$i]['Precio'], 2, '.', '');?></td>
                        </tr>
                        <?php 
                          }
                        ?>
                        <tr>
                          <td>Total de la Orden</td>
                          <td>$<?php echo number_format($total, 2, '.', '');?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Realizar Pedido</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>           
  </div>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/main.js"></script>
    
  </body>
</html>