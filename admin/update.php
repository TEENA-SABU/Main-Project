<?php
     include '../db.php';
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT PRODUCTS </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM products WHERE id='$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code1.php" method="POST">

                            <!--<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>"-->

                            <div class="form-group">
                                <label> product name </label>
                                <input type="text" name="p_name" value="<?php echo $row['p_name'] ?>" class="form-control"
                                    placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label>price</label>
                                <input type="text" name="p_price" value="<?php echo $row['p_price'] ?>" class="form-control"
                                    placeholder="Enter product price">
                            </div>
                            <div class="form-group">
                                <label>description</label>
                                <input type="text" name="p_description" value="<?php echo $row['p_description'] ?>"
                                    class="form-control" placeholder="Enter description">
                            </div>

                            <a href="p_edit.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
