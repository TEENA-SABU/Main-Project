<?php
include '../db.php';

if (isset($_POST['delete_btn'])) {
    $cat_id = $_POST['delete_id'];
    $query = "DELETE FROM category WHERE category_id='$cat_id' ";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $query = "UPDATE `products` SET `category_id`= 0 WHERE category_id='$cat_id' ";
        $query_run = mysqli_query($con, $query);
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        //header('Location: e_category.php');
        echo ("<script LANGUAGE='JavaScript'>
window. alert('Category Deleted Succsesfully');
window. location. href='e_category.php';
</script>");
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: e_category.php');
    }
}
