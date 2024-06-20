<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        /* Styles for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #66CAFF;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        /* Styles for the container */
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            border-radius: 8px;
        }
        /* Styles for the heading */
        h1 {
            color: #333;
            text-align: center;
        }
        /* Styles for paragraphs */
        p {
            color: #555;
            font-size: 1.1em;
        }
        /* Styles for the back link container */
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        /* Styles for the back link */
        .back-link a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        /* Styles for back link hover state */
        .back-link a:hover {
            text-decoration: underline;
        }
        /* Styles for the footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Details</h1>

    <br>

    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";

    // Create connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Get the student ID from the URL

        // SQL query to select student details by ID
        $sql = "SELECT name, department, subject FROM students WHERE id=$id";
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Fetch the details and display them
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>Department:</strong> " . $row["department"] . "</p>";
                echo "<p><strong>Subject:</strong> " . $row["subject"] . "</p>";
            }
        } else {
            echo "0 results"; // No results found
        }
    } else {
        echo "Invalid ID"; // No ID parameter in URL
    }

    // Close the database connection
    $conn->close();
    ?>

    <br>

    <div class="back-link">
        <a href="index.php">Back to Student List</a>
    </div>

    <br>

</div>

<footer>
    &copy; JUNE MAPAGMAHAL
</footer>

</body>
</html>
