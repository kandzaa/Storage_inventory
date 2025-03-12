<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include_once './Models/ProductsModel.php'; ?>

<?php

$products = (new ProductsModel())->getAllProducts();
?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Report Creator</h1>

        <form action="/report/generate" method="POST" class="bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                    <tr>
                        <th class="bg-black text-white">Select</th>
                        <th class="bg-black text-white">ID</th>
                        <th class="bg-black text-white">Product Name</th>
                        <th class="bg-black text-white">Category</th>
                        <th class="bg-black text-white">Price</th>
                        <th class="bg-black text-white">Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr class="hover">
                            <td>
                                <input type="checkbox" name="selected_products[]" value="<?php echo $product['ID']; ?>" class="checkbox checkbox-sm" />
                            </td>
                            <td><?php echo $product['ID']; ?></td>
                            <td><?php echo $product['PRODUCTNAME']; ?></td>
                            <td><?php echo $product['CATEGORY_ID']; ?></td>
                            <td>€<?php echo number_format($product['PRICE'], 2); ?></td>
                            <td><?php echo $product['SUPPLIER']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="p-6">
                <div class="form-control mb-4">
                    <h3 class="text-lg font-bold mb-2">Report Notes:</h3>
                    <textarea name="report_notes" placeholder="Add notes about these products..." class="textarea textarea-bordered h-24 w-full"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-neutral">
                        Generate Report
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php include './components/footer.php';?>