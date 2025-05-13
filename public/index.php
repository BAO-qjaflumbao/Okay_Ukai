<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: logreg.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okay_Ukai Thrift Shop</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="main.css">
    <!-- Isotope CSS -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

</head>



<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
                <img src="logo/okay_ukai.png" alt="site icon" style="border-radius: 50%;">
                <span class="text-uppercase fw-lighter ms-2">Okay Ukai </span>
            </a>

            <div class="order-lg-2 nav-btns">
                <button type="button" class="btn position-relative">
                    <button type="button" class="btn position-relative" onclick="location.href='cart.php'"><i
                            class="fa fa-shopping-cart"></i>
                        <span id="cart-item"
                            class="position-absolute top-0 start-100 translate-middle badge bg-primary"></span>
                    </button>
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-heart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"></span>
                    </button>
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-search"></i>
                    </button>
                    <form action="php/logout.php" method="post" style="display: inline;">
                        <button type="submit" class="btn position-relative">Log Out</button>
                    </form>
            </div>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#header">home</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#collection">collection</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="product.php">shop</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#special">specials</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#about">about</a>
                    </li>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase text-dark" href="edit.php">Edit Profile</a>
                    </li>
                    <li class="nav-item px-2 py-2 border-0">

                        <?php
                        $res_name = $res_uname = $res_contact = $res_id = '';
                        $id = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
                        if ($id > 0) {
                            $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
                            if ($query) {
                                if ($result = mysqli_fetch_assoc($query)) {
                                    $res_name = $result['name'];
                                    $res_uname = $result['username'];
                                    $res_contact = $result['contact'];
                                    $res_id = $result['Id'];
                                } else {
                                    $res_uname = "User";
                                }
                            } else {
                                // For debugging, uncomment the next line:
                                // echo "Query failed: " . mysqli_error($con);
                                $res_uname = "User";
                            }
                        } else {
                            $res_uname = "Guest";
                        }
                        ?>

                    </li>
                    <li class="nav-item px-2 py-2 border-0">
                        <p class="nav-link text-uppercase text-dark mb-0">Hello
                            <b><?php echo htmlspecialchars($res_uname); ?></b>, Welcome</p>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- header -->
    <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 104px;">
        <div class="container h-100 d-flex align-items-center carousel-inner">
            <div class="text-center carousel-item active">
                <h2 class="text-capitalize text-white">best collection</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href="product.php" class="btn mt-3 text-uppercase">shop now</a>
            </div>
            <div class="text-center carousel-item">
                <h2 class="text-capitalize text-white">best price & offer</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new season</h1>
                <a href="product.php" class="btn mt-3 text-uppercase">buy now</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <!-- collection -->
    <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">New Collection</h2>
            </div>

            <div class="row g-0">
                <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type="button" class="btn m-2 text-dark active-filter-btn" data-filter="*">All</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".best">Best Sellers</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".feat">Featured</button>
                    <button type="button" class="btn m-2 text-dark" data-filter=".new">New Arrival</button>
                </div>

                <div class="collection-list mt-4 row gx-0 gy-3">
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                        <div class="collection-img position-relative">
                            <img src="productlist/B2 ITEM 1 FRONT.jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Coca Cola x 7/11 Windbreaker</p>
                            <span class="fw-bold">₱ 250.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 feat">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 7 FRONT .jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Checkered Short Sleeved Polo</p>
                            <span class="fw-bold">₱ 120.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 new">
                        <div class="collection-img position-relative">
                            <img src="productlist/B2 ITEM 2 FRONT .jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Track Sweater</p>
                            <span class="fw-bold">₱ 200.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 1 FRONT.jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Checkered Short Sleeved Polo</p>
                            <span class="fw-bold">₱ 150.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 feat">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 2 FRONT.jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Light Blue Long Sleeve Polo</p>
                            <span class="fw-bold">₱ 120.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 new">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 3 FRONT .jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Red Short Sleeved Polo</p>
                            <span class="fw-bold">₱ 150.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 4 FRONT.jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Striped Short Sleeved Polo</p>
                            <span class="fw-bold">₱ 120.00</span>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 feat">
                        <div class="collection-img position-relative">
                            <img src="productlist/ITEM 5 FRONT.jpg" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="text-capitalize my-1">Long Sleeve Striped Polo</p>
                            <span class="fw-bold">₱ 200.00</span>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <!-- end of collection -->

    <!-- special products -->
    <section id="special" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">Special Selection</h2>
            </div>

            <div class="special-list row g-0">
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="productlist/ITEM 5 FRONT.jpg" class="w-100">
                        <span
                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">Long Sleeve Striped Polo</p>
                        <span class="fw-bold d-block">₱ 200.00</span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="productlist/B2 ITEM 2 FRONT .jpg" class="w-100">
                        <span
                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">Track Sweater</p>
                        <span class="fw-bold d-block">₱ 200.00</span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="productlist/ITEM 6 FRONT.jpg" class="w-100">
                        <span
                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">Striped Short Sleeve Polo</p>
                        <span class="fw-bold d-block">₱ 200.00</span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="productlist/PANTS 2 FRONT.jpg" class="w-100">
                        <span
                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">Blue Jeans</p>
                        <span class="fw-bold d-block">₱ 200.00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of special products -->


    <section id="offers" class="py-5">
        <div class="container">
            <div
                class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class="offers-content">
                    <span class="text-white">Discount Up To 40%</span>
                    <h2 class="mt-2 mb-4 text-white">Grand Sale Offer!</h2>
                    <a href="product.php" class="btn">Buy Now</a>
                </div>
            </div>
        </div>
    </section>


    <!-- about us -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-items-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-5">
                        <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class="lead text-muted">Okay_Ukai is a shop that provides a variety of sustainable, high quality,
                        second-hand or thrifted clothing for all genders at affordable prices.</p>
                    <p>
                        The owner of this shop is Lester Javelosa, A student who has interests in drawing, dancing and
                        playing music. Have fun checking out our shop. I hope you'll find something that interests you
                        too. The shop was made to help the owner's decluttering and to continue selling their
                        ukay/thrift clothes supply online. It was also established to help contribute to efforts
                        regarding sustainable fashion and living.</p>
                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="image2/lesther.jpg" alt="" class="img-fluid" style="border-radius: 10%;">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

    <!-- popular -->
    <section id="tiktok" class="py-5">
        <div class="container">
            <div class="title text-center pt-3 pb-5">
                <h2 class="position-relative d-inline-block ms-4">Follow Us on <a
                        href="https://www.tiktok.com/@okay_ukai?is_from_webapp=1&sender_device=pc">Tiktok</a></h2>
            </div>
            <div class="video">
                <video class="mx-auto" height="700" controls src="okay_ukai.mp4"
                    style="border-radius: 20px; display: flex; justify-content: center; align-items: center;"></video>
            </div>
    </section>
    <!-- end of popular -->

    <!-- newsletter -->
    <section id="newsletter" class="py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="title text-center pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class="text-center text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem
                    officia accusantium maiores quisquam dolorum?</p>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email ...">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->

    <!-- footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4 justify-content-center text-center">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white" href="index.php">okay ukai</a>
                    <p class="text-white text-muted mt-3">
                        Style with purpose, affordability with heart. At okay ukai, your fashion choices make a positive
                        impact.
                    </p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Contact Us</h5>
                    <div class="d-flex flex-column text-muted">
                        <div class="my-2 d-flex align-items-start">
                            <i class="fas fa-map-marked-alt me-2"></i>
                            <span class="fw-light">938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</span>
                        </div>
                        <div class="my-2 d-flex align-items-start">
                            <i class="fas fa-envelope me-2"></i>
                            <span class="fw-light">Okay_Ukai@gmail.com</span>
                        </div>
                        <div class="my-2 d-flex align-items-start">
                            <i class="fas fa-phone-alt me-2"></i>
                            <span class="fw-light">(+63)9165 081 805</span>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Follow Us</h5>
                    <ul class="list-unstyled d-flex justify-content-center">
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->


    <!-- JQuery JS -->
    <script src="jquery-3.7.1.js"></script>

    <!-- isotope -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

    <!--Boostrap JS -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript">

        load_cart_item_number();

        function load_cart_item_number() {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: { cartItem: "cart_item" },
                success: function (response) {
                    if (response == 0 || response == null || response.trim() === "") {
                        $("#cart-item").hide();
                    } else {
                        $("#cart-item").show().html(response);
                    }
                }
            });
        }
    </script>
</body>

</html>