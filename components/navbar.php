<?php include "./components/head.php" ?>

<div class="navbar bg-base-100">
  <div class="flex-1">
    <?php
    if (!Validator::Role()) {
      echo '<a href="/login" class="btn btn-ghost mr-3">Login</a>
            <a href="/register" class="btn btn-ghost mr-3">Register</a>';
    } else if (Validator::Role('USER') || Validator::Role('WORKER')) {
      echo '
      <a href="/dashboard" class="btn btn-ghost mr-3">Dashboard</a>
      <a href="/inventory" class="btn btn-ghost mr-3">Inventory</a>
      <a href="/products/add" class="btn btn-ghost mr-3">Add Products</a>
      <a href="/report" class="btn btn-ghost mr-3">Report</a>
      <a href="/logs" class="btn btn-ghost mr-3">Logs</a>
      <a href="/logout" class="btn btn-ghost mr-3">Logout</a>';
    } else if (Validator::Role('ADMIN')) {
      echo '
      <a href="/dashboard" class="btn btn-ghost mr-3">Dashboard</a>
      <a href="/inventory" class="btn btn-ghost mr-3">Inventory</a>
      <a href="/products/add" class="btn btn-ghost mr-3">Add Products</a>
      <a href="/logs" class="btn btn-ghost mr-3">Logs</a>
      <a href="/admin" class="btn btn-ghost mr-3">Admin</a>
      <a href="/logout" class="btn btn-ghost mr-3">Logout</a>';
    }
    ?>
  </div>
</div>