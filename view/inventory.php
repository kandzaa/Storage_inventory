<?php include './components/head.php';?>
<?php include './components/navbar.php';?>

<h1 class="text-2xl">Dashboard</h1>

<?php require_once './DbConnect.class.php';

$config = [
    'host' => 'localhost',
    'dbname' => 'storage_inventory',
    'username' => 'root',
    'password' => ''
];

$db = new DbConnect($config);

$sql = "SELECT 
            INVENTORY.ID as inventory_id, 
            PRODUCTS.PRODUCTNAME, 
            CATEGORY.CATEGORY, 
            INVENTORY.QUANTITY, 
            PRODUCTS.PRICE 
        FROM INVENTORY 
        JOIN PRODUCTS ON INVENTORY.PRODUCT_ID = PRODUCTS.ID 
        JOIN CATEGORY ON PRODUCTS.CATEGORY_ID = CATEGORY.ID";

$stmt = $db->dbconn->prepare($sql);
$stmt->execute();
$inventoryItems = $stmt->fetchAll();
?>
<table class="table table-compact border-2 border-white">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody> 
    <?php
        if (!empty($inventoryItems)) {
            foreach ($inventoryItems as $item) {
                echo "<tr>";
                echo "<td>" . $item["inventory_id"] . "</td>";
                echo "<td>" . $item["PRODUCTNAME"] . "</td>";
                echo "<td>" . $item["CATEGORY"] . "</td>";
                echo "<td>" . $item["QUANTITY"] . "</td>";
                echo "<td>" . $item["PRICE"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>