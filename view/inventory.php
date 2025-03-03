<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/InventoryModel.php';?>

<h1 class="text-2xl">Dashboard</h1>

<?php
$inventoryModel = new InventoryModel();
$inventoryItems = $inventoryModel->getInventoryItems();
?>

<select>
    <?php
    for ($i = 0; $i < count($inventoryItems); $i++) {
        $item = $inventoryItems[$i];
        echo "<option value=''>" . $item["CATEGORY"] . "</option>";
        echo "<option value=''>" . $item["CATEGORY"] . "</option>";
        echo "<option value=''>" . $item["CATEGORY"] . "</option>"; 
        echo "<option value=''>" . $item["CATEGORY"] . "</option>";
        echo "<option value=''>" . $item["CATEGORY"] . "</option>";
    }
    ?>
</select>


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