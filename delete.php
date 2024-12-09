<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM resources WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Data</title>
</head>
<body>
    <form method="post" action="delete.php">
        <label for="id">ID of Record to Delete:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
