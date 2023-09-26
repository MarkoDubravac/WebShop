<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PhoneGalaxy</title>
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon">

    <!--jquery-->
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    ></script>

    <!--BOOTSTRAP-->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <!--OWL-CAROUSEL-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <!--fontawesome-icons-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <!--css file-->
    <link rel="stylesheet" href="style.css" />

    <?php
        //require functions.php
        require('functions.php');
    ?>
</head>
<body>
<!--header-->
<header id="header">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Phone Galaxy Shop</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse px-2 navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#top-sale"
                        >On sale</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#special-price"
                        >Special Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#new-phones"
                        >New Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blogs">Blogs</a>
                    </li>
                </ul>
                <form action="logout.php" class="px-1 py-2 font-size-12 font-rale">
                    <button type="submit"  class="px-4 py-2 font-roboto rounded-pill text-dark bg-light">
                        Log out
                    </button>
                </form>
                <form action="" class="px-1 font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill bg-secondary text-decoration-none">
                <span class="font-size-16 px-2 text-white"
                ><i class="fas fa-shopping-cart"></i
                    ></span>
                        <span class="px-3 py-2 rounded-pill font-roboto text-dark bg-light"><?php echo count($filteredCart); ?></span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
</header>
<!--main-size-->
<main id="main-site">
