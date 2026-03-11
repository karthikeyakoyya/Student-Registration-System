<?php
include "../config/db.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students(name,class,email,phone)
            VALUES('$name','$class','$email','$phone')";

    mysqli_query($conn,$sql);

    header("Location:../index.php");
}
?>

<h2>Add Student</h2>

<form method="POST">

Name<br>
<input type="text" name="name" required><br><br>

Class<br>
<input type="text" name="class" required><br><br>

Email<br>
<input type="email" name="email" required><br><br>

Phone<br>
<input type="text" name="phone" required><br><br>

<button type="submit" name="submit">Add Student</button>

</form>