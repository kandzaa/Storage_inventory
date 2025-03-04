<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/DashboardModel.php';?>

<?php
$total = new DashboardModel();
$items = $total->getTotalItems();
$quentity = $total->getLowStockItems();

?>

<h1 class="text-4xl text-center font-bold text-white-800 ">Inventory Dashboard</h1>
<table class="table w-full text-center mt-12 font-bold text-white ">
    <thead class="text-white">
        <tr>
            <td>
                total items
            </td>
            <td>
                Low Stock itms
            </td>
            <td>
                Recent Orders
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $items[0]['total']?>
            </td>
            <td> 
                <?= Count($quentity); ?>
            </td>
            <td>
                10
            </td>
        </tr>
    </tbody>
</table>


<?php include './components/footer.php';?>