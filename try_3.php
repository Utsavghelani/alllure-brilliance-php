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
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM product_photos WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $images = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $images[] = $row['image_path'];
        }
    } else {
        echo "<p style='color:red;'>No images found for this Product ID.</p>";
    }

    $stmt->close();

    // Fetch materials




} else {
    echo "<p style='color:red;'>Product ID is not set or invalid.</p>";
}





?>


<!-- Thumbnails Swiper (Left side small images) -->
<div class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
    <div class="swiper-wrapper stagger-wrap">
        <?php if(!empty($images)): ?>
            <?php foreach($images as $img): ?>
                <div class="swiper-slide stagger-item">
                    <div class="item">
                        <img class="lazyload" src="<?php echo htmlspecialchars($img); ?>" alt="thumb-product" style="width:80px; height:auto;">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>


<!-- Main Swiper (Big right side image) -->
<div class="swiper tf-product-media-main" id="gallery-swiper-started">
    <div class="swiper-wrapper">
        <?php if(!empty($images)): ?>
            <?php foreach($images as $img): ?>
                <div class="swiper-slide">
                    <a href="<?php echo htmlspecialchars($img); ?>" class="item">
                        <img src="<?php echo htmlspecialchars($img); ?>" alt="main-product" style="width:900px;">
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-title">
                                        <h5>
                                        <?php 
                                        $product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

                                            // Fetch product name
                                            $stmtName = $conn->prepare("SELECT name FROM products WHERE id = ?");
                                            $stmtName->bind_param("i", $product_id);
                                            $stmtName->execute();
                                            $resultName = $stmtName->get_result();
                                            $productName = $resultName->fetch_assoc()['name'] ?? "Product";
                                            $stmtName->close();
                                            echo htmlspecialchars($productName);

                                            // Fetch product prices (gold with karat & sub_material, silver/platinum plain)
                                            $stmtPrice = $conn->prepare("SELECT material, karat, sub_material, price FROM product_prices_1 WHERE product_id = ?");
                                            $stmtPrice->bind_param("i", $product_id);
                                            $stmtPrice->execute();
                                            $resultPrice = $stmtPrice->get_result();

                                            $prices = [];
                                            while ($row = $resultPrice->fetch_assoc()) {
                                                if ($row['material'] === 'gold') {
                                                    $key = strtolower($row['karat'] . '_' . $row['sub_material'] . '_gold');
                                                } else {
                                                    $key = strtolower($row['material']);
                                                }
                                                $prices[$key] = $row['price'];
                                            }
                                            $stmtPrice->close();
                                    ?>

                                        <div class="price-on-sale"><h5 id="priceDisplay">Loading price...</h5> </div>
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                         <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                <span
                                                    class="fw-6 variant-picker-label-value value-currentColor"><p id="selectedMaterialText"><strong>Color:</strong> Silver</p></span>
                                            </div>
                                       <div id="materialColors">
                                            <div class="color-swatch color-gold" data-material="gold" style="background:#d4af37;"></div>
                                            <div class="color-swatch color-silver" data-material="silver" style="background:#c0c0c0;"></div>
                                            <div class="color-swatch color-platinum" data-material="platinum" style="background:#e5e4e2;"></div>
                                        </div>
                                            </div>
                                                
                                            </div>
                                        </div>
                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                
                                            </div>

                                            <div id="goldTypeSection" style="display:none;">
                                                <p><strong>Select Gold Type:</strong></p>
                                                <button class="gold-type-btn" data-gold-type="rose">Rose Gold</button>
                                                <button class="gold-type-btn" data-gold-type="yellow">Yellow Gold</button>
                                                <button class="gold-type-btn" data-gold-type="white">White Gold</button>
                                            </div>

                                            <div id="karatSection" class="karat-buttons" style="display:none;">
                                                <p><strong>Select Karat:</strong></p>
                                                <button data-karat="10k" class="karat-selected">10K</button>
                                                <button data-karat="14k">14K</button>
                                                <button data-karat="18k">18K</button>
                                            </div>  
                                            <div class="right">
                                                    <div style="display: flex; gap: 10px; margin-top: 10px;">

                                                        <a href="https://wa.me/919737847522" target="_blank"
                                                            style="display: inline-flex; align-items: center; background-color: #25D366; color: white; padding: 10px 16px; border-radius: 30px; font-size: 16px; font-weight: 500; text-decoration: none; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                                                            <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png"
                                                                alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 10px;" />
                                                            WhatsApp
                                                        </a>

                                                        <a href="mailto:sales@allurs.com" 
                                                            style="display: inline-flex; align-items: center; background-color: #0072C6; color: white; padding: 10px 16px; border-radius: 30px; font-size: 16px; font-weight: 500; text-decoration: none; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                                                            <img src="https://img.icons8.com/ios-filled/50/ffffff/new-post.png"
                                                                alt="Email" style="width: 24px; height: 24px; margin-right: 10px;" />
                                                            Email Us
                                                        </a>

                                                    </div>
                                                <h3 class="fs-16 fw-5">Features</h3>
                                                <ul>
                                                    <?php 
                                                        $featuresStmt = $conn->prepare("SELECT feature_1, feature_2, feature_3 FROM products WHERE id = ?");
                                                        $featuresStmt->bind_param("i", $product_id);
                                                        $featuresStmt->execute();
                                                        $featuresResult = $featuresStmt->get_result();
                                                        $featuresRow = $featuresResult->fetch_assoc();
                                                        $featuresStmt->close();

                                                        if (!empty($featuresRow)) {
                                                            if (!empty($featuresRow['feature_1'])) echo "<li>" . htmlspecialchars($featuresRow['feature_1']) . "</li>";
                                                            if (!empty($featuresRow['feature_2'])) echo "<li>" . htmlspecialchars($featuresRow['feature_2']) . "</li>";
                                                            if (!empty($featuresRow['feature_3'])) echo "<li>" . htmlspecialchars($featuresRow['feature_3']) . "</li>";
                                                        } else {
                                                            echo "<li>No features available.</li>";
                                                        }
                                                    ?>
                                                </ul>
                                                <h3 class="fs-16 fw-5">Materials Care</h3>
                                                    <ul class="mb-0">
                                                        <?php 
                                                            $materialsStmt = $conn->prepare("SELECT material_1, material_2, material_3 FROM products WHERE id = ?");
                                                            $materialsStmt->bind_param("i", $product_id);
                                                            $materialsStmt->execute();
                                                            $materialsResult = $materialsStmt->get_result();
                                                            $materialsRow = $materialsResult->fetch_assoc();
                                                            $materialsStmt->close();

                                                            if (!empty($materialsRow)) {
                                                                if (!empty($materialsRow['material_1'])) echo "<li>" . htmlspecialchars($materialsRow['material_1']) . "</li>";
                                                                if (!empty($materialsRow['material_2'])) echo "<li>" . htmlspecialchars($materialsRow['material_2']) . "</li>";
                                                                if (!empty($materialsRow['material_3'])) echo "<li>" . htmlspecialchars($materialsRow['material_3']) . "</li>";
                                                            } else {
                                                                echo "<li>No material care details available.</li>";
                                                            }
                                                        ?>
                                                    </ul>
                                            </div>
                                          
                                        </div> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <script>
                    const prices = <?= json_encode($prices) ?>;

                    let selectedMaterial = "silver";
                    let selectedGoldType = null;
                    let selectedKarat = "10k";

                    const priceDisplay = document.getElementById('priceDisplay');
                    const karatSection = document.getElementById('karatSection');
                    const goldTypeSection = document.getElementById('goldTypeSection');
                    const selectedMaterialText = document.getElementById('selectedMaterialText');

                    const colorSwatches = document.querySelectorAll('.color-swatch');
                    const karatButtons = document.querySelectorAll('#karatSection button');
                    const goldTypeButtons = document.querySelectorAll('.gold-type-btn');

                    function capitalize(str) {
                    return str.charAt(0).toUpperCase() + str.slice(1);
                    }

                    function updatePrice() {
                    let key = selectedMaterial;
                    if (selectedMaterial === 'gold') {
                        if (!selectedGoldType || !selectedKarat) {
                        priceDisplay.innerText = 'Please select gold type and karat.';
                        return;
                        }
                        key = `${selectedKarat}_${selectedGoldType}_gold`;
                    }

                    if (prices[key]) {
                        priceDisplay.innerText = `Price: ₹${prices[key]}`;
                    } else {
                        priceDisplay.innerText = 'Price not available';
                    }
                    }

                    // Material selection
                    colorSwatches.forEach(swatch => {
                    swatch.addEventListener('click', () => {
                        selectedMaterial = swatch.dataset.material;
                        selectedGoldType = null;
                        selectedKarat = null;

                        colorSwatches.forEach(s => s.classList.remove('color-selected'));
                        swatch.classList.add('color-selected');

                        if (selectedMaterial === 'gold') {
                        goldTypeSection.style.display = 'block';
                        karatSection.style.display = 'none';
                        selectedMaterialText.innerHTML = `<strong>Color:</strong> Gold`;
                        priceDisplay.innerText = "Please select gold type.";
                        } else {
                        goldTypeSection.style.display = 'none';
                        karatSection.style.display = 'none';
                        selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalize(selectedMaterial)}`;
                        updatePrice();
                        }
                    });
                    });

                    // Gold type selection
                    goldTypeButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        selectedGoldType = btn.dataset.goldType;
                        goldTypeButtons.forEach(b => b.classList.remove('karat-selected'));
                        btn.classList.add('karat-selected');

                        karatSection.style.display = 'block';
                        selectedKarat = "10k";
                        karatButtons.forEach(b => b.classList.remove('karat-selected'));
                        karatButtons[0].classList.add('karat-selected');

                        selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalize(selectedGoldType)} Gold`;
                        updatePrice();
                    });
                    });

                    // Karat selection
                    karatButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        selectedKarat = btn.dataset.karat;
                        karatButtons.forEach(b => b.classList.remove('karat-selected'));
                        btn.classList.add('karat-selected');
                        updatePrice();
                    });
                    });

                    window.addEventListener('DOMContentLoaded', () => {
                    document.querySelector('.color-silver').classList.add('color-selected');
                    updatePrice();
                    });
                    </script>

            
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
                               
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                           <?php 
                                                $descriptionStmt = $conn->prepare("SELECT name, description FROM products WHERE id = ?");
                                                $descriptionStmt->bind_param("i", $product_id);
                                                $descriptionStmt->execute();
                                                $productResult = $descriptionStmt->get_result();
                                                $productRow = $productResult->fetch_assoc();
                                                $descriptionStmt->close();

                                                if (!empty($productRow)) {
                                                   
                                                    echo "<p class='product-description'>" . nl2br(htmlspecialchars($productRow['description'])) . "</p>";
                                                } else {
                                                    echo "Product Name Not Found";
                                                }
                                            ?>
                                        </p>
                                        
                                    </div>
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