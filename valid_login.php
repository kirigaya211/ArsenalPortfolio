<?php
session_start();
include("connectiondb.php");
if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        include("connectiondb.php");
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        $data=mysqli_real_escape_string($conn,$data);
        return $data;
    }
        $username=validate($_POST['username']);
        $password=validate($_POST['password']);

    if(empty($username)){
        header("Location: login_page.php?errr=username is required");
        exit();

    }elseif(empty($password)){
        header("Location: login_page.php?error=password is required");
        exit();
        
    }else{
        $sql = "SELECT * FROM user_table WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
    
                if (isset($_POST['remember'])) {
                    setcookie('username', $row['username'], time() + (86400 * 30), '/');
                    setcookie('password', $row['password'], time() + (86400 * 30), '/');
                }
    
                header("Location: userform.php");
                exit();
            } else {
                header("Location: login_page.php?error=Invalid username or password");
                exit();
            }
        } else {
            header("Location: login_page.php?error=Invalid username or password");
            exit();
        }
    }
    
}else{
    header("Location: login_page.php");
    exit();
}


?>