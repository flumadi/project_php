<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $sql = "SELECT * FROM resources WHERE title LIKE '%$search%' OR content LIKE '%$search%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Title: " . $row['title'] . "<br>";
            echo "Content: " . $row['content'] . "<br><br>";
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Data</title>
</head>
<body>
    <form method="post" action="search.php">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" required>
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>
