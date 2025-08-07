<?php
include('header.php');
include('conn.php');
?>

<?php
$limit = 12; // Products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Count total products for pagination
$totalProductsResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM products WHERE category_id = 3");
$totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
$totalProducts = $totalProductsRow['total'];
$totalPages = ceil($totalProducts / $limit);
?>
 <!-- page-title -->
        <!-- <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">New Arrival</div>
                <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p>
            </div>
        </div> -->
<!-- /page-title -->

<!-- Collection -->
        <!-- <section class="flat-spacing-3 pb_0">
            <div class="container">
                <div class="hover-sw-nav">
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="5" data-tablet="3" data-mobile="2"
                        data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" lazy="true">
                                
                                <div class="collection-item style-2 hover-img">
                                    <div class="collection-inner">
                                        <a href="shop-default.html" class="collection-image img-style">
                                            <img class="lazyload" data-src="images/collections/collection-14.jpg"
                                                src="images/collections/collection-14.jpg" alt="collection-img">
                                        </a>
                                        <div class="collection-content">
                                            <a href="shop-default.html"
                                                class="tf-btn collection-title hover-icon fs-15"><span>Accessories</span><i
                                                    class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round"><span
                            class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
                </div>
            </div>
        </section> -->


        <!-- <section class="flat-spacing-3 pb_0">
    <div class="container">
        <div class="hover-sw-nav">
            <div dir="ltr" class="swiper tf-sw-collection" data-preview="5" data-tablet="3" data-mobile="2"
                data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                <div class="swiper-wrapper">

                    <?php
                    // Step 2: Fetch categories from database
                    $query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id ASC");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $categoryId = $row['id'];
                        $categoryName = htmlspecialchars($row['name']);
                        $categoryImage = $row['image_path']; // example: images/collections/collection-14.jpg
                    ?>
                        <div class="swiper-slide" lazy="true">
                            <div class="collection-item style-2 hover-img">
                                <div class="collection-inner">
                                    <a href="shop-default.php?category=<?= $categoryId ?>" class="collection-image img-style">
                                        <img class="lazyload" data-src="<?= $categoryImage ?>" src="<?= $categoryImage ?>" alt="<?= $categoryName ?>">
                                    </a>
                                    <div class="collection-content">
                                        <a href="Shop-default.php?category=<?= $categoryId ?>" class="tf-btn collection-title hover-icon fs-15">
                                            <span><?= $categoryName ?></span>
                                            <i class="icon icon-arrow1-top-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round">
                <span class="icon icon-arrow-left"></span>
            </div>
            <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round">
                <span class="icon icon-arrow-right"></span>
            </div>
            <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
        </div>
    </div>
</section> -->
        <!-- /Collection -->

        <!-- Section Product -->
        <section class="flat-spacing-2">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div class="tf-control-filter">
                        <!-- <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                            class="tf-btn-filter"><span class="icon icon-filter"></span><span
                                class="text">Filter</span></a> -->
                    </div>
                    <ul class="tf-control-layout d-flex justify-content-center">
                        <!-- <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                            <div class="item"><span class="icon icon-list"></span></div>
                        </li> -->
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <div class="item"><span class="icon icon-grid-2"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                            <div class="item"><span class="icon icon-grid-3"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                            <div class="item"><span class="icon icon-grid-4"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-5" data-value-layout="tf-col-5">
                            <div class="item"><span class="icon icon-grid-5"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-6" data-value-layout="tf-col-6">
                            <div class="item"><span class="icon icon-grid-6"></span></div>
                        </li>
                    </ul>



                    <!-- <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Featured</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item active">
                                    <span class="text-value-item">Featured</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Best selling</span>
                                </div>
                            </div>
                        </div>
                    </div> -->



                </div>
                <div class="wrapper-control-shop">
                    <div class="meta-filter-shop">
                        <div id="product-count-grid" class="count-text"></div>
                        <div id="applied-filters"></div>
                        <button id="remove-all" class="remove-all-filters" style="display: none;">Remove All <i
                                class="icon icon-close"></i></button>
                    </div>
                    
                    <div class="tf-grid-layout wrapper-shop tf-col-3" id="gridLayout">
<?php
// Fetch all products
$productQuery = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 3 LIMIT $limit OFFSET $offset");

// ---------------- PRICE FILTER LOGIC ---------------- //

// Start base WHERE clause (you can change category_id as needed)
$whereClause = "WHERE category_id = 3";

// If min & max price are set via GET, filter products
if (!empty($_GET['min_price']) && !empty($_GET['max_price'])) {
    $min = (float) $_GET['min_price'];
    $max = (float) $_GET['max_price'];

    $whereClause .= " AND id IN (
        SELECT product_id 
        FROM product_prices_1 
        WHERE price BETWEEN $min AND $max
    )";
}

// Fetch products with or without price filter
$productQuery = mysqli_query($conn, "SELECT * FROM products $whereClause");






