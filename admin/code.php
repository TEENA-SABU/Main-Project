<?php
include '../db.php';

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM products WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        //header('Location: p_edit.php');
        echo ("<script LANGUAGE='JavaScript'>
window. alert('Product Deleted Succsesfully');
window. location. href='p_edit.php';
</script>");
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: p_edit.php');
    }
}
