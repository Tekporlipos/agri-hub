<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <title>AGRI-HUB CART</title>

    <?php

    include("./include/header.php");
    require_once("./php/dbconection.php")
    ?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Unit Price </th>
                                    <th>Stock</th>
                                    <th>Add Item</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    $sql = "SELECT * FROM `wishlist` WHERE user_id = " . $_SESSION['id'];
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr id="row<?php echo $row['id'] ?>">
                                            <td class="thumbnail-img">
                                                <a href="./shop-detail.php?product_id=<?php echo $row['product_id'] ?>">
                                                    <img class="img-fluid" src="<?php echo $row['url'] ?>" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="./shop-detail.php?product_id=<?php echo $row['product_id'] ?>">
                                                    <?php echo $row['name'] ?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>$ <?php echo $row['price'] ?></p>
                                            </td>
                                            <td class="quantity-box"><?php echo $row['status'] ?></td>
                                            <td class="add-pr">
                                                <a class="btn hvr-hover" id="shop1<?php echo $row['id'];  ?>" onclick="addCart('<?php echo $row['name'];  ?>', '<?php echo $row['url'];  ?>', '<?php echo $row['price'];  ?>', '1', '<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null;  ?>', '<?php echo $row['id'];  ?>','shop1<?php echo $row['id'];  ?>')">Add to Cart</a>
                                            </td>
                                            <td class="remove-pr">
                                                <a class="btn" onclick="deleteRow('wishlist','<?php echo $_SESSION['id'] ?>','<?php echo $row['id'] ?>','row<?php echo $row['id'] ?>')">
                                                    <i class="fas fa-times"></i>
                                                    </av>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->

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