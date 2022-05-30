<!DOCTYPE html>
<?php
include '../db.php';
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style2.css" />
  <title>CATEGORIES</title>
  <link rel="stylesheet" href="style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div id="registration-form">
    <div class='fieldset'>
      <legend>Add Category</legend>
      <form action="#" method="POST">
        <div class='row'>
          <label for="catname">Category Name</label>
          <input type="text" placeholder="Enter Category Name" name='catname' data-required="true" data-type="email" data-error-message="Your Category Name is required">
        </div>
        <input type="submit" value="SAVE" name="add-btn">
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

if (isset($_POST['add-btn'])) {
  $category_name = $_POST['catname'];
  $result = "INSERT INTO category(category_name) VALUES('$category_name')";
  $row = mysqli_query($con, $result);
  if ($row) {
    echo ("<script LANGUAGE='JavaScript'>
window. alert('category added succsesfully!');
window. location. href='product.php';
  
</script>");
  } else {
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Sorry, Already Added Item');
    window. location. href='product.php';
      
    </script>");
  }
  //header('Location:product.php');
}
?>

</html>