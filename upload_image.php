<?php
include('conn.php');

// Example: Assuming product_id and photo_type come from a form
$product_id = $_POST['product_id']; // e.g., 1
$photo_type = $_POST['photo_type']; // 'thumb' or 'main'

if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    $filename = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $filename;

    // Move uploaded file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // Insert path into DB
        $sql = "INSERT INTO product_photos (product_id, photo_type, image_path) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$product_id, $photo_type, $target_file]);
        echo "Image uploaded and path saved to database.";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file selected.";
}
?>