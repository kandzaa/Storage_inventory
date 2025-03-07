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
        $sql = "
            SELECT 
                ORDERS.ID as order_id,
                ORDERS.ORDERDATE as order_date,
                PRODUCTS.PRODUCTNAME as product_name,
                ORDERS.QUANTITY as quantity,
                ORDERS.STATE as state,
                (ORDERS.QUANTITY * PRODUCTS.PRICE) as total_price
            FROM ORDERS
            JOIN PRODUCTS ON ORDERS.PRODUCT_ID = PRODUCTS.ID
            JOIN USER ON ORDERS.USER_ID = USER.ID
        ";
        return $this->db->execute($sql);
    }
}