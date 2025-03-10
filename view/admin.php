<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<?php include './Models/AdminModel.php';?>


<?php
$usermodel = new AdminModel();
$users = $usermodel->getUsers();
?>

<h1 class="text-4xl text-center font-bold">Admin page</h1>


<table class="table-auto w-full border-collapse border border-gray-300" id="adminTable">
    <thead>
        <tr class="bg-gray-700 text-white">
            <td class="border border-gray-300 px-4 py-2">
            USERNAME
            </td>
            <td class="border border-gray-300 px-4 py-2">
            PASSWORD
            </td>
            <td class="border border-gray-300 px-4 py-2">
            ROLE
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
        if (!empty($users)) {
            foreach ($users as $item) {
                echo "<tr data-id='" . $item["USERNAME"] . "' class='admin-item hover:bg-gray-500 cursor-pointer transition-colors duration-300 hover:text-white'>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $item["USERNAME"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $item["PASSWORD"] . "</td>";
                echo "<td class='border border-gray-300 px-4 py-2'>" . $item["ROLE"] . "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='border border-gray-300 px-4 py-2 text-center'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>


<div id="userModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden transition-opacity duration-300">
    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6 w-1/3 transform transition-transform duration-300 scale-95">
        <div class="modal-content">
            <h2 class="text-2xl font-bold mb-4"><span id="modalProductName"></span></h2>
            <p><strong>USERNAME:</strong> <span id="modalCategory"></span></p>
            <p><strong>PASSWORD:</strong> <span id="modalQuantity"></span></p>
            <p><strong>ROLE:</strong> <span id="modalPrice"></span></p>
            <div class="flex justify-end mt-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mr-2">Edit</button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>


document.querySelectorAll('.admin-item').forEach(function(item) {
    item.addEventListener('click', function() {
        var username = this.cells[0].innerText;
        var paswword = this.cells[1].innerText;
        var role = this.cells[2].innerText;


        document.getElementById('modalCategory').innerText = username;
        document.getElementById('modalQuantity').innerText = paswword;
        document.getElementById('modalPrice').innerText = role;

        var modal = document.getElementById('userModal');
        modal.classList.remove('hidden');
        setTimeout(function() {
            modal.classList.remove('opacity-0');
            modal.querySelector('.modal-content').classList.remove('scale-95');
        }, 10);
    });
});

document.getElementById('userModal').addEventListener('click', function(event) {
    if (event.target === this) {
        var modal = this;
        modal.classList.add('opacity-0');
        modal.querySelector('.modal-content').classList.add('scale-95');
        setTimeout(function() {
            modal.classList.add('hidden');
        }, 300);
    }
});
</script>