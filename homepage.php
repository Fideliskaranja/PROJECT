<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="script.js">
</head>

<body>
    <div class="text">
        <h1>Registration Page</h1>
        <p>Kindly register yourself below.</p><br>
    </div>
    
<form method="post" enctype="multipart/form-data">
    <label>National ID</label><br>
    <input type="text" name="nationalid"><br><br>
    <label>First Name</label><br>
    <input type="text" name="firstname"><br><br>
    <label>Last Name</label><br>
    <input type="text" name="lastname"><br><br>
    <label>Age</label><br>
    <input type="text" name="age"><br><br>
    <label>Profession</label><br>
    <input type="text" name="profession"><br><br>
    <label>Email</label><br>
    <input type="text" name="email"><br><br>
    
    <input type="submit" name="submit"><br><br>
    <a href="index.php">Homepage</a>
</form>
 
</body>
</html>
 
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "people";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
    $nationalid = $_POST["nationalid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $profession = $_POST["profession"];
    $email = $_POST["email"];
    
 
    #sql query to insert into database
    $sql = "INSERT into users(id, fname, lname, age, profession, email) VALUES('$nationalid','$firstname','$lastname', '$age','$profession','$email')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}