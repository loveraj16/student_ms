<?php

function showdetails($stdd,$roln){

    include('dbcon.php');

    $qryy= "SELECT * FROM `student` WHERE `standerd`='$stdd' AND `rollno`='$roln'";
    $run= mysqli_query($con,$qryy);

    if(mysqli_num_rows($run)>0){
        $dataa= mysqli_fetch_assoc($run);
        ?>
        <table border="1px solid" style="margin: auto;width: 60%;margin-top:40px">
            <th colspan="3" style="background-color: greenyellow;">Student Details</th>
            <tr>
                <td rowspan="5"><img src="savedimages/<?php echo $dataa['image']; ?>" alt="pic" style="max-height: 150px; max-width:140px;" /></td>
                <th>RollNo.</th>
                <td><?php echo $dataa['rollno']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $dataa['name']; ?></td>
            </tr>
            <tr>
                <th>Standerd</th>
                <td><?php echo $dataa['standerd']; ?></td>
            </tr>
            <tr>
                <th>Parent Contact Number</th>
                <td><?php echo $dataa['pcont']; ?></td>
            </tr>
            <tr>
                <th>city</th>
                <td><?php echo $dataa['city']; ?></td>
            </tr>
        </table>

        <?php
    }
    else{
        echo "<script>alert('No Result Found :( ');</script>";
    }
}

?>