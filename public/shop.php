<?php
require "../resours/config.php";
?>


<?php include(TEMPLATE_FRONT. DS . "header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Welcome To Shop Page!</h1>
          
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_category_in_shopPage()?>

           

           

        </div>
        <!-- /.row -->

        

        <!-- Footer -->
        <?php include(TEMPLATE_FRONT. DS . "footer.php");?>
