<?php
include 'db.php';

if (isset($_POST['delete_btn'])) {
    $cat_id = $_POST['delete_id'];
    $query = "DELETE FROM cart WHERE cart_id='$cart_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: cart.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: index.php');
    }
}