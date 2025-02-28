<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
    <h1 class="text-red-600">Welcome to the page nigga</h1>

<body class="min-h-screen flex flex-col bg-gray-50 font-sans">
<div class="container mx-auto px-4 py-24 flex-grow flex flex-col items-center justify-center text-center">
    <h1 class="text-5xl font-bold text-gray-800 mb-6">Welcome to Our Work Platform</h1>
    <p class="text-xl text-gray-600 max-w-2xl mb-12">Login in to start your work</p>

    <div class="flex flex-wrap justify-center items-center gap-6">
        <a href="login.php" class="bg-black hover:bg-white text-white hover:text-black border border-black hover:border-black font-bold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
            Login
        </a>
        <a href="register.php" class="bg-white hover:bg-black text-black hover:text-white border border-black font-bold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
            Register
        </a>
    </div>
</div>


<footer class="bg-gray-900 text-white py-8">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; <?php echo date('Y'); ?> Your Company. All rights reserved.</p>
    </div>
</footer>

</body>
</html>

