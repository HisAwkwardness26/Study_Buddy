<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Buddy</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
    <body>
    <header>
        <li class= "logo"><a href="../pages/index.html">logo</a></li>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="chatter.html">Chat</a></li>
            <li><a href="stuff.htnl">Content</a></li>
            <li><a href="sesh.html">Planner</a></li>
        </ul>
    </nav>
<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "study_buddy";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "";
}
//receive values from student registration form 
if(isset($_POST['username'])){
    $username=trim($_POST['username']);
    $firstname=trim($_POST['firstname']);
    $surname=trim($_POST['surname']);
    $gender=trim($_POST['gender']);
    $levels=trim($_POST['levels']);
    $institution=trim($_POST['institution']);
    $password=trim($_POST['password']);

//insert received values into database
$sqli ="INSERT INTO `students`(username,firstname,surname,gender,levels,institution,passwords) VALUES ('$username','$firstname','$surname','$gender','$levels','$institution','$password')";
$res = mysqli_query($con, $sqli) or die(mysqli_error($con));
if ($res) {
    echo "New student account created!";
} else {
    echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
}else{
?>
    <section class= "teachreg">
        <p><b>Are you a tutor?<br>
        Click here to register as one.</b></p>
        <button onclick= "location.href = 'teacherreg.html';" id= "myButton" class= "float-left submit-button">Tutor registration</button>
        <form action="reg1.php" method="POST">
            <fieldset class= "register2">
                <legend><b>Input Stuent User Details</b></legend>
                <b>Username:</b> <input type="text" name="username" required><br><br>
                <b>First Name:</b> <input type="text" name="firstname" required><br><br>
                <b>Surname:</b> <input type="text" name="surname" required><br><br>
                <b>Gender:</b>
                    <select style="background: transparent;" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="" disabled selected hidden>Choose your gender</option>
                    </select><br><br>
                <b>Level of Education:</b> 
                    <select style="background: transparent;" name="levels">
                        <option value="primary">Primary</option>
                        <option value="secondary">Secondary</option>
                        <option value="university">University</option>
                        <option value="" disabled selected hidden>Choose level of Education</option>
                    </select><br><br>
                <b>Institution:</b> <input type="text" name="institution" required><br><br>
                <b>Password:</b> <input type="password" name="password" required><br><br>
                <button onclick= "location.href = 'registration.html';" type="submit" name="studbut" value="submit">Submit</button>   
            </fieldset>
        </form>  
        <?php
}
?>
    </section>
    <footer>
        <p><b>Study Buddy &nbsp &nbsp &nbsp &nbsp 29742-00202 Nairobi, Kenya &nbsp * &nbsp +254721951035</b></p>
    </footer>

</body>
</html>