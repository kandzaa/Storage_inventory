<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/OrdersModel.php';?>

<?php
$ordersModel = new OrdersModel();
$orders = $ordersModel->getOrders();
?>

<h1 class="text-4xl text-center font-bold mb-6">Orders</h1>

<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-700 text-white">
            <th class="border border-gray-300 px-4 py-2">Order ID</th>
            <th class="border border-gray-300 px-4 py-2">Order Date</th>
            <th class="border border-gray-300 px-4 py-2">Product Name</th>
            <th class="border border-gray-300 px-4 py-2">Category ID</th>
            <th class="border border-gray-300 px-4 py-2">Supplier</th>
            <th class="border border-gray-300 px-4 py-2">Price</th>
            <th class="border border-gray-300 px-4 py-2">Quantity</th>
            <th class="border border-gray-300 px-4 py-2">State</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($orders)) {
            foreach ($orders as $order) {
                echo "<tr class='hover:bg-gray-500 transition-colors duration-400'>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["order_id"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["order_date"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["product_name"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["category_id"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["supplier"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["price"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["quantity"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $order["state"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='border border-gray-300 px-4 py-2 text-center'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include './components/footer.php';?>