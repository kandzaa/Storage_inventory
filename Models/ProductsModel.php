<?php
require_once './Models/Model.php';

class ProductsModel extends Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getCategories(){
        $sql = "SELECT 
                    *
                FROM CATEGORY 
               ";

        return $this->db->execute($sql);
    }

    public function create($data)
    {

        $productName = $data['productName'];
        $categoryId = $data['categoryId'];
        $supplier = $data['supplier'];
        $price = $data['price'];


        $sql = "INSERT INTO PRODUCTS (PRODUCTNAME, CATEGORY_ID, SUPPLIER, PRICE) 
            VALUES (:productName, :categoryId, :supplier, :price)";


        $params = [
            ':productName' => $productName,
            ':categoryId' => $categoryId,
            ':supplier' => $supplier,
            ':price' => $price
        ];


        return $this->db->execute($sql, $params, true);
    }
}