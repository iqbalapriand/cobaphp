<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Medical Health Center</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://indonesiaartikel.com/wp-content/uploads/2019/06/rumah-sakit-jakarta.jpg');  /* Replace with your medical-themed background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Overlay to make text more readable */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.3);  /* Semi-transparent white overlay */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;  /* Place above overlay */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);  /* Semi-transparent white */
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);  /* Blur effect behind the container */
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            border: 3px solid #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .login-header h4 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(152, 255, 152, 0.25);
            border-color: #98FF98;
        }

        .btn-login {
            background: #98FF98;
            border: none;
            padding: 0.8rem;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
            color: #000;  /* Black text for better contrast */
        }

        .btn-login:hover {
            background: rgb(4, 234, 4);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .alert {
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.9);
        }

        /* Custom animation for login container */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <?php
    require_once "../_config/config.php";
    if (isset($_SESSION['user'])) {
        echo "<script>window.location='".base_url()."';</script>";
    } else {
    ?>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <img src="https://img2.pngdownload.id/20181212/hal/kisspng-portable-network-graphics-image-logo-hospital-desi-5c10c69a1254f9.6816117315446032900751.jpg" alt="Medical Center Logo" class="rounded-circle">
                <h4>Medical Health Center</h4>
                <p class="text-muted">Please login to continue</p>
            </div>
            
            <?php
            if(isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username ='$user' AND password ='$pass'") or die(mysqli_error($con));
                if(mysqli_num_rows($sql_login) > 0){
                    $_SESSION['user'] = $user;
                    echo "<script>window.location='".base_url()."';</script>";
                } else {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <strong>Login Failed!</strong> Invalid username or password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            }
            ?>
            
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="user" placeholder="Username" required autofocus>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" name="login" class="btn btn-login">
                    Sign In
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <?php } ?>
</body>
</html>