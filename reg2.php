<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Buddy</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
    <body>
    <header>
        <li class= "logo"><a href="index.html">logo</a></li>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="chatter.html">Chat</a></li>
            <li><a href="stuff.html">Content</a></li>
            <li><a href="sesh.html">Planner</a></li>
        </ul>
    </nav> -->
<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "study buddy";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "";
}
//receive  values from tutor registration form
if(isset($_POST['teacbut'])){
    $username_s=trim($_POST['username']);
    $firstname=trim($_POST['firstname']);
    $surname=trim($_POST['surname']);
    $levels=trim($_POST['levels']);
    $institution=trim($_POST['institution']);
    $passwords=trim($_POST['password']);

//insert values into teachers table
$sqli ="INSERT INTO `teachers`(username_s,firstname,surname,levels,institution,passwords) VALUES ('$username_s','$firstname','$surname','$levels','$institution','$passwords')";
$res = mysqli_query($con, $sqli) or die(mysqli_error($con));
if ($res) {
    echo "New teacher account created!";
} else {
    echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
}
?>
    <!-- <section class= "teachreg">
        <form action="../php2/reg2.php" method="POST">
            <fieldset class= "register2">
                    <legend><b>Input Teacher User Details</b></legend>
                    <b>Username:</b> <input type="text" name="username" required><br><br>
                    <b>First Name:</b> <input type="text" name="firstname" required><br><br>
                    <b>Surname:</b> <input type="text" name="surname" required><br><br>
                    <b>Level of Education:</b> <input type="text" name="levels" required><br><br>
                    <b>Institution:</b> <input type="text" name="institution" required><br><br>
                    <b>Password:</b> <input type="password" name="password" required><br><br>
                <button onclick= "location.href = 'chatter.html';" type="submit" name="teachbut" value="submit" style= "background: transparent;" style="border-radius: 5px;">Submit</button>
            </fieldset>
            </form>  

    </section>
    <footer>
        <p><b>Study Buddy &nbsp &nbsp &nbsp &nbsp 29742-00202 Nairobi, Kenya &nbsp * &nbsp +254721951035</b></p>
    </footer>

</body>
</html> -->