<?php
session_start();
include('connectiondb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url("./background/blob-scene-haikei.png");
            background-repeat: repeat-y;
            background-size: cover;
            background-blend-mode: color-burn;
            min-height: 300px;
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
            margin-top: 12%;
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-form button[type="submit"] {
            width: 100%;
            text-align: center;
            padding: 8px;
            background-color: rgba(0, 163, 255, 1);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-form button[type="submit"]:hover {
            background-color: rgba(0, 163, 255, 1);
        }

        @media (max-width: 480px) {
            .login-form {
                max-width: 90%;
                margin-top: 5%;
                padding: 30px;
            }
        }

        @media (min-width: 481px) and (max-width: 768px) {
            .login-form {
                max-width: 70%;
                margin-top: 10%;
                padding: 40px;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .login-form {
                max-width: 50%;
                margin-top: 12%;
                padding: 50px;
            }
        }
    </style>
</head>

    
</form>

<body>
<form class="login-form"action="valid_login.php" method="post">
    <h2>Login</h2>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php if (isset($_COOKIE["username"])) {
                                                        echo $_COOKIE["username"];
                                                    } ?>"><br>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" value="<?php if (isset($_COOKIE["password"])) {
                                                            echo $_COOKIE["password"];
                                                        } ?>"><br>
        <input type="checkbox" name="remember">Remember Me <br>
        <button type="submit" name="submitbtn" value="submit">Log In</button>
    </div>
</body>

</html>
<?php
if (isset($_SESSION['username'])) {
    header("location:userform.php");
}
?>