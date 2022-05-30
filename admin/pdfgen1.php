<?php
session_start();
include('../db.php');
include('C:\xampp\htdocs\be\fpdf\fpdf.php');

$sql = "SELECT * FROM payment";
$data = mysqli_query($con, $sql);


if (isset($_POST['btn_pdf'])) {
    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->AddPage();
    $pdf->cell('25', '10', 'User Name', '1', '0', 'C');
    $pdf->cell('40', '10', 'Amount', '1', '0', 'C');
    $pdf->cell('35', '10', 'Payment status', '1', '1', 'C');

    while ($row = mysqli_fetch_assoc($data)) {
        $pdf->cell('25', '10', $row['name'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['amount'], '1', '0', 'C');
        $pdf->cell('35', '10', $row['payment_status'], '1', '1', 'C');
    }


    $pdf->Output();
}
