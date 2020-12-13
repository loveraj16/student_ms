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
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;">Search Student Information</h1>
</div>


<table style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 5px 0px;">
    <form action="deletestudent.php" method="POST">    
        <tr>
            <th>Enter class:</th><td><input type="number" name="std" placeholder="Enter standerd" /></td>
            <th>Enter Name:</th><td><input type="text" name="stsname" placeholder="Enter sts name" /></td>

            <td colspan="2" align="center"><input type="submit" name="submit" value="ShowInfo" style="background-color: blue; border-radius: 15px; width: 120px; height: 30px;"></td>
        </tr>
    </form>
</table>

<table width='80%' border="1px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 5px 5px;">
    <tr style="background-color: indigo;">
        <th>No.</th>
        <th>Images</th>
        <th>Name</th>
        <th>RollNo.</th>
        <th>Delete</th>
    </tr>
    <?php

    if(isset($_POST['submit'])){

    include('../dbcon.php');

    $std = $_POST['std'];
    $stsname = $_POST['stsname'];

    $qry= "SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%$stsname%'";
    $run= mysqli_query($con,$qry);

    if(mysqli_num_rows($run)<1){
        echo "<tr><td colspan='5'>No record found..</td></tr>";
    }
    else{
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
            ?>
            <tr align="center">
                <td><?php echo $count; ?></td>
                <td><img src="../savedimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['rollno']; ?></td>
                <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
            </tr>

            <?php
        }
    }


    }
    ?>

</table>

