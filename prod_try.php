<?php
include ('header.php');
include ('conn.php');
?>

<section class="flat-spacing-4 pt_0">
    
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                 
<?php
// DB Connection


// Product ID from URL
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Fetch product name
$product_name = '';
$product_result = $conn->query("SELECT name FROM products WHERE id = $product_id");
if ($product_result && $product_result->num_rows > 0) {
    $product_name = $product_result->fetch_assoc()['name'];
}

// Fetch images
$image_result = $conn->query("SELECT image_path FROM product_photos WHERE product_id = $product_id");
$images = [];
while ($row = $image_result->fetch_assoc()) {
    $images[] = $row['image_path'];
} 

// Fetch materials and prices
$material_result = $conn->query("SELECT material_type, price FROM product_prices WHERE product_id = $product_id");
$materials = [];
while ($row = $material_result->fetch_assoc()) {
    $materials[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <style>
        .color-btn {
            display: inline-block;
            padding: 10px;
            margin: 4px;
            border: 1px solid #ddd;
            cursor: pointer;
        }
        .btn-checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            background: gray;
            border-radius: 50%;
        }
        .tooltip {
            display: block;
            font-size: 12px;
            margin-top: 4px;
        }
        .price-on-sale {
            font-size: 20px;
            color: #e91e63;
        }
    </style>
    <script>
        function updatePrice(price, materialName) {
            document.getElementById("productPrice").innerText = "$" + parseFloat(price).toFixed(2);
            document.getElementById("selectedMaterial").innerText = materialName;
        }
    </script>
</head>
<body>

<div class="col-md-6">
    <div class="tf-product-info-wrap position-relative">

        <!-- Image Display -->
        <div class="tf-zoom-main">
            <?php foreach ($images as $img): ?>
                <img src="<?= $img ?>" alt="Product Image" width="100" style="margin:10px;" />
            <?php endforeach; ?>
        </div>

        <div class="tf-product-info-list other-image-zoom">
            <!-- Product Title -->
            <div class="tf-product-info-title">
                <h5><?= htmlspecialchars($product_name) ?></h5>
            </div>

            <!-- Price Display -->
            <div class="tf-product-info-price">
                <div class="price-on-sale" id="productPrice">
                    $<?= isset($materials[0]) ? number_format($materials[0]['price'], 2) : '0.00' ?>
                </div>
            </div>

            <!-- Material Picker -->
            <div class="tf-product-info-variant-picker">
                <div class="variant-picker-item">
                    <div class="variant-picker-label">
                        Material: <span id="selectedMaterial" class="fw-6 variant-picker-label-value value-currentColor">
                            <?= ucwords(str_replace('_', ' ', $materials[0]['material_type'] ?? 'N/A')) ?>
                        </span>
                    </div>
                    <div class="variant-picker-values">
                        <?php foreach ($materials as $index => $material): ?>
                            <?php
                                $matId = "mat" . $index;
                                $matName = ucwords(str_replace("_", " ", $material['material_type']));
                            ?>
                            <input type="radio" name="material" id="<?= $matId ?>" <?= $index === 0 ? 'checked' : '' ?> hidden>
                            <label class="hover-tooltip radius-60 color-btn"
                                   for="<?= $matId ?>"
                                   onclick="updatePrice('<?= $material['price'] ?>', '<?= $matName ?>')">
                                <span class="btn-checkbox"></span>
                                <span class="tooltip"><?= $matName ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

                        </div>
                    </div>
                </div>
            </div>
            <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Additional Information</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                            Button-up shirt sleeves and a relaxed silhouette. It’s tailored with drapey,
                                            crinkle-texture fabric that’s made from LENZING™ ECOVERO™ Viscose —
                                            responsibly
                                            sourced wood-based
                                            fibres produced through a process that reduces impact on forests,
                                            biodiversity and
                                            water supply.
                                        </p>
                                        <div class="tf-product-des-demo">
                                            <div class="right">
                                                <h3 class="fs-16 fw-5">Features</h3>
                                                <ul>
                                                    <li>Front button placket</li>
                                                    <li> Adjustable sleeve tabs</li>
                                                    <li>Babaton embroidered crest at placket and hem</li>
                                                </ul>
                                                <h3 class="fs-16 fw-5">Materials Care</h3>
                                                <ul class="mb-0">
                                                    <li>Content: 100% LENZING™ ECOVERO™ Viscose</li>
                                                    <li>Care: Hand wash</li>
                                                    <li>Imported</li>
                                                    <li>Imported</li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <table class="tf-pr-attrs">
                                        <tbody>
                                            <tr class="tf-attr-pa-color">
                                                <th class="tf-attr-label">Color</th>
                                                <td class="tf-attr-value">
                                                    <p>White, Pink, Black</p>
                                                </td>
                                            </tr>
                                            <tr class="tf-attr-pa-size">
                                                <th class="tf-attr-label">Size</th>
                                                <td class="tf-attr-value">
                                                    <p>S, M, L, XL</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->

        <!-- product -->
        <section class="flat-spacing-1 pt_0">
            <div class="container">
                <div class="flat-title">
                    <span class="title">People Also Bought</span>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
                        data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                        data-pagination-lg="3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/orange-1.jpg"
                                                src="images/products/orange-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/white-1.jpg"
                                                src="images/products/white-1.jpg" alt="image-product">
                                        </a>
                                        
                                        
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="images/products/orange-1.jpg"
                                                    src="images/products/orange-1.jpg" alt="image-product">
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                            class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-product justify-content-center"></div>
                </div>
            </div>
        </section>
        
<?php

include('footer.php')
?>