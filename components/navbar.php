<?php include "./components/head.php" ?>

<div class="navbar bg-base-100">
  <div class="flex-1">
    <?php 
    if (!Validator::Role()) { 
      echo '<a href="/login" class="btn btn-ghost mr-3">Login</a>
            <a href="/register" class="btn btn-ghost mr-3">Register</a>';
    }else if(Validator::Role('USER') || Validator::Role('WORKER')) {
      echo '
      <a href="/dashboard" class="btn btn-ghost mr-3">Dashboard</a>
      <a href="/inventory" class="btn btn-ghost mr-3">Inventory</a>
      <a href="/products/add" class="btn btn-ghost mr-3">Add Products</a>
      <a href="/orders" class="btn btn-ghost mr-3">Orders</a>';
    }else if(Validator::Role('ADMIN')) {
     echo '
      <a href="/dashboard" class="btn btn-ghost mr-3">Dashboard</a>
      <a href="/inventory" class="btn btn-ghost mr-3">Inventory</a>
      <a href="/products/add" class="btn btn-ghost mr-3">Add Products</a>
      <a href="/orders" class="btn btn-ghost mr-3">Orders</a>
      <a href="/admin" class="btn btn-ghost mr-3">Admin</a>';
   }
   ?> 
  </div>
</div>