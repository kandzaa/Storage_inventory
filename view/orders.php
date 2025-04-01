<?php include './components/head.php';?>
<?php include './components/navbar.php';?>

<?php
$ordersModel = new OrdersModel();
$logs = $ordersModel->getLogs();
?>

<div class="container mx-auto px-4 py-8 bg-gray-900 min-h-screen">
    <h1 class="text-4xl text-center font-bold mb-8 text-gray-100">
        <span class="border-b-4 border-blue-500 pb-2">Logs</span>
    </h1>

    <div class="bg-gray-800 rounded-lg shadow-xl p-6">
        <table class="table-auto w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">Target id</td>
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">Action</td>
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">Time</td>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                <?php foreach($logs as $log):?>
                    <tr class="hover:bg-gray-700 transition-colors duration-200">
                        <td class="border border-gray-700 px-4 py-2"><?php echo $log["TARGET_ID"];?></td>
                        <td class="border border-gray-700 px-4 py-2"><?php echo $log["DESCRIPTION"];?></td>
                        <td class="border border-gray-700 px-4 py-2"><?php echo $log["ACTION_TIME"];?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?php include './components/footer.php';?>