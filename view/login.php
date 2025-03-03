<?php include './components/head.php';?>
<?php include './components/navbar.php';?>
<section>
    
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-700">Login</h1>
            <form action="/login/process" method="POST" class="space-y-4">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Username</span>
                    </label>
                    <input type="text" name="username" id="username" placeholder="username" class="w-full input input-bordered" required/>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full input input-bordered" required/>
                </div>
                <div>
                    <?php 
                        if(isset($errors)){
                            foreach($errors as $error) {
                                echo "<p class='text-red-500'>$error</p>";
                            } 
                        }
                    ?>
                </div>
                <div>
                    <input type="submit" value="Login" class="btn-neutral btn btn-block"/>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include './components/footer.php';?>