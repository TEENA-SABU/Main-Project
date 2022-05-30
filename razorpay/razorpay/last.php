<?php
//include "header1.php";
include "db.php";
include "header1.php";
session_start();
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html>

<head>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 200px;
            margin: auto;
            text-align: center;
            font-family: arial;
            float: left;
            margin-left: 45px;
            margin-right: 40px;
            margin-bottom: 30px;
            margin-top: 20px;
            width: 40%;

        }

        .price {
            color: blue;
            font-size: 22px;
        }

        .card button {
            border: solid;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #FF8C00;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

        h2 {
            text-align: center;
            text-decoration: overline;
            color: #006400;
            font-weight: bold;
        }


        th {
            width: 200px;
        }
    </style>
</head>

<body>


    <h1 style="text-align:center">ORDER PLACED SUCSESSFULLY!!!!</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-header">

                            </div>
                            <?php
                            $_SESSION['username'];
                            $totalsum = 0;
                            $result = mysqli_query($con, "SELECT * FROM `cart` WHERE `username`='$username'");
                            //ptint_r($result);
                            while ($row = mysqli_fetch_array($result)) {
                                $totalsum = $totalsum + $row['rate'];
                                echo "<tr><form action='cart_update.php' method='POST'>
                <td>" . $row['item_name'] . "</td>
                <td>" . $row['total_item'] . "</td>
                    <td>" . $row['rate'] . "</td>
                   
                </form>
            </td>
            ";
                            ?>


                                <!--">-->
                            <?php echo "
        </tr>
    
      ";
                            }
                            ?>
        </tbody>
    </table>


    <center>
        <span><?php echo ($totalsum) ?> </span>

    </center><br>
    </br>

    <!-- <center>
        <form action="pdfgen.php" method="POST">
            <button style=background-color:red type="submit" class="btn btn-success float-left" name="btn_pdf">PDF</button></style>

        </form>
    </center>-->
    <!-- <form action="lastdel.php" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $row['cart_id']; ?>">
        <center><button type="submit" name="delete_btn" class="btn btn-danger"> CANCEL ORDER</button></center>
    </form>-->

    <h2>THANK YOU..............</h2>

</body>

</html>