<?php
include '../db.php';
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
  $query = "SELECT * FROM category";
  $query_run = mysqli_query($con, $query);
  ?>
  <table class="table table-bordered" category_id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <!-- <th> category_id </th>-->


        <th>category_name</th>


        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
          <tr>

            <!-- <td><?php echo $row['category_id']; ?></td>-->
            <td><?php echo $row['category_name']; ?></td>

            <td>
              <form action="del_code.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['category_id']; ?>">
                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
              </form>
            </td>
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