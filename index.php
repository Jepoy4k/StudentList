<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
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
        /* Remove list style and padding from ul */
        ul {
            list-style-type: none;
            padding: 0;
        }
        /* Styles for the list items */
        li {
            background: #e3e3e3;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        /* Styles for the links */
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        /* Styles for link hover state */
        a:hover {
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
    <h1>Student List</h1>

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

    // SQL query to select all students
    $sql = "SELECT id, name FROM students";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        echo "<ul>"; // Start unordered list
        // Fetch each row and output a list item with a link to student.php
        while($row = $result->fetch_assoc()) {
            echo "<li><a href='student.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></li>";
        }
        echo "</ul>"; // End unordered list
    } else {
        echo "0 results"; // No results found
    }
    // Close the database connection
    $conn->close();
    ?>
</div>

<footer>
    &copy; JUNE MAPAGMAHAL
</footer>

</body>
</html>
