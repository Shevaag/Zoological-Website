<?php
// Connect to the database
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "zoopark"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT title, date, time, location, description FROM events ORDER BY date";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | ZooPark</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header2">
        <a href="#" class="logo"><i class="fa fa-linux"></i> Zoo Park</a>
        <nav class="navbar">
            <a href="index.html">Home</a>
        </nav>
    </header>
    
    <section class="events">
        <h2 class="heading">Upcoming Events</h2>
        <div class="events-container">

    <!-- Search Bar -->
    <input type="text" id="eventSearch" placeholder="Search for events..." onkeyup="searchEvents()">

            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='event-box'>";
                    echo "<h3 class='event-title'>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>";
                    echo "<p><strong>Time:</strong> " . htmlspecialchars($row['time']) . "</p>";
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p class='event-description'><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No events found.</p>";
            }
            ?>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
