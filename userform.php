<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['type'])) {
  header("location:login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      font-size: 20px;
      color: white;
    }

    body {
      width: 80%;
      margin: auto;
      display: flex;
      justify-content: center;
      box-sizing: border-box;
      background-image: url("./background/polygon-scatter-haikei.png");
      background-repeat: no-repeat;
      background-size: cover;
      background-color: rgba(255, 255, 255, 0.10);
    }

    #wrapper {
      height: 100%;
    }

    .title {
      text-align: center;
    }

    .list_div {
      width: 90%;
    }

    table {
      vertical-align: top;
    }

    td {
      vertical-align: top;
    }

    input[type="submit"] {
      width: 100%;
      display: inline-block;
      padding: 5px 10px;
      background-color: rgba(0, 163, 255, 1);
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-size: 17px;
    }

    input[type="submit"]:hover {
      background-color: #01cece;
    }

    .logout {
      width: auto;
      display: inline-block;
      padding: 5px 10px;
      background-color: rgba(0, 163, 255, 1);
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-size: 17px;
    }

    .logout:hover {
      background-color: #01cece;
    }

    #messages {
      width: 50%;
      background-color: lightgrey;
      margin-bottom: 20px;
     ;
    }

    input[type="text"],
    textarea {
      border-radius: 9px;
      background-color: rgb(128, 128, 128, .5);
      color: white;
    }

    form {
      width: 100%;
    }

    .messages {
      border: 2px solid blue;
      background: rgba(118, 118, 118, 0.25);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.18);
      margin-top: 20px
    }
    

    @media only screen and (max-width: 1000px) {
    
      body {
        width: 100%;
        padding: 10px;
      }

      .list_div {
        width: 100%;
      }

      #messages {
        width: 100%;
      }
    }

    @media only screen and (max-width: 800px) {
     
      .title {
        font-size: 24px;
      }

      table {
        display: block;
        width: 100%;
      }

      td {
        display: block;
      }

      td label {
        display: inline-block;
        width: 30%;
        text-align: left;
        margin-right: 10px;
      }

      td input[type="text"],
      td textarea {
        width: 70%;
        margin-top: 5px;
      }
    }
  </style>
</head>
<?php include("connectiondb.php"); ?>

<body>


  <div id="wrapper">
    <div class="title">Client-Side</div>
<div id="edit">
    <form action="userform.php" method="POST" enctype="multipart/form-data">
      <table width="800" cellspacing="2" cellpadding="2">
        <tr>
          <td>Skill Name:</td>
          <td><input type="text" name="name" placeholder="Skill"></td>
          <td><input type="file" name="imagefile" accept=".jpg, .jpeg, .png" /></td>
          <td> <input type="submit" name="Add_Skill" value="Add Skill" /><br></td>
        </tr>
    </form><br>

    <form action="userform.php" method="POST" enctype="multipart/form-data">
      <tr>
        <td>Project Name:</td>
        <td><input type="text" name="proj_name" placeholder="Project"></td>
        <td><input type="file" name="proj_image" accept=".jpg, .jpeg, .png" /></td>
        <td><input type="submit" name="Add_Project" value="Add Project" /><br></td>
      </tr>
    </form><br>

    <form action="userform.php" method="POST">
      <tr>
        <td>Year Experience:<br>Job:</td>
        <td> <input type="text" name="year" placeholder="Year"><br><input type="text" name="job" placeholder="Job"></td>
        <td> <textarea id="description" name="description" rows="5" cols="20" placeholder="Job Description"></textarea></td>
        <td><input type="submit" name="Add_Experience" value="Add Experience" /></td>
      </tr>
    </form>
  </div>
  
    <tr>
      <div id="deleted_div">
        <form action="userform.php" method="post">
          <td>
            <div class="list_div">
              <?php
              echo "Skills List <br>";
              $sql = "SELECT name FROM images";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <input type="checkbox" name="skill[]" value="<?= $row['name']; ?>" /> <?= $row['name']; ?><br>
              <?php
                }
              } else {
                echo "No data";
              }

              ?>

            </div>
          </td>
          <td>
            <div class="list_div">
              <?php
              echo "Projects List <br>";
              $sql = "SELECT project_name FROM projects";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <input type="checkbox" name="project[]" value="<?= $row['project_name']; ?>" /> <?= $row['project_name']; ?><br>
              <?php
                }
              } else {
                echo "No data";
              }
              ?>
            </div>
          </td>
          <td>
            <div class="list_div">
              <?php
              echo "Work Experience List <br>";
              $sql = "SELECT job FROM work_experience";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <input type="checkbox" name="jobs[]" value="<?= $row['job']; ?>" /> <?= $row['job']; ?><br>
              <?php
                }
              } else {
                echo "No data";
              }
              ?>

            </div>

          <td>
            <input type="submit" name="delete_skill" value="Delete Skill"><br>
            <input type="submit" name="delete_projects" value="Delete Projects"><br>
            <input type="submit" name="delete_work" value="Delete Work"><br>
          </td>
        </form>
      </div>
      </td>
    </tr>
    
    <div id="edit_me">
    </table>
