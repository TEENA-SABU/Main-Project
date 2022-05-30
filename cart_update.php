<?php
include "db.php";


$quantity = $_POST['new_quantity'];
$name = $_POST['item_name'];
if (isset($_POST['edit_btn'])) {
    $result = mysqli_query($con, "SELECT * FROM `products` where p_name='$name'");
    $row = mysqli_fetch_array($result);
    $amounttopay = $quantity * $row["p_price"];
    $result1 = mysqli_query($con, "UPDATE `cart` SET `total_item`='$quantity',`rate`='$amounttopay' WHERE `cart_id`='$cart_id'");
    if ($result1) {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Succesfully Edited');
        window. location. href='cart.php';
        </script>");
        //header("Location: cart.php");
        die();
    }
} else if (isset($_POST['delete'])) {
    $name = $_POST['item_name'];
    $quantity = $_POST['new_quantity'];
    $crt_id = $_POST['delete_id'];
    $result1 = mysqli_query($con, "UPDATE `products` SET `quantity`=quantity + $quantity WHERE p_name='$name'");


    $result = mysqli_query($con, "DELETE FROM `cart` WHERE cart_id = '$crt_id'");
    if ($result) {
        echo ("<script LANGUAGE='JavaScript'>
window. alert('Succesfully deleted');

window. location. href='cart.php';
</script>");

        // echo '<script>alert("Item Deleted Succsesfully!!")</script>';

        //header("Location: cart.php");
    } else {


        die();
    }
}
