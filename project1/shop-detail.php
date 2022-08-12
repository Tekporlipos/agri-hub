<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <title>AGRI-HUB SHOP DETAILS</title>

    <?php

    include("./include/header.php");
    require_once("./php/dbconection.php")
    ?>



    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <?php
    $id = $_GET["product_id"];
    $sql = "SELECT * FROM `products` WHERE id = " . $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <!-- Start Shop Detail  -->
            <div class="shop-detail-box-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <?php

                                    $ar = explode(",", $row["url"]);

                                    for ($a = 0; $a < count($ar); $a++) {
                                    ?>
                                        <div class="carousel-item <?php echo $a == 0 ? "active" : "" ?>"> <img class="d-block w-100" style="height: 370px !important;" src="<?php echo $ar[$a];  ?>"> </div>

                                    <?php
                                    }

                                    ?>

                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                                <ol class="carousel-indicators">
                                    <?php

                                    $ar = explode(",", $row["url"]);

                                    for ($a = 0; $a < count($ar); $a++) {
                                    ?>
                                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                            <img class="d-block w-100 img-fluid" src="<?php echo $ar[$a];  ?>" alt="" />
                                        </li>
                                    <?php
                                    }

                                    ?>
                                </ol>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6">
                            <div class="single-product-details">
                                <h2><?php echo $row["name"];  ?></h2>
                                <h5> <del>¢ <?php echo $row["price2"];  ?></del> ¢<?php echo $row["price1"];  ?></h5>
                                <p class="available-stock"><span> More than <?php echo $row["quantity"];  ?> available / <a href="#"><?php echo $row["quantity"] - $row["available"];  ?> sold </a></span>
                                <p>
                                <h4>Short Description:</h4>
                                <p><?php echo $row["description"];  ?></p>
                                </p>
                                <ul>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" id="qunatValue" value="1" min="0" max="20" type="number">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover text-white" data-fancybox-close="">Buy New</a>
                                        <a class="btn hvr-hover text-white" data-fancybox-close="" id="shop<?php echo $row['id'];  ?>" onclick="addCart('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>', '1', '<?php echo $_SESSION['id'];  ?>', '<?php echo $row['id'];  ?>','shop<?php echo $row['id'];  ?>')">Add to Cart</a>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover text-white" id="shopw<?php echo $row['id'];  ?>" onclick="addWishList('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>','<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>', '<?php echo $row['status'];  ?>','shopw<?php echo $row['id'];  ?>')"><i class="fas fa-heart"></i> Add to wishlist</a>

                                        <a class="btn hvr-hover text-white"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="card card-outline-secondary my-4">
                            <div class="card-header">
                                <h2>Product Reviews</h2>
                            </div>
                            <div class="card-body">

                                <?php
                                $sql1 = "SELECT * FROM reviews WHERE product_id =" . $row["id"];
                                $result1 = mysqli_query($conn, $sql1);

                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                ?>
                                    <div class="media mb-3">
                                        <div class="mr-2">
                                            <img width="70px" height="70px" class="rounded-circle border p-1" src="<?php echo explode(",", $row["url"])[0];  ?>" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $row1["review"];  ?></p>
                                            <small class="text-muted"></small>
                                        </div>
                                    </div>
                                    <hr>
                                <?php
                                }
                                ?>




                                <a href="#" class="btn hvr-hover">Leave a Review</a>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-lg-12">
                            <div class="title-all text-center">
                                <h1>Featured Products</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                            </div>
                            <div class="featured-products-box owl-carousel owl-theme">


                                <?php
                                $sql = "SELECT * FROM `products`;";
                                $result = mysqli_query($conn, $sql);

                                while ($row2 = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="item">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <img src="<?php echo explode(",", $row2["url"])[0]; ?>" style="height: 270px !important;" class="img-fluid" alt="Image">
                                                <div class="mask-icon">
                                                    <ul>
                                                        <li><a href="./shop-detail.php?product_id=<?php echo $row2["id"];  ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                        <li><a class="text-white btn" data-toggle="tooltip" data-placement="right" title="Add to Wishlist" id="shopw11<?php echo $row['id'];  ?>" onclick="addWishList('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>','<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>', '<?php echo $row['status'];  ?>','shopw11<?php echo $row['id'];  ?>')"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                    <a class="btn cart  text-white" id="shop1<?php echo $row2['id'];  ?>" onclick="addCart('<?php echo $row2['name'];  ?>', '<?php echo explode(',', $row2['url'])[0];  ?>', '<?php echo $row2['price1'];  ?>', '1', '<?php echo $_SESSION['id'];  ?>', '<?php echo $row2['id'];  ?>','shop1<?php echo $row2['id'];  ?>')">Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="why-text">
                                                <h4><?php echo $row2["name"];  ?></h4>
                                                <h5> $<?php echo $row2["price1"];  ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Cart -->
    <?php
        }
    }

    ?>








    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
    <?php

    include("./include/footer.php")

    ?>

</html>