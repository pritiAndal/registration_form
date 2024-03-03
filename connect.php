<?php
$servername="localhost";
$username="root";
$password="";
$database_name="database1";

$conn= new mysqli($servername, $username, $password, $database_name);
if($conn->connect_error)
{
    die( "connection failed:" . $conn->connect_error);
}

if(isset($_POST['submit']) && !empty($_FILES["profilephoto"]))
{
    $fname= $_POST['fname']; 
    $lname=$_POST['lname'];
    $cname=$_POST['cname'];
    $calender=$_POST['dob'];
    $state=$_POST['state'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $lang=$_POST['lang'];
    $profilephoto = basename($_FILES['profilephoto']['name']);
    $target_path="uploads/".$profilephoto; 
    $sql_query = "INSERT INTO `student details`(fname,lname,cname,dob,state,email,gender,lang,profilephoto)
    VALUES ('$fname','$lname','$cname','$dob','$state','$email','$gender','$lang','$profilephoto')";

    if (mysqli_query($conn, $sql_query))
    {   
        if (!is_dir("uploads")) {
            mkdir("uploads", 0755, true); // Create the directory with proper permissions
        }
        move_uploaded_file($_FILES['profilephoto']['tmp_name'], $target_path);
        echo"new details entry inserted succesfully";
    }
    else
    {
        echo"error:" . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
else{
}
?>
