<!DOCTYPE html>
<?php
include '../db.php';
//include 'admin_dash.php';

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style2.css" />
  <title>PRODUCT</title>
  <link rel="stylesheet" href="style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div id="registration-form">
    <div class='fieldset'>
      <legend>ADD PRODUCTS</legend>
      <form action="#" method="POST">
        <div class='row'>
          <!-- <label for="product Name">Product Name</label>-->
          <input type="text" placeholder="PRODUCT NAME" name='p_name' data-required="true" data-type="email" data-error-message="Your Category Name is required">
        </div>
        <div class='row'>
          <!--<label for="product price">Product Price</label>-->
          <input type="text" placeholder="PRODUCT PRICE" name='p_price' data-required="true" data-type="email" data-error-message="Your Category Name is required">
        </div>
        <div class='row'>
          <!-- <label for="product price">Select Category</label>-->
          <select>
            <option value="" disabled>Select Category</option>
            <?php
            $result1 = "SELECT * from category";
            $result = $con->query($result1);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
              }
            }

            ?>
          </select>
          <div class='row'>
            <!-- <label for="product price">Product image</label>-->
            <input type="text" placeholder="UPLOAD IMAGE" name='p_image' data-required="true" data-type="email" data-error-message="upload the image">
          </div>
          <div class='row'>
            <!--  <label for="product Description">Product Description</label>-->
            <input type="text" placeholder="PRODUCT DESCRIPTION" name='p_description' data-required="true" data-type="email" data-error-message="description required">
          </div>
        </div>
        <input type="submit" value="SAVE" name="p-btn">
      </form>
    </div>
  </div>
</body>
<?php
/*if(isset($_POST["submit"]))
{
  
$categoryid = $_POST["catid"];
$categoryname = $_POST["catname"];
//$upl=$_FILES["img"]["name"];
//move_uploaded_file($_FILES["img"]["tmp_name"],"register/".$_FILES["img"]["name"]);
$insert="INSERT INTO `category`( `category_id`,`category_name`)VALUES('$category_id','$category_name') ";
if(mysqli_query($con,$insert))
{
  echo("<script LANGUAGE='JavaScript'>
    window.alert('Category Added Successfully')
    window.location.href='admin.php';
    </script>");

}
else
  {  echo("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong')
    window.location.href='categories.php';
  </script>");
}
}
?>*/

if (isset($_POST['p-btn'])) {
  $category_name = $_POST['p_name'];
  $result = "INSERT INTO products (p_name,p_price,p_image,p_description) VALUES('$p_name','$p_price','$p_image','$p_description')";
  $row = mysqli_query($con, $result);
}
?>

</html>