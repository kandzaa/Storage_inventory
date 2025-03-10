<?php include './components/head.php'; ?>
<div class="h-screen flex flex-col overflow-hidden">
    <?php include './components/navbar.php'; ?>
    <div class="flex-1 overflow-auto">
        <section>
            <?php
            $ProductsModel = new ProductsModel();
            $Categories = $ProductsModel->getCategories();
            $Shelfs = $ProductsModel->getShelfs();
            ?>

            <div class="hero bg-base-200 h-full">
                <div class="hero-content w-full justify-center">
                    <div class="card w-full max-w-4xl bg-base-100 shadow-xl">
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
                                <div class="flex flex-col md:flex-row md:gap-6">
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold mb-4">Product Information</h3>

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
                                            <input type="number" name="price" id="price" step="0.01" min="0" class="input input-bordered w-full" required />
                                        </div>
                                    </div>

                                    <!-- Right Column - Inventory Details -->
                                    <div class="flex-1 mt-6 md:mt-0">
                                        <h3 class="text-xl font-bold mb-4">Inventory Details</h3>

                                        <div class="form-control">
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
                                    </div>
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
    </div>
    <?php include './components/footer.php'; ?>
</div>