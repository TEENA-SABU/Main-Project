<?php

// Connect to database 
include('../db.php');

// Check if id is set or not, if true,
// toggle else simply go back to the page
if (isset($_GET['id'])) {

    // Store the value from get to 
    // a local variable "course_id"
    $id = $_GET['id'];

    // SQL query that sets the status to
    // 0 to indicate deactivation.
    $sql = "UPDATE `products` SET 
            `status`=0 WHERE id='$id'";

    // Execute the query
    mysqli_query($con, $sql);
}

// Go back to course-page.php
header('location: p_edit.php');
