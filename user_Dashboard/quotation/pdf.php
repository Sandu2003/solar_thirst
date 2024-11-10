// Include a PDF generation library
require('fpdf.php');

function generateQuotationPDF($quotationData) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Add header, content, and other details
    $pdf->Cell(0, 10, 'Your Quotation', 1, 1, 'C');
    $pdf->Ln(10);
    // Add data rows (fill in based on $quotationData)
    $pdf->Cell(0, 10, 'Installment Options: ' . $quotationData['installment_options'], 1, 1);
    
    $filePath = 'quotations/quotation_' . $quotationData['customer_id'] . '.pdf';
    $pdf->Output('F', $filePath); // Save the file

    return $filePath;
}
