<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPass = "";
$dBName= "schooludbtest";

$conn = mysqli_connect($serverName,$dBUsername,$dBPass,$dBName);


function printUsers($uPos,$conn){
    $sql = "SELECT username FROM users WHERE userPosition='".$uPos."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo'<p>'.$row["username"].'</p>';
      }
    } else {
      echo "<p>None</p>";
    }
}
?>
<body>
    <header>
        <h1>
            List of Users of Example School 
            <i class="fa-solid fa-school"></i>
        </h1>
    </header>
    <main>
         <section class="userList" id="Student">
            <div class="contentHeader">
                <h2>
                    Students
                    <i class="fa-solid fa-graduation-cap"></i>
                </h2>
            </div>

            <div class="mainContent">
                <?php
                 printUsers("Student",$conn)
                ?>
            </div>
         </section>
         <section class="userList" id="Teachers">
            <div class="contentHeader">
                <h2>
                    Teachers
                    <i class="fa-solid fa-chalkboard-user"></i>
                </h2>
            </div>

            <div class="mainContent">
            <?php
                 printUsers("Teacher",$conn)
            ?>
            </div>
         </section>
         <section class="userList" id="Faculty">
            <div class="contentHeader">
                <h2>
                    Faculty
                    <i class="fa-solid fa-user-group"></i>
                </h2>
            </div>

            <div class="mainContent">
            <?php
                 printUsers("Faculty",$conn)
            ?>
            </div>
         </section>
    </main>
    <footer>
        <?php

        if(!$conn){
            echo("Connection failed" . mysqli_connect_error());
        }
        ?>
    </footer>
    <script src="https://kit.fontawesome.com/d4a9f52e1a.js" crossorigin="anonymous"></script>
</body>
</html>