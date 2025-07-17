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
<div class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical" style="height:900px;">
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
                                        $stmt2 = $conn->prepare("SELECT name FROM products WHERE id = ?");
                                        $stmt2->bind_param("i", $product_id);
                                        $stmt2->execute();
                                        $productResult = $stmt2->get_result();
                                        $productRow = $productResult->fetch_assoc();
                                        $stmt2->close();
                                            if (!empty($productRow)) {
                                                    echo "<a href='?x=$product_id'>" . htmlspecialchars($productRow['name']) . "</a>";
                                                } else {
                                                    echo "Product Name Not Found";
                                                }
                                            ?>
                                        </h5>
                                                                            </div>
                                                                            <div class="tf-product-info-price">
                                                                                <?php
                                                                                    // Get product_id from URL or default to 1
                                        $product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

                                        // Updated variable name to $stmt3
                                        $stmt3 = $conn->prepare("SELECT material_type, price FROM product_prices WHERE product_id = ?");
                                        $stmt3->bind_param("i", $product_id);
                                        $stmt3->execute();
                                        $result = $stmt3->get_result();

                                        // Fetch prices as associative array
                                        $prices = [];
                                        while ($row = $result->fetch_assoc()) {
                                            $prices[$row['material_type']] = $row['price'];
                                        }
                                        // Fetch prices as associative array




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
                                            <div class="color-swatch color-gold" data-material="gold" style="background-color: #d4af37;"></div>
                                            <div class="color-swatch color-silver" data-material="silver" style="background-color: #c0c0c0;"></div>
                                            <div class="color-swatch color-platinum" data-material="platinum" style="background-color: #e5e4e2;"></div>
                                         </div>
                                            </div>
                                                
                                            </div>
                                        </div>
                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                
                                            </div>
                                            <div id="karatSection" class="karat-buttons" style="display:none;">
                                                <p><strong>Select Karat:</strong></p>
                                                <button data-karat="10k" class="karat-selected">10K</button>
                                                <button data-karat="14k">14K</button>
                                                <button data-karat="18k">18K</button>
                                            </div>
                                            
                                        </div> 
                                    


                                    </div>
                                    <div class="tf-product-info-trust-seal">
                                        <div class="tf-product-trust-mess">
                                            <i class="icon-safe"></i>
                                            <p class="fw-6">Guarantee Safe <br> Checkout</p>
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
                            let selectedKarat = "10k"; // Default 10k

                            const priceDisplay = document.getElementById('priceDisplay');
                            const karatSection = document.getElementById('karatSection');
                            const colorSwatches = document.querySelectorAll('.color-swatch');
                            const karatButtons = document.querySelectorAll('#karatSection button');
                            const selectedMaterialText = document.getElementById('selectedMaterialText');

                            // Capitalize helper
                            function capitalizeFirstLetter(string) {
                                return string.charAt(0).toUpperCase() + string.slice(1);
                            }

                            function updatePrice() {
                                let key = selectedMaterial;
                                if (selectedMaterial === 'gold') {
                                    key = `${selectedKarat}_gold`;
                                }

                                if (prices[key]) {
                                    priceDisplay.innerText = `Price: ₹${prices[key]}`;
                                } else {
                                    priceDisplay.innerText = "Price not available.";
                                }
                            }

                            // Handle material (color) selection
                            colorSwatches.forEach(swatch => {
                                swatch.addEventListener('click', () => {
                                    selectedMaterial = swatch.getAttribute('data-material');
                                    selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalizeFirstLetter(selectedMaterial)}`;

                                    // Highlight selected
                                    colorSwatches.forEach(s => s.classList.remove('color-selected'));
                                    swatch.classList.add('color-selected');

                                    if (selectedMaterial === 'gold') {
                                        karatSection.style.display = 'block';
                                        selectedKarat = "10k";
                                        karatButtons.forEach(b => b.classList.remove('karat-selected'));
                                        karatButtons[0].classList.add('karat-selected');
                                    } else {
                                        karatSection.style.display = 'none';
                                        selectedKarat = null;
                                    }

                                    updatePrice();
                                });
                            });

                            // Handle karat button clicks
                            karatButtons.forEach(button => {
                                button.addEventListener('click', () => {
                                    selectedKarat = button.getAttribute('data-karat');
                                    karatButtons.forEach(b => b.classList.remove('karat-selected'));
                                    button.classList.add('karat-selected');
                                    updatePrice();
                                });
                            });

                            // Initial setup
                            window.addEventListener('DOMContentLoaded', () => {
                                document.querySelector('.color-silver').classList.add('color-selected');
                                karatButtons.forEach(b => b.classList.remove('karat-selected'));
                                karatButtons[0].classList.add('karat-selected'); // default 10k selected but hidden
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