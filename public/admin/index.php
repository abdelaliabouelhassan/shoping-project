<?php require_once("../../resours/config.php");

include(TEMPLATE_BACK . "/header.php");
if(!isset($_SESSION['islogin'])){
    redirect("../../public/index");
}
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

                    <?php

                    if($_SERVER['REQUEST_URI'] == "/ecom/public/admin/index"){
                    include(TEMPLATE_BACK . "/admin_contant.php");
                    }

                    if(isset($_GET['orders'])){
                            include(TEMPLATE_BACK . "/orders.php");
                    }

                    if(isset($_GET['add_product'])){
                         include(TEMPLATE_BACK . "/add_product.php");
                    }

                    if(isset($_GET['categorie'])){
                          include(TEMPLATE_BACK . "/categories.php");
                    }

                   if(isset($_GET['edit_product'])){
                      include(TEMPLATE_BACK . "/edit_product.php");
                   }

                   if(isset($_GET['products'])){
                         include(TEMPLATE_BACK . "/products.php");
                   }

                    if (isset($_GET['users'])) {
                        include(TEMPLATE_BACK . "/users.php");
                    }


                    ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK . "/footer.php");
?>