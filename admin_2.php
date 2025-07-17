<?php
include 'conn.php'; // DB connection

$msg = '';

if(isset($_POST['add_product'])){
    $name = $_POST['product_name'];
    $desc = $_POST['description'];
    $cat_id = $_POST['category_id'];
    $subcat_id = $_POST['subcategory_id'];
    $f1 = $_POST['feature_1'];
    $f2 = $_POST['feature_2'];
    $f3 = $_POST['feature_3'];
    $m1 = $_POST['material_1'];
    $m2 = $_POST['material_2'];
    $m3 = $_POST['material_3'];
    $show_allurs = isset($_POST['show_in_allurs']) ? 1 : 0;

    $productInsert = mysqli_query($conn, "INSERT INTO products 
        (name, description, category_id, subcategory_id, feature_1, feature_2, feature_3, material_1, material_2, material_3, show_in_allurs) 
        VALUES ('$name', '$desc', '$cat_id', '$subcat_id', '$f1', '$f2', '$f3', '$m1', '$m2', '$m3', '$show_allurs')");

    if($productInsert){
        $product_id = mysqli_insert_id($conn);
        $upload_dir = 'images/uploads/';

        $materials = ['gold', 'silver', 'platinum'];
        foreach($materials as $mat){
            for($i=1; $i<=3; $i++){
                $input_name = $mat . '_photo_' . $i;
                if(isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0){
                    $filename = time().'_'.$mat.'_'.$i.'_'.basename($_FILES[$input_name]['name']);
                    $filepath = $upload_dir . $filename;
                    if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $filepath)){
                        mysqli_query($conn, "INSERT INTO product_photos (product_id, photo_type, image_path) 
                            VALUES ($product_id, '".ucfirst($mat)."', '$filepath')");
                    }
                }
            }
        }

        if(isset($_FILES['modeling_photo']) && $_FILES['modeling_photo']['error'] == 0){
            $filename = time().'_modeling_'.basename($_FILES['modeling_photo']['name']);
            $filepath = $upload_dir . $filename;
            if(move_uploaded_file($_FILES['modeling_photo']['tmp_name'], $filepath)){
                mysqli_query($conn, "INSERT INTO product_photos (product_id, photo_type, image_path) 
                    VALUES ($product_id, 'Modeling', '$filepath')");
            }
        }

        $material = $_POST['price_material'];
        $karat = $_POST['price_karat'];
        $price = $_POST['price_value'];
        $sub_material = $_POST['price_sub_material'];

        mysqli_query($conn, "INSERT INTO product_prices_1 
            (product_id, material, karat, price, sub_material) VALUES 
            ($product_id, '$material', '$karat', '$price', '$sub_material')");

        $msg = "<p class='success'>Product Added Successfully!</p>";
    } else {
        $msg = "<p class='error'>Error Adding Product.</p>";
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");
$subcategories = mysqli_query($conn, "SELECT * FROM subcategories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        body { font-family: Arial; background: #f4f6f8; padding: 20px; }
        form { background: #fff; padding: 20px; max-width: 800px; margin: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2, h3, h4 { color: #333; }
        input[type="text"], input[type="number"], textarea, select {
            width: calc(100% - 22px); padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;
        }
        input[type="file"] { margin: 8px 0; }
        button { background: #007bff; color: #fff; padding: 10px 16px; border: none; border-radius: 4px; cursor: pointer; margin-top: 12px; }
        button:hover { background: #0056b3; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .hidden { display: none; }
        .photo-section { background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px; }
        .file-input-group { display: flex; gap: 10px; margin: 8px 0; }
        .file-input-group input[type="file"] { flex: 1; }
    </style>
</head>
<body>

<h2>Add Product Details, Photos & Price</h2>
<?= $msg; ?>

<form method="POST" enctype="multipart/form-data">
    <h3>Product Details</h3>
    <input type="text" name="product_name" placeholder="Product Name" required>
    <textarea name="description" placeholder="Description" required></textarea>

    <label>Category</label>
    <select name="category_id" required>
        <option value="">Select Category</option>
        <?php while($cat = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php } ?>
    </select>

    <label>Subcategory</label>
    <select name="subcategory_id" required>
        <option value="">Select Subcategory</option>
        <?php while($sub = mysqli_fetch_assoc($subcategories)) { ?>
            <option value="<?= $sub['id'] ?>"><?= $sub['name'] ?></option>
        <?php } ?>
    </select>

    <input type="text" name="feature_1" placeholder="Feature 1">
    <input type="text" name="feature_2" placeholder="Feature 2">
    <input type="text" name="feature_3" placeholder="Feature 3">

    <input type="text" name="material_1" placeholder="Material 1">
    <input type="text" name="material_2" placeholder="Material 2">
    <input type="text" name="material_3" placeholder="Material 3">

    <label><input type="checkbox" name="show_in_allurs"> Show in Allurs</label>

    <h3>Product Photos (3 for each material + 1 Modeling)</h3>

    <div class="photo-section">
        <h4>Gold Photos</h4>
        <div class="file-input-group">
            <input type="file" name="gold_photo_1" accept="image/*">
            <input type="file" name="gold_photo_2" accept="image/*">
            <input type="file" name="gold_photo_3" accept="image/*">
        </div>
    </div>

    <div class="photo-section">
        <h4>Silver Photos</h4>
        <div class="file-input-group">
            <input type="file" name="silver_photo_1" accept="image/*">
            <input type="file" name="silver_photo_2" accept="image/*">
            <input type="file" name="silver_photo_3" accept="image/*">
        </div>
    </div>

    <div class="photo-section">
        <h4>Platinum Photos</h4>
        <div class="file-input-group">
            <input type="file" name="platinum_photo_1" accept="image/*">
            <input type="file" name="platinum_photo_2" accept="image/*">
            <input type="file" name="platinum_photo_3" accept="image/*">
        </div>
    </div>

    <div class="photo-section">
        <h4>Modeling Photo</h4>
        <div class="file-input-group">
            <input type="file" name="modeling_photo" accept="image/*">
        </div>
    </div>

    <h3>Product Price</h3>

    <label>Material</label>
    <select name="price_material" id="price_material" onchange="toggleSubMaterial()" required>
        <option value="">Select Material</option>
        <option value="Gold">Gold</option>
        <option value="Silver">Silver</option>
        <option value="Platinum">Platinum</option>
    </select>

    <label>Karat</label>
    <select name="price_karat" required>
        <option value="">Select Karat</option>
        <option value="10k">10k</option>
        <option value="14k">14k</option>
        <option value="18k">18k</option>
        <option value="22k">22k</option>
        <option value="24k">24k</option>
    </select>

    <label>Price</label>
    <input type="number" name="price_value" placeholder="Enter Price" required>

    <div id="sub_material_section" class="hidden">
        <label>Sub Material (For Gold Only)</label>
        <select name="price_sub_material">
            <option value="">Select Sub Material</option>
            <option value="Rose">Rose</option>
            <option value="Yellow">Yellow</option>
            <option value="White">White</option>
        </select>
    </div>

    <button type="submit" name="add_product">Add Product</button>
</form>

<script>
function toggleSubMaterial() {
    var material = document.getElementById('price_material').value;
    var subMaterialSection = document.getElementById('sub_material_section');
    if(material === 'Gold') {
        subMaterialSection.classList.remove('hidden');
    } else {
        subMaterialSection.classList.add('hidden');
    }
}
</script>

</body>
</html>
