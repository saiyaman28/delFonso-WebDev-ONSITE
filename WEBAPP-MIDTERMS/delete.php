<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE FLEX</title>
</head>
<body>
<?php
// This will automatically add the database in your MySQL Server.
include 'database_settings/database.php';

// Adding all the Web essentials.
include 'static/connector.php';
include '.header.html';
?>
    <br>
    <div class="container">
        <h1>FLEX CENTER</h1><br>
        <form method="POST" action="settings/delete_database.php">
            <label for="resid">Reserve ID:</label>
            <input type="text" id="resid" name="resid" required>

            <button class='btn btn-primary' type="submit">Submit</button>
        </form>

        <br />

        <form action="reserve.php">
            <button class='btn btn-primary' type="submit">Back to Main Menu</button>
        </form>
    </div>

</body>

</html>