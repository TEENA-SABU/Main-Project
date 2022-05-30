 <?php
  include "header.php";
  include "db.php";

  include('auth_session.php');

  //$query = "SELECT * FROM `category` ";
  //$res1 = mysqli_query($con, $query) or die('error getting data');
  //$row2 = mysqli_fetch_array($res1);
  ?>

 <!DOCTYPE html>
 <html>

 <head>
   <style>
     .card {
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
       max-width: 300px;

       width: 50%;
       margin: auto;
       text-align: center;
       font-family: arial;
       float: left;
       margin-left: 5px;
       margin-right: 10px;
       margin-bottom: 10px;
       margin-top: 30px;
       opacity: 0.9;
       height: 100px;

     }

     .card h3 {
       text-transform: uppercase;
       margin-left: 5px;
       margin-right: 10px;
       margin-bottom: 10px;
       margin-top: 30px;
     }
   </style>
 </head>

 <body>

   <h2 style="text-align:center">CATEGORIES</h2>
   <?php
    $result = mysqli_query($con, "SELECT * FROM `category`");
    //ptint_r($result);
    while ($row = mysqli_fetch_array($result)) { ?>

     <div class="card">

       <h3><a href="product_view.php?view=<?php echo $row["category_id"]; ?>"><?php echo $row['category_name']; ?></a></h3>

     </div>

 </body>

 </html>
 <?php
    }
  ?>