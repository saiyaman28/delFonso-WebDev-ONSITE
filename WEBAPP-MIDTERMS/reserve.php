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

echo "
<br>
<div class='container'>
    <h1>Welcome to THE FLEX</h1>
    <br>
    <ul>
        <li><a href='insert.php'>RESERVE A ROOM</a></li>
        <li><a href='delete.php'>CANCEL RESERVATION</a></li>
    </ul>
</div>
";



?>
</body>
</html>