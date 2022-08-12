
<?php
require_once("./dbconection.php");

if(isset($_GET['t'])&& isset($_GET['uid'])  && isset($_GET['id']) ){
    $sqlapi = " DELETE FROM `". $_GET['t'] ."` WHERE user_id = ". $_GET['uid'] ." AND id = ". $_GET['id'];
    $result = mysqli_query($conn, $sqlapi);
}else if(isset($_GET['name']) && isset($_GET['url'])&& isset($_GET['price']) && isset($_GET['quantity'])&& isset($_GET['userid']) && isset($_GET['id'])){
    $sqlapi = "INSERT INTO `cart`(`user_id`, `product_id`, `url`, `name`, `price`, `quantity`) VALUES ('" . $_GET['userid'] . "','" . $_GET['id'] . "','" . $_GET['url'] . "','" . $_GET['name'] . "','" . $_GET['price'] . "','" . $_GET['quantity'] . "')";
    $result = mysqli_query($conn, $sqlapi);
} else if (isset($_GET['name']) && isset($_GET['url']) && isset($_GET['price']) && isset($_GET['status']) && isset($_GET['userid']) && isset($_GET['id'])) {
    $sqlapi = "INSERT INTO `wishlist`(`user_id`, `product_id`, `url`, `name`, `price`, `status`) VALUES ('" . $_GET['userid'] . "','" . $_GET['id'] . "','" . $_GET['url'] . "','" . $_GET['name'] . "','" . $_GET['price'] . "','" . $_GET['status'] . "')";
    $result = mysqli_query($conn, $sqlapi);
} else if (isset($_GET['table']) && isset($_GET['userid'])  && isset($_GET['id'])&& isset($_GET['a'])) {
    $sqlapi =
    " UPDATE `cart` SET `quantity`='". $_GET['a'] ."' WHERE user_id = " . $_GET['userid'] . " AND id = " . $_GET['id'];
    $result = mysqli_query($conn, $sqlapi);
}
?>