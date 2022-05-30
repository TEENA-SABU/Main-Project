<?php
include '../db.php';
include 'header1.php';
//include 'admin_dash.php';
?>
<!doctype html>
<html lang="en">

<head>

  <link rel="stylesheet" href="styletab.css" />


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="style.css">-->

  <title>User View</title>
</head>

<body>

  <table class="table">
    <thead>
      <tr>

        <th scope="col">UserName</th>
        <th scope="col">phone</th>
        <th scope="col">complaint</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "Select * from `comp`";
      $result = mysqli_query($con, $sql);

      if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {

          $username = $row['username'];
          $phone = $row['phone'];
          $complaint = $row['complaint'];
          echo ' <tr>
  
  <td>' . $username . '</td>
  <td>' . $phone . '</td>
  <td>' . $complaint . '</td>
 
  
</tr>';
        }
      }
      ?>

</body>

</html>