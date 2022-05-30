<?php
   include '../db.php';
//include 'dashboard.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

    <title>User View</title>
  </head>
  <body> 
  <style>
.table {
  max-width: 500px;
  margin: auto;
}

</style>
<table class="table">
<thead>
<tr>

<th scope="col">product name</th>
<th scope="col">price</th>
<th scope="col">image</th>
<th scope="col">description</th>
</tr>
</thead>
<tbody>
<?php
$sql="Select * from `products`";
$result=mysqli_query($con,$sql);

if($result){
  
  while($row=mysqli_fetch_assoc($result)){
  
  $p_name=$row['p_name'];
  $p_price=$row['p_price'];
  $p_image=$row['p_image'];
  $p_description=$row['p_description'];
  echo ' <tr>
  
  <td>'.$p_name.'</td>
  <td>'.$p_price.'</td>
  <td>'.$p_image.'</td>
  <td>'.$p_description.'</td>
  <td>

</td>
  
</tr>';
  }
}
?>

  </body>
</html>