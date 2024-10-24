<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "UPDATE recipes SET name='$name', description='$description', ingredients='$ingredients', instructions='$instructions' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM recipes WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Edit Recipe</title>
</head>
<body>
    <div class="edit-recipe-container">
        <h1 class="edit-recipe-title">
            <span class="material-icons">edit</span> Edit Recipe
        </h1>
        <p class="edit-recipe-description">Update the recipe details below.</p>

        <form method="POST" class="edit-recipe-form">
            <div class="edit-recipe-form-group">
                <label for="name" class="edit-recipe-label">
                    <span class="material-icons">label</span> Recipe Name
                </label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required class="edit-recipe-input">
            </div>
            <div class="edit-recipe-form-group">
                <label for="description" class="edit-recipe-label">
                    <span class="material-icons">description</span> Description
                </label>
                <textarea id="description" name="description" required class="edit-recipe-textarea"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="edit-recipe-form-group">
                <label for="ingredients" class="edit-recipe-label">
                    <span class="material-icons">list_alt</span> Ingredients
                </label>
                <textarea id="ingredients" name="ingredients" required class="edit-recipe-textarea"><?php echo $row['ingredients']; ?></textarea>
            </div>
            <div class="edit-recipe-form-group">
                <label for="instructions" class="edit-recipe-label">
                    <span class="material-icons">menu_book</span> Instructions
                </label>
                <textarea id="instructions" name="instructions" required class="edit-recipe-textarea"><?php echo $row['instructions']; ?></textarea>
            </div>
            <button type="submit" class="edit-recipe-btn-update">
                <span class="material-icons">save</span> Update Recipe
            </button>
        </form>
    </div>
</body>
</html>
