<?php
include '../db.php';
include 'header1.php';
?>

<div class="table-responsive">
    <?php
    $query = "SELECT * FROM payment";
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
                <th> Name </th>
                <th>Amount </th>
                <!-- <th>category</th>-->
                <th>Payment Status</th>


            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td> <?php echo $row['name']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['payment_status']; ?></td>




                    </tr>



            <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>
        </tbody>
    </table>
    <form action="pdfgen1.php" method="POST">
        <center> <button type="submit" class="btn btn-success float-left" name="btn_pdf">PDF</button></center>

    </form>
</div>