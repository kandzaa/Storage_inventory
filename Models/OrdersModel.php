<?php
require_once './Models/Model.php';

class OrdersModel extends Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getOrders()
    {
        // Fetching order details including product name, category, supplier, price, and quantity
        $sql = "
        SELECT 
            ORDERS.ID as order_id,
            ORDERS.ORDERDATE as order_date,
            PRODUCTS.PRODUCTNAME as product_name,
            PRODUCTS.CATEGORY_ID as category_id,
            PRODUCTS.SUPPLIER as supplier,
            PRODUCTS.PRICE as price,
            ORDERS.QUANTITY as quantity,
            ORDERS.STATE as state
        FROM 
            ORDERS
        JOIN 
            PRODUCTS ON ORDERS.PRODUCT_ID = PRODUCTS.ID
        ";
        return $this->db->execute($sql);
    }
}