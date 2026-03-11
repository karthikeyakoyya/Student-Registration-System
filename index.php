<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Student Registration System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">Student Registration System</h2>

<div class="d-flex justify-content-between mb-3">

<a href="pages/add_student.php" class="btn btn-primary">Add Student</a>

<form method="GET" class="d-flex">

<input type="text" name="search" class="form-control me-2" placeholder="Search student">

<button class="btn btn-success">Search</button>

</form>

</div>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>
</tr>

<?php

if(isset($_GET['search']))
{
$search=$_GET['search'];

$query="SELECT * FROM students WHERE 
name LIKE '%$search%' 
OR class LIKE '%$search%' 
OR email LIKE '%$search%'";
}
else
{
$query="SELECT * FROM students";
}

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td>

<a href="pages/edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="actions/delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>