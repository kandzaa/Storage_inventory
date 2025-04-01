<?php include './components/head.php';?>
<?php include './components/navbar.php';?>

<?php
$ordersModel = new OrdersModel();
$logs = $ordersModel->getLogs();
?>



<h1 class="text-4xl text-center font-bold mb-6">Logs</h1>

<table class="table">
    <thead >
        <tr>
           
            <td>
                Target id
            </td>
            <td>
                Action
            </td>
            <td>
                Time
            </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($logs as $log):?>
            <tr>
                <td>
                    <?php echo $log["TARGET_ID"];?>
                </td>
                <td>
                    <?php echo $log["DESCRIPTION"];?>
                </td>
                <td>
                    <?php echo $log["ACTION_TIME"];?>
                </td>
            </tr>
        <?php endforeach;?>
</table>

<?php include './components/footer.php';?>