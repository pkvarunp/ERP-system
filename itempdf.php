<?php
session_start();
require 'dbcon.php';

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create a new PDF object
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// Set the document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Item Details Report');
$pdf->SetSubject('Item Details Report');
$pdf->SetKeywords('Item, Details, Report');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 14);

// Add a title
$pdf->Cell(0, 10, 'Item Details', 0, 1, 'C');

// Set font size for table
$pdf->SetFont('helvetica', '', 12);

// Table headers
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(20, 10, 'Id', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Item Code', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Item Category', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Item Subcategory', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Item Name', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'Quantity', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Unit Price', 1, 1, 'C', 1);

// Fetch data from the database
$query = "SELECT item.*,item_category.category,item_subcategory.sub_category
          FROM item
          INNER JOIN item_category ON item.item_category = item_category.id
          INNER JOIN item_subcategory ON item.item_subcategory = item_subcategory.id";
$query_run = mysqli_query($conn, $query);

// Display data in the table
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $item) {
        $pdf->Cell(20, 10, $item['id'], 1, 0, 'C');
        $pdf->Cell(25, 10, $item['item_code'], 1, 0, 'C');
        $pdf->Cell(40, 10, $item['category'], 1, 0, 'C');
        $pdf->Cell(40, 10, $item['sub_category'], 1, 0, 'C');
        $pdf->Cell(50, 10, $item['item_name'], 1, 0, 'C');
        $pdf->Cell(20, 10, $item['quantity'], 1, 0, 'C');
        $pdf->Cell(30, 10, $item['unit_price'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No Record Found', 1, 1, 'C');
}

// Close and output the PDF
$pdf->Output('item_details_report.pdf', 'I');
