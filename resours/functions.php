<?php



///helper functions


function set_error_message($msg){
    if(!empty($msg))
     $_SESSION['msg'] = $msg;
     else
        $msg = "";
}

function desplay_error_message(){
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
}


function redirect($location){
    header("Location: $location");
}


function query($sql){
    global $connection;

    return mysqli_query($connection,$sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED : " .mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;

    return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/*********************************************************************Front End ***********************************************************************************/
//get products


function get_products(){
   


    $query = query("SELECT * FROM products");
    confirm($query);
    //$query_send = query($query);
while($row = fetch_array($query)){

$product = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
    <a href="item?id={$row['product_id']}"> <img src="{$row['product_img']}" alt=""></a> 
        <div class="caption">
            <h4 class="pull-right"><span>&#36</span>{$row['product_price']} </h4>
            <h4><a href="item?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['product_descripton']}; <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
        </div>
        <div class="ratings">
            <p class="pull-right">15 reviews</p>
            <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <a class="btn btn-primary" target="_blank" href="item?id={$row['product_id']}">Add To Cart </a>
            </p>
           
        </div>
    </div>
</div>


DELIMETER;

        echo $product;
    }//end while

}//end function



///categorys

function get_category(){

    $query= query("SELECT * FROM categorys");
    confirm($query);
    while($row = fetch_array($query)){
        $categorys = <<<DELIMETER
    
        <a href="category?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>
            
DELIMETER;
echo $categorys;
    }//end while




}//end function



//category page


function get_category2(){
        $query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
        confirm($query);
        while($row = fetch_array($query)){
            $cat_product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_img']}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>

        


DELIMETER;
            echo $cat_product;

        }
}

function get_category_in_shopPage(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
        $cat_product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{$row['product_img']}" alt="">
            <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>

    


DELIMETER;
        echo $cat_product;

    }
}



//users



function users_log(){



    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password   = $_POST['password'];
    

    $query = query("SELECT * FROM users WHERE username = '{$username}'AND password = '{$password}'");
    confirm($query);

    if(mysqli_num_rows($query) == 0){
        set_error_message("Password or Username Are Wrong! ");
       redirect("login");
      
    }
    else{
        set_error_message("Welcom Back ".$username);
        redirect('admin/index');
        }

    }

}


//contact


function contact(){
    if(isset($_POST['submit'])){
            
      $to ="abdelali54abouelhassan@gmail.com";
      $from = $_POST['name'];
      $subject = $_POST['phone'];
      $email = $_POST['email'];
      $message = $_POST['msg'];

      $headers = "From: {$from}  {$email} ";


      $result = mail($to,$subject,$message,$headers);

      echo $result;

    }
}








































/*********************************************************************Back End ***********************************************************************************/

?>