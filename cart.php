<?php
include "header1.php";
include "db.php";
include('auth_session.php');
//session_start();
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



        th {
            width: 200px;
        }
    </style>
</head>

<body>

    <h2 style="text-align:center">Products</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $_SESSION['username'];
            $totalsum = 0;
            $result = mysqli_query($con, "SELECT * FROM `cart` WHERE `username`='$username'");
            //ptint_r($result);
            while ($row = mysqli_fetch_array($result)) {

                $totalsum = $_SESSION['totsum'] = $totalsum + $row['rate'];
                $_SESSION['crt_id']  = $row['cart_id'];
                echo "<tr><form action='cart_update.php' method='POST'>
                <td> <input type='text'name='item_name' value='" . $row['item_name'] . "' readonly>" .  "</td>
                <td> " . "
                   <input type ='number' name ='new_quantity'value = '" . $row['total_item'] . "'/></td>
                    <td>" . $row['rate'] . "</td>
                    
                        <td>
                        <input type='hidden' name='delete_id' value='" . $row['cart_id'] .
                    "'>
                        <button type='submit' name='delete' class='btn btn-danger'> DELETE</button>
                </form>
            </td>
            "; ?>


                <!--">-->
            <?php echo "
        </tr>
    
      ";
            } ?>
        </tbody>
    </table>
    <center><span><?php echo ($totalsum); ?> </span></center>
    <script>

    </script>
    <a href="buy.php">
        <center><span> <button style=background-color:khaki;> BUY NOW</span></center>
    </a>

</body>

</html>