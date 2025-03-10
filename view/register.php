<?php include './components/head.php'; ?>
<?php include './components/navbar.php'; ?>
    <section>
        <div class="relative flex flex-col justify-center h-screen overflow-hidden">
            <div class="w-full p-6 m-auto bg-base-200 rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-lg">
                <h1 class="text-3xl font-semibold text-center">Create an Account</h1>


                <form action="/register/process" method="POST" class="space-y-4">
                    <div>
                        <label class="label">
                            <span class="text-base label-text">Username</span>
                        </label>
                        <input type="text"
                               name="username"
                               id="username"
                               placeholder="username"
                               class="w-full input input-bordered"
                               required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="text-base label-text">Password</span>
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               placeholder="Enter Password"
                               class="w-full input input-bordered"
                               required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="text-base label-text">Confirm Password</span>
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Confirm Password"
                               class="w-full input input-bordered"
                               required />
                    </div>

                    <!-- Error display section -->
                    <div>
                        <?php
                        // Check for errors directly passed to the view
                        if (isset($errors)) {
                            foreach ($errors as $error) {
                                echo "<p class='text-red-500'>$error</p>";
                            }
                        }

                        // Also check for errors in session
                        if (isset($_SESSION['registration_errors'])) {
                            foreach ($_SESSION['registration_errors'] as $error) {
                                echo "<p class='text-red-500'>$error</p>";
                            }
                            // Clear the errors after displaying them
                            unset($_SESSION['registration_errors']);
                        }
                        ?>
                    </div>

                    <div>
                        <input type="submit" value="Register" class="btn-neutral btn btn-block" />
                    </div>
                    <div class="text-center">
                        <p>Already have an account? <a href="/login" class="text-blue-500 hover:text-blue-700">Login here</a></p>
                    </div>
                </form>

            </div>
        </div>
    </section>
<?php include './components/footer.php'; ?>