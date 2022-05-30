<?php
include 'db.php';
include 'header1.php';
?>

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

<div class="table-responsive">
    <?php
    $query = "SELECT * FROM cart";
    $query_run = mysqli_query($con, $query);
    ?>
    <table class="table table-bordered" userame="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th> id </th>


                <th>products</th>



            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['item_name']; ?></td>


                    </tr>
            <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>
        </tbody>
    </table>
</div>