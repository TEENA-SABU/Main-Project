<?php
session_start();
include('db.php');
include('C:\xampp\htdocs\be\fpdf\fpdf.php');

$sql = "SELECT item_name,total_item,rate FROM cart";
$data = mysqli_query($con, $sql);


if (isset($_POST['btn_pdf'])) {
    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->AddPage();
    $pdf->cell('25', '10', 'Item Name', '1', '0', 'C');
    $pdf->cell('40', '10', 'Quantity', '1', '0', 'C');
    $pdf->cell('35', '10', 'Rate', '1', '1', 'C');

    while ($row = mysqli_fetch_assoc($data)) {
        $pdf->cell('25', '10', $row['item_name'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['total_item'], '1', '0', 'C');
        $pdf->cell('35', '10', $row['rate'], '1', '1', 'C');
    }


    $pdf->Output();
}
