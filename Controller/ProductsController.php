<?php

require './Models/ProductsModel.php';
require './Models/InventoryModel.php';
class ProductsController
{

    public function create()
    {

        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        require './view/products.php';
    }

    public function edit()
    {

        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        require './view/productsEdit.php';
    }

    public function update()
    {
        $errors = [];
        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }

        if (Validator::String($_POST['productName']) == false) {
            $errors[] = "Product name must be a string";
        }

        if (Validator::Number($_POST['categoryId']) == false) {
            $errors[] = "Category id must be a number";
        }

        if (Validator::String($_POST['supplier']) == false) {
            $errors[] = "Product name must be a string";
        }

        if (Validator::Number($_POST['price']) == false) {
            $errors[] = "Price must be a number";
        }

        if (Validator::Number($_POST['shelfId']) == false) {
            $errors[] = "Price must be a number";
        }

        if (Validator::Number($_POST['quantity']) == false) {
            $errors[] = "Quantity must be a number";
        }

        if (empty($errors)) {
            $productModel = new ProductsModel();
            $inventoryModel = new InventoryModel();

            $productModel->update($_POST['id'], [
                'productName' => $_POST['productName'],
                'categoryId' => $_POST['categoryId'],
                'supplier' => $_POST['supplier'],
                'price' => $_POST['price']
            ]);

            $inventoryModel->update($_POST['id'], [
                'shelfId' => $_POST['shelfId'],
                'productId' => $_POST['id'],
                'quantity' => $_POST['quantity']
            ]);

            header('Location: /inventory');
            exit;
        }
    }

    public function remove()
    {
        if (Validator::Role() == false) {
            header("Location: /login");
            exit();
        }

        if (isset($_POST['id'])) {
            $productId = $_POST['id'];

            $inventoryModel = new InventoryModel();
            $inventoryModel->deleteWhereProductId($productId);

            $productModel = new ProductsModel();
            $productModel->delete($productId);

            header("Location: /inventory");
            exit();
        }
    }

    public function store()
    {
        $productName = $_POST['productName'];
        $categoryId = $_POST['categoryId'];
        $supplier = $_POST['supplier'];
        $price = $_POST['price'];
        $shelfId = $_POST['shelfId'];
        $quantity = $_POST['quantity'];

        $productModel = new ProductsModel();
        $productId = $productModel->create([
            'productName' => $productName,
            'categoryId' => $categoryId,
            'supplier' => $supplier,
            'price' => $price
        ]);

        $inventoryModel = new InventoryModel();
        $inventoryModel->store([
            'shelfId' => $shelfId,
            'productId' => $productId,
            'quantity' => $quantity
        ]);

        header('Location: /inventory');
        exit;
    }
}
