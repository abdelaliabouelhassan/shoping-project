<?php 


require "../resours/config.php";

    if(isset($_GET['add'])){


            $query = query("SELECT * FROM products WHERE  product_id = " . escape_string($_GET['add'])  . "");
            confirm($query);

            while($row = fetch_array($query)){

                    if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]){
                        $_SESSION['product_' . $_GET['add']] += 1;
                        redirect("checkout");
                    }
                    else{
                     set_error_message("sorry we have only "  . $row['product_quantity'] . " avaliable");
                     redirect("checkout");
                    }



            }

    }


    if(isset($_GET['remove'])){
           $_SESSION['product_' . $_GET['remove']] --;
           if($_SESSION['product_' . $_GET['remove']] < 1)
            redirect("checkout");
            else{
                redirect("checkout");
            }
    }

    if(isset($_GET['delete'])){
        $_SESSION['product_' . $_GET['delete']] = "no";
        redirect("checkout");
    }


 function cart()
{


foreach ($_SESSION as $name => $value) {
    if($value > 0){

   
        if(substr($name,0,8) == "product_"){

                    $n  = strlen($name);
                $length = strlen($n - 8);

                $id = substr($name, 8 ,$length);


    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). "");
    confirm($query);

    while($row = fetch_array($query)){
$products = <<<DELIMETER

            <tr>
            <td>{$row['product_title']}</td>
            <td>{$row['product_price']}</td>
            <td>{$value}</td>
            <td>
            <a class="btn btn-success" href="cart?add={$row['product_id']}" ><span class="glyphicon glyphicon-plus"></span></a>
            <a class="btn btn-warning" href="cart?remove={$row['product_id']}" ><span class="glyphicon glyphicon-minus"></span></a>
            <a class="btn btn-danger" href="cart?delete={$row['product_id']}" ><span class="glyphicon glyphicon-remove"></span></a>
            </td>
            </tr>

DELIMETER;

        echo $products;
    }
}

    }

}///foreach end here

}//end functions

?>