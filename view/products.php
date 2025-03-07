<?php include './components/head.php'; ?>
<?php include './components/navbar.php'; ?>
    <section>

        <?php
        $ProductsModel = new ProductsModel();
        $Categories = $ProductsModel->getCategories();
        $Shelfs = $ProductsModel->getShelfs();
        ?>

        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content flex-col">
                <div class="card w-full max-w-lg bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title text-2xl font-bold justify-center">Add New Product</h2>

                        <?php if (isset($errors) && !empty($errors)): ?>
                            <div class="alert alert-error">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="/products/add/store" method="POST">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Product Name</span>
                                </label>
                                <input type="text" name="productName" id="productName" class="input input-bordered" required />
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Category</span>
                                </label>
                                <select name="categoryId" id="categoryId" class="select select-bordered w-full" required>
                                    <option value="" disabled selected>Select category</option>
                                    <?php
                                    foreach ($Categories as $category) {
                                        echo "<option value='" . $category['ID'] . "'>" . $category['CATEGORY'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Supplier</span>
                                </label>
                                    <input type="text" name="supplier" id="supplier" class="input input-bordered w-full" required />
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Price</span>
                                </label>
                                <label class="input-group">
                                    <span>$</span>
                                    <input type="number" name="price" id="price" step="0.01" min="0" class="input input-bordered w-full" required />
                                </label>
                            </div>

                            <h2 class="text-2xl font-bold justify-center mt-6">Inventory Details</h2>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Shelf</span>
                                </label>
                                <select name="shelfId" id="shelfId" class="select select-bordered w-full" required>
                                    <option value="" disabled selected>Select shelf</option>
                                    <?php
                                    foreach ($Shelfs as $shelf) {
                                        echo "<option value='" . $shelf['ID'] . "'>" . $shelf['SHELFNAME'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="label-text">Quantity</span>
                                </label>
                                    <input type="number" name="quantity" id="quantity" step="1" min="0" class="input input-bordered w-full" required />
                            </div>


                            <div class="form-control mt-6">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include './components/footer.php'; ?>