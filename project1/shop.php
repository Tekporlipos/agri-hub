<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <title>AGRI-HUB SHOP</title>

    <?php
    include("./include/header.php");
    require_once("./php/dbconection.php")
    ?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">High Price → High Price</option>
                                        <option value="3">Low Price → High Price</option>
                                        <option value="4">Best Selling</option>
                                    </select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">


                                        <?php

                                        $sql = "SELECT * FROM `products`;";

                                        if (isset($_GET['q'])) {
                                            $sql = "SELECT * FROM `products` WHERE type='" . $_GET['q'] . "'";
                                        } elseif (isset($_GET['s'])) {
                                            $sql = "SELECT * FROM `products` WHERE name REGEXP '" . $_GET['s'] . "' OR description REGEXP '" . $_GET['s'] . "'";
                                        }

                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale"><?php echo $row["status"];  ?></p>
                                                        </div>
                                                        <img src="<?php echo explode(",", $row["url"])[0];  ?>" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="./shop-detail.php?product_id=<?php echo $row["id"];  ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li>
                                                                    <a class="btn text-white" data-toggle="tooltip" data-placement="right" title="Add to Wishlist" id="shopw<?php echo $row['id'];  ?>" onclick="addWishList('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>','<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>', '<?php echo $row['status'];  ?>','shopw<?php echo $row['id'];  ?>')"><i class="far fa-heart"></i></a>
                                                                </li>
                                                            </ul>
                                                            <a class="cart btn" id="shop<?php echo $row['id'];  ?>" onclick="addCart('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>', '1', '<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>','shop<?php echo $row['id'];  ?>')">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4><?php echo $row["name"];  ?></h4>
                                                        <h5 class="bg-danger">¢<?php echo $row["price1"];  ?></h5>
                                                        <h5><?php echo $row["type"];  ?></h5>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">


                                    <?php

                                    $sql = "SELECT * FROM `products`;";

                                    if (isset($_GET['q'])) {
                                        $sql = "SELECT * FROM `products` WHERE type='" . $_GET['q'] . "'";
                                    } elseif (isset($_GET['s'])) {
                                        $sql = "SELECT * FROM `products` WHERE name REGEXP '" . $_GET['s'] . "'";
                                    }

                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="new"><?php echo $row["status"];  ?></p>
                                                            </div>
                                                            <img src="<?php echo explode(",", $row["url"])[0];  ?>" class="img-fluid" alt="Image">
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="./shop-detail.php?product_id=<?php echo $row["id"];  ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                    <li><a data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                    <li>
                                                                        <a class="btn text-white" data-toggle="tooltip" data-placement="right" title="Add to Wishlist" id="shopw1<?php echo $row['id'];  ?>" onclick="addWishList('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>','<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>', '<?php echo $row['status'];  ?>','shopw1<?php echo $row['id'];  ?>')"><i class="far fa-heart"></i></a>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4><?php echo $row["name"];  ?> </h4>
                                                        <h5> <del>¢<?php echo $row["price2"];  ?></del> ¢<?php echo $row["price1"];  ?></h5>
                                                        <p>
                                                            <?php echo $row["description"];  ?>
                                                        </p>
                                                        <a id="shop1<?php echo $row['id'];  ?>" onclick="addCart('<?php echo $row['name'];  ?>', '<?php echo explode(',', $row['url'])[0];  ?>', '<?php echo $row['price1'];  ?>', '1', '<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>','shop1<?php echo $row['id'];  ?>')" class="btn hvr-hover">Add to Cart</a>
                                                    </div>
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
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="shop.php">
                                <input class="form-control" name="s" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Our Shops <small class="text-muted"></small>
                                    </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">

                                            <a href="shop.php?q=book" class="list-group-item list-group-item-action">Books<small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action"><small class="text-muted"></small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">ONLINE BOOKS
                                        <small class="text-muted">(50)</small>
                                    </a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="shop.php?q=book" class="list-group-item list-group-item-action">MODERN AGRIC BOOK EDITION 1 <small class="text-muted">(10)</small></a>
                                            <a href="shop.php?q=book" class="list-group-item list-group-item-action">CARR SERIES AGRICULTURAL SCIENCE<small class="text-muted">(20)</small></a>
                                            <a href="shop.php?q=book" class="list-group-item list-group-item-action">RURAL DEVELOPMENT SECOND EDITION <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="shop.php?q=grocery" class="list-group-item list-group-item-action"> GROCERY<small class="text-muted">(150) </small></a>
                                <a href="shop.php?q=grocery" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                                <a href="shop.php" class="list-group-item list-group-item-action"> ALL <small class="text-muted">(999+)</small></a>
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

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