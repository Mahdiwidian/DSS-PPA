<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.css"> -->
    <title>Login</title>

    <style>
        /*.panel-login{
    margin-left: 75%;
    margin-top: 200px;
}*/

        body,
        html {
            height: 100%;
            margin: 0;

        }

        .bg {
            /* The image used */
            background-image: url("<?= base_url(); ?>/assets/img/3.jpeg");

            /* Full height */
            height: 100%;
            margin: 0%;

            /* Center and scale the image nicely */
            /* background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            -webkit-background-size: cover;
            -moz-background-size: cover; 
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="container">
            <!-- <div class="float-right"> -->
            <div class="row">
                <div class="col-md-4 offset-md-8" style="margin-top: 220px">
                    <div class="login-panel panel panel-success">
                        <div class="panel-heading">

                            <h3 class="panel-title">Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo base_url('/login/auth') ?>">
                                <fieldset>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
                                </fieldset>
                            </form>
                        </div>
                        <div>
                            <!-- <a href="admin_login.php">Admin</a> |
                            <a href="registration.php">Registrasi</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// include("koneksi.php");

// if (isset($_POST['login'])) {
//     $user_email = $_POST['email'];
//     $user_pass = $_POST['pass'];
//     $check_user = "select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";
//     $run = mysqli_query($dbcon, $check_user);
//     if (mysqli_num_rows($run)) {
//         echo "<script>window.open('welcome.php','_self')</script>";
//         $_SESSION['email'] = $user_email;
//     } else {
//         echo "<script>alert('Email or password is incorrect!')</script>";
//     }
// }
?>