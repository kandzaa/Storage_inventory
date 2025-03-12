<?php
require_once './Models/AdminModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if (!empty($id) && !empty($username) && !empty($password) && !empty($role)) {
        $userModel = new AdminModel();
        $success = $userModel->updateUser($id, $username, $password, $role);

        if ($success) {
            header("Location: admin.php?success=1");
            exit();
        } else {
            header("Location: admin.php?error=1");
            exit();
        }
    } else {
        header("Location: admin.php?error=1");
        exit();
    }
}
?>