<center><h1>About Me</h1></center>
    <tr>
      <?php
      include("connectiondb.php");
      $sql = "SELECT * FROM about";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['my_name'];
          $data = $row['about_me'];
          echo '<form action="" method="POST">';
          echo '<input type="hidden" name="name" value="' . $id . '">';
          echo '<input type="text" name="about_holder" value="' . $data . '" style="width:99%; height:100px;">';
          echo '<input type="submit" name="submit" value="Update" >';
          echo '</form>';
          if (isset($_POST['submit'])) {
            $id = $_POST['name'];
            $updatedData = $_POST['about_holder'];
            $updateSql = "UPDATE about SET about_me='$updatedData' WHERE my_name='$id'";
            if ($conn->query($updateSql) === TRUE) {
              echo '<script>alert("About me updated successfully!");</script>';
            } else {
              echo '<script>alert("Error updating data: "'. $conn->error.');</script>';
            }
          }
        }
      } else {
        echo "No data found.";
      }
      ?>
 </div>

 
    </tr><div class="messages">
  <form action="userform.php" method="post">
    
    <center><h1>MESSAGES</h1></center> <br>
    <?php
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
    <div class="read">
      <table width="500" cellspacing="2" cellpadding="2" style="border-bottom:1px solid gray; margin-bottom:10px">
        <tr>
          <td> <input type="checkbox" name="delete_messages[]" value="<?= $row['name']; ?>" />Sender:</td>
          <td><?= $row['name']; ?><br></td>
        </tr>
        <tr>
          <td>Mobile number:</td>
          <td><?= $row['mobile_number']; ?><br></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><?= $row['email']; ?><br></td>
        </tr>
        <tr>
          <td>Subject:</td>
          <td><?= $row['subject']; ?><br></td>
        </tr>
        <tr>
          <td>Message:</td>
          <td><?= $row['message']; ?><br></td>
        </tr>
      </table>
    </div>
    <?php
      }
    } else {
      echo "No data";
    }
    ?>
    <input type="submit" name="delete_message" value="Delete Message">
  </form>
</div>
<form action="logout.php" method="post">
  <center><button type="submit" class="logout" name="logout" value="logout">Logout</button></center>
</form>
</div>
  
        <?php $conn->close(); ?>
</body>

</html>
<?php
include("connectiondb.php");
if (isset($_POST['Add_Skill'])) {
  $name = $_POST['name'];
  $img = $_FILES['imagefile']['name'];

  if (empty($name) || empty($img)) {
    echo '<script>alert("Please completely fill up the neccessary information!");</script>';
  } else {
    $sql = "SELECT name FROM images WHERE name='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<script>alert("The skill is already in the database!");</script>';
    } else {
      $insert = "insert into images values('$name','$img')";
      if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_FILES['imagefile']['tmp_name'], "projects/$img");
        echo '<script>alert("Skilll added successfully!");</script>';
      } else {
        echo '<script>alert("Unsuccessful upload!");</script>';
      }
    }
  }
}

