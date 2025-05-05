<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okay_Ukai Thrift Store</title>
     <!-- bootstrap css -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="prodstyle.css">
</head>

<body>
    <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index1.php">
            <img src="logo/okay_ukai.png" alt="site icon" style="border-radius: 50%; width: 30px;">
                <span class="text-uppercase fw-lighter ms-2">Okay Ukai</span>
            </a>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                </button>
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-heart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
                </button>
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-search"></i>
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                            <a class = "nav-link text-uppercase text-dark" href = "shop1.php">shop</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index1.php">home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
        <img src="products4/ITEM 1-20231008T022000Z-001/ITEM 1/ITEM 1 FRONT.jpg" width="100%" id="MainImg" alt="">
        
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="products4/ITEM 1-20231008T022000Z-001/ITEM 1/ITEM 1 FRONT.jpg" width="100%" class="small-img" alt="">
               </div>
               <div class="small-img-col">
                <img src="products4/ITEM 1-20231008T022000Z-001/ITEM 1/ITEM 1 CLOSE UP.jpg" width="100%" class="small-img" alt="">
               </div>
               <div class="small-img-col">
                <img src="products4/ITEM 1-20231008T022000Z-001/ITEM 1/ITEM 1 BACK.jpg" width="100%" class="small-img" alt="">
               </div>
            </div>
        </div>
        <div class="single-pro-details">
            <h6>Product Brand: Folded&Hung</h6>
            <h4>Checkered Short Sleeved Polo</h4>
            <h2>₱150</h2>
            <button class="normal add-cart" data-product-index="0">Add To Cart</button>
            <h4>Product Details</h4>
            
            <span><b>Condition:</b> 10/10<br>
                <b>Issue/s:</b> none<br>
                <b>Fitting estimate:</b> Medium to Large<br>
                <b>Width:</b> 21<br>
                <b>Length:</b> 29<br>
                <b>Mine:</b> P150 + shipping<br>
                <b>Steal:</b> Add P20 to current price<br>
                <b>Grab:</b> P200 + shipping</span>
        </div>
    </section>



    <section id="product2" class="section-p1">
        <h2>Featured Products</h2>
        <div class="pro-container2">
            <div class="pro">
                <img onclick="window.location.href='sin3product1.php';" src="productlist/ITEM 4 FRONT .jpg" alt="">
                <div class="des">
                    <span>Main Street</span>
                    <h5>Striped Short Sleeved Polo</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱120</h4>
                </div>
            </div>
            <div class="pro">
                <img onclick="window.location.href='sin4product1.php';" src="productlist/ITEM 3 FRONT .jpg" alt="">
                <div class="des">
                    <span>Sahara</span>
                    <h5>Red Short Sleeve Polo</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱150</h4>
                </div>
            </div>
            <div class="pro">
                <img onclick="window.location.href='sin5product1.php';" src="productlist/ITEM 6 FRONT.jpg" alt="">
                <div class="des">
                    <span>Hangten</span>
                    <h5>Striped Short Sleeve Polo</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h4>₱120</h4>
                </div>
            </div>
            <div class="pro">
                <img onclick="window.location.href='sin7product1.php';" src="productlist/ITEM 7 FRONT .jpg" alt="">
                <div class="des">
                    <span>Born Sixty Five</span>
                    <h5>Checkered Short Sleeved Polo</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱120</h4>
                </div>
            </div>
        </div>
    </section>

<!-- footer.php -->
<footer class = "bg-dark py-5">
        <div class = "container">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                    <a class = "text-uppercase text-decoration-none brand text-white" href = "index1.php">okay ukai</a>
                    <p class = "text-white text-muted mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum mollitia quisquam veniam odit cupiditate, ullam aut voluptas velit dolor ipsam?</p>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Collection
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Blogs
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> About Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            Albert Street, New York, AS 756, United States of America
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            attire.support@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +9786 6776 236
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- end of footer -->

    <script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");
    var ProxyImg;

    smallimg[0].onclick = function(){
        MainImg.src = smallimg[0].src;
    }

    smallimg[1].onclick = function(){
        MainImg.src = smallimg[1].src;
    }

    smallimg[2].onclick = function(){
        MainImg.src = smallimg[2].src;
    }

    </script>
     <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="script2.js"></script>
</body>
</html>