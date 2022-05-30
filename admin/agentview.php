<?php
include '../db.php';
include 'header1.php';
?>

<div class="table-responsive">
    <?php
    $query = "SELECT * FROM agent";
    $query_run = mysqli_query($con, $query);
    ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <head>
            <style>
                table,
                th,
                td {
                    border: 1px solid black;
                }

                button {
                    background-color: #7FFF00;
                }
            </style>
        </head>
        <thead>
            <tr>
                <!--<th> ID </th>-->
                <th> Agent name </th>
                <th>Address </th>
                <!-- <th>category</th>-->
                <th>image</th>

                <th>email</th>
                <th>phone</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <!-- <td><?php echo $row['id']; ?></td>-->
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td><?php echo $row['category_id']; ?></td>-->
                        <td>
                            <img src="./pic/<?php echo $row["p_image"]; ?>" alt="" width="100" height="50">
                        </td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>

                        <td>
                            <form action="agentdel.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                            </form>
                        </td>

                <?php
                }
            } else {
                echo "No Record Found";
            }
                ?>
        </tbody>
    </table>
</div>