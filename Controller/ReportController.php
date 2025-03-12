<?php

include "Utilities/PDF.php";
class ReportController
{
    public function index()
    {
        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }

        include './view/report.php';
    }

    public function generateReport() {
        $selectedProductIds = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];
        $reportNotes = isset($_POST['report_notes']) ? $_POST['report_notes'] : '';

        // Validate that at least one product is selected
        if (empty($selectedProductIds)) {
            echo "Lūdzu, atlasiet vismaz vienu produktu"; exit;
        }

        $products = new ProductsModel();
        $results = $products->where($selectedProductIds);

        if (empty($results)) {
            echo "Nav atrasti produkti"; exit;
        }

        $reportData = [];
        foreach ($results as $product) {
            $reportData[] = [
                'ID' => $product['ID'],
                'PRODUCTNAME' => $product['PRODUCTNAME'],
                'PRICE' => $product['PRICE'],
                'SUPPLIER' => $product['SUPPLIER']
            ];
        }

        $pdf = new PDF();
        // Pass report notes as a separate parameter
        $pdf->generate($reportData, $reportNotes);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="produktu_atskaite_' . date('Y-m-d') . '.pdf"');
        header('Cache-Control: max-age=0');

        echo $pdf->output();
        exit;
    }
}