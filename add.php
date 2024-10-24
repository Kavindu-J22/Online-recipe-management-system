<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO recipes (name, description, ingredients, instructions) VALUES ('$name', '$description', '$ingredients', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Add New Recipe</title>
</head>
<body>
    <div class="recipe-add-container">
        <h1 class="recipe-add-title">
            <span class="material-icons">restaurant_menu</span> Add a New Recipe
        </h1>
        <p class="recipe-add-description">Fill in the details below to publish a delicious new recipe.</p>

        <form method="POST" class="recipe-form">
            <div class="recipe-form-group">
                <label for="name" class="recipe-label">
                    <span class="material-icons">label</span> Recipe Name
                </label>
                <input type="text" id="name" name="name" placeholder="Enter recipe name" required class="recipe-input">
            </div>
            <div class="recipe-form-group">
                <label for="description" class="recipe-label">
                    <span class="material-icons">description</span> Description
                </label>
                <textarea id="description" name="description" placeholder="Enter description" required class="recipe-textarea"></textarea>
            </div>
            <div class="recipe-form-group">
                <label for="ingredients" class="recipe-label">
                    <span class="material-icons">list_alt</span> Ingredients
                </label>
                <textarea id="ingredients" name="ingredients" placeholder="List the ingredients" required class="recipe-textarea"></textarea>
            </div>
            <div class="recipe-form-group">
                <label for="instructions" class="recipe-label">
                    <span class="material-icons">menu_book</span> Instructions
                </label>
                <textarea id="instructions" name="instructions" placeholder="Enter cooking instructions" required class="recipe-textarea"></textarea>
            </div>
            <button type="submit" class="recipe-btn-submit">
                <span class="material-icons">send</span> Publish Recipe
            </button>
        </form>
    </div>
</body>
</html>
