<?php include './components/head.php'; ?>
<?php include './components/navbar.php'; ?>

<?php
$usermodel = new AdminModel();
$users = $usermodel->getUsers();
$logs = $usermodel->getLogs();
?>

<div class="container mx-auto px-4 py-8 bg-gray-900 min-h-screen">
    <h1 class="text-4xl text-center font-bold mb-8 text-gray-100">
        <span class="border-b-4 border-blue-500 pb-2">Admin Page</span>
    </h1>

    <div class="bg-gray-800 rounded-lg shadow-xl p-6 mb-8">
        <table class="table-auto w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">USERNAME</td>
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">PASSWORD</td>
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">ROLE</td>
                    <td class="border border-gray-700 px-4 py-2 text-gray-300">ACTION</td>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                <?php
                if (!empty($users)) {
                    foreach ($users as $item) {
                        echo "<tr class='hover:bg-gray-700'>";
                        echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["USERNAME"]) . "</td>";
                        echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["PASSWORD"]) . "</td>"; // Maskējam paroli
                        echo "<td class='border border-gray-300 px-4 py-2'>" . htmlspecialchars($item["ROLE"]) . "</td>";
                        echo "<td class='border border-gray-300 px-4 py-2'>";
                        echo "<a href='?id=" . $item["ID"] . "&username=" . urlencode($item["USERNAME"]) . "&role=" . urlencode($item["ROLE"]) . "&password=" . urlencode($item["PASSWORD"]) . "' class='bg-blue-500 text-white px-3 py-1 rounded'>Edit</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='border border-gray-300 px-4 py-2 text-center'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['role'])): ?>
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
            <div class="bg-gray-800 rounded-lg shadow-xl p-6 w-1/3">
                <h2 class="text-2xl font-bold mb-4 text-gray-100">Edit User Details</h2>
                <form action="/admin/save" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                    <label class="block mb-2">
                        <strong>USERNAME:</strong>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($_GET['username']); ?>" class="w-full bg-gray-700 text-white px-2 py-1 rounded">
                    </label>

                    <label class="block mb-2">
                        <strong>PASSWORD:</strong>
                        <input type="password" name="password" value="<?php echo htmlspecialchars($_GET['password']); ?>" class="w-full bg-gray-700 text-white px-2 py-1 rounded">
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
</div>

<h1 class="text-4xl text-center font-bold">Logs</h1>

<table class="table">
    <thead >
        <tr>
            <td>
                User Id
            </td>
            <td>
                Target id
            </td>
            <td>
                Target Type
            </td>
            <td>
                Description
            </td>
            <td>
                Action time
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
        if (!empty($logs)) {
            foreach ($logs as $log) {
                echo "<tr data-id='" . $log["ID"] . "' class='inventory-item hover:bg-gray-500 cursor-pointer transition-colors duration-300 hover:text-white'>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $log["USER_ID"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $log["TARGET_ID"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $log["TARGET_TYPE"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $log["DESCRIPTION"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $log["ACTION_TIME"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='border border-gray-300 px-4 py-2 text-center'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>


