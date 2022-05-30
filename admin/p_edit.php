<?php
include '../db.php';
include 'header1.php';
?>

<div class="table-responsive">
  <?php
  $query = "SELECT * FROM products WHERE `category_id` != 0";
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
        <th> product name </th>
        <th>price </th>
        <!-- <th>category</th>-->
        <th>image</th>

        <th>description</th>
        <th>quantity</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
          <tr>
            <!-- <td><?php echo $row['id']; ?></td>-->
            <td><?php echo $row['p_name']; ?></td>
            <td><?php echo $row['p_price']; ?></td>
            <!-- <td><?php echo $row['category_id']; ?></td>-->
            <td>
              <img src="./pic/<?php echo $row["p_image"]; ?>" alt="" width="100" height="50">
            </td>
            <td><?php echo $row['p_description']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>

              <form action="code1.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
              </form>
            </td>
            <td>
              <form action="code.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
              </form>
            </td>
            <td>


          <?php
        }
      } else {
        echo "No Record Found";
      }
          ?>
    </tbody>
  </table>
</div>