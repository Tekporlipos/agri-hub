    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile formof view  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>
        <!-- Start Main Top -->

        <div class="main-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="custom-select-box">
                            <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                <option>LANGUAGE</option>
                                <a href="index.php">
                                    <option>ENGLISH</option>
                                </a>
                                <option>TWI</option>
                                <option>FANTE</option>
                            </select>
                        </div>
                        <div class="right-phone-box">
                            <p><B>CONTACT PROJECT GROUP MEMBERS FOR DIRECT ENQUIRIES:- <a href="#">
                                        0249593084/0543706787</a></B></p>
                        </div>
                        <div class="our-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-user s_color"></i> My AGRI-HUB Account</a></li>
                                <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                                <li><a href="#"><i class="fas fa-headset"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="login-box">

                            <div id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                                <?php
                                session_start();
                                require_once("./php/dbconection.php");
                                if (isset($_SESSION['id'])) {
                                ?>
                                    <a class="text-white p-1" style="background-color: #b0b435;" href="my-account.php"><?php echo $_SESSION['name']; ?></a>
                                <?php
                                } else {
                                ?>
                                    <a class="text-white p-1" style="background-color: #b0b435;" href="signup.php">Register Now</a>
                                <?php
                                }



                                ?>


                            </div>
                        </div>
                        <div class="text-slid-box">
                            <div id="offer-box" class="carouselTicker">
                                <ul class="offer-box">
                                    <li>
                                        <i class="fab fa-opencart"></i> CellX China is a Proud Producer of Agricultural
                                        Machinery to farmers in Ghana..
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> 50% - 80% off on UPCOMING AGRO HUB SEMINAR WITH SHANGAI
                                        AGRICULTURAL CONSULTANCY
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> 10%! off MODERN AGRIC BOOKS
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> Off 10%! Vegetables seeds
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> Free online seminar upcoming ...25th July, 2022
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i>Download Agric-Hub Mobile App Here Now....
                                    </li>
                                    <li>
                                        <i class="fab fa-opencart"></i> Contacts one agents now!!!
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Top -->

        <!-- Start Main Top -->
        <header class="main-header">
            <!-- Start Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
                <div class="container">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="./images/favicon.ico" class="logo" alt=""><br><strong>
                                <h2>AGRI-HUB GHANA</h2>
                            </strong></a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="nav-item <?php
                                                $check = ($_SERVER["PHP_SELF"]) == "/projects/project1/index.php" || ($_SERVER["PHP_SELF"]) == "/projects/project1";
                                                $active  = $check ? "active" : "";
                                                echo $check;

                                                ?> "><a class="nav-link" href="index.php">HOME</a></li>
                            <li class="nav-item <?php
                                                $check = ($_SERVER["PHP_SELF"]) == "/projects/project1/about.php";
                                                $active  = $check ? "active" : "";
                                                echo $check;

                                                ?>"><a class="nav-link" href="about.php">About Us</a></li>
                            <li class="dropdown <?php
                                                $check = ($_SERVER["PHP_SELF"]) == "/projects/project1/shop.php";
                                                $active  = $check ? "active" : "";
                                                echo $check;

                                                ?>">
                                <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOPS</a>
                                <ul class="dropdown-menu">
                                    <li><a href="shop.php?q=book">DOWNLOAD FREE AGRICULTURE NOW</a></li>
                                    <li><a href="shop.php?q=grocery">ORGANIC GROCERY</a></li>
                                    <hr class="bg-white">
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php
                                                $check = ($_SERVER["PHP_SELF"]) == "/projects/project1/gallery.php";
                                                $active  = $check ? "active" : "";
                                                echo $check;

                                                ?>"><a class="nav-link" href="gallery.php">Gallery</a>
                            </li>
                            <li class="nav-item <?php
                                                $check = ($_SERVER["PHP_SELF"]) == "/projects/project1/gallery.php";
                                                $active  = $check ? "active" : "";
                                                echo $check;

                                                ?>"><a class="nav-link" href="gallery.php">OUR PARTNERS</a></li>

                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">YOUR SPACE</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">SELL YOUR PRODUCT ONLINE</a></li>
                                    <li><a href="#">FIND DELIVERY</a></li>
                                    <li><a href="#">ADVERTISE YOUR PRODUCT</a></li>
                                    <li><a href="#">CREATE A BRAND</a></li>
                                    <hr class="bg-white">
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                            <li class="side-menu">
                                <a href="cart.php">
                                    <i class="fa fa-shopping-bag"></i>
                                    <?php

                                    $numb = 0;

                                    if(isset($_SESSION['id'])){
                                        $sql_count = "SELECT id FROM `cart` WHERE user_id = " . $_SESSION['id'];

                                        $count = mysqli_query($conn, $sql_count);
                                        $numb = mysqli_num_rows($count);

                                    }
                                  
                                    ?>
                                    <span class="badge text-danger" id="cartCount"><?php echo $numb  ?></span>

                                    <?php

                                    ?>

                                    <p>My Cart</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                </div>
              
            </nav>
            <!-- End Navigation -->
        </header>
        <!-- End Main Top -->

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->