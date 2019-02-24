<?php
    $cid= $_REQUEST['cid'];
    $vname= $_REQUEST['vname'];
    $vadhar= $_REQUEST['vaadhar'];
    $vphone= $_REQUEST['vphone'];
    
    $con= mysqli_connect('localhost','root','','voting');
    $q= "insert into voters(cid,vname,vaadhar,vphone) values ($cid,'$vname',$vadhar,$vphone)";
    mysqli_query($con,$q)or die(mysqli_error($con));
    header('location: vote.php?activity=voted');

?>