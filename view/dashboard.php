<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/DashboardModel.php';?>

<?php
$total = new DashboardModel();
$items = $total->getTotalItems();
$quentity = $total->getLowStockItems();
$recent = $total->getRecentItems();
?>

<div class="container mx-auto px-4 py-8 bg-gray-900 min-h-screen">
    <h1 class="text-4xl text-center font-bold mb-8 text-gray-100">
        <span class="border-b-4 border-blue-500 pb-2">Inventory Dashboard</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Items Card -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transform hover:scale-105 transition duration-300 border border-gray-700">
            <div class="flex flex-col items-center">
                <h2 class="text-xl font-semibold text-gray-300 mb-2">Total Items</h2>
                <span class="text-4xl font-bold text-blue-400"><?= $items[0]['total']?></span>
            </div>
        </div>

        <!-- Low Stock Card -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transform hover:scale-105 transition duration-300 border border-gray-700">
            <div class="flex flex-col items-center">
                <h2 class="text-xl font-semibold text-gray-300 mb-2">Low Stock Items</h2>
                <span class="text-4xl font-bold text-orange-400"><?= Count($quentity); ?></span>
            </div>
        </div>

        <!-- Recent Orders Card -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 transform hover:scale-105 transition duration-300 border border-gray-700">
            <div class="flex flex-col items-center">
                <h2 class="text-xl font-semibold text-gray-300 mb-2">Recent Orders</h2>
                <span class="text-4xl font-bold text-green-400"><?= Count($recent); ?></span>
            </div>
        </div>
    </div>
</div>

<?php include './components/footer.php';?>