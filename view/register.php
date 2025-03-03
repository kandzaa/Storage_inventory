<?php include './components/head.php';?>
<?php include './components/navbar.php';?>

    <div class="container mx-auto px-4 py-8 max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Create an Account</h1>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php foreach ($errors as $error): ?>
                    <p class="text-sm"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/register/process" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="username" type="text" name="username" placeholder="Enter your username">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="password" type="password" name="password" placeholder="Enter your password">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Confirm Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password">
            </div>

            <div class="flex items-center justify-center">
                <button class="bg-black hover:bg-white hover:text-black border hover:border-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                        type="submit">
                    Register
                </button>
            </div>
        </form>

        <p class="text-center text-gray-500 text-xs">
            Already have an account? <a href="/login" class="text-blue-500 hover:text-blue-800">Login here</a>
        </p>
    </div>

<?php include './components/footer.php';?>