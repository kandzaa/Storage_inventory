<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/InventoryModel.php';?>

<h1 class="text-4xl text-center font-bold mb-6">Inventory</h1>

<?php
$inventoryModel = new InventoryModel();
$inventoryItems = $inventoryModel->getInventoryItems();
?>

<div class="flex justify-center mb-6">
    <select id="categoryFilter" class="block appearance-none w-1/3 bg-gray-800 text-white border border-gray-600 hover:border-gray-400 px-3 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option value="all">All</option>
        <?php   
        $categories = array_unique(array_column($inventoryItems, 'CATEGORY'));
        foreach ($categories as $category) {
            echo "<option value='" . $category . "'>" . $category . "</option>";
        }
        ?>
    </select>
</div>

<table class="table table-zebra w-full" id="inventoryTable">
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