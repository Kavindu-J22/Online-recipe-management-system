<?php
include 'config.php';

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Recipe Management System</title>
</head>
<body>
    <div class="container">
        <h1>🍳 Recipe Management System</h1>
        <p class="intro-text">Manage your favorite recipes with ease. Add, edit, or remove recipes at the click of a button.</p>
        <a href="add.php" class="btn btn-add">
            <span class="material-icons">add_circle</span> Add New Recipe
        </a>
        
        <div class="recipe-grid">
            <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="recipe-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeAAKn8KV-J8t-wnBz4y1whEnMyi1gx5vHSA&s" alt="Recipe Image" class="recipe-img">
                <div class="recipe-content">
                    <h2><?php echo $row['name']; ?></h2>
                    <p class="description"><strong>Description:</strong> <?php echo $row['description']; ?></p>
                    <p class="ingredients"><strong>Ingredients:</strong> <?php echo nl2br($row['ingredients']); ?></p>
                    <p class="instructions"><strong>Instructions:</strong> <?php echo nl2br($row['instructions']); ?></p>
                </div>
                <div class="card-actions">
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">
                        <span class="material-icons">edit</span> Edit
                    </a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">
                        <span class="material-icons">delete</span> Delete
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
