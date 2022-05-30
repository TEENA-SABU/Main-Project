<?php
if(isset($_POST["submit"]))
{
  include '../db.php';
  $cat=$_POST["category"];
$productname = $_POST["pname"];
$price = $_POST["catprice"];
$description = $_POST["catdes"];
$upl=$_FILES["catimage"]["name"];
move_uploaded_file($_FILES["catimage"]["tmp_name"],"images/".$_FILES["catimage"]["name"]);
$insert="INSERT INTO `products`(  `p_name`,`category_id`, `p_price`, p_`image`, `p_descrption`)VALUES('$p_name','$p_price' ,'$category_id','$p_image','$p_description') ";
if(mysqli_query($con,$insert))
{
  echo("<script LANGUAGE='JavaScript'>
    window.alert('submit successfully')
    window.location.href='subpro.php';
    </script>");

}
else
  {  echo("<script LANGUAGE='JavaScript'>
    window.alert('submit not')
    window.location.href='subpro.php';
  </script>");
}
}
?>