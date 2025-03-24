<?php
require('\xampp\htdocs\fpdf186\fpdf.php');

// Fetch Data from Cookies
$fullname = isset($_COOKIE["fullname"]) ? $_COOKIE["fullname"] : "N/A";
$email = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "N/A";
$phone = isset($_COOKIE["phone"]) ? $_COOKIE["phone"] : "N/A";
$age = isset($_COOKIE["age"]) ? $_COOKIE["age"] : "N/A";
$gender = isset($_COOKIE["gender"]) ? $_COOKIE["gender"] : "N/A";
$country = isset($_COOKIE["country"]) ? $_COOKIE["country"] : "N/A";

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Add Content to PDF
$pdf->Cell(40, 10, 'User Information', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, "Full Name: $fullname", 0, 1);
$pdf->Cell(40, 10, "Email: $email", 0, 1);
$pdf->Cell(40, 10, "Phone: $phone", 0, 1);
$pdf->Cell(40, 10, "Age: $age", 0, 1);
$pdf->Cell(40, 10, "Gender: $gender", 0, 1);
$pdf->Cell(40, 10, "Country: $country", 0, 1);

// Output PDF
$pdf->Output();
?>
