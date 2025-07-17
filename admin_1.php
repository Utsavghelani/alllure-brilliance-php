<?php
include 'conn.php'; // DB connection

$msg = ''; // Message holder

// Handle Category Insert
if(isset($_POST['add_category'])){
    $name = $_POST['category_name'];
    if(mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')")){
        $msg = "<p class='success'>Category added successfully!</p>";
    } else {
        $msg = "<p class='error'>Error adding category.</p>";
    }
}

// Handle Subcategory Insert
if(isset($_POST['add_subcategory'])){
    $name = $_POST['subcategory_name'];
    $category_id = $_POST['parent_category'];
    if(mysqli_query($conn, "INSERT INTO subcategories (category_id, name) VALUES ('$category_id', '$name')")){
        $msg = "<p class='success'>Subcategory added successfully!</p>";
    } else {
        $msg = "<p class='error'>Error adding subcategory.</p>";
    }
}

// Fetch Categories for dropdown
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Category & Subcategory Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            padding: 20px;
        }
        h2 {
            color: #333;
            margin-top: 30px;
        }
        form {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            margin-bottom: 20px;
        }
        input[type="text"], select {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #218838;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Add Category & Subcategory</h2>

<?= $msg; ?>

<h3>Add Category</h3>
<form method="POST">
    <input type="text" name="category_name" placeholder="Category Name" required>
    <button type="submit" name="add_category">Add Category</button>
</form>

<h3>Add Subcategory</h3>
<form method="POST">
    <select name="parent_category" required>
        <option value="">Select Category</option>
        <?php while($row = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select>
    <input type="text" name="subcategory_name" placeholder="Subcategory Name" required>
    <button type="submit" name="add_subcategory">Add Subcategory</button>
</form>

</body>
</html>
