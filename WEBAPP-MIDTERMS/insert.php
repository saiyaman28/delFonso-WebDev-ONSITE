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
        <form method="POST" action="database_operations/insert_database.php">
            <label for="flxroom">Room:</label>
            <select id="flxroom" name="flxroom">
                <option value="Techflip Learning Studio">Techflip Learning Studio</option>
                <option value="Capstone Confluence">Capstone Confluence</option>
                <option value="Development Prodigy Lab">Development Prodigy Lab</option>
                <option value="E-Sport Nexus Chamber">E-Sport Nexus Chamber</option>
                <option value="App Development Room">App Development Room</option>
                <option value="Cyber Conference Room">Cyber Conference Room</option>
                <option value="Multitech Fusion Laboratory">Multitech Fusion Laboratory</option>
                <option value="E-Music Innovate Workshop">E-Music Innovate Workshop</option>
                <option value="Tic-Tech Studio Creation">Tic-Tech Studio Creation</option>
            </select>

            <label for="resdate">Date:</label>
            <input type="date" id="resdate" name="resdate" required>
            <br><br>

            <label for="restime">Time:</label>
            <select id="restime" name="restime">
                <option value="8:00">8:00AM - 10:00AM</option>
                <option value="10:00">10:00AM - 12:00PM</option>
                <option value="13:00">1:00PM - 3:00PM</option>
                <option value="15:00">3:00PM - 5:00PM</option>
            </select>

            <label for="purpose">Purpose:</label>
            <select id="purpose" name="purpose">
                <option value="Taking Class">Taking Class</option>
                <option value="Meeting">Meeting</option>
                <option value="Event">Event</option>
                <option value="Defense">Defense</option>
                <option value="Others">Others</option>
            </select>

            <button class='btn btn-primary' type="submit">Reserve</button>
        </form>

        <br />

        <form action="reserve.php">
            <button class='btn btn-primary' type="submit">Back to Main Menu</button>
        </form>
    </div>

</body>

</html>
