<?php
require_once './Models/Model.php';

class ProductsModel extends Model
{
    public $db;
    public $id;

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

    public function getshelfs(){
        $sql = "SELECT 
                    *
                FROM SHELF
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


        $this->db->execute($sql, $params);
        $result = $this->db->execute("SELECT LAST_INSERT_ID()");
        return $result[0]['LAST_INSERT_ID()'];

    }
}