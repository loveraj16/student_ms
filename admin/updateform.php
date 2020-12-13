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
include('../dbcon.php');
$idd= $_GET['sid'];
$uqry= "SELECT * FROM `student` WHERE `id`='$idd'";
$run= mysqli_query($con,$uqry);
$data = mysqli_fetch_assoc($run);

?>

<div class="admintitle">
    <div>
    <h5 ><a href="admindash.php" style="float: left; margin-left:20px; color:aliceblue;">BackToDashboard</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;">Update Student Information</h1>
</div>

<form action="updatedata.php" method="POST" enctype="multipart/form-data">
    <table border="0px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 0 15px;">
        <th colspan="2" style="text-align: center;background-color:#00FF00; width: 140px; height: 50px;">Edit The Details Of Student</th>
        
        <tr>
            <td>Rollno.</td><td><input type="number" name="rolln" value="<?php echo $data['rollno']; ?>" required /></td>
        </tr>
        <tr>
            <td>Name</td><td><input type="text" name="nam" value="<?php echo $data['name']; ?>" required /></td>
        </tr>
        <tr>
            <td>Standerd</td><td><input type="number" name="stander" value="<?php echo $data['standerd']; ?>" required /></td>
        </tr>
        <tr>
            <td>City</td><td><input type="text" name="cit" value="<?php echo $data['city']; ?>" required /></td>
        </tr>
        <tr>
            <td>Parent Contact Number</td><td><input type="number" name="pcon" value="<?php echo $data['pcont']; ?>" required /></td>
        </tr>
        <tr>
            <td>Upload Image</td><td><input type="file" name="simg" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="idd" value="<?php echo $data['id']; ?>" />
                <input type="submit" name="submit" value="Update" style="background-color: red; border-radius: 15px; width: 140px; height: 50px;" />
            </td>
        </tr>
    </table>
    
</form>
