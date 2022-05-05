<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['email']; ?>. You are logged in.

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Logout</a>
<?php if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) : ?>
<div>
   <a href="panel.php">Admin Panel</a>
</div>
   <?php endif; ?>