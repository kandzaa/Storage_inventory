<?php

require './Models/ProductsModel.php';
class ProductsController
{

    public function create(){

        require './view/products.php';
    }

    public function store()
    {

        $productName = $_POST['productName'];
        $categoryId = $_POST['categoryId'];
        $supplier = $_POST['supplier'];
        $price = $_POST['price'];


        $productModel = new ProductsModel();
        $result = $productModel->create([
            'productName' => $productName,
            'categoryId' => $categoryId,
            'supplier' => $supplier,
            'price' => $price
        ]);


        header('Location: /inventory');
        exit;
    }
}