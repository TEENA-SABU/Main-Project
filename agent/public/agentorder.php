<?php


include "agentheader.php";
include 'C:\xampp\htdocs\be\db.php';


session_start();

?>





<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <h2 style="text-align:center">ORDERS</h2>

    <div class="table-responsive">
        <?php
        $query = "SELECT * FROM buy";
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
                    <th> id </th>
                    <th>name </th>
                    <!-- <th>category</th>-->
                    <th>city</th>

                    <th>phone</th>
                    <th>pin</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['pin']; ?></td>

                            </td>


                            <td>



                                <?php
                                include 'C:\xampp\htdocs\be\db.php';
                                $id = $row['id'];
                                $sql2 = "select * from buy where id = '$id'";
                                $res = mysqli_query($con, $sql2);
                                $row = mysqli_fetch_array($res);

                                if ($row['status'] == "1")
                                    echo "DELIVERED";

                                else
                                    echo "DELIVERED";
                                ?>

                            </td>


                            <td>
                                <?php
                                if ($row['status'] == "1")
                                    echo
                                    "<a href=sloteditdeactivate.php?id=" . $row['id'] . " class=' btn btn-success ' >YES</a>";
                                else
                                    echo
                                    "<a href=sloteditactivate.php?id=" . $row['id'] . " class=' btn btn-primary'>NO</a>";
                                ?>
                        </tr>
                        <tr></tr>

                        </td>
                        </td>

                        </tr>


                <?php
                        //  header('Location:agentpin.php');
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </tbody>
        </table>
    </div>



    </p>
    </div>
    </form>
</body>

</html>