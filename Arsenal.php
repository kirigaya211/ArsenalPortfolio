<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Arsenal.css">
</head>

<body>
    <div id="wrapper">
        <div id="header-div">
            <div id="logo-div">ARz.</div>
            <div class="line-div">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="nav-div">
                <ul>
                    <li><a href="#home-div" class="active">Home</a></li>
                    <li><a href="#about-div">About</a></li>
                    <li><a href="#portfolio-div">Portfolio</a></li>
                    <li><a href="#contact-div">Contact</a></li>
                </ul>
            </div>
        </div>
        <div id="home-div">
            <div id="hi-div">
                I'M <span>Christopher G. Arsenal Jr.</span><br>
                Bachelor of Science in Information <br>
                Technology-Information Security<br>
            </div>
            <div id="acc-div">
                <div class="vl"></div>
                <a href="https://www.facebook.com/arzkirigaya"><img src="./sns/facebook.png" alt="" ></a>
                <a href="https://www.instagram.com/arzkirigaya"><img src="./sns/instagram.png" alt="" ></a>
                <a href="https://www.linkedin.com/in/christopher-jr-arsenal-109305219"><img src="./sns/linkedin.png" alt="" ></a>
                <a href="https://www.github.com/kirigaya211"><img src="./sns/github.png" alt=""></a>
            </div>
        </div>

        <div id="about-div">
            <div id="pic-div">
               
            </div>
            <div id="me-div">
                <div id="about-me-div">
                    <h1><span>About Me</span></h1><br>
                    <?php 
                        include("connectiondb.php");
                        $sql = "SELECT * FROM about";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $data = $row['about_me'];
                                    echo"$data";
                                }
                            }
                            ?>

                        </div>
            </div>

        </div>
        <div id="portfolio-div">
            <div id="skills">My Skills</div>
            <?php
            include("connectiondb.php");
            $rows = mysqli_query($conn, "SELECT * FROM images")
            ?>
            <?php foreach ($rows as $row) : ?>
                <div id="skill-pic" style="margin:30px;">
                    <img src="./picture/<?php echo $row['imagename']; ?>" height='200px' width='200px' title="<?php echo $row['imagename']; ?>">
                    <div class="skill-name"><?php echo $row["name"]; ?></div>
                </div>
            <?php endforeach;
            $conn->close();
            ?>
             </div>
             <div id="proj">Projects</div>
            <div id="project-container">
            
                    <?php
                    include("connectiondb.php");
                    $rows = mysqli_query($conn, "SELECT * FROM projects")
                    ?>
                    <?php foreach ($rows as $row) : ?>
                        <div id="proj-pic" >
                            <img src="./projects/<?php echo $row['project_pic']; ?>"  title="<?php echo $row['project_pic']; ?>">
                            <div id="proj-name"><h4><?php echo $row["project_name"]; ?></h4></div>
                        </div>
                    <?php endforeach;
                    $conn->close();
                    ?>
            </div>
       

        <div id="work-exp">
            <div id="work-title">Work Experience</div>
            <?php
            include("connectiondb.php");
            $rows = mysqli_query($conn, "SELECT * FROM work_experience")
            ?>
            <?php foreach ($rows as $row) : ?>
                <div id="work-exp-div">
                    <div id="year-div">
                        <li><?php echo $row['year']; ?></li>
                    </div>
                    <div id="description-div"><?php echo $row["description"]; ?></div>
                </div>
            <?php endforeach;
            $conn->close();
            ?>
        </div>
        <div id="contact-div">
            <h2 class="heading">Contact</h2>
            <form action="Arsenal.php" method="post">
            <div class="input-box">
                    <input type="text" name="fulle_name" placeholder="Full Name">
                    <input type="email" name="email_address" placeholder="Email Address">
                </div>
                <div class="input-box">
                    <input type="text" name="mobile_number" placeholder="Mobile Number">
                    <input type="text" name="subject" placeholder="Email Subject">
                </div>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                <input type="submit" name="send" value="Send Message" class="btn">
            </form>
        </div>
        <div id="footer">
            <div class="name_me">Christopher G. Arsenal Jr.</div>
            <div><a href="login_page.php" class="button">Login</a></div>
        </div>
    </div>


    <script>
        menu = document.querySelector(".line-div");
        menu.onclick = function() {
            navDiv = document.querySelector(".nav-div")
            navDiv.classList.toggle("active");
        }
    </script>

</body>

</html>
<?php
include("connectiondb.php");

if (isset($_POST['send'])) {
    function validate($data){
        include("connectiondb.php");
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        $data=mysqli_real_escape_string($conn,$data);
        return $data;
    }
    $name = validate($_POST['fulle_name']);
    $mobilenum = validate($_POST['mobile_number']);
    $emailadd=validate($_POST['email_address']);
    $emailsub=validate($_POST['subject']);
    $message=validate($_POST['message']);
  
    if (empty($name) || empty( $mobilenum) ||empty( $emailadd) ||empty($emailsub)||empty( $message)) {
        echo '<script>alert("Please fill up the neccessary inputs");</script>';
    }else {
        $insert = "insert into messages values('$name','$mobilenum','$emailadd','$emailsub','$message')";
        if (mysqli_query($conn, $insert)) {
            echo '<script>alert("Messages sent");</script>';
    }   else{
        echo '<script>alert("Messages not sent");</script>';
    }
}
}


?>