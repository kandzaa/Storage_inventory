<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/InventoryModel.php';?>

<h1 class="text-2xl">Dashboard</h1>

<?php
$inventoryModel = new InventoryModel();
$inventoryItems = $inventoryModel->getInventoryItems();
?>

<select id="categoryFilter">
    <option value="all">All</option>
    <?php   
    $categories = array_unique(array_column($inventoryItems, 'CATEGORY'));
    foreach ($categories as $category) {
        echo "<option value='" . $category . "'>" . $category . "</option>";
    }
    ?>
</select>

<table class="table table-compact border-2 border-white" id="inventoryTable">
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

<script>
document.getElementById('categoryFilter').addEventListener('change', function() {
    var filter = this.value;
    var rows = document.querySelectorAll('#inventoryTable tbody tr');
    rows.forEach(function(row) {
        var category = row.cells[2].innerText;
        if (filter === 'all' || category === filter) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>