<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'std_db';
$connect = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get required fields
$query = "SELECT StudentID, FirstName, LastName, Height FROM students";
$result = mysqli_query($connect, $query);

// Display results
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Student List</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Height (cm)</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['StudentID'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Height'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No student records found.";
}

mysqli_close($connect);
?>
