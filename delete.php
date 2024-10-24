<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM recipes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
