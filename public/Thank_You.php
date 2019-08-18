<?php

require_once ("cart.php");

?>


<?php include(TEMPLATE_FRONT. DS . "header.php");?>


    <!-- Page Content -->
    <div class="container">
            <h1 class="text-center">Thank You !</h1>
               
    <?php 


if(isset($_GET['transaction'])){
    $amount = $_GET['amount'];
    $currency = $_GET['currency'];
    $transaction = $_GET['transaction'] ;
    $status = $_GET['status'] ;


    $query = query("INSERT INTO orders (order_transaction,order_amount,order_status,order_currency ) VALUES('$transaction','$amount','$status',' $currency')");
    confirm($query);
    session_destroy();
    redirect("index");

}else{
   echo "<h1>you orders dose not completed!</h1>";
}




?>



<!--  ***********CART TOTALS*************-->

 </div><!--Main Content-->


      
 <?php include(TEMPLATE_FRONT. DS . "footer.php");?>


