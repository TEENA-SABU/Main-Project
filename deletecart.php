<?php
include 'db.php';

if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM cart WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.html');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: index.html');
    }
}