$conn->close();
?>
<?php
include("connectiondb.php");
if (isset($_POST['Add_Project'])) {
  $name = $_POST['proj_name'];
  $img = $_FILES['proj_image']['name'];

  if (empty($name) || empty($img)) {
    echo '<script>alert("Please completely fill up the neccessary information!");</script>';
  } else {
    $sql = "SELECT project_name FROM projects WHERE project_name='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<script>alert("The project is already in the database!");</script>';
    } else {
      $insert = "insert into projects values('$name','$img')";
      if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_FILES['proj_image']['tmp_name'], "projects/$img");
        echo '<script>alert("Project added successfully!");</script>';
      } else {
        echo '<script>alert("Unsuccessful upload!");</script>';
      }
    }
  }
}

$conn->close();
?>
<?php
include("connectiondb.php");
if (isset($_POST['Add_Experience'])) {
  $year = $_POST['year'];
  $job = $_POST['job'];
  $description = $_POST['description'];

  if (empty($year) || empty($description) || empty($job)) {
    echo '<script>alert("Please completely fill up the neccessary information!");</script>';
  } else {
    $sql = "SELECT job FROM work_experience WHERE job='$job'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<script>alert("The job is already in the database!");</script>';
    } else {
      $insert = "insert into work_experience values('$year','$job','$description')";
      if (mysqli_query($conn, $insert)) {
        echo '<script>alert("Work Experience added successfully!");</script>';
      } else {
        echo '<script>alert("Unsuccessful upload!");</script>';
      }
    }
  }
}

$conn->close();
?>


<?php
include("connectiondb.php");
if (isset($_POST['delete_skill'])) {
  $checkboxes1 = $_POST['skill'];
  if (empty($checkboxes1)) {
    echo '<script>alert("Please check the checkbox you want to delete");</script>';
  } else {
    foreach ($checkboxes1 as  $imagename) {
      $sql = "DELETE FROM images WHERE name = '$imagename'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Deleted Successfully");</script>';
      } else {
        echo '<script>alert("Error Deleting");</script>';
      }
    }
  }
}
$conn->close();
?>

<?php
include("connectiondb.php");
if (isset($_POST['delete_projects'])) {
  $checkboxes1 = $_POST['project'];
  if (empty($checkboxes1)) {
    echo '<script>alert("Please check the checkbox you want to delete");</script>';
  } else {
    foreach ($checkboxes1 as  $imagename) {
      $sql = "DELETE FROM projects WHERE project_name = '$imagename'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Deleted Successfully");</script>';
      } else {
        echo '<script>alert("Error Deleting");</script>';
      }
    }
  }
}
$conn->close();
?>
<?php
include("connectiondb.php");
if (isset($_POST['delete_work'])) {
  $checkboxes1 = $_POST['jobs'];
  if (empty($checkboxes1)) {
    echo '<script>alert("Please check the checkbox you want to delete");</script>';
  } else {
    foreach ($checkboxes1 as  $imagename) {
      $sql = "DELETE FROM work_experience WHERE job = '$imagename'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Deleted Successfully");</script>';
      } else {
        echo '<script>alert("Error Deleting");</script>';
      }
    }
  }
}
$conn->close();
?>

<?php
include("connectiondb.php");
if (isset($_POST['delete_message'])) {
  $checkboxes1 = $_POST['delete_messages'];
  if (empty($checkboxes1)) {
    echo '<script>alert("Please check the message checkbox you want to delete");</script>';
  } else {
    foreach ($checkboxes1 as  $name) {
      $sql = "DELETE FROM messages WHERE name = '$name'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Deleted Successfully");</script>';
      } else {
        echo '<script>alert("Error Deleting");</script>';
      }
    }
  }
}
$conn->close();
?>