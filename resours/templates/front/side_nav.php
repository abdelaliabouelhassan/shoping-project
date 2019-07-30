
   <div class="col-md-3">
         <p class="lead">Shop Name</p>
            <div class="list-group">
    <?php 

        $query = "SELECT * FROM categorys";
        $send_query = query($query);
        confirm($send_query);
        while($row = fetch_array($send_query)){
      ?>   

     <a href="#" class="list-group-item"><?php echo $row['cat_title']; ?></a>
          
       <?php  } ?>

    </div>
       </div>
