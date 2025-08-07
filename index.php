<?php
include('header.php');
include('conn.php');
?>

<!-- slider -->
        <div class="tf-slideshow slider-effect-fade slider-skincare position-relative">
            <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1"
                data-centered="false" data-space="0" data-loop="true" data-auto-play="false" data-delay="2000"
                data-speed="2000">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="images/slider/jewerly-1.jpg"
                                src="images/slider/jewerly-1.jpg" alt="jewerly-slideshow" loading="lazy">
                            <div class="box-content text-center">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1 text-white heading font-poppins fw-8">SUMMER
                                        ESSENTIALS</h1>
                                    <div class="fade-item fade-item-2">
                                        <a href="Rings.php"
                                            class="font-poppins tf-btn btn-outline-light rounded-0 fw-6 fs-14 link justify-content-center letter-spacing-2 wow fadeInUp"
                                            data-wow-delay="0s">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="images/slider/jewerly-2.jpg"
                                src="images/slider/jewerly-2.jpg" alt="jewerly-slideshow" loading="lazy">
                            <div class="box-content text-center">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1 text-white heading font-poppins fw-8">SPRING
                                        ESSENTIALS</h1>
                                    <div class="fade-item fade-item-2">
                                        <a href="Necklace.php"
                                            class="font-poppins tf-btn btn-outline-light rounded-0 fw-6 fs-14 link justify-content-center letter-spacing-2 wow fadeInUp"
                                            data-wow-delay="0s">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="images/slider/jewerly-3.jpg"
                                src="images/slider/jewerly-3.jpg" alt="jewerly-slideshow" loading="lazy">
                            <div class="box-content text-center">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1 text-white heading font-poppins fw-8">WINTER
                                        ESSENTIALS</h1>
                                    <div class="fade-item fade-item-2">
                                        <a href="Allurs.php"
                                            class="font-poppins tf-btn btn-outline-light rounded-0 fw-6 fs-14 link justify-content-center letter-spacing-2 wow fadeInUp"
                                            data-wow-delay="0s">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-pagination sw-absolute-3">
                <div class="sw-dots style-2 dots-white sw-pagination-slider justify-content-center"></div>
            </div>
        </div>
        <!-- /slider -->



        <!-- Categories -->
        <section class="flat-spacing-18 wow fadeInUp" data-wow-delay="0s">
            <div class="container">
                <div class="tf-grid-layout-v2 flat-animate-tab">
                    <ul class="widget-tab-4 rounded-0 scroll-snap" role="tablist">
                
                        <li class="nav-tab-item" role="presentation">
                            <div data-bs-target="#tops" class="active nav-tab-link" data-bs-toggle="tab">
                                <span class="text fw-8 font-poppins">RINGS<span class="count"></span></span>
                                <a href="Rings.php" class="icon icon-arrow1-top-left"></a>
                            </div>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <div data-bs-target="#shirtsBlouses" class="nav-tab-link" data-bs-toggle="tab">
                                <span class="text fw-8 font-poppins">NECKLACES<span class="count"></span></span>
                                <a href="Necklace.php" class="icon icon-arrow1-top-left"></a>
                            </div>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <div data-bs-target="#pants" class="nav-tab-link" data-bs-toggle="tab">
                                <span class="text fw-8 font-poppins">BRACELETS<span class="count"></span></span>
                                <a href="Bracelets.php" class="icon icon-arrow1-top-left"></a>
                            </div>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <div data-bs-target="#cardigans" class="nav-tab-link" data-bs-toggle="tab">
                                <span class="text fw-8 font-poppins">Allure's Collection<span class="count"></span></span>
                                <a href="Allurs.php" class="icon icon-arrow1-top-left"></a>
                            </div>
                        </li>
                        
                        <li class="nav-tab-item" role="presentation">
                            <a href="Rings.php" class="nav-tab-link">
                                <span class="text fw-8 font-poppins">SHOP ALL</span>
                                <span class="icon icon-arrow1-top-left"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="scroll-process d-md-none" id="scroll-process">
                        <div class="value-process"></div>
                    </div>

                    <div class="tab-content">
                        
                        <div class="tab-pane active show" id="tops" role="tabpanel">
                            <a href="Rings.php" class="fullwidth o-hidden">
                                <img class="lazyload" data-src="images/collections/jewerly-2.jpg"
                                    src="images/collections/jewerly-2.jpg" alt="image-shop">
                            </a>
                        </div>
                        <div class="tab-pane" id="shirtsBlouses" role="tabpanel">
                            <a href="Necklace.php" class="fullwidth o-hidden">
                                <img class="lazyload" data-src="images/collections/jewerly-3.png"
                                    src="images/collections/jewerly-3.png" alt="image-shop">
                            </a>
                        </div>
                        <div class="tab-pane" id="pants" role="tabpanel">
                            <a href="Bracelets.php" class="fullwidth o-hidden">
                                <img class="lazyload" data-src="images/collections/jewerly-4.png"
                                    src="images/collections/jewerly-4.png" alt="image-shop">
                            </a>
                        </div>
                        <div class="tab-pane" id="cardigans" role="tabpanel">
                            <a href="Allurs.php" class="fullwidth o-hidden">
                                <img class="lazyload" data-src="images/collections/jewerly-5.png"
                                    src="images/collections/jewerly-5.png" alt="image-shop">
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- /Categories -->


        <!-- Product -->
        <section class="flat-spacing-18 bg_brown-3">
            <div class="container">
                <div class="flat-title wow fadeInUp title-upper" data-wow-delay="0s">
                    <span class="title fw-8 font-poppins text-white">BEST SELLERS</span>
                    <div class="d-flex gap-16 align-items-center box-pagi-arr">
                        <div class="nav-sw-arrow nav-next-slider type-white nav-next-product"><span
                                class="icon icon-arrow1-left"></span></div>
                        <a href="product-style-05.html"
                            class="tf-btn btn-line fs-12 fw-6 font-poppins btn-line-light">VIEW ALL</a>
                        <div class="nav-sw-arrow nav-prev-slider type-white nav-prev-product"><span
                                class="icon icon-arrow1-right"></span></div>
                    </div>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                  <div class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
    data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
    data-pagination-lg="3">

    <div class="swiper-wrapper">

        <?php
        // Fetch all products
        $productQuery = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 1");

        while ($product = mysqli_fetch_array($productQuery)) {
            $product_id = $product['id'];
            $product_name = $product['name'];

            $materials = ['Gold', 'Silver', 'Platinum'];
            $images = [];

            foreach ($materials as $material) {
                $photoQuery = mysqli_query($conn, "
                    SELECT image_path FROM product_photos 
                    WHERE product_id = $product_id AND photo_type = '$material'
                    LIMIT 1
                ");

                $images[$material] = ($photo = mysqli_fetch_assoc($photoQuery)) ? $photo['image_path'] : '';


                $priceQuery = mysqli_query($conn, "
                SELECT price FROM product_prices_1 
                WHERE product_id = $product_id AND material = '$material'
                LIMIT 1
            ");
            $prices[$material] = ($priceRow = mysqli_fetch_assoc($priceQuery)) ? $priceRow['price'] : '';
            }
        ?>
        <div class="swiper-slide">
            <div class="card-product style-brown">
                <div class="card-product-wrapper rounded-0">
                    <a href="product-detail.php?id=<?= $product_id ?>" class="product-img">
                        <?php if (!empty($images['Gold'])): ?>
                            <img class="lazyload img-product"
                                data-src="<?= htmlspecialchars($images['Gold']) ?>"
                                src="<?= htmlspecialchars($images['Gold']) ?>"
                                alt="Gold Image">
                        <?php endif; ?>

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
                <div class="card-product-info" data-direction="horizontal">
                    <a href="product-detail.php?id=<?= $product_id ?>" class="title link">
                        <?= htmlspecialchars($product_name) ?>
                    </a>

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
        </div>
        <?php } ?>

    </div>

    <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round">
        <span class="icon icon-arrow-right"></span>
    </div>
    <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round">
        <span class="icon icon-arrow-left"></span>
    </div>
</div>
        </section>
        <!-- /Product -->


        <!-- Collection -->
        <section class="flat-spacing-12 pb_0">
            <div class="container">
                <div class="flat-title title-upper wow fadeInUp" data-wow-delay="0s">
                    <span class="title fw-8 font-poppins">OUR COLLECTIONS</span>
                    <p class="sub-title font-poppins text_black-2">Where wishlists come true. Discover the pieces of
                        their (or your) dreams.</p>
                </div>
                <div class="masonry-layout-v2">
                    <div class="item-1 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a  class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-8.jpg"
                                    src="images/collections/jewerly-8.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                    <div class="item-2 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-9.jpg"
                                    src="images/collections/jewerly-9.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                    <div class="item-3 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a  class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-10.jpg"
                                    src="images/collections/jewerly-10.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                    <div class="item-4 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-11.jpg"
                                    src="images/collections/jewerly-11.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                    <div class="item-5 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a  class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-12.jpg"
                                    src="images/collections/jewerly-12.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                    <div class="item-6 collection-item-v5 hover-img wow fadeInUp" data-wow-delay="0s">
                        <div class="collection-inner">
                            <a class="collection-image img-style">
                                <img class="lazyload" data-src="images/collections/jewerly-13.jpg"
                                    src="images/collections/jewerly-13.jpg" alt="collection-img">
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Collection -->


         <!-- Marquee -->
        <div class="tf-marquee marquee-lg style-2 not-hover">
            <div class="wrap-marquee">
                <div class="marquee-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="43" viewBox="0 0 40 43" fill="none">
                        <path
                            d="M39.3055 20.7282C34.9409 20.7138 30.3593 19.8216 26.911 16.9761C24.0125 14.584 22.2908 11.1888 21.4565 7.57174C20.9356 5.31468 20.7475 3.00458 20.762 0.694478C20.762 0.212202 20.3762 0 20 0C19.6238 0 19.238 0.212202 19.238 0.694478C19.2573 4.63468 18.7027 8.70991 16.8652 12.2498C15.1145 15.6209 12.2305 18.1722 8.65686 19.4695C6.10562 20.3955 3.39523 20.7234 0.694478 20.7331C0.212202 20.7331 0 21.1237 0 21.4999C0 21.8761 0.212202 22.2667 0.694478 22.2667C5.05908 22.2812 9.6407 23.1734 13.089 26.0188C15.9875 28.4109 17.7092 31.8061 18.5435 35.4232C19.0644 37.6802 19.2476 39.9904 19.238 42.3005C19.238 42.7827 19.6238 42.9949 20 42.9949C20.3762 42.9949 20.762 42.7827 20.762 42.3005C20.7427 38.3603 21.2973 34.285 23.1348 30.7451C24.8855 27.374 27.7695 24.8228 31.3431 23.5254C33.8944 22.5995 36.6048 22.2715 39.3055 22.2619C39.7878 22.2619 40 21.8712 40 21.4951C40 21.1189 39.7878 20.7282 39.3055 20.7282ZM26.0381 24.8662C22.8985 27.3885 20.9838 31.0924 20.0772 34.965C20.0482 35.0808 20.0289 35.2014 20 35.3171C19.5901 33.4555 18.9727 31.647 18.0854 29.9542C16.1659 26.2889 12.9829 23.5785 9.1102 22.1558C8.37714 21.8857 7.62479 21.6687 6.86279 21.4902C9.42368 20.8777 11.8544 19.8119 13.9571 18.1239C17.0967 15.6016 19.0113 11.8978 19.918 8.02508C19.947 7.90933 19.9662 7.78876 19.9952 7.67302C20.4051 9.5346 21.0224 11.3431 21.9098 13.0359C23.8293 16.7012 27.0123 19.4116 30.885 20.8343C31.618 21.1044 32.3704 21.3214 33.1324 21.4999C30.5715 22.1172 28.1408 23.1782 26.0381 24.8662Z"
                            fill="black"></path>
                    </svg>
                    <p class="fw-8 font-poppins">
                        QUALITY YOU CAN TRUST – PRICES YOU’LL LOVE
                    </p>
                </div>
                <div class="marquee-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="43" viewBox="0 0 40 43" fill="none">
                        <path
                            d="M39.3055 20.7282C34.9409 20.7138 30.3593 19.8216 26.911 16.9761C24.0125 14.584 22.2908 11.1888 21.4565 7.57174C20.9356 5.31468 20.7475 3.00458 20.762 0.694478C20.762 0.212202 20.3762 0 20 0C19.6238 0 19.238 0.212202 19.238 0.694478C19.2573 4.63468 18.7027 8.70991 16.8652 12.2498C15.1145 15.6209 12.2305 18.1722 8.65686 19.4695C6.10562 20.3955 3.39523 20.7234 0.694478 20.7331C0.212202 20.7331 0 21.1237 0 21.4999C0 21.8761 0.212202 22.2667 0.694478 22.2667C5.05908 22.2812 9.6407 23.1734 13.089 26.0188C15.9875 28.4109 17.7092 31.8061 18.5435 35.4232C19.0644 37.6802 19.2476 39.9904 19.238 42.3005C19.238 42.7827 19.6238 42.9949 20 42.9949C20.3762 42.9949 20.762 42.7827 20.762 42.3005C20.7427 38.3603 21.2973 34.285 23.1348 30.7451C24.8855 27.374 27.7695 24.8228 31.3431 23.5254C33.8944 22.5995 36.6048 22.2715 39.3055 22.2619C39.7878 22.2619 40 21.8712 40 21.4951C40 21.1189 39.7878 20.7282 39.3055 20.7282ZM26.0381 24.8662C22.8985 27.3885 20.9838 31.0924 20.0772 34.965C20.0482 35.0808 20.0289 35.2014 20 35.3171C19.5901 33.4555 18.9727 31.647 18.0854 29.9542C16.1659 26.2889 12.9829 23.5785 9.1102 22.1558C8.37714 21.8857 7.62479 21.6687 6.86279 21.4902C9.42368 20.8777 11.8544 19.8119 13.9571 18.1239C17.0967 15.6016 19.0113 11.8978 19.918 8.02508C19.947 7.90933 19.9662 7.78876 19.9952 7.67302C20.4051 9.5346 21.0224 11.3431 21.9098 13.0359C23.8293 16.7012 27.0123 19.4116 30.885 20.8343C31.618 21.1044 32.3704 21.3214 33.1324 21.4999C30.5715 22.1172 28.1408 23.1782 26.0381 24.8662Z"
                            fill="black"></path>
                    </svg>
                    <p class="fw-8 text-highlight font-poppins">
                        MOQ FLEXIBILITY | FAST DISPATCH | GLOBAL SHIPPING
                    </p>
                </div>
                <div class="marquee-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="43" viewBox="0 0 40 43" fill="none">
                        <path
                            d="M39.3055 20.7282C34.9409 20.7138 30.3593 19.8216 26.911 16.9761C24.0125 14.584 22.2908 11.1888 21.4565 7.57174C20.9356 5.31468 20.7475 3.00458 20.762 0.694478C20.762 0.212202 20.3762 0 20 0C19.6238 0 19.238 0.212202 19.238 0.694478C19.2573 4.63468 18.7027 8.70991 16.8652 12.2498C15.1145 15.6209 12.2305 18.1722 8.65686 19.4695C6.10562 20.3955 3.39523 20.7234 0.694478 20.7331C0.212202 20.7331 0 21.1237 0 21.4999C0 21.8761 0.212202 22.2667 0.694478 22.2667C5.05908 22.2812 9.6407 23.1734 13.089 26.0188C15.9875 28.4109 17.7092 31.8061 18.5435 35.4232C19.0644 37.6802 19.2476 39.9904 19.238 42.3005C19.238 42.7827 19.6238 42.9949 20 42.9949C20.3762 42.9949 20.762 42.7827 20.762 42.3005C20.7427 38.3603 21.2973 34.285 23.1348 30.7451C24.8855 27.374 27.7695 24.8228 31.3431 23.5254C33.8944 22.5995 36.6048 22.2715 39.3055 22.2619C39.7878 22.2619 40 21.8712 40 21.4951C40 21.1189 39.7878 20.7282 39.3055 20.7282ZM26.0381 24.8662C22.8985 27.3885 20.9838 31.0924 20.0772 34.965C20.0482 35.0808 20.0289 35.2014 20 35.3171C19.5901 33.4555 18.9727 31.647 18.0854 29.9542C16.1659 26.2889 12.9829 23.5785 9.1102 22.1558C8.37714 21.8857 7.62479 21.6687 6.86279 21.4902C9.42368 20.8777 11.8544 19.8119 13.9571 18.1239C17.0967 15.6016 19.0113 11.8978 19.918 8.02508C19.947 7.90933 19.9662 7.78876 19.9952 7.67302C20.4051 9.5346 21.0224 11.3431 21.9098 13.0359C23.8293 16.7012 27.0123 19.4116 30.885 20.8343C31.618 21.1044 32.3704 21.3214 33.1324 21.4999C30.5715 22.1172 28.1408 23.1782 26.0381 24.8662Z"
                            fill="black"></path>
                    </svg>
                    <p class="fw-8 font-poppins">
                       QUALITY YOU CAN TRUST – PRICES YOU’LL LOVE
                    </p>
                </div>
            </div>
        </div>
        <!-- /Marquee -->


        <!-- Banner men collection -->
        <section class="banner-hero-collection-wrap">
            <a href="shop-collection-sub.html" class="img-wrap">
                <img class="lazyload" data-src="images/slider/jewerly-4.jpg" src="images/slider/jewerly-4.jpg"
                    alt="fashion-slideshow">
            </a>
            <div class="box-content">
                <div class="container">
                    <a href="Allurs.php" class="card-box">
                        <h3 class="subheading font-poppins fw-7"></h3>
                        <h3 class="heading font-poppins fw-8">Allure's Collection</h3>
                        <p class="text">Lounge in style with </p>
                        <div class="wow fadeInUp" data-wow-delay="0s">
                            <button class="font-poppins fw-7 tf-btn style-2 btn-fill rounded-0 animate-hover-btn"><span>SHOP
                                    COLLECTIONS</span></button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- /Banner men collection -->


        <section class="flat-spacing-12">
            <div class="container">
                <div class="row align-items-center flex-md-row-reverse">
                    <div class="col-md-6">
                        <div class="box-video-wrap">
                            <video src="images/slider/video-jewerly.mp4" autoplay="" muted="" playsinline=""
                                loop=""></video>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                            <span class="title fw-8 font-poppins">SHOP THIS LOOK</span>
                        </div>
                        <div class="position-relative wrap-carousel style-2">
                            <div class="nav-sw nav-next-slider nav-next-sell-1"><span
                                    class="icon icon-arrow-left"></span></div>
                            <div dir="ltr" class="swiper tf-sw-product-sell-1 wrap-sw-over" data-preview="2"
                                data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="15"
                                data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                                <div class="swiper-wrapper">

        <?php
        // Fetch all products
        $productQuery = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 1");

        while ($product = mysqli_fetch_array($productQuery)) {
            $product_id = $product['id'];
            $product_name = $product['name'];

            $materials = ['Gold', 'Silver', 'Platinum'];
            $images = [];

            foreach ($materials as $material) {
                $photoQuery = mysqli_query($conn, "
                    SELECT image_path FROM product_photos 
                    WHERE product_id = $product_id AND photo_type = '$material'
                    LIMIT 1
                ");

                $images[$material] = ($photo = mysqli_fetch_assoc($photoQuery)) ? $photo['image_path'] : '';
                
                $priceQuery = mysqli_query($conn, "
                SELECT price FROM product_prices_1 
                WHERE product_id = $product_id AND material = '$material'
                LIMIT 1
            ");
            $prices[$material] = ($priceRow = mysqli_fetch_assoc($priceQuery)) ? $priceRow['price'] : '';
            }
        ?>
                            <div class="swiper-slide">
                                <div class="card-product style-brown">
                                    <div class="card-product-wrapper rounded-0">
                                        <a href="try_3.php?product_id=<?= $product_id ?>" class="product-img">
                                            <?php if (!empty($images['Gold'])): ?>
                                                <img class="lazyload img-product"
                                                    data-src="<?= htmlspecialchars($images['Gold']) ?>"
                                                    src="<?= htmlspecialchars($images['Gold']) ?>"
                                                    alt="Gold Image">
                                            <?php endif; ?>

                                            <?php if (!empty($images['Silver'])): ?>
                                                <img class="lazyload img-hover"
                                                    data-src="<?= htmlspecialchars($images['Silver']) ?>"
                                                    src="<?= htmlspecialchars($images['Silver']) ?>"
                                                    alt="Silver Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    
                                    <div class="card-product-info" data-direction="horizontal">
                                        <a href="try_3.php?product_id=<?= $product_id ?>" class="title link">
                                            <?= htmlspecialchars($product_name) ?>
                                           
                                        </a>

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
                            </div>
                            <?php } ?>

                        </div>
                                <div class="sw-dots style-2 sw-pagination-sell-1 justify-content-center"></div>
                            </div>
                            <div class="nav-sw nav-prev-slider nav-prev-sell-1"><span
                                    class="icon icon-arrow-right"></span></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <!-- choose us -->
        <section class="flat-spacing-23 bg_brown-4">
            <div class="container-full">
                <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                    <span class="title fw-8 font-poppins fs-28">LOVE NOTES AN Allure's</span>
                    <p class="sub-title font-poppins fs-14 text_black-2">Where wishlists come true. Discover the pieces
                        of their (or your) dreams.</p>
                </div>
                <div class="container">
                    <div class="wrap-carousel">
                        <div dir="ltr" class="swiper tf-sw-testimonial mb_60" data-preview="4" data-tablet="2"
                            data-mobile="1" data-space-lg="30" data-space-md="15">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide height-auto">
                                    <div class="testimonial-item h-100 font-poppins style-box wow fadeInUp"
                                        data-wow-delay="0s">
                                        <div class="author">
                                            <div class="name">Anita</div>
                                            <div class="metas"><i class="icon-check"></i> Verify customer</div>
                                        </div>
                                        <div class="rating color-black">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="heading">A premium touch at wholesale rates</div>
                                        <div class="text">
                                            The gold necklace finish is flawless — excellent craftsmanship. 
                                            It feels luxurious and is perfect for retail resale.
                                        </div>
                                    </div>
                                    


                                </div>

                                <div class="swiper-slide height-auto">
                                    <div class="testimonial-item h-100 font-poppins style-box wow fadeInUp"
                                        data-wow-delay="0s">
                                        <div class="author">
                                            <div class="name">Yusuf</div>
                                            <div class="metas"><i class="icon-check"></i> Verify customer</div>
                                        </div>
                                        <div class="rating color-black">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="heading">Fast shipping, superb packaging</div>
                                        <div class="text">
                                           We needed stock urgently for an expo and the team delivered 
                                           beautifully boxed and labeled rings ahead of schedule.
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="swiper-slide height-auto">
                                    <div class="testimonial-item h-100 font-poppins style-box wow fadeInUp"
                                        data-wow-delay="0s">
                                        <div class="author">
                                            <div class="name">Camille </div>
                                            <div class="metas"><i class="icon-check"></i> Verify customer</div>
                                        </div>
                                        <div class="rating color-black">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="heading">Our best seller this season</div>
                                        <div class="text">
                                           The gold-plated bracelets flew off the shelves during our spring launch.
                                            Modern design that customers truly loved.
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="swiper-slide height-auto">
                                    <div class="testimonial-item h-100 font-poppins style-box wow fadeInUp"
                                        data-wow-delay="0s">
                                        <div class="author">
                                            <div class="name">Rahul  </div>
                                            <div class="metas"><i class="icon-check"></i> Verify customer</div>
                                        </div>
                                        <div class="rating color-black">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="heading">Trusted partner for our store</div>
                                        <div class="text">
                                          The customizable pendant necklaces are a huge hit in our boutique.
                                          Quality is consistent and the pricing is fair.
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="swiper-slide height-auto">
                                    <div class="testimonial-item h-100 font-poppins style-box wow fadeInUp"
                                        data-wow-delay="0s">
                                        <div class="author">
                                            <div class="name">Nora </div>
                                            <div class="metas"><i class="icon-check"></i> Verify customer</div>
                                        </div>
                                        <div class="rating color-black">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="heading">Perfect sizing, no returns</div>
                                        <div class="text">
                                          The ring sizing was spot-on across all units. We had zero customer complaints. very reliable for bulk orders.
                                        </div>
                                    </div>                                   
                                </div>


                            </div>
                            
                        </div>
                        


                        <div class="sw-dots medium  d-flex style-2 sw-pagination-testimonial justify-content-center">
                        </div>
                        




                    </div>
                    


                </div>

                
            </div>
        </section>
        <!-- /choose us -->


        <!-- Icon box -->
        <section class="flat-spacing-1 flat-iconbox wow fadeInUp" data-wow-delay="0s">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-shipping"></i>
                                    </div>
                                    <div class="content font-poppins">
                                        <div class="title fw-8 text-uppercase fs-14">Free Shipping</div>
                                        <p>Free shipping</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-payment fs-22"></i>
                                    </div>
                                    <div class="content font-poppins">
                                        <div class="title fw-8 text-uppercase fs-14">Flexible Payment</div>
                                        <p>Pay with Multiple Credit Cards</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-return fs-20"></i>
                                    </div>
                                    <div class="content font-poppins">
                                        <div class="title fw-8 text-uppercase fs-14">14 Day Returns</div>
                                        <p>Within 30 days for an exchange</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-suport"></i>
                                    </div>
                                    <div class="content font-poppins">
                                        <div class="title fw-8 text-uppercase fs-14">Premium Support</div>
                                        <p>Outstanding premium support</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Icon box -->

        <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <a href="index.php"><span >Home</span></a>
                             
                        </a>

                    </li>
                    
                    
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <a href="Rings.php">Rings</a>
                            
                        </a>
                        
                    </li>

                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <a href="Necklace.php">Necklace</a>
                            
                        </a>
                    </li>

                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <a href="Bracelets.php">Bracelets</a>
                            
                        </a>
                    </li>

                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <a href="Allur.php">Allure's collection</a>
                            
                        </a>
                    </li>

                    

                    
                    
                </ul>
                <div class="mb-other-content">
                    <!-- <div class="d-flex group-icon">
                        <a href="wishlist.html" class="site-nav-icon"><i class="icon icon-heart"></i>Wishlist</a>
                        <a href="home-search.html" class="site-nav-icon"><i class="icon icon-search"></i>Search</a>
                    </div> -->
                    <div class="mb-notice">
                        <a href="contact-1.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>Address: 1234 Fashion Street, Suite 567, <br> </li>
                        <li>Email: <b>sales@allures.com </b></li>
                        <li>Phone: <b>+91 9737847522</b></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>


<?php
include('footer.php')
?>