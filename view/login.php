<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<section>
    <h1 class="text-2xl">Login page</h1>
    <form action="/login/process" method="post">
        <label>Username:
            <input type="username" name="username" id="username" required>
        </label>
        <label>Password:
            <input type="password" name="password" id="password" required>
        </label>
        <input type="submit" value="Login">
    </form>
</section>
<?php include './components/footer.php';?>