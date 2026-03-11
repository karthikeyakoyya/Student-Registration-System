<?php
include "../config/db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
$name = $_POST['name'];
$class = $_POST['class'];
$email = $_POST['email'];
$phone = $_POST['phone'];

mysqli_query($conn,"UPDATE students SET
name='$name',
class='$class',
email='$email',
phone='$phone'
WHERE id=$id");

header("Location:../index.php");
}
?>

<h2>Edit Student</h2>

<form method="POST">

Name<br>
<input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

Class<br>
<input type="text" name="class" value="<?php echo $row['class']; ?>"><br><br>

Email<br>
<input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

Phone<br>
<input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

<button type="submit" name="update">Update</button>

</form>