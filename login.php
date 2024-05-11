<?php
    include("be/auth.php");
    checkHasNoAccess();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Coffee Shop Inventaris</title>
</head>
<body>
    <h1>Admin</h1>
    <form action="be/auth.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="button">Sign In</button>
    </form>
</body>
</html>