<?php include './components/head.php'; ?>
<?php include './components/navbar.php'; ?>
<?php include './Models/AdminModel.php'; ?>

<?php
$usermodel = new AdminModel();
$users = $usermodel->getUsers();
?>

<h1 class="text-4xl text-center font-bold">Admin Page</h1>

<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-700 text-white">
            <td class="border border-gray-300 px-4 py-2">USERNAME</td>
            <td class="border border-gray-300 px-4 py-2">PASSWORD</td>
            <td class="border border-gray-300 px-4 py-2">ROLE</td>
            <td class="border border-gray-300 px-4 py-2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($users)) {
            foreach ($users as $item) {
                echo "<tr>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["USERNAME"]) . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["PASSWORD"]) . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["ROLE"]) . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>";
                echo "<a href='?username=" . urlencode($item["USERNAME"]) . "&password=" . urlencode($item["PASSWORD"]) . "&role=" . urlencode($item["ROLE"]) . "' class='bg-blue-500 text-white px-3 py-1 rounded'>View</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='border border-gray-300 px-4 py-2 text-center'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['role'])): ?>
    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6 w-1/3 transform transition-transform duration-300 scale-95">
            <h2 class="text-2xl font-bold mb-4">Edit User Details</h2>
            <form action="admin_save.php" method="post">
                <label class="block mb-2">
                    <strong>USERNAME:</strong>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($_GET['username']); ?>" class="w-full bg-gray-700 text-white px-2 py-1 rounded">
                </label>

                <label class="block mb-2">
                    <strong>PASSWORD:</strong>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($_GET['password']); ?>" class="w-full bg-gray-700 text-white px-2 py-1 rounded">
                </label>

                <label class="block mb-2">
                    <strong>ROLE:</strong>
                    <select name="role" class="w-full bg-gray-700 text-white px-2 py-1 rounded">
                        <option value="ADMIN" <?php if ($_GET['role'] == 'ADMIN') echo 'selected'; ?>>ADMIN</option>
                        <option value="WORKER" <?php if ($_GET['role'] == 'WORKER') echo 'selected'; ?>>WORKER</option>
                        <option value="USER" <?php if ($_GET['role'] == 'USER') echo 'selected'; ?>>USER</option>
                    </select>
                </label>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mr-2">Save</button>
                    <a href="admin" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Close</a>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
