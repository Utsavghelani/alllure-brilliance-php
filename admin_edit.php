<?php
include 'conn.php';

// Fetch product list
$product_list = mysqli_query($conn, "SELECT id, name FROM products");

$product = [
    'id'=>'', 'name'=>'', 'description'=>'', 'category_id'=>'', 'subcategory_id'=>'',
    'feature_1'=>'', 'feature_2'=>'', 'feature_3'=>'',
    'material_1'=>'', 'material_2'=>'', 'material_3'=>'', 'show_in_allurs'=>0
];
$product_prices = [];
$product_photos = [];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
    $price_query = mysqli_query($conn, "SELECT * FROM product_prices_1 WHERE product_id=$id");
    while($row = mysqli_fetch_assoc($price_query)){
        $product_prices[] = $row;
    }
    $photo_query = mysqli_query($conn, "SELECT * FROM product_photos WHERE product_id=$id");
    while($row = mysqli_fetch_assoc($photo_query)){
        $product_photos[] = $row;
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");
$subcategories = mysqli_query($conn, "SELECT * FROM subcategories");

// Update Product
if(isset($_POST['update_product'])){
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $desc = $_POST['description'];
    $cat_id = $_POST['category_id'];
    $subcat_id = $_POST['subcategory_id'];
    $f1 = $_POST['feature_1']; $f2 = $_POST['feature_2']; $f3 = $_POST['feature_3'];
    $mat1 = $_POST['material_1']; $mat2 = $_POST['material_2']; $mat3 = $_POST['material_3'];
    $allurs = isset($_POST['show_in_allurs']) ? 1 : 0;

    mysqli_query($conn, "UPDATE products SET name='$name', description='$desc', category_id='$cat_id',
        subcategory_id='$subcat_id', feature_1='$f1', feature_2='$f2', feature_3='$f3',
        material_1='$mat1', material_2='$mat2', material_3='$mat3', show_in_allurs='$allurs' WHERE id=$id");

    foreach($_POST['price_ids'] as $key=>$price_id){
        $mat = $_POST['materials'][$key];
        $karat = $_POST['karats'][$key];
        $price_val = $_POST['prices'][$key];
        $sub_mat = $_POST['sub_materials'][$key];
        mysqli_query($conn, "UPDATE product_prices_1 SET material='$mat', karat='$karat', price='$price_val', sub_material='$sub_mat' WHERE id=$price_id");
    }

    // Image Upload
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        if ($tmpName) {
            $photo_id = $_POST['photo_ids'][$index];
            $photo_type = $_POST['photo_types'][$index];
            $filename = time().'_'.$photo_type.'_'.$_FILES['images']['name'][$index];
            $path = 'images/uploads/'.$filename; // your upload folder
            move_uploaded_file($tmpName, $path);
            mysqli_query($conn, "UPDATE product_photos SET image_path='$path' WHERE id=$photo_id");
        }
    }

    echo "<script>alert('Product Updated Successfully!');location.href='admin_edit.php?id=$id';</script>";
}

// Delete Product
if(isset($_POST['delete_product'])){
    $id = $_POST['product_id'];
    mysqli_query($conn, "DELETE FROM product_photos WHERE product_id=$id");
    mysqli_query($conn, "DELETE FROM product_prices_1 WHERE product_id=$id");
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    echo "<script>alert('Product Deleted Successfully!');location.href='edit.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            padding: 30px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .section {
            background: #fff;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
        }
        input[type=text], textarea, select, input[type=number] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .price-row, .photo-row {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: #fafafa;
        }
        button {
            padding: 10px 18px;
            border: none;
            background: #3498db;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #2980b9;
        }
        img {
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>Edit Product</h2>

<form method="GET">
    <label>Select Product to Edit:</label>
    <select name="id" onchange="this.form.submit()">
        <option value="">-- Select Product --</option>
        <?php while($prod = mysqli_fetch_assoc($product_list)) { ?>
            <option value="<?= $prod['id'] ?>" <?= (isset($_GET['id']) && $_GET['id'] == $prod['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($prod['name']) ?>
            </option>
        <?php } ?>
    </select>
</form>

<?php if(isset($_GET['id'])) { ?>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <div class="section">
        <label>Product Name:</label>
        <input type="text" name="product_name" value="<?= $product['name'] ?>" required>
        <label>Description:</label>
        <textarea name="description"><?= $product['description'] ?></textarea>
        <label>Category:</label>
        <select name="category_id">
            <?php mysqli_data_seek($categories, 0); while($cat = mysqli_fetch_assoc($categories)) { ?>
                <option value="<?= $cat['id'] ?>" <?= ($cat['id']==$product['category_id'])?'selected':'' ?>><?= $cat['name'] ?></option>
            <?php } ?>
        </select>
        <label>Subcategory:</label>
        <select name="subcategory_id">
            <?php mysqli_data_seek($subcategories, 0); while($sub = mysqli_fetch_assoc($subcategories)) { ?>
                <option value="<?= $sub['id'] ?>" <?= ($sub['id']==$product['subcategory_id'])?'selected':'' ?>><?= $sub['name'] ?></option>
            <?php } ?>
        </select>
        <label>Feature 1:</label><input type="text" name="feature_1" value="<?= $product['feature_1'] ?>">
        <label>Feature 2:</label><input type="text" name="feature_2" value="<?= $product['feature_2'] ?>">
        <label>Feature 3:</label><input type="text" name="feature_3" value="<?= $product['feature_3'] ?>">
        <label>Material 1:</label><input type="text" name="material_1" value="<?= $product['material_1'] ?>">
        <label>Material 2:</label><input type="text" name="material_2" value="<?= $product['material_2'] ?>">
        <label>Material 3:</label><input type="text" name="material_3" value="<?= $product['material_3'] ?>">
        <label>Show in Allurs:</label><input type="checkbox" name="show_in_allurs" <?= ($product['show_in_allurs'])?'checked':'' ?>>
    </div>

    <div class="section">
        <h3>Product Prices:</h3>
        <?php foreach($product_prices as $key=>$p) { ?>
        <div class="price-row">
            <input type="hidden" name="price_ids[]" value="<?= $p['id'] ?>">
            <label>Material:</label>
            <select name="materials[]" class="material-select">
                <option value="Gold" <?= ($p['material']=='Gold')?'selected':'' ?>>Gold</option>
                <option value="Silver" <?= ($p['material']=='Silver')?'selected':'' ?>>Silver</option>
                <option value="Platinum" <?= ($p['material']=='Platinum')?'selected':'' ?>>Platinum</option>
            </select>

            <label>Karat:</label>
            <select name="karats[]" class="karat-select">
                <option value="">--Select Karat--</option>
                <?php $karats = ['10k','14k','18k','22k','24k'];
                foreach($karats as $k){
                    echo "<option value='$k' ".(($p['karat']==$k)?'selected':'').">$k</option>";
                } ?>
            </select>

            <label>Price:</label>
            <input type="number" name="prices[]" value="<?= $p['price'] ?>">

            <label>Sub Material:</label>
            <select name="sub_materials[]" class="submat-select">
                <option value="">--Select Sub Material--</option>
                <option value="Rose" <?= ($p['sub_material']=='Rose')?'selected':'' ?>>Rose</option>
                <option value="Yellow" <?= ($p['sub_material']=='Yellow')?'selected':'' ?>>Yellow</option>
                <option value="White" <?= ($p['sub_material']=='White')?'selected':'' ?>>White</option>
            </select>
        </div>
        <?php } ?>
    </div>

    <div class="section">
        <h3>Product Images:</h3>
        <?php foreach($product_photos as $key=>$photo) { ?>
        <div class="photo-row">
            <input type="hidden" name="photo_ids[]" value="<?= $photo['id'] ?>">
            <input type="hidden" name="photo_types[]" value="<?= $photo['photo_type'] ?>">
            <label><?= $photo['photo_type'] ?>:</label>
            <img src="<?= $photo['image_path'] ?>" width="100"><br>
            <input type="file" name="images[]">
        </div>
        <?php } ?>
    </div>

    <button type="submit" name="update_product">Update Product</button>
    <button type="submit" name="delete_product" onclick="return confirm('Are you sure to delete this product?')">Delete Product</button>
</form>
<?php } ?>

<script>
    document.querySelectorAll('.material-select').forEach(function(sel, index){
        sel.addEventListener('change', function(){
            var karat = document.querySelectorAll('.karat-select')[index];
            var submat = document.querySelectorAll('.submat-select')[index];
            if(this.value === 'Gold'){
                karat.style.display = 'inline-block';
                submat.style.display = 'inline-block';
            } else {
                karat.style.display = 'none';
                submat.style.display = 'none';
            }
        });
        sel.dispatchEvent(new Event('change'));
    });
</script>

</body>
</html>
