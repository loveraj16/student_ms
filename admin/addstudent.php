<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>

<?php
include('header.php');
?>

<div class="admintitle">
    <div>
    <h5 ><a href="admindash.php" style="float: left; margin-left:20px; color:aliceblue;">BackToDashboard</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;">Welcome To Admin Dashbord</h1>
</div>

<form action="addstudent.php" method="POST" enctype="multipart/form-data">
    <table border="0px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 0 15px;">
        <th colspan="2" style="text-align: center;background-color:#00FF00; width: 140px; height: 50px;">Fill The Details Of Student</th>
        
        <tr>
            <td>Rollno.</td><td><input type="number" name="rolln" placeholder="Enter Rollno" required></td>
        </tr>
        <tr>
            <td>Name</td><td><input type="text" name="nam" placeholder="Enter FullName" required></td>
        </tr>
        <tr>
            <td>Standerd</td><td><input type="number" name="stander" placeholder="Enter class" required></td>
        </tr>
        <tr>
            <td>City</td><td><input type="text" name="cit" placeholder="Enter city" required></td>
        </tr>
        <tr>
            <td>Parent Contact Number</td><td><input type="number" name="pcon" placeholder="Enter parentContactNumber" required></td>
        </tr>
        <tr>
            <td>Upload Image</td><td><input type="file" name="simg"  required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Insert" style="background-color: red; border-radius: 15px; width: 140px; height: 50px;"></td>
        </tr>
    </table>
    
</form>
</body>
</html>


<?php

if(isset($_POST['submit'])){ //if we'll not give this,it'will submit from with zero values.

    include('../dbcon.php');

    $rolln = $_POST['rolln'];
    $nam = $_POST['nam'];
    $stander = $_POST['stander'];
    $cit = $_POST['cit'];
    $pcon = $_POST['pcon'];
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam,"../savedimages/$imagenam");

    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standerd`,`image`) VALUES ('$rolln','$nam','$cit','$pcon','$stander','$imagenam')";
    $run = mysqli_query($con,$qry);

    if($run==true){
        ?>  <script>
            alert('Data inserted Successfully :)'); 
            </script>
        <?php
    }

}

?>
