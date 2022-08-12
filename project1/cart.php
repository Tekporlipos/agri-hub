<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <title>AGRI-HUB CART</title>

    <?php
    include("./include/header.php");
    ?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                if (isset($_SESSION['id'])) {
                                    $sql = "SELECT * FROM `cart` WHERE user_id = " . $_SESSION['id'];
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr id="row<?php echo $row['product_id'] ?>">
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid" src=" <?php echo $row['url'] ?>" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="./shop-detail.php?product_id=<?php echo $row["product_id"];  ?>">
                                                    <?php echo $row['name'] ?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>¢ <?php echo $row['price'] ?></p>
                                            </td>
                                            <td class="quantity-box">
                                                <input type="number" id="rowin<?php echo $row['product_id'] ?>" size="4" onkeyup="addValue('cart', '<?php echo $_SESSION['id'] ?>', '<?php echo $row['id'] ?>', 'rowin<?php echo $row['product_id'] ?>')" value="<?php echo $row['quantity'] ?>" min="0" step="1" class="c-input-text qty text">
                                            </td>
                                            <td class="total-pr">
                                                <p>¢ <?php echo is_numeric($row['price'])&&is_null($row['quantity']) ? $row['price']* $row['quantity']:0   ?></p>
                                            </td>
                                            <td class="remove-pr">
                                                <a class="btn" onclick="deleteRow('cart','<?php echo $_SESSION['id'] ?>','<?php echo $row['id'] ?>','row<?php echo $row['product_id'] ?>')">
                                                    <i class="fas fa-times"></i>
                                                </a>
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

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <a href="cart.php"><input value="Update Cart" type="submit"></a>

                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
                $sql = "SELECT * FROM `cart` WHERE user_id = " . $_SESSION['id'];

                $result = mysqli_query($conn, $sql);
                $total = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $total =  is_numeric($row['price']) && is_null($row['quantity']) && is_numeric($total) ? $total + ($row['price'] * $row['quantity']) : $total;
                }
                if (isset($result)) {
            ?>
                    <div class="row my-5">
                        <div class="col-lg-8 col-sm-12"></div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="order-box">
                                <h3>Order summary</h3>
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> ¢ <?php echo $total  ?></div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> ¢00 </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Coupon Discount</h4>
                                    <div class="ml-auto font-weight-bold"> ¢00 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> ¢00.00 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">¢<?php echo $total  ?></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
                    </div>

            <?php
                }
            }

            ?>


        </div>
    </div>
    <!-- End Cart -->

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