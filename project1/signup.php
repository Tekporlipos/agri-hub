<!doctype html>
<html lang="en">

<head>
    <title>AGRI-HUB CHEKOUTS</title>

    <?php
    include("./include/header.php");


    if (isset($_SESSION['id'])) {
    ?>

        <script>
            history.back();
        </script>
        <?php
    }


    $error = "";
    $error1 = "";
    $success = "";

    if (@$_POST['login']) {
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        $hased = md5($password, true);
        $qli = "SELECT * FROM `users` WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $qli);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $expected  = crypt($password, '$2a$07$usesomesillystringforsalt$');
            if (hash_equals($expected, $row['hash_password'])) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];


        ?>


                <script>
                    window.location.href = "./index.php";
                </script>

    <?php


            } else {
                $error = "Wrong password or email";
            }
        } else {
            $error = "The password or email you entered does not exist";
        }
    } else if (@$_POST['signup']) {
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $cpassword =  $_POST['cpassword'];
        $name =  $_POST['name'];
        if (strlen($password) >= 8) {
            $hased  = crypt($password, '$2a$07$usesomesillystringforsalt$');
            $qlr = "INSERT INTO `users`(`name`, `email`, `hash_password`, `status`) VALUES ('" . $name . "','" . $email . "','" . $hased . "','true')";
            if (mysqli_query($conn, $qlr)) {
                $success = "Registration went on successfully you can login now";
            } else {
                $error1 = "Something went worng try again leter please";
            }
        } else {
            $error1 = "weak password";
        }
    }


    ?>

<body>
    <div class="row new-account-login container ">
        <div class="col-sm-12 col-lg-6 mb-6">
            <div class="title-left">
                <h3>Account Login</h3>
            </div>
            <h2 class="text-danger">
                <?php echo $error ?>
            </h2>

            <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
            <form class="mt-3 collapse review-form-box" id="formLogin" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputEmail" class="mb-0">Email Address</label>
                        <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputPassword" class="mb-0">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                    </div>
                </div>
                <input type="hidden" value="login" name="login">

                <button type="submit" class="btn hvr-hover">Login</button>
            </form>
        </div>
        <div class="col-sm-12 col-lg-6 mb-6">
            <div class="title-left">
                <h3>Create New Account</h3>
            </div>
            <h2 class="text-danger">
                <?php echo $error1 ?>
            </h2>
            <h2 class="text-primary">
                <?php echo $success ?>
            </h2>
            <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
            <form class="mt-3 collapse review-form-box" id="formRegister" method="post" target="./">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="InputName" class="mb-0">Full Name</label>
                        <input type="text" class="form-control" name="name" id="InputName" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputLastname" class="mb-0">Email Address</label>
                        <input type="email" class="form-control" name="email" id="Inputemil" placeholder="Email Address">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputEmail1" class="mb-0">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="Inpupassword2" placeholder="Confirm Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputPassword1" class="mb-0">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
                    </div>
                </div>
                <input type="hidden" value="signup" name="signup">

                <button type="submit" class="btn hvr-hover">Register</button>
            </form>
        </div>
    </div>
</body>


<?php

include("./include/footer.php")

?>

</html>