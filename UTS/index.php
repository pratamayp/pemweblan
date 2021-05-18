<?php
require ('view/display.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFK Association Library</title>
    <style>
    .title {
        padding: 120px;
        padding-bottom: 313px;
        background-image: url('assets/img/3.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.php">AFK Library</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="anggota.php?target=list" role="button">Data Anggota</a></li>
                    <!-- <li><a class="nav-link scrollto" href="anggota.php?target=input" role="button">Tambah Anggota</a> -->
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="text-center title">
        <h1>AFK Association Library</h1>
        <p>Blocked Street, 01 Nowhere </p>
    </div>
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Books</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">Thriller</li>
                        <li data-filter=".filter-card">Fantasy</li>
                        <li data-filter=".filter-web">Sci-Fi</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/Books/book-8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-8.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/Books/book-9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-9.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/Books/book-10.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-10.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/Books/book-11.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-11.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/Books/book-12.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-12.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/Books/book-13.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-13.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/Books/book-14.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/Books/book-14.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/portfolio-15.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/portfolio/portfolio-15.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/portfolio-16.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="assets/img/portfolio/portfolio-16.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="title"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery"
                            data-glightbox="type: external" class="portfolio-details-lightbox details-link"
                            title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->
</body>

</html>