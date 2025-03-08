<?php include "./components/head.php" ?>

<div class="navbar bg-base-100">
  <div class="flex-1">
  <a href="/login" class="btn btn-ghost mr-3">Login</a>
  <a href="/register" class="btn btn-ghost mr-3">Register</a>
    <?php 
    if (!Validator::Role() && $_SERVER['REQUEST_URI'] !== '/login') { 
      header("Location: /login");
      exit();
    } else if (Validator::Role()) {
      echo '
      <a href="/dashboard" class="btn btn-ghost mr-3">Dashboard</a>
      <a href="/inventory" class="btn btn-ghost mr-3">Inventory</a>
      <a href="/products/add" class="btn btn-ghost mr-3">Add Products</a>
      <a href="/orders" class="btn btn-ghost mr-3">Orders</a>';
    }
   ?> 
  </div>
</div>