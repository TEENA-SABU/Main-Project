<?php
include '../db.php';
include 'header1.php';

//include 'admin_dash.php';
?>
<!doctype html>
<html lang="en">


<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<head>
  <link rel="stylesheet" href="styletab.css" />
  <title>User View</title>


  <table class="table">
    <thead>
      <tr>

        <th scope="col">UserName</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>

      </tr>
    </thead>
    <tbody>
      <div class="row">
        <div class="col">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header">
                <form action="pdfgen.php" method="POST">
                  <button type="submit" class="btn btn-success float-left" name="btn_pdf">PDF</button>

                </form>
              </div>
              <?php
              $sql = "Select * from `reg` WHERE id>4";
              $result = mysqli_query($con, $sql);

              if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {

                  $name = $row['username'];
                  $email = $row['email'];
                  $phone = $row['phone'];
                  echo ' <tr>
  
  <td>' . $name . '</td>
  <td>' . $email . '</td>
  <td>' . $phone . '</td>
 
  
</tr>';
                }
              }
              ?>

              </body>

</html>