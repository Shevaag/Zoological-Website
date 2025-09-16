<?php
session_start();
require 'db_connection.php';

// Check if the user is logged in for admin purposes
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

// Handle event addition, update, and deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_event'])) {
        $eventTitle = $_POST['eventTitle'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventLocation = $_POST['eventLocation'];
        $eventDescription = $_POST['eventDescription'];

        $stmt = $conn->prepare("INSERT INTO events (title, date, time, location, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $eventTitle, $eventDate, $eventTime, $eventLocation, $eventDescription);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Event \"$eventTitle\" on \"$eventDate\" added successfully!');</script>";
    } elseif (isset($_POST['update_event'])) {
        $eventId = $_POST['eventId'];
        $eventTitle = $_POST['eventTitle'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventLocation = $_POST['eventLocation'];
        $eventDescription = $_POST['eventDescription'];

        $stmt = $conn->prepare("UPDATE events SET title=?, date=?, time=?, location=?, description=? WHERE id=?");
        $stmt->bind_param("sssssi", $eventTitle, $eventDate, $eventTime, $eventLocation, $eventDescription, $eventId);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Event updated successfully!');</script>";
    }
}

if (isset($_GET['delete'])) {
    $eventId = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM events WHERE id=?");
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $stmt->close();
    header("Location: event.php"); // Redirect to avoid resubmission
    exit;
}

// Retrieve existing events for display
$result = $conn->query("SELECT * FROM events");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management | ZooPark</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="event-management">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <nav class="navbar">
        <a href="index.html">Home</a>
    </nav>

    <!-- Add Event Form -->
    <h3>Add a New Event</h3>
    <form action="event.php" method="post">
        <label for="eventTitle">Event Title:</label>
        <input type="text" name="eventTitle" id="eventTitle" required><br>

        <label for="eventDate">Event Date:</label>
        <input type="date" name="eventDate" id="eventDate" required><br>

        <label for="eventTime">Event Time:</label>
        <input type="time" name="eventTime" id="eventTime"><br>

        <label for="eventLocation">Event Location:</label>
        <input type="text" name="eventLocation" id="eventLocation"><br>

        <label for="eventDescription">Event Description:</label>
        <textarea name="eventDescription" id="eventDescription" required></textarea><br>

        <input type="submit" name="add_event" value="Add Event">
    </form>

    <!-- Existing Events -->
    <h3>Existing Events</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['time']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td>
                    <a href="event.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="event.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Handle event editing
    if (isset($_GET['edit'])) {
        $eventId = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM events WHERE id=?");
        $stmt->bind_param("i", $eventId);
        $stmt->execute();
        $event = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    ?>
    <h3>Edit Event</h3>
    <form action="event.php" method="post">
        <input type="hidden" name="eventId" value="<?php echo $event['id']; ?>">

        <label for="eventTitle">Event Title:</label>
        <input type="text" name="eventTitle" id="eventTitle" value="<?php echo htmlspecialchars($event['title']); ?>" required><br>

        <label for="eventDate">Event Date:</label>
        <input type="date" name="eventDate" id="eventDate" value="<?php echo htmlspecialchars($event['date']); ?>" required><br>

        <label for="eventTime">Event Time:</label>
        <input type="time" name="eventTime" id="eventTime" value="<?php echo htmlspecialchars($event['time']); ?>"><br>

        <label for="eventLocation">Event Location:</label>
        <input type="text" name="eventLocation" id="eventLocation" value="<?php echo htmlspecialchars($event['location']); ?>"><br>

        <label for="eventDescription">Event Description:</label>
        <textarea name="eventDescription" id="eventDescription" required><?php echo htmlspecialchars($event['description']); ?></textarea><br>

        <input type="submit" name="update_event" value="Update Event">
    </form>
    <?php } ?>

</body>
</html>
