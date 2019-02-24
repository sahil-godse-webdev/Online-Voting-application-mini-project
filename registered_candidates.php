<?php
    $name=$_POST['cname'];
    $party=$_POST['cparty'];
    $image=$_POST['cimage'];
    $age=$_POST['cage'];
    $con=mysqli_connect('localhost','root','','voting') or die('unable to connect');
    $q="insert into candidate(cname,cage,cparty,cimage) values ('$name',$age,'$party','$image')";
    mysqli_query($con,$q)or die(mysqli_error($con));
    header('location: candidates_form.php?activity=inserted');
?>