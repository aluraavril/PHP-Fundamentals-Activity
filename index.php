<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>
<body>

    <h1>Fill in the input fields below</h1>

    <!-- Login Form -->
    <form action="handleForm.php" method="POST">
        <p>
            <label for="firstName">Username:</label>
            <input type="text" placeholder="First name here" name="firstName">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" placeholder="Password here" name="password">
        </p>
        <p><input type="submit" value="Submit" name="submitBtn"></p>
    </form>

    <!-- Always show logout button -->
    <form action="unset.php" method="POST">
        <button type="submit">Logout</button>
    </form>

    <!-- Display logged-in user's info if logged in -->
    <?php
    if (isset($_SESSION['firstName'])) {
        echo "<h2>User logged in: " . $_SESSION['firstName'] . "</h2>";
        echo "<h2>Password Hash: " . $_SESSION['password'] . "</h2>";
    }
    ?>

    <!-- Display error message if login is blocked, below the logout button -->
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']); // Clear the error message after displaying it
    }
    ?>

</body>
</html>
