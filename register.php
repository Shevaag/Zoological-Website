<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | ZooPark</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="header3">
    <a href="#" class="logo"><i class="fa fa-linux"></i> Zoo Park</a>
        <nav class="navbar">
            <a href="index.html#home">Home</a>
        </nav>
    </header>

    <section class="register">
        <h2 class="heading">Register</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Retrieves data from the form fields.
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Check if passwords match
            if ($password !== $confirm_password) {
                echo "<p style='color:red;'>Passwords do not match.</p>";
            } else {
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'zoopark');

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //This ensures that the password is securely stored.
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the data into the database
                $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color:green;'>Registration successful! </p>";
                } else {
                    echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                // Close the connection
                $conn->close();
            }
        }
        ?>
        <form action="register.php" method="POST">
            <div class="inputbox">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="inputbox">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </section>

</body>
</html>
