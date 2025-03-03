<?php

require "Models/UserModel.php";
class AuthController
{
    public function login()
    {
        include './view/login.php';
    }

    public function register()
    {
        include './view/register.php';
    }

    public function processRegistration()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $role = 'USER';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['password_confirmation'] ?? '';

            $errors = [];

            if (empty($username)) {
                $errors[] = "Username is required";
            } elseif (strlen($username) < 3) {
                $errors[] = "Username must be at least 3 characters";
            }

            if (empty($password)) {
                $errors[] = "Password is required";
            } elseif (strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters";
            }

            if ($password !== $confirmPassword) {
                $errors[] = "Passwords do not match";
            }

            if (empty($errors)) {

                try {


                    $userModel = new UserModel();
                    if ($userModel->getUser($username)) {
                        $errors[] = "Username already exists";
                    } else {
                        $result = $userModel->register($username, $password, $role);

                        if ($result) {
                            $_SESSION['success_message'] = "Registration successful! You can now log in.";
                            header('Location: /login');
                            exit;
                        } else {
                            $errors[] = "Registration failed. Please try again.";
                        }
                    }

                } catch (PDOException $e) {
                    $errors[] = "Database error: " . $e->getMessage();
                }
            }

            if (!empty($errors)) {
                $_SESSION['registration_errors'] = $errors;
                $_SESSION['form_data'] = [
                    'username' => $username
                ];
                header('Location: /login');
                exit;
            }
        } else {
            header('Location: /');
            exit;
        }
    }
}
?>