while ($product = mysqli_fetch_array($productQuery)) {
    $product_id = $product['id'];
    $product_name = $product['name'];

    // Fetch images for each material
    $materials = ['Gold', 'Silver', 'Platinum'];
    $images = [];

    foreach ($materials as $material) {
        $photoQuery = mysqli_query($conn, "
            SELECT image_path FROM product_photos 
            WHERE product_id = $product_id AND photo_type = '$material'
            LIMIT 1
        ");

        if ($photo = mysqli_fetch_assoc($photoQuery)) {
            $images[$material] = $photo['image_path']; // Store file path
        } else {
            $images[$material] = ''; // fallback or blank
        }

        $priceQuery = mysqli_query($conn, "
                SELECT price FROM product_prices_1 
                WHERE product_id = $product_id AND material = '$material'
                LIMIT 1
            ");
            $prices[$material] = ($priceRow = mysqli_fetch_assoc($priceQuery)) ? $priceRow['price'] : '';
            


    }




?>
    <div class="card-product grid">
        
        <div class="card-product-wrapper">
            <a href="try_3.php?product_id=<?= $product_id ?>" class="product-img">
                <!-- Default image: Gold -->
                <?php if (!empty($images['Gold'])): ?>
                    <img class="lazyload img-product"
                         data-src="<?= htmlspecialchars($images['Gold']) ?>"
                         src="<?= htmlspecialchars($images['Gold']) ?>"
                         alt="Gold Image">
                <?php endif; ?>

                <!-- Hover image: Silver -->
                <?php if (!empty($images['Silver'])): ?>
                    <img class="lazyload img-hover"
                         data-src="<?= htmlspecialchars($images['Silver']) ?>"
                         src="<?= htmlspecialchars($images['Silver']) ?>"
                         alt="Silver Image">
                <?php endif; ?>
            </a>
        </div>
        <div class="product-price" id="price-<?= $product_id ?>" 
                    style="font-size:18px; font-weight:bold; color:#d4af37; margin-top:10px;">
                    ₹<?= htmlspecialchars($prices['Gold']) ?>
        </div>
        <div class="card-product-info">
            <a href="try_3.php?product_id=<?= $product_id ?>" class="title link">
                <?= htmlspecialchars($product_name) ?>
            </a>

            <!-- Material Swatches -->
            <ul class="list-color-product">
                <?php foreach ($materials as $material): ?>
                    <?php if (!empty($images[$material])): ?>
                        <li class="list-color-item color-swatch">
                            <span class="tooltip"><?= $material ?></span>
                            <span class="swatch-value bg_<?= strtolower($material) ?>"></span>
                            <img class="lazyload"
                                 data-src="<?= htmlspecialchars($images[$material]) ?>"
                                 src="<?= htmlspecialchars($images[$material]) ?>"
                                 alt="<?= $material ?> Image">
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php } ?>
</div>


</div>
<div class="pagination mt-4 text-center">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>" class="btn btn-outline-dark me-2">&laquo; Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>" class="btn <?= ($i == $page) ? 'btn-dark' : 'btn-outline-dark' ?> mx-1"><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>" class="btn btn-outline-dark ms-2">Next &raquo;</a>
                <?php endif; ?>
            </div>
                         
                        
                    </div>
                </div>
            </div>
        </section>
<!-- gotop -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-up"></span>
    </button>
<!-- /gotop -->
<!-- toolbar-bottom -->
    <div class="tf-toolbar-bottom type-1150">
        <div class="toolbar-item active">
            <a href="#toolbarShopmb" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-shop"></i>
                </div>
                <div class="toolbar-label">Shop</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-fill"></i>
                </div>
                <div class="toolbar-label">Filter</div>
            </a>
        </div>
    </div>
    <!-- /toolbar-bottom -->

   
    <!-- modalDemo -->
    <div class="modal fade modalDemo" id="modalDemo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <h5 class="demo-title">Allure jeweles</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="mega-menu">
                    <div class="row-demo">
                        <div class="demo-item">
                            <a href="home-jewerly.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-jewelry.jpg"
                                        src="images/demo/home-jewelry.jpg" alt="home-jewelry">
                                </div>
                                <span class="demo-name">Home Jewelry</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /modalDemo -->

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                        </a>
                        <div id="dropdown-menu-one" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="home-jewerly.html" class="sub-nav-link">Home Jewelry</a></li>
                                
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-two" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Shop</span>
                        </a> 
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                        </a>
                        
                    </li>
                    
                    
                    
                </ul>
                <div class="mb-other-content">
                    <div class="d-flex group-icon">
                        <a href="home-search.html" class="site-nav-icon"><i class="icon icon-search"></i>Search</a>
                    </div>
                    <div class="mb-notice">
                        <a href="contact-1.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                        <li>Email: <b>info@fashionshop.com</b></li>
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /mobile menu -->

    <!-- Filter -->
    <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="filter-icon">
                    <span class="icon icon-filter"></span>
                    <span>Filter</span>
                </div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body">
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="categories">
                        <span>Product categories</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">
                            <li class="cate-item current"><a href="shop-default.html"><span>Fashion</span></a></li>
                            <li class="cate-item"><a href="shop-default.html"><span>Men</span></a></li>
                            <li class="cate-item"><a href="shop-default.html"><span>Women</span></a></li>
                        </ul>
                    </div>
                </div>
                <form action="#" id="facet-filter-form" class="facet-filter-form">
                    <div class="widget-facet">
                        
                        
                    </div>


                    <form action="Rings.php" method="GET" id="facet-filter-form" class="facet-filter-form">
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="price">
                            <span>Price</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="price" class="collapse show">
                            <div class="widget-price filter-price">
                                <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
                                <div class="box-title-price">
                                    <span class="title-price">Price :</span>
                                    <div class="caption-price">
                                        <div class="price-val" id="price-min-value" data-currency="$"></div>
                                        <span>-</span>
                                        <div class="price-val" id="price-max-value" data-currency="$"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <input type="hidden" name="min_price" id="min_price">
                    <input type="hidden" name="max_price" id="max_price">

                    <button type="submit" style="margin-top:10px;">Apply Filter</button>
                </form>
                    
                    
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="color">
                            <span>Color</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="color" class="collapse show">
                            <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <input type="radio" name="color" class="tf-check-color bg_beige" id="Beige"
                                        value="Beige">
                                    <label for="Beige" class="label"><span>Beige</span>&nbsp;<span>(3)</span></label>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- End Filter -->


    
    <!-- modal compare -->
    <div class="offcanvas offcanvas-bottom canvas-compare" id="compare">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="close-popup">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </div>
            </header>
            <div class="canvas-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tf-compare-list">
                                <div class="tf-compare-head">
                                    <div class="title">Compare Products</div>
                                </div>
                                <div class="tf-compare-offcanvas">
                                    <div class="tf-compare-item">
                                        <div class="position-relative">
                                            <div class="icon">
                                                <i class="icon-close"></i>
                                            </div>
                                            <a href="product-detail.html">
                                                <img class="radius-3" src="images/products/orange-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tf-compare-item">
                                        <div class="position-relative">
                                            <div class="icon">
                                                <i class="icon-close"></i>
                                            </div>
                                            <a href="product-detail.html">
                                                <img class="radius-3" src="images/products/pink-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-compare-buttons">
                                    <div class="tf-compare-buttons-wrap">
                                        <a href="compare.html"
                                            class="tf-btn radius-3 btn-fill justify-content-center fw-6 fs-14 flex-grow-1 animate-hover-btn ">Compare</a>
                                        <div class="tf-compapre-button-clear-all link">
                                            Clear All
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal compare -->

    <!-- modal quick_add -->
    <div class="modal fade modalDemo popup-quickadd" id="quick_add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-product-info-item">
                        <div class="image">
                            <img src="images/products/orange-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <a href="product-detail.html">Ribbed Tank Top</a>
                            <div class="tf-product-info-price">
                                <div class="price">$18.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-product-info-variant-picker mb_15">
                        <div class="variant-picker-item">
                            <div class="variant-picker-label">
                                Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                            </div>
                            <div class="variant-picker-values">
                                <input id="values-orange" type="radio" name="color" checked>
                                <label class="hover-tooltip radius-60" for="values-orange" data-value="Orange">
                                    <span class="btn-checkbox bg-color-orange"></span>
                                    <span class="tooltip">Orange</span>
                                </label>
                                <input id="values-black" type="radio" name="color">
                                <label class=" hover-tooltip radius-60" for="values-black" data-value="Black">
                                    <span class="btn-checkbox bg-color-black"></span>
                                    <span class="tooltip">Black</span>
                                </label>
                                <input id="values-white" type="radio" name="color">
                                <label class="hover-tooltip radius-60" for="values-white" data-value="White">
                                    <span class="btn-checkbox bg-color-white"></span>
                                    <span class="tooltip">White</span>
                                </label>
                            </div>
                        </div>
                        <div class="variant-picker-item">
                            <div class="variant-picker-label">
                                Size: <span class="fw-6 variant-picker-label-value">S</span>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="tf-product-info-buy-button">
                        <form class="">
                            <a href="javascript:void(0);"
                                class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                    to cart -&nbsp;</span><span class="tf-qty-price">$18.00</span></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal quick_add -->



    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Example: Assuming your slider is jQuery UI range slider
    $("#price-value-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [0, 500],
        slide: function(event, ui) {
            // Update visible values
            $("#price-min-value").text("$" + ui.values[0]);
            $("#price-max-value").text("$" + ui.values[1]);

            // Update hidden inputs
            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
        }
    });

    // Set initial values in hidden inputs
    let initValues = $("#price-value-range").slider("values");
    $("#min_price").val(initValues[0]);
    $("#max_price").val(initValues[1]);
});
</script>
        

<?php
include('footer.php')
?